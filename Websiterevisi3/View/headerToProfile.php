<?php

if(isset($_POST['profile'])){
header('Location:ProfilAnda.php?role='.(isset($_SESSION['Role'])? $_SESSION['Role']: $_SESSION['role']));
}