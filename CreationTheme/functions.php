<?php 

/***CHARGEMENT DU FICHIER PHP QUI CONTIENT LES FONCTIONS DE LOGIN_MODAL***/
require_once(ABSPATH.'wp-content/themes/'.wp_get_theme().'/modules/login_modal/functions.php');

/**Redirige sur la page d'accueil lors du login ou du logout***/
add_filter( "wp_login","redirigeHome" );
add_filter( "wp_logout","redirigeHome" );

function redirigeHome(){
    wp_redirect(home_url());
    exit;
}

//enlève barre d'admin
if ( function_exists('register_sidebar') ) register_sidebar();

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}

// Register a new sidebar simply named 'sidebar'
function add_widget_Support() {
                register_sidebar( array(
                                'name'          => 'Sidebar',
                                'id'            => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget'  => '</div>',
                                'before_title'  => '<h2>',
                                'after_title'   => '</h2>',
                ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_Widget_Support' );
// Register a new navigation menu
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

//liste déroulante page d'accueil
function liste_type($tab,$nblignes){
    for($i=0;$i<$nblignes;$i++){
        echo '<option value="'.$tab[$i]["type_mission"].'"></option>';
    }
}

//Renvoie sous forme de liste déroulante (select) 
//la liste des terms d'une taxo -> $taxonomy
//pour un post donné -> $postID
//Avec possibilité de donner un nom de classe
//exemple d'utilisation dans librairie -> $taxonomie=get_select_terms_taxo_post( $id_employe,'niveau','form-control');
function get_select_terms_taxo_post($postID,$taxonomy,$classe=''){
    //Récupération des  terms de la taxo niveau auxquels appartient le post
    $taxos=get_the_terms($postID,$taxonomy); //Si il n'y aucun term la fonction renvoie 0 (false)   
    //var_dump($taxos);

    //Création d'un tableau indicé qui contient les id des terms si il y a au moins un term
    $tabtaxo=array();
    if($taxos){
        foreach ($taxos as $taxo) {
            $tabtaxo[]=$taxo->term_id;
        }
    }
    //var_dump($tabtaxo);
    $taxonomie='';
    $terms=get_terms($taxonomy, array('hide_empty'=>false));
    //var_dump($terms);
    $taxonomie.='<select name="'.$taxonomy.'" class="'.$classe.'">';
    $taxonomie.='<option value="0">Type de mission</option>';
    foreach($terms as $term){
        $selected="";
        if(in_array($term->term_id , $tabtaxo) ) $selected="selected";
        //$taxonomie .= '<label for="'.$term->slug.'"><input '.$checked.' type="checkbox" id="'.$term->slug.'" name="'.$term->taxonomy.'[]" value="'.$term->term_id.'"> '.$term->name.'</label>&nbsp;&nbsp;&nbsp;&nbsp;';   
        $taxonomie.='<option '. $selected.' value="'.$term->term_id.'">'.$term->name.'</option>';
    }
    $taxonomie.='</select>';
    return $taxonomie;
}

/////RENVOIE UN NOMBRE LIMITE ($charlength) DE CARACTERES D'UN RESUME ($excerpt)////
//ex : echo the_excerpt_max_charlength(200,get_the_excverpt()) -> renvoie les 200
//premiers caractères du résumé du post en cours (dans la boucle)

function get_the_excerpt_max_charlength($charlength,$excerpt) {
    //$excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            return mb_substr( $subex, 0, $excut ).'[...]';
        } else {
            return $subex.'[...]';
        }
        return '[...]';
    } else {
        return $excerpt;
    }
}

/////RENVOIE LA MLISTE DES IMAGES ATTACHEES A UN POST////
//ex : liste_images_attachees(get_the_id(),'thumbnail') 
// -> renvoie les images attachées  du post en cours (dans la boucle)
function liste_images_attachees($id_post,$size){

        $attachments=get_children(
            array(
                'post_parent'=>$id_post,
                'post_type'=>'attachment',
                'post_mime_type'=>'image'
            )
        );

        $listeImages="";
        foreach ($attachments as $attachment) {
            $listeImages.=wp_get_attachment_link( $attachment->ID,$size);
        }

        return $listeImages;


}

///RENVOIE LE CHEMIN DE L'IMAGE A LA UNE (attribut src)////
///get_src_image_une(get_the_id(),'full') ->
/// renvoie le chemin de l'image à la une correspondant à la dimension full pour 
/// le post courant (dans la boucle)
function get_src_image_une($id,$size){

    //Récupération de l'id du post de l'image à la une attachée au poste dont l'id est = $id
    $image_une_id=get_post_thumbnail_id( $id );
    //Récupération d'un tableau contenant les informations sur la source de l'image du post attachment
    $imageData=wp_get_attachment_image_src($image_une_id,$size);
    //Ce tableau contient dans l'ordre le chemin(url) de l'image , sa largeur et sa hauteur
    return $imageData[0];

}

//AMELIORE LA PRESENTATION DE LA FONCTION var_dump($_posts)///

function vardump($input, $collapse=false) {
    $recursive = function($data, $level=0) use (&$recursive, $collapse) {
        global $argv;

        $isTerminal = isset($argv);

        if (!$isTerminal && $level == 0 && !defined("DUMP_DEBUG_SCRIPT")) {
            define("DUMP_DEBUG_SCRIPT", true);

            echo '<script language="Javascript">function toggleDisplay(id) {';
            echo 'var state = document.getElementById("container"+id).style.display;';
            echo 'document.getElementById("container"+id).style.display = state == "inline" ? "none" : "inline";';
            echo 'document.getElementById("plus"+id).style.display = state == "inline" ? "inline" : "none";';
            echo '}</script>'."\n";
        }

        $type = !is_string($data) && is_callable($data) ? "Callable" : ucfirst(gettype($data));
        $type_data = null;
        $type_color = null;
        $type_length = null;

        switch ($type) {
            case "String": 
                $type_color = "green";
                $type_length = strlen($data);
                $type_data = "\"" . htmlentities($data) . "\""; break;

            case "Double": 
            case "Float": 
                $type = "Float";
                $type_color = "#0099c5";
                $type_length = strlen($data);
                $type_data = htmlentities($data); break;

            case "Integer": 
                $type_color = "red";
                $type_length = strlen($data);
                $type_data = htmlentities($data); break;

            case "Boolean": 
                $type_color = "#92008d";
                $type_length = strlen($data);
                $type_data = $data ? "TRUE" : "FALSE"; break;

            case "NULL": 
                $type_length = 0; break;

            case "Array": 
                $type_length = count($data);
        }

        if (in_array($type, array("Object", "Array"))) {
            $notEmpty = false;

            foreach($data as $key => $value) {
                if (!$notEmpty) {
                    $notEmpty = true;

                    if ($isTerminal) {
                        echo $type . ($type_length !== null ? "(" . $type_length . ")" : "")."\n";

                    } else {
                        $id = substr(md5(rand().":".$key.":".$level), 0, 8);

                        echo "<a href=\"javascript:toggleDisplay('". $id ."');\" style=\"text-decoration:none\">";
                        echo "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>";
                        echo "</a>";
                        echo "<span id=\"plus". $id ."\" style=\"display: " . ($collapse ? "inline" : "none") . ";\">&nbsp;&#10549;</span>";
                        echo "<div id=\"container". $id ."\" style=\"display: " . ($collapse ? "" : "inline") . ";\">";
                        echo "<br />";
                    }

                    for ($i=0; $i <= $level; $i++) {
                        echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }

                    echo $isTerminal ? "\n" : "<br />";
                }

                for ($i=0; $i <= $level; $i++) {
                    echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }

                echo $isTerminal ? "[" . $key . "] => " : "<span style='color:black'>[" . $key . "]&nbsp;=>&nbsp;</span>";

                call_user_func($recursive, $value, $level+1);
            }

            if ($notEmpty) {
                for ($i=0; $i <= $level; $i++) {
                    echo $isTerminal ? "|    " : "<span style='color:black'>|</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }

                if (!$isTerminal) {
                    echo "</div>";
                }

            } else {
                echo $isTerminal ? 
                        $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " : 
                        "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";
            }

        } else {
            echo $isTerminal ? 
                    $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "  " : 
                    "<span style='color:#666666'>" . $type . ($type_length !== null ? "(" . $type_length . ")" : "") . "</span>&nbsp;&nbsp;";

            if ($type_data != null) {
                echo $isTerminal ? $type_data : "<span style='color:" . $type_color . "'>" . $type_data . "</span>";
            }
        }

        echo $isTerminal ? "\n" : "<br />";
    };

    call_user_func($recursive, $input);
}

/**********Modifier résultats retournés par recherche***********/
// add_filter('pre_get_posts','custom_search_filter');

// function custom_search_filter( $query ) {
    
//    // Si on est entrain de faire une recherche
//    if ( $query->is_search ) {

//     switch( $_GET['search']  ) {

//         case 'education':
//         $query->set( 'the_terms', 'education' );
//         break;

//         case 'environnement':
//         $query->set( 'the_terms','environnement' );
//         break;

//         case 'sante':
//         $query->set( 'category_name','sante' );
//         break;
//     }
//     }
//     return $query;
// }
?>