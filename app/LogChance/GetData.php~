<?php
try {
    $dbname = "mysql:dbname=LogChance;host=mysql;charset=utf8";
    $usrname = "root";
    $psword = "saize";
    
    $db = new PDO($dbname, $usrname, $psword);
    $stt = $db->prepare("SELECT * FROM Stock");
    $stt->execute();
    print(json_encode($stt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

} catch(PDOException $ex) {
    die($ex->getMessage());
}