<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Les fichiers à imprimer</title>
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
							<li><a href="cart.php">Voir votre panier</a></li>
							<li><a href="register_connexion.html">Connexion</a></li>		
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
				








			</section>			
			<section class="container" >				
                            <h4><strong>Les fichiers à imprimer</strong></h4>
                            
                            <?php
                            echo '<table  cellspacing="3" cellpadding="3" class="table table-striped" style="width: 1000px">
                                    <tr>
                                    <td width="20%"><b>Nom du fichier</b></td>
                                    <td  width="35%"><b>Description</b></td>
                                    <td width="15%"><b>Date commande</b></td>
                                    <td width="15%"><b>Date Livraison</b></td>
                                    <td  width="40%"><b>Action </b></td>
                                    
                                    </tr>';
                            $row_count = 0;
                           $con=new PDO('mysql:host=localhost;dbname=gestion_impresion','root','');

                           $stml=$con->prepare("select * from importfiles ");
                           $stml->execute();
							$cours=$stml->fetchAll();
						
						foreach($cours as $donnees) :	
	
					
                                                    echo '<tr>';
    
                                                    echo '<td>'.$donnees['nom'].'</td>'; 
                                                    echo '<td>  '.$donnees['nbr_copier'].' copiers  format '.$donnees['format'].'  '.$donnees['couleur'].'  '.$donnees['spiral']; 
                                                    echo '<td>'.$donnees['date_commande'].'</td>';
                                                    echo '<td>'.$donnees['date_livraison'].'</td>';
                                                    echo "<td >"; ?><a href="imprimer.php?id=<?php echo $donnees['id'];?>&amp;nameFile=<?php echo $donnees['nom'];?> " onclick="printWithSpecialFileName()">imprimer</a> <?php echo"</td>";

                                                    echo '</tr>';
                        endforeach;
                            
                            echo '</table>';
                            ?>
                                                    <h4><strong>Commande des cours existants</strong></h4>
<?php
                            echo '<table  cellspacing="3" cellpadding="3" class="table table-striped" style="width: 1000px">
                                    <tr>
                                    <td width="15%"><b>Nom du fichier</b></td>
                                    
                                    <td width="10%"><b>Quantité</b></td>
                                   
                                    <td  width="10%"><b>Prix total </b></td>
                                    <td  width="20%"><b>Nom du Client </b></td>
                                    <td  width="10%"><b>Téléphoe</b></td>
                                    <td  width="25%"><b>Action </b></td>
                                    
                                    </tr>';
                            
                           $con=new PDO('mysql:host=localhost;dbname=gestion_impresion','root','');

                           $stml=$con->prepare("select * from commande ");
						
          $stml->execute();
							$cours=$stml->fetchAll();
						
						foreach($cours as $donnees) :	
		
					
                                                    echo '<tr>';
    
                                                    echo '<td>'.$donnees['name'].'</td>'; 
                                                    echo '<td>'.$donnees['qte'].'</td>';
                                                    echo '<td>'.$donnees['prix']*$donnees['qte'].'</td>';
                                                    echo '<td>'.$donnees['nom_complet'].'</td>';
                                                    echo '<td>'.$donnees['tele'].'</td>';
                                                    echo "<td >"; ?><a href="supprimer.php?id=<?php echo $donnees['id'];?>&amp;nameFile=<?php echo $donnees['name'];?> " onclick="printWithSpecialFileName()">imprimer</a> <?php echo"</td>";

                                                    echo '</tr>';
                                                
                            endforeach;
                            echo '</table>';
                                                    
?>                    
			</section>			
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./Acceuil.html">Acceuil</a></li>  
							<li><a href="./etudiant.html">Espace etudiant</a></li>
							<li><a href="./professeur.html">Espace professeur</a></li>
							<li><a href="./contact.php">Connectez-vous</a></li>							
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
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
                        
}
		</script>
                
    </body>
</html>




