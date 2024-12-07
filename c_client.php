<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>connexion</title>
</head>
<body>
    <form action="c_client.php" method="post">
        <fieldset>
            <legend>connexion</legend>
            <label>email</label>
            <input type="email" name="email"><br>
            <label>mot de passe</label>
            <input type="password" name="mdp"><br>
            <input type="submit" value="connexion" name="b">
        </fieldset>
    </form>
    <?php 
try{
    $p=new PDO("mysql:host=localhost;dbname=location_voiture",
    "root", "");
    $p->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_POST['email'];
        $mdp=$_POST['mdp'];
        if ($_POST['b']=="connexion"){
            $s3="SELECT * FROM clients WHERE (email=:email AND mdp=:mdp);";
            $r3=$p->prepare($s3);
            $r3->bindParam(":email",$email);
            $r3->bindParam(":mdp",$mdp);
            if ($r3->execute()){
                $t3=$r3->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>vous ètes connecté</h3>
                <table border="1">
                    <tr>
                        <td><?php echo $t3['id'];?></td>
                        <td><?php echo $t3['nom'];?></td>
                        <td><?php echo $t3['adresse'];?></td>
                        <td><?php echo $t3['num_tel'];?></td>
                        <td><?php echo $t3['email'];?></td>
                        <td><?php echo $t3['mdp'];?></td>
                    </tr>
                </table>
                <form action="recherche.php" method="post">
                    <input type="submit" value="rechercher une une voiture">
                </form>
                <?php
            }
        }
    }
}catch(PDOEXCEPTION $e){
    echo "erreur". $e->getMessage();
}
?>
</body>
</html>