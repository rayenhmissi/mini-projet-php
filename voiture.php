<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajouter voitures</title>
</head>
<body>
    <form action="voiture.php" method="post">
        <fieldset>
            <legend>gestion des voitures</legend>
            <label>marque</label>
            <input type="text" name="marque"><br>
            <label>modèle</label>
            <input type="text" name="modele"><br>
            <label>année</label>
            <input type="number" name="an"><br>
            <label>immatriculation</label>
            <input type="text" name="im"><br>
            <input type="submit" value="ajouter" name="b">
        </fieldset>
    </form>
    <?php 
try{
    $p=new PDO("mysql:host=localhost;dbname=location_voiture",
    "root", "");
    $p->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $marque=$_POST['marque'];
        $modele=$_POST['modele'];
        $an=$_POST['an'];
        $im=$_POST['im'];
        $dis=1;
        if ($_POST['b']=="ajouter"){
            $s1="INSERT INTO voitures (marque,modele,annee,immatriculation,disponibilite) VALUES (:marque,:modele,:annee,:immatriculation,:disponibilite);";
            $r1=$p->prepare($s1);
            $r1->bindParam(":marque",$marque);
            $r1->bindParam(":modele",$modele);
            $r1->bindParam(":annee",$an);
            $r1->bindParam(":immatriculation",$im);
            $r1->bindParam(":disponibilite",$dis);
            if ($r1->execute()){
                echo "voiture est ajouté";
            }
            else{
                echo "erreur";
            }
        }
    }
}catch(PDOEXCEPTION $e){
    echo "erreur". $e->getMessage();
}
?>
</body>
</html>