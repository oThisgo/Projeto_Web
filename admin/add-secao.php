<?php 
include_once '../Includes/db.php';
session_start(); 

if ($_SESSION['ativa'] = TRUE) {
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='styles.css' rel='stylesheet'>
    <title>Painel administrativo - Ivonas Store</title>
</head>
<a id='back' href="painel.php">Voltar</a>
<form class="editform" method="post" action="" enctype="multipart/form-data">
<h1>Adicionar Seção</h1>
<input style="float: left;" type='text' name='secao' placeholder="Nome" required>
<input style="float: left; margin-left: 50px;" class="edit-btn" type='submit' name='add' value='ADICIONAR'>
</form>

<?php

if (isset($_POST['add']) && !empty($_POST['secao'])) {
    $nome = strtoupper(filter_input(INPUT_POST, 'secao', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $sql = "INSERT INTO secoes(secao) VALUE('$nome')";
            
    if (mysqli_query($db, $sql)) {
        header('Location: painel.php');
    } else {
        echo "Error inserting record: " . mysqli_error($db);
    }
} else {
    echo "<b style='color: red'>Preencha todos os campos</b>";
} 
} else {
    header('Location: index.php');
}