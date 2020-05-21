<?php
try{

    $db=new PDO("mysql:host=localhost;dbname=library",'root','');
    $db->exec("set names utf8");


}
catch (PDOException $e){
    echo $e->getMessage();
}

?>
