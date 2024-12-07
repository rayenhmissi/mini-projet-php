<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>inscription</title>
</head>
<body>
    <form action="i_client.php" method="post">
        <fieldset>
            <legend>inscription</legend>
            <label>nom</label>
            <input type="text" name="nom"><br>
            <label>adresse</label>
            <input type="text" name="adresse"><br>
            <label>numéro de téléphone</label>
            <input type="number" name="ntel"><br>
            <label>email</label>
            <input type="email" name="email"><br>
            <label>mot de passe</label>
            <input type="password" name="mdp"><br>
            <input type="submit" value="inscrire" name="b">
        </fieldset>
    </form>
    <?php 
try{
    $p=new PDO("mysql:host=localhost;dbname=location_voiture",
    "root", "");
    $p->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $nom=$_POST['nom'];
        $adresse=$_POST['adresse'];
        $ntel=$_POST['ntel'];
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        if ($_POST['b']=="inscrire"){
            $s2="INSERT INTO clients (nom,adresse,num_tel,email,mdp) VALUES (:nom,:adresse,:num_tel,:email,:mdp);";
            $r2=$p->prepare($s2);
            $r2->bindParam(":nom",$nom);
            $r2->bindParam(":adresse",$adresse);
            $r2->bindParam(":num_tel",$ntel);
            $r2->bindParam(":email",$email);
            $r2->bindParam(":mdp",$mdp);
            if ($r2->execute()){
                echo "vous ètes est inscris";
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