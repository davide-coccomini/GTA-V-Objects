<?php
include("config.php");
if(!isset($_POST["password"]) || !isset($_POST["tags"]) || !isset($_POST["id"])){
    header("location: /web/index.php?page=details&oid=".$_POST["id"]);
    die();
}

if($_POST["password"] != "test"){ // ONLY FOR INTERNAL USE
    header("location: /web/index.php?page=details&oid=".$_POST["id"]);
    die();
}

$tags = explode(",",str_replace(" ","", $_POST["tags"]));

$db = openConnection();
$sql = "INSERT INTO tags(name, object) VALUES(?,?)";

foreach ($tags as $tag){
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $tag, PDO::PARAM_STR);
    $stmt->bindValue(2, $_POST["id"], PDO::PARAM_INT);
    $stmt->execute();
}
$db = null;
header("location: /web/index.php?page=details&oid=".$_POST["id"]);
die();
?>