<?php
try {
    $name = $_GET['name'];
    $dbname = "mysql:dbname=LogChance;host=mysql;charset=utf8";
    $usrname = "root";
    $psword = "saize";
    
    $db = new PDO($dbname, $usrname, $psword);
    $stt = $db->prepare("INSERT INTO Stock(name, stock, wine) VALUES ('{$name}', 10000000, 0)");
    $stt->execute();
    $stt = $db->prepare("SELECT * FROM Stock WHERE name = '{$name}'");
    $stt->execute();

    print(json_encode($stt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

} catch(PDOException $ex) {
    die($ex->getMessage());
}