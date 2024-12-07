<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>modifier voitures</title>
</head>
<body>
    <form action="m_voiture.php" method="post">
        <fieldset>
            <legend>modifier une voiture</legend>
            <label>id</label>
            <input type="number" name="id"><br>
            <label>marque</label>
            <input type="text" name="marque"><br>
            <label>modèle</label>
            <input type="text" name="modele"><br>
            <label>année</label>
            <input type="number" name="an"><br>
            <label>immatriculation</label>
            <input type="text" name="im"><br>
            <label>disponibilité</label>
            <input type="number" name="dis"><br>
            <input type="submit" value="modifier" name="b">
        </fieldset>
    </form>
    <?php 
try{
    $p=new PDO("mysql:host=localhost;dbname=location_voiture",
    "root", "");
    $p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $id=$_POST['id'];
        $marque=$_POST['marque'];
        $modele=$_POST['modele'];
        $an=$_POST['an'];
        $im=$_POST['im'];
        $dis=$_POST['dis'];
        if ($_POST['b']=="modifier"){
            $s="SELECT * FROM voitures FROM  WHERE (id=:id);";
                $s1="UPDATE voitures SET id=:id,marque=:marque,modele=:modele,annee=:annee,immatriculation=immatriculation,disponibilite=:disponibilite WHERE (id=:id);";
                $r1=$p->prepare($s1);
                $r1->bindParam(":id",$id);
                $r1->bindParam(":marque",$marque);
                $r1->bindParam(":modele",$modele);
                $r1->bindParam(":annee",$an);
                $r1->bindParam(":immatriculation",$im);
                $r1->bindParam(":disponibilite",$dis);
                if ($r1->execute()){
                    echo "voiture est modifié";
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