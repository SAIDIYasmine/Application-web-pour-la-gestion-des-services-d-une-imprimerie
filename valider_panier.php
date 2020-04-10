
<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbname=gestion_impresion','root','');
//echo htmlspecialchars($_SESSION['panier']['libelleProduit'][0]);
$name=$_SESSION['panier']['libelleProduit'][0];
$qte=$_SESSION['panier']['qteProduit'][0];

$prix=$_SESSION['panier']['prixProduit'][0];
$prix=intval($prix);

//$sql = "INSERT INTO commande (name,qte,prix) VALUES('$name', '$qte', '$prix')";
 
//$bdd->exec($sql);
       
$nbArticles=count($_SESSION['panier']['libelleProduit']);
if(isset($_POST['confirmer'])){
    //echo 'hhhhh';
    $tele=$_POST['num_tele'];
    $nom_complet=$_POST['nom_complet'];
    for ($i=0 ;$i < $nbArticles ; $i++){
        $name=$_SESSION['panier']['libelleProduit'][$i];
        $qte=$_SESSION['panier']['qteProduit'][$i];
        $prix=$_SESSION['panier']['prixProduit'][$i];
        
        $sql = "INSERT INTO commande (name, qte,prix,nom_complet,tele) VALUES ('$name', '$qte', '$prix','$nom_complet','$tele')";
 
        $bdd->exec($sql);
    }
}



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Valider votre panier</title>
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
		<!-- scripts -->
		<script type = "text/javascript">
         <!--
            function getConfirmation() {
               var retVal = confirm("Do you want to continue ?");
               if( retVal == true ) {
                  window.close();
                  return true;
               } else {
                  document.write ("User does not want to continue!");
                  return false;
               }
            }
         //-->
      </script>
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="themes/js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="GET" class="search_form">

					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="compte.php">Mon compte</a></li>
                                                        <li><a href="cart.php" >Voir votre panier</a></li>
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
							<li><a href="./contact.html">Contact</a></li>	
						</ul>
					</nav>
				</div>
			</section>				
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/image1.png" alt="New products" >
				<h4><span>confirmation</span></h4>
			</section>
			<section class="main-content">				
<div class="row">
<div class="span9">					
<h4 class="title"><span class="text"><strong>Votre</strong> Panier</span></h4>

	<form action = "" method = "POST" >
		
		
    		
    		
  			
                
      <label for="nom_complet"> Votre nom complet</label>
     <input type="text" name="nom_complet" id="nom_complet" >
    <label for="nbr_tele">Votre numéro de téléphone</label>
    <input type="tel" name="num_tele" id="nbr_tele" required=""><br/>
			
      <input type="submit" name="confirmer" value="confirmer" onclick="getConfirmation();">
	</form>
</div>                                   
 </div>
</section>									
     <div>
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
						<p> Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>
						<br/>
					</div>					
				</div>	
</section>
     </div>

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