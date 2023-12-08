<?php 
include_once '../Includes/db.php';
session_start();
if ($_SESSION['ativa'] = TRUE) {
    
$id = $_REQUEST['id'];
$sql = $sql = "DELETE FROM produtos WHERE ProdutoID =" . $id;
if (mysqli_query($db, $sql)) {
    header('Location: index.php');
}

} else {
    header('Location: index.php');
}
?>