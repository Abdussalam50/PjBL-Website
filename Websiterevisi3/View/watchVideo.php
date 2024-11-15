<?php
if(isset($_GET["Link"])){
    $link = $_GET['Link'];
    echo $link;
}else{
    return "";
}