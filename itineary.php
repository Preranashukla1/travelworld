<?php

        $dbh = new PDO("mysql:host=localhost;dbname=iwt","root","");
        $id = isset($_GET['id'])? $_GET['id'] : "";
        
        $stat = $dbh->prepare("select * from package where tour_id=?");
        $stat->bindParam(1, $id);
        $stat->execute();
        $row = $stat->fetch();
        header("Content-Type:".$row['type']);
        echo $row['pdf_doc'];
        
?>

<!<!doctype html>
<html>
    <iframe src="data:application/pdf;base64,base64encoded(<?php $row['pdf_doc']?>)"></iframe>
</html>