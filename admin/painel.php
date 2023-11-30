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

<header>
    <h3>Olá, <?php echo $_SESSION['nome']; ?></h3>
    <a href="processa-logoff.php">Logoff</a>
</header>

<body>

    <?php

    $sql = 'SELECT * FROM admins WHERE userID = '.$_SESSION['id'];
    $command = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($command);
    
    ?>
    <table>
        <h1 id="perfil">Seu perfil</h1>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Usuário</th>
            <th>Senha</th>
        </tr>
        <tr>
            <td><img id="profile" src="Images/<?php echo $result['imagem'] ?>"></td>
            <td><?php echo $result['nome'] ?></td>
            <td><?php echo $result['email'] ?></td>
            <td><?php echo $result['usuario'] ?></td>
            <td><?php echo $result['senha'] ?></td>
            <td><a class="edit" href="edit.php">Editar</a></td>
            <td><a class="delete" href="#">Excluir</a></td>
        </tr>
    </table>

    
</body>
</html>