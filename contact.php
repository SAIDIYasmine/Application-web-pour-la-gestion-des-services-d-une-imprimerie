<?php
$connect=mysqli_connect('localhost','root','',"gestion_impresion") or die('Error');
			mysqli_select_db($connect,'gestion_impresion');
$requete="SELECT * FROM users where categorie='admin'";
$exec_requete = mysqli_query($connect,$requete);
$reponse=mysqli_fetch_array($exec_requete);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Contact</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>

	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="compte.php">Mon compte</a></li>
							<li><a href="cart.php">panier</a></li>
							<li><a href="register_connexion.php">Connexion</a></li>						
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./Acceuil.html">Acceuil</a></li>								
							<li><a href="./etudiant.html">Espace etudiant</a></li>				
							<li><a href="./professeur.html">Espace professeur</a></li>
							<li><a href="./contact.php">Contact</a></li>	
						</ul>
					</nav>
				</div>
			</section>							

			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/image1.png" alt="New products" >
				<h4><span>Contactez nous</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">				
					<div class="span5">
						<div>
							<h5>INFORMATIONS SUPPLEMENTAIRES</h5>
							<p><strong style="color:#FF4500">TEL: </strong><?php echo$reponse['tel'];?><br>
							<strong style="color:#FF4500">Email:</strong>&nbsp;<?php echo$reponse['mail'];?>
						</div>
					</div>
					<div class="span7">
						<p>Une question ? un probleme ? N'hesitez pas de nous contacter.</p>
						<form method="post" action="#">
							<fieldset>
								<div class="clearfix">
									<label for="nom"><span>Nom et prenom:</span></label>
									<div class="input">
										<input tabindex="1" size="18" id="nom" name="nom" type="text" value="" class="input-xlarge" placeholder="Nom et prenom">
									</div>
								</div>
								
								<div class="clearfix">
									<label for="email"><span>Adresse e-mail :</span></label>
									<div class="input">
										<input tabindex="2" size="25" id="email" name="email" type="text" value="" class="input-xlarge" placeholder="Adresse e-mail">
									</div>
								</div>
								
								<div class="clearfix">
									<label for="objet"><span>Objet :</span></label>
									<div class="input">
										<input tabindex="2" size="25" id="objet" name="objet" type="text" value="" class="input-xlarge" placeholder="Objet">
									</div>
								</div>

								<div class="clearfix">
									<label for="message"><span>Message:</span></label>
									<div class="input">
										<textarea tabindex="3" class="input-xlarge" id="message" name="message" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								
								<div class="actions">
									<button tabindex="3" type="submit" name="envoi" class="btn btn-inverse">Send message</button>
								</div>
<?php

$destinataire = 'yasminesaidi1999@hotmail.com';
$copie = 'oui';
$form_action = '';
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
function Rec($text){
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc()){
		$text = stripslashes($text);
	}
	$text = nl2br($text);
	return $text;
};
function IsEmail($email){
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
$email = (IsEmail($email)) ? $email : ''; 
$err_formulaire = false; 
if (isset($_POST['envoi'])){
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != '')){
		$headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
		if ($copie == 'oui'){
			$cible = $destinataire.';'.$email;
		}
		else{
			$cible = $destinataire;
		};
 		$caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '…',   '&rsquo;', '&lsquo;');
		$caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<'     );
		$objet = html_entity_decode($objet);
		$objet = str_replace($caracteres_speciaux, $caracteres_remplacement, $objet);
		$message = html_entity_decode($message);
		$message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);
 		$num_emails = 0;
		$tmp = explode(';', $cible);
		foreach($tmp as $email_destinataire){
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;
		}
		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1))){
			echo '<p>'.$message_envoye.'</p>';
		}
		else{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else{
		echo '<p>'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
}; 
?>
							</fieldset>
						</form>
					</div>				
				</div>
			</section>			
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./Acceuil.html">Acceuil</a></li>  
							<li><a href="./etudiant.html">Espace etudiant</a></li>
							<li><a href="./professeur.html">Espace professeur</a></li>
							<li><a href="./contact.php">Contactez-nous</a></li>							
						</ul>					
					</div>
					<div class="span3">
						<h4>Compte</h4>
						<ul class="nav">
							<li><a href="./compte.php">Mon compte</a></li>  
							<li><a href="./cart.php">Mon panier</a></li>  
							<li><a href="./register_connexion.php">Connexion ou inscription</a></li>
						</ul>					
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p style="color:#FFFFFF">Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>
						<br/>
						
					</div>					
				</div>	
			</section>

		</div>
		<script src="themes/js/common.js"></script>		
    </body>
</html>