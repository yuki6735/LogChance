<?php
try {
    $name = $_GET['name'];
    $dbname = "mysql:dbname=LogChance;host=mysql;charset=utf8";
    $usrname = "root";
    $psword = "saize";
    
    $db = new PDO($dbname, $usrname, $psword);
    $stt = $db->prepare("SELECT * FROM Stock WHERE name = '{$name}'");
    $stt->execute();
    $value = $stt->fetch();
    $stock = $value['stock'];
    if($stock > 1 && $stock < 10) {
        $stock = 1;
    }
    else if($stock == 1) {
        $stock = 0;
    }
    else if($stock == 0) {
        $stock = 100000000;
    }
    else {
        $log_s = log10($stock);
        $int_s = (int)$log_s;
        $stock = $int_s + 1;
    }
    
    $stt = $db->prepare("UPDATE Stock SET stock = '{$stock}' WHERE name = '{$name}'");
    $stt->execute();
    $stt = $db->prepare("SELECT * FROM Stock WHERE name = '{$name}'");
    $stt->execute();

    print(json_encode($stt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));

} catch(PDOException $ex) {
    die($ex->getMessage());
}