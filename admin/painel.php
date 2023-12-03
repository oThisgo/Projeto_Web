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
        <caption style="font-weight: bold; color: #00930f;">Admins</caption>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Usuário</th>
        </tr>
        <tr>
            <td><img id="profile" src="Images/<?php echo $result['imagem'] ?>"></td>
            <td><b><?php echo $result['nome'] ?></b></td>
            <td><b><?php echo $result['email'] ?></b></td>
            <td><b><?php echo $result['usuario'] ?></b></td>
            <td><b><a class="edit" href="edit-admin.php?id='<?php echo $_SESSION['id']; ?>'">Editar</a></b></td>
            <td><b><a class="delete" href="delete-admin.php?id='<?php echo $_SESSION['id']; ?>'">Excluir</a></b></td>
        </tr>
        <?php
            $sql2 = 'SELECT * FROM admins WHERE userID <> '.$_SESSION['id'];
            $command2 = mysqli_query($db, $sql2); 
            if ($command2) {
                while ($row = mysqli_fetch_array($command2)) {?>
                <tr>
                    <td><img id="profile" src="Images/<?php echo $row['imagem'] ?>"></td>
                    <td><?php echo $row['nome'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['usuario'] ?></td>
                </tr><?php
                }
            }
        ?>     
    </table>

    <a class="add" href="add.php">Adicionar usuário +</a>

    <table>
        <caption style="font-weight: bold; color: #00930f;">Usuários</caption>
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Usuário</th>
        </tr>

        <?php
            $sql3 = 'SELECT * FROM usuarios';
            $command3 = mysqli_query($db, $sql3); 
            if ($command3) {
                while ($row2 = mysqli_fetch_array($command3)) {?>
                <tr>
                    <td><img id="profile" src="Images/<?php echo $row2['imagem'] ?>"></td>
                    <td><?php echo $row2['nome'] ?></td>
                    <td><?php echo $row2['email'] ?></td>
                    <td><?php echo $row2['usuario'] ?></td>
                    <td><a class="edit" href="edit.php?id='<?php echo $row2['userID']; ?>'">Editar</a></td>
                    <td><a class="delete" href="delete.php?id='<?php echo $row2['userID']; ?>'">Excluir</a></td>
                </tr><?php
                }
            }
        ?>                
    </table>
</body>
</html>