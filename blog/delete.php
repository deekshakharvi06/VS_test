<?php
include "db.php";
if(!isset($_SESSION["id"])){
    header("Location:login.php");
}
if(isset($_GET["blog_id"])){
    $id=$_GET["blog_id"];
    $user_id=$_SESSION["id"];
    $sql=$conn->prepare("delete from blogs where blog_id=? and user_id=?");
    $sql->bind_param("ii",$id,$user_id);
    if($sql->execute()){
        header("Location:dashboard.php");
    }
}

?>