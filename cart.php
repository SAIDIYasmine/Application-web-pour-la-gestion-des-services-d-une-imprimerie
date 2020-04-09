<?php 
error_reporting(E_ERROR | E_PARSE);

session_start();
include_once("fonctions_panier.php");
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null){
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;
   //récuperation des variables en POST ou GET
 $id=(isset($_POST['id'])? $_POST['id']:  (isset($_GET['id'])? $_GET['id']:null ));
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);
   //On traite $q qui peut etre un entier simple ou un tableau d'entier  
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
        $QteArticle[$i++] = intval($contenu);
      	}
   }
   else
   $q = intval($q);   
}
if (!$erreur){
   	switch($action){
      	Case "ajout":
         	ajouterArticle($id,$l,$q,$p);
         	break;
      	Case "suppression":
         	supprimerArticle($l);
         	break;
      	Case "refresh" :
         	for ($i = 0 ; $i < count($QteArticle) ; $i++){
            	modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
            }
         	break;
      	Default:
         	break;
   }
}

?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>panier</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
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
                            <li><a href="vider_panier.php">Vider panier</a></li>
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
				<h4><span>Panier</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Ton</strong> Panier</span></h4>
						<form method="post" action="cart.php">
							<table style="width: 1000px">
								<tr>
									<td colspan="4">Votre panier</td>
								</tr>
								<tr>
									<td>Identifiant</td>
									<td >Libellé</td>
									<td >Quantité</td>
									<td >Prix Unitaire</td>
									<td >Action</td>
								</tr>
<?php
	if(creationPanier()){
		$nbArticles=count($_SESSION['panier']['libelleProduit']);
		if ($nbArticles <= 0)
			echo "<tr><td>Votre panier est vide </ td></tr>";
		else{
			for ($i=0 ;$i < $nbArticles ; $i++){
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['id'][$i])."</td>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/ readonly></td>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
				echo "<td><a href=\"".htmlspecialchars("cart.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
				echo "</tr>";
			}

			echo "<tr><td colspan=\"2\"> </td>";
			echo "<td colspan=\"2\">";
			echo "Total : ".MontantGlobal();
			echo "</td></tr>";
			echo "<tr><td colspan=\"4\">";
			echo "<input type=\"submit\" value=\"Rafraichir\"/>";
			echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
			echo "</td></tr>";
		}
	}
?>
							</table>
						</form>
						<hr/>
						<p class="buttons center"><a href="valider_panier.php"><button class="btn btn-inverse" type="submit" id="checkout">Valide</button></a></p>	
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
							<li><a href="./register_connexion.php">Connectez-vous</a></li>							
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
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
                    
                
    </body>
</html>