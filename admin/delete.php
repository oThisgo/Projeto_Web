<?php 
include_once '../Includes/db.php';
session_start();

$id = $_REQUEST['id'];
$sql = $sql = "DELETE FROM usuarios WHERE userID =" . $id;
if (mysqli_query($db, $sql)) {
    header('Location: painel.php');
}
?>