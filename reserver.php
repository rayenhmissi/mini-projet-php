<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reserver une voiture</title>
</head>
<body>
    <form action="reserver.php" method="post">
        <fieldset>
            <legend>reserver une voiture</legend>
            <label>date de début de reservation</label>
            <input type="date" name="dd"><br>
            <label>date de fin de reservation</label>
            <input type="date" name="df"><br>
            <label>id voiture</label>
            <input type="number" name="idv"><br>
            <label>id client</label>
            <input type="number" name="idc"><br>
            <input type="submit" value="reserver">
        </fieldset>
    </form>
    <?php
    try{
        $p=new PDO("mysql:host=localhost;dbname=location_voiture",
        "root", "");
        $p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $s5="INSERT INTO reservation (date_debut,date_fin,id_voiture,id_client) VALUES (:date_debut,:date_fin,:id_voiture,:id_client);";
            $r5=$p->prepare($s5);
            $r5->bindParam(":date_debut",$_POST['dd']);
            $r5->bindParam(":date_fin",$_POST['df']);
            $r5->bindParam(":id_voiture",$_POST['idv']);
            $r5->bindParam(":id_client",$_POST['idc']);
            if ($r5->execute()){
                echo "la voiture numéro ".$_POST['idv']." est reservé par le client numéro ".$_POST['idc'];
            }
            else{
                echo "erreur de reservation";
            }
        }
    }catch(PDOEXCEPTION $e){
        echo "erreur". $e->getMessage();
    }  
    ?>
</body>
</html>