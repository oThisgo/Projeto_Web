<?php

include_once '../Includes/db.php';

if (isset($_POST['acessar']) && !empty($_POST['user'] && !empty($_POST['pass']))) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM admins WHERE usuario = '$user' AND senha = '$pass'";
    $command = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($command);

    if (!empty($result['usuario'])) {
        session_start();
        $_SESSION['nome'] = $result['nome']; 
        $_SESSION['id'] = $result['userID'];
        $_SESSION['ativa'] = TRUE;
        header('Location: painel.php');
        
    } else {
        echo "Usuário ou senha incorretos!";
    }

} else {
    echo "Digite valores válidos e tente novamente!";
}



?>