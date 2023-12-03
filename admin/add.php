<?php 
include_once '../Includes/db.php';
session_start() 
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='styles.css' rel='stylesheet'>
    <title>Painel administrativo - Ivonas Store</title>
</head>

<form class="editform" method="post" action="" enctype="multipart/form-data">
<h1>Adicionar Usuário</h1>

<img style="display: block; margin-top: -30px; margin-left: 120px; width: 150px; height: 150px; border: 3px solid #00930f; border-radius: 50%;"> 
<input type="file" id="anexo" name="anexo" required>
<input style="float: left;" type='text' name='nome' placeholder="Nome Completo" required>
<input style="float: right;" type='email' name='email' placeholder="E-mail" required>
<input style="float: left;" type='text' name='user' placeholder="Usuário" required>
<input style="float: right;" type='password' name='senha' placeholder="Senha" required>
<input style="float: left;" class="edit-btn" type='submit' name='add' value='ADICIONAR'>
</form>

<?php

if (isset($_POST['add']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    $imgname = $_FILES['anexo']['name'];
    $fileextension = pathinfo($imgname);
    $extensions = ['png', 'jpeg', 'jpg'];
    $filetype = $_FILES['anexo']['type'];
    $types = ['image/png', 'image/jpeg', 'image/jpg'];
    $filesize = $_FILES['anexo']['size'];
    $maxsize = 1024 * 1024 * 5;
    $erros = [];

    if ($filesize > $maxsize) {
        $erros[] = 'Arquivo muito grande';
    }

    if (!in_array($fileextension['extension'], $extensions)) {
        $erros[] = 'Formato não permitido';
    } 

    if (!in_array($filetype, $types)) {
        $erros[] = 'Tipo não permitido';
    }

    if (!empty($erros)){
        foreach ($erros as $erro) {
            echo $erro . "<br>";
        } 
    } else {
        $tempname = $_FILES['anexo']['tmp_name'];
        $folder = "Images/";
        $data = date('d-m-Y_h-i-s');
        $filename = $data."_".$imgname;

        if(move_uploaded_file($tempname, $folder.$filename)){
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = sha1($_POST['senha']);
                
            $sql = "INSERT INTO usuarios(nome, email, imagem, usuario, senha, data) VALUES('$nome', '$email', '$filename', '$user', '$senha', NOW())";
            if (mysqli_query($db, $sql)) {
                header('Location: painel.php');
            } else {
                echo "Error inserting record: " . mysqli_error($db);
            }
        } else {
            echo "Erro ao enviar o arquivo!";
        }
    }
} else {
    echo 'Preencha todos os campos';
}
