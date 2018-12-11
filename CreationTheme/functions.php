<?php 
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
// Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );

function traitement_formulaire_proposer_mission() {

    if (isset($_POST['envoiMission']) && isset($_POST['proposer-verif']))  {

        if (wp_verify_nonce($_POST['envoiMission'], 'proposermission')) {
            wp_redirect();
            exit;
        }

    }
}
add_action('template_redirect', 'traitement_formulaire_proposer_mission');

//liste déroulante page d'accueil
function liste_type($tab,$nblignes){
    for($i=0;$i<$nblignes;$i++){
        echo '<option value="'.$tab[$i]["type_mission"].'"></option>';
    }
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
?>