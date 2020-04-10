<!DOCTYPE html>
<html lang="en">
	<head>
		<style>
			.button {
  				background-image: linear-gradient(to right, #E44D26 0%, #F16529 51%, #E44D26 100%);
  				border: none;
  				color: white;
  				text-align: center;
  				text-decoration: none;
  				display: inline-block;
  				font-size: 16px;
  				margin: 4px 2px;
  				cursor: pointer;
			}
			.button1 {padding: 10px 50px;}
		</style>
		<meta charset="utf-8">
		<title>Espace admin</title>
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
				<h4><span>Liste des utilisateurs</span></h4></br>

                <?php
                    echo '<table  cellspacing="3" cellpadding="3" class="table table-striped" style="width: 1000px">
                    <tr>
                      	<td width="20%"><b>Nom</b></td>
                        <td width="20%"><b>Prenom</b></td>
                        <td width="40%"><b>Email</b></td>
                        <td width="10%"><b>Role</b></td>
                        <td width="10%"><b>Supprimer </b></td>            
                    </tr>';
                    $row_count = 0;
                    $con=new PDO('mysql:host=localhost;dbname=gestion_impresion','root','');
                    if(isset($_POST['etudiants'])){
                    	$stml=$con->prepare("select * from users where categorie='etudiant'");
                    }
                    else if(isset($_POST['professeurs'])){
                    	$stml=$con->prepare("select * from users where categorie='professeur'");
                    }
                    else{
                    	$stml=$con->prepare("select * from users ");
                	}
                    $stml->execute();
					$users=$stml->fetchAll();
					foreach($users as $user) :	
                        echo '<tr>';
                        echo '<td>'.$user['Nom'].'</td>'; 
                        echo '<td>'.$user['Prenom'].'</td>'; 
                        echo '<td>'.$user['mail'].'</td>'; 
                        echo '<td>'.$user['categorie'].'</td>'; 
echo "<td >"; ?><a href="supprimer_users.php?id=<?php echo $user['id_user'];?>&amp;nameFile=<?php echo $user['Nom'];?> " onclick="printWithSpecialFileName()">XXXX</a> <?php echo"</td>";
echo '</tr>';                    endforeach;   
                    echo '</table>';
                ?>
                    		<input type="reset" value="<==" class="button button1" name="annuler" onclick="location.href='admin.php'"/>

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
							<li><a href="register_connexion.php">Connexion ou inscription</a></li>
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