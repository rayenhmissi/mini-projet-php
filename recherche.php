<?php
try{
    $p=new PDO("mysql:host=localhost;dbname=location_voiture",
    "root", "");
    $p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD']='POST'){
        $s4="SELECT * FROM voitures WHERE (disponibilite=1)";
        $r4=$p->query($s4);
        $t4=$r4->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h3>voici les voitures disponibles:</h3>
        <table border="1">
        <tr>
            <td>id</td>
            <td>marque</td>
            <td>modèle</td>
            <td>année</td>
            <td>immatriculation</td>
            <td>disponibilité</td>
        </tr>    
        <?php
        foreach ($t4 as $v){
            echo "<tr><td>{$v['id']}</td><td>{$v['marque']}</td><td>{$v['modele']}</td><td>{$v['annee']}</td><td>{$v['immatriculation']}</td><td>{$v['disponibilite']}</td></tr>";
        }
        echo "</table>";?>
        <form action="reserver.php" method="post">
            <input type="submit" value="reserver une voiture">
        </form>
        <?php
    }
}catch(PDOEXCEPTION $ex){
    echo "erreur ".$ex->getMessage();
}
?>