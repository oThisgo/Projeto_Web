<?php 
include_once '../Includes/db.php';
session_start();

if ($_SESSION['ativa'] = TRUE){

$id = $_REQUEST['id'];
$sql = $sql = "DELETE FROM usuarios WHERE userID =" . $id;
if (mysqli_query($db, $sql)) {
    header('Location: painel.php');
}

}else {
    header('Location: index.php');
}
?>