<?php

	global $lienLoginOut;
	global $lienLoginOutInscription;

	$lienLoginOut='';
	$lienLoginOutInscription='';
	if (!is_user_logged_in()) {
		//$lienLoginOut='<a id="lienLoginOut" data-toggle="modal" href="#modal-id">Connexion</a>';
		$lienLoginOut='<a href="'.get_bloginfo("url").'/?login=connect">Connexion</a>';
		$lienLoginOutInscription='<a href="'.get_bloginfo("url").'/?login=register">Inscription</a>';
	}else{
		$lienLoginOut='<a href="'.esc_url(wp_logout_url()). '">Déconnexion</a>';
	}

	//<!--bs3-modal-->

	$modal_content_loginform='
		<form name="loginform" id="loginform" action="'.get_bloginfo("url").'/wp-login.php" method="post">
			<p>
				<label for="user_login">Nom d’utilisateur ou adresse e-mail<br>
				<input type="text" name="log" id="user_login" class="input" value="" size="20"></label>
			</p>
			<p>
				<label for="user_pass">Mot de passe<br>
				<input type="password" name="pwd" id="user_pass" class="input" value="" size="20"></label>
			</p>
				<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Se souvenir de moi</label></p>
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large  btn btn-primary btn-large" value="Se connecter">
				<input type="hidden" name="redirect_to" value="'.get_bloginfo("url").'/wp-admin/">
				<input type="hidden" name="testcookie" value="1">
			</p>
		</form>
		<p id="nav">
			<a href="'.get_bloginfo("url").'/wp-login.php?action=lostpassword">Mot de passe oublié&nbsp;?</a>
		</p>
		<p id="messageLogin" class="messageLogin"></p>
		<script>
			/**************ATTENTE CHARGEMENT DOCUMENT***********/
			$(document).ready(function() {
			/*****************************************************/			
	
		 	$("#wp-submit").on("click",function(){
				if($("#user_login").val()=="" || $("#user_pass").val()==""){
					$("#messageLogin").html("vous devez saisir des valeurs dans les 2 zones");
					return false;
				}					
		 	});


		 	/*****************************************************/	
			});
			/*****************************************************/	

		</script>
	';

	$modal_content_lostpasswordform='
		<h3>MOT DE PASSE OUBLIE</h3>
		<hr>					
		<p class="message">Veuillez saisir votre identifiant ou votre adresse de messagerie. Un lien permettant de créer un nouveau mot de passe vous sera envoyé par e-mail.</p>
		<form name="lostpasswordform" id="lostpasswordform" action="'.get_bloginfo("url").'/wp-login.php?action=lostpassword" method="post">
			<p>
				<label for="user_login">Nom d’utilisateur ou adresse e-mail<br>
				<input type="text" name="user_login" id="user_login" class="input" value="" size="20"></label>
			</p>
				<input type="hidden" name="redirect_to" value="'.get_bloginfo("url").'/?login=reset">
			<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large  btn btn-primary btn-large" value="Générer un mot de passe"></p>
		</form>		
		
	';


	$modal_content_login_registerform='
		<p class="message register">S’inscrire sur ce site</p>
		<form name="registerform" id="registerform" action="'.get_bloginfo("url").'/wp-login.php?action=register" method="post" novalidate>
		<div class="form-group">
			<p>
				<label for="user_login">Identifiant<br>
				<input type="text" name="user_login" id="user_login" class="input  form-control" value="" size="20"></label>
			</p>
			<p>
				<label for="user_email">Adresse de messagerie<br>
				<input type="email"  name="user_email" id="user_email" class="input form-control" value="" size="25"></label>
			</p>
			<p id="reg_passmail">La confirmation d’inscription vous sera envoyée par e-mail.</p>
			<br class="clear">
			<input type="hidden" name="redirect_to" value="'.get_bloginfo("url").'/?login=registerOK">
			<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large btn btn-primary btn-large" value="Inscription"></p>
			<p id="messageLogin" class="messageLogin"></p>
		</div>
		</form>
		<script>
			/**************ATTENTE CHARGEMENT DOCUMENT***********/
			$(document).ready(function() {
			/*****************************************************/			
		 	
		 	$("#wp-submit").on("click",function(){
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if( !regex.test($("#user_email").val())) {
					$("#messageLogin").html("Mauvais Email");
					return false;
				}

				if( $("#user_login").val()=="") {
					$("#messageLogin").html("Saisissez un identifiant");
					return false;
				}
					
		 	});


		 	/*****************************************************/	
			});
			/*****************************************************/	
		</script>

	';


	$modal_content_login_error='
		<div id="login_error" class="login_error">	
			<strong>ERREUR</strong>
			&nbsp;: Vos authentifiants ne sont pas corrects . 
			<a href="'.get_bloginfo("url").'/wp-login.php?action=lostpassword">Mot de passe oublié&nbsp;?</a><br>
		</div>
	';

	$modal_content_login_reset='
		<p class="message">	Vérifiez votre messagerie pour y trouver le lien de confirmation.<br></p>
	';

	$modal_content_login_register_msg='
		<p class="message">	Inscription terminée. Veuillez consulter vos e-mails.</p>
	';

	$script_open_modal='
		 <script>
		 	/**************ATTENTE CHARGEMENT DOCUMENT***********/
			$(document).ready(function() {
			/*****************************************************/		

		 		$("#modal-id").modal();

		 	/*****************************************************/	
			});
			/*****************************************************/	
		 </script>
	';

	//vardump($_GET);
	$login=isset($_GET["login"])?$_GET["login"]:'';
	$modal_content='';
	if($login=='connect')		$modal_content=$modal_content_loginform;
	if($login=='lost')			$modal_content=$modal_content_lostpasswordform;
	if($login=='reset')			$modal_content=$modal_content_login_reset.'<br> '. $modal_content_loginform;
	if($login=='fail')			$modal_content=$modal_content_login_error.'<br>'.$modal_content_loginform;
	if($login=='register')		$modal_content=$modal_content_login_registerform;
	if($login=='registerOK')	$modal_content=$modal_content_login_register_msg.' '.$modal_content_loginform;
	if($login!='') 				$modal_content.=' '.$script_open_modal;

?>
	
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content mo-login-modal">
			<div class="modal-header">
				<button type="button" class="ferme" data-dismiss="modal">
					&times;
				</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<?=$modal_content ?>		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


