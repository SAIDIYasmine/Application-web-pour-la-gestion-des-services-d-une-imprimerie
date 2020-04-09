<?php

$bdd=new PDO('mysql:host=localhost;dbname=gestion_impresion','root','');
$id=$_GET['id'];
//$handle=  fopen("PRN", "w");//"uploadFiles/Prof_Files/".$_GET['nameFile']
//fwrite($handle, "bounjours tous monde");
//fclose($handle);

$req="delete  from cours where id_d=$id";
$bdd->exec($req);
?>
<script type="text/javascript">
    window.location="suivi_cours.php";

</script>
