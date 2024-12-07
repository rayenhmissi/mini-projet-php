<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajouter voitures</title>
</head>
<body>
    <form action="s_voiture.php" method="post">
        <fieldset>
            <legend>supprimer une voiture</legend>
            <label>id</label>
            <input type="number" name="id"><br>
            <input type="submit" value="supprimer" name="b">
        </fieldset>
    </form>
    <?php 
try{
    $p1=new PDO("mysql:host=localhost;dbname=location_voiture",
    "root", "");
    $p1->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $id=$_POST['id'];
        if ($_POST['b']=="supprimer"){
            $s1="DELETE FROM voitures WHERE (id=:id);";
            $r1=$p1->prepare($s1);
            $r1->bindParam(":id",$id);
            if ($r1->execute()){
                echo "la voiture est supprimé";
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