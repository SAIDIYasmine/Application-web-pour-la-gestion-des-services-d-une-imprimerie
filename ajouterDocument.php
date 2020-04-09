<?php
session_start();
$id_prof=$_SESSION['id_prof'];
$bdd=new PDO('mysql:host=localhost;dbname=gestion_impresion','root','');
if(isset($_FILES['fileToUpload'] )&& isset($_POST['btnValider'])){
    $ecole=$_POST['ecole'];
    $nbr_page=$_POST['nbr_page'];
    $universite=$_POST['universite'];
    $filiere=$_POST['filiere'];
    $niveau=$_POST['niveau'];
    $file_name = $_FILES['fileToUpload']['name'];
    $nom=$_POST['nom'];
    $image_name=$_FILES["imageUpload"]["name"];
    $file_tmp =$_FILES['fileToUpload']['tmp_name'];
    $image_tmp=$_FILES["imageUpload"]["tmp_name"];
      $datetime_variable = new DateTime();
      $date_depot =$datetime_variable->format('Y-m-d H:i:s');
    move_uploaded_file($file_tmp,"uploadFiles/Prof_Files/".$file_name);
    include 'fonctions_admin.php';
    $nbr_image=  number_images("themes/images/ladies/")+1;
    move_uploaded_file($image_tmp,"themes/images/ladies/" .$nbr_image.'.jpg' ); 
    $sql = "INSERT INTO cours VALUES (0,'$id_prof','$nom','$date_depot','$nbr_page','$universite', '$ecole','$filiere','$niveau', '$nbr_image',$nbr_page*0.25)";
    $bdd->exec($sql);
}    
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Espace professeur</title>
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
							<li><a href="#">Mon compte</a></li>
							<li><a href="cart.html">panier</a></li>
							<li><a href="register_connexion.php">Connexion</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
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
				<h4><span>Espace professeur</span></h4>
				</br>  
				<div class="formArticle">
        			<form method="POST" action=""  enctype="multipart/form-data" >
            		<table>
                		<tr>
                		<td>
            			<fieldset >
                			<legend> A propos du document : </legend>
                			<label for="">Nom du cours :</label>
                			<input type="" name="nom" size="20" accept="" maxlength="40" placeholder="exemple: --PHP--" id="ecole" />
                			<label for="fichier">Importer document :</label>
                			<input type="file" name="fileToUpload" id="file" max-size="32154"><br> 
                			<label for="fichier">Image du document :</label>
                			<input type="file" name="imageUpload" value="choisir une image"><br>
                			<label for="nbr_page" class="inline">nombre de pages :</label>
                			<input type="" name="nbr_page" value="" id="nbr_page" /><br/>
            			</fieldset>
                		</td>
                		<td></td><td></td>
                		<td >
            			<fieldset >
                			<legend>Infos supplementaires :</legend>
                			<label for="Nom">universite :</label>
                			<input type="" name="universite" size="20" accesskey=""accept=""maxlength="40" placeholder="exemple :--med5--" id="ecole" />
                			<label for="">ecole :</label>
                			<input type="" name="ecole" size="20" accept="" maxlength="40" placeholder="exemple: --ENSAIS--" id="ecole" />
                			<label for="">filiere :</label>
                			<input type="" name="filiere" size="20" accept="" maxlength="40" placeholder="exemple: --embi--" id="ecole" />
                			<label for="">niveau :</label>
                			<input type="" name="niveau" size="20" accept="" maxlength="40" placeholder="exemple: --A1--" id="ecole" />
            			</fieldset>
               			<p>
                		<input type="submit" value="valider" name='btnValider'  />
                		<input type="reset" value="Annuler" onclick="location.href='ajouterDocument.php'"/>
                		</p>
                		</td>
            			</tr>
            		</table>
        			</form>	
        		</div>	
			</section>			
			<section class="main-content">				
				
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
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>