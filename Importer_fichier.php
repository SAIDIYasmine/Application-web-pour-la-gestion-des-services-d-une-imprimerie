
<?php
    
    $bdd=new PDO('mysql:host=localhost;dbname=gestion_impresion','root','');
    require 'fonctions_admin.php';
    
    
    
    
   if(isset($_POST['valide'])){
      $file_name = $_FILES['fileToUpload']['name'];
      $file_tmp =$_FILES['fileToUpload']['tmp_name'];
      $format=$_POST['format'];
      $couleur=$_POST['couleur'];
      $nbr_copier=$_POST['nbr_copier'];
      $spiral=$_POST['spiral'];
      $datetime_variable = new DateTime();
      $date_commande =$datetime_variable->format('Y-m-d H:i:s');
      $date_livraison=$_POST['dt_liv'];
      //$date_ajoute = date_format($datetime_variable, 'Y-m-d H:i:s');
      
              
      /* '$date_ajoute''$date_ajoute'*/
      
         move_uploaded_file($file_tmp,"uploadFiles/".$file_name);
         $sql = "INSERT INTO importfiles (nom, format, couleur,nbr_copier,spiral,date_commande,date_livraison)
        VALUES ('$file_name', '$format', '$couleur','$nbr_copier','$spiral','$date_commande','$date_livraison')";
 
        $bdd->exec($sql);
        
        
         
      
   }
   $bdd=null;

      


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Importer fichiers</title>
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
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
                <script>
                    function calc(){
                        var nbr_pages=parseFloat(document.getElementById('nbr_pages').value);
                        
                        var nbr_copier=parseFloat(document.getElementById('nbr_copier').value);
                        document.getElementById('result').value=nbr_pages * nbr_copier;
                       
                    }
                    function f_nbr_page(){
                            
                            document.getElementById('nbr_pages').value='4';
                        }
                </script>
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
					<a href="index.html" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
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
				

<form action = "" method = "POST" enctype="multipart/form-data">
		<section class="importer_fichier">
		<label>Importer un fichier</label>
			<p><input type="file" name="fileToUpload"></p>
                        

		</section>
		<label>Configurer votre produit</label>
			<div class="form-group">
  			<label for="sel">Format</label>
  			<select class="form-control" id="sel" name="format">
    		<option>A4</option>
    		<option>A3</option>
    		<option>A2</option>
    		</select>
    		</div>
    		<div class="form-group">
  			<label for="couleur">Couleur</label>
  			<select class="form-control" id="couleur" name="couleur">
    		<option>avec couleur </option>
    		<option>sans couleur </option>
    		</select>
    		</div>
                <div class="form-group" value="1">
  			<label for="spiral">Spiral</label>
                        <select class="form-control" id="spiral" name="spiral" >
    		<option>avec spiral</option>
    		<option>sans spiral</option>
    		</select>
    		</div>
                <label for="nbr_pages"><button onclick="f_nbr_page();">Nombre des pages</button></label>
                <input type="" name="nbr_pages" id="nbr_pages"  onclick="">
    		<label for="nbr_copier">Copie</label>
                <input type="" name="nbr_copier" id="nbr_copier" min="1" max="100" required=""><br/>
                                    
                        <label for="dt_liv">Date livraison</label>
                        <input type="datetime-local" name="dt_liv" id="dt_liv" min="1" max="100" ><br/>
                        
                
                
                        
				
      <input type="submit" name="valide" value="Ajouter">
	</form>
                <button onclick="calc();">total</button>
                <input type="" name="total" id="result" readonly="">






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
						<p style="color:#FFFFFF">Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>						<br/>
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
