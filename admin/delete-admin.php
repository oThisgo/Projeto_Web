<?php 
include_once '../Includes/db.php';
session_start();
if ($_SESSION['ativa'] = TRUE) {
    
$id = $_REQUEST['id'];
$sql = $sql = "DELETE FROM admins WHERE userID =" . $id;
if (mysqli_query($db, $sql)) {
    session_unset();
    session_destroy();
    header('Location: index.php');
}

} else {
    header('Location: index.php');
}
?>