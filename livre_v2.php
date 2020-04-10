 
<form  method="post" name="form1">
<input type="hidden" name="valnom" />
</form>
 
<script type="text/javascript">
var nom = prompt('Entrer le nom du client a rechercher', '');
if(nom!=null && nom!=''){
    document.form1.valnom.value = nom;
    document.form1.submit();
}
</script>
	<?php
$nom=$_POST['valnom'];
        ?>
		<div id="droite">
 
 
	<?php
        
        $sql = "SELECT * FROM client where nomClient='$nom'";
        $req = mysql_query($sql) or die('Erreur SQL !<br/>'.$sql.'<br/>'.mysql_error());
        if($data = mysql_fetch_assoc($req)){
        ?>
	<table>
		<tr><td>Nom</td><td><?php echo $data['nomClient']; ?></td></tr>
		<tr><td>prenom</td><td><?php echo $data['preClient']; ?></td></tr>
		<tr><td>adresse</td><td><?php echo $data['adrClient']; ?></td></tr>
		<tr><td>Code postal</td><td><?php echo $data['CpCLient']; ?></td><td>Ville</td><td><?php echo $data['villeClient']; ?></td></tr>
		<tr><td>Telephone</td><td><?php echo $data['telClient']; ?></td><td>Telephone</td><td><?php echo $data['telBisClient']; ?></td></tr>
		<tr><td>mail</td><td><?php echo $data['mailClient']; ?></td></tr>
		</table>
		<?php
                $idCli=$data['idClient'];
                }
                ?>
		<table>
		<tr><td>Liste des motos client</td></tr>
		<?php
                $sql = "SELECT * FROM moto where idClient=$idCli";
        $req = mysql_query($sql) or die('Erreur SQL !<br/>'.$sql.'<br/>'.mysql_error());
        while($moto = mysql_fetch_assoc($req)){
                ?>
		<tr><td>Marque</td><td><?php echo $moto['marque']; ?></td></tr>
		<tr><td>Modele</td><td><?php echo $moto['modele']; ?></td></tr>
		<tr><td>Plaque immatriculation</td><td><?php echo $moto['plaqImmat']; ?></td></tr>
		</table>
		<?php
                }
                ?>
	</div>