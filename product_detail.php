<?php
session_start();

$_SESSION['id_d']=$_GET['id'];
?>
<?php
$dsn='mysql:hosy=localhost;dbname=gestion_impresion';
$username='root';
$password='';
$con=new PDO($dsn,$username,$password);
$idd=$_SESSION['id_d'] ?: null;

$stml=$con->prepare('SELECT * FROM cours where id_d='.$idd." ");
$stml->execute();
$resultat = $stml->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>product_detail</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
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
		<div id="wrapper" class="container">
			
			<section class="header_text sub">

			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<a href="themes/images/ladies/1.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="themes/images/ladies/<?php echo $resultat['image'].'.jpg';?>"></a>				
							</div>
							<div class="span5">
								<address>
									<strong>Nom:</strong> <span><?php echo $resultat['name']; ?></span><br>
									<strong>Nombre de pages:</strong> <span><?php echo $resultat['nbr_page']; ?></span><br>
								</address>									
								<h4><strong>Prix: <?php echo number_format($resultat['prix'],2,',',' ');; ?></strong></h4>
							</div>
							<div class="span5">
								<form method="POST" class="form-inline" action="cart.php">
									<p>&nbsp;</p>
									<label>Qty:</label>

									<input type="number" min=1 class="span1" placeholder="1" name="quantite">
									<a href="cart.php?action=ajout&amp;
									id=<?php echo $resultat['id_d']; ?>&amp;
									l=<?php echo $resultat['name'];?>&amp;
									q=1;?>&amp;
									p=<?php echo $resultat['prix'];?>
									" onclick="window.open(this.href, '', 
'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=1700, height=900'); return false;"><button class="btn btn-inverse" type="submit" name="cart">Ajouter au panier</button></a>
<input type="button" value="Catalogue" class="btn btn-inverse" 
id="btnHome" onClick="document.location.href='Livre.php'" />
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
									<li class=""><a href="#profile">Informations supplementaires</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home">Description du livre</div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>universite</th>
													<td><?php echo $resultat['universite']; ?></td>
												</tr>		
												<tr class="alt">
													<th>ecole</th>
													<td><?php echo $resultat['ecole']; ?></td>
												</tr>
												<tr class="alt">
													<th>niveau</th>
													<td><?php echo $resultat['niveau']; ?></td>
												</tr>
												<tr class="alt">
													<th>filliere</th>
													<td><?php echo $resultat['filiere']; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>						
							<div class="span9">	
								<br>

								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											
										</div>
										<div class="item">
											<ul class="thumbnails listing-products">
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/1.jpg"></a><br/>
														<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
														<a href="#" class="category">Phasellus consequat</a>
														<p class="price">$341</p>
													</div>
												</li>       
												<li class="span3">
													<div class="product-box">					<a href="product_detail.html"><img alt="" src="themes/images/ladies/2.jpg"></a><br/>
														<a href="product_detail.html">Praesent tempor sem</a><br/>
														<a href="#" class="category">Erat gravida</a>
														<p class="price">$28</p>
													</div>
												</li>
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="themes/images/ladies/3.jpg"></a><br/>
														<a href="product_detail.html" class="title">Wuam ultrices rutrum</a><br/>
														<a href="#" class="category">Suspendisse aliquet</a>
														<p class="price">$341</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
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
							<li><a href="./contact.html">Contactez-nous</a></li>							
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
						<p> Impression en ligne au meilleur prix du marché - Livraison gratuite.</p>
						<br/>
					</div>					
				</div>	
</section>
     </div>

</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>