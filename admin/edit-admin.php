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
<body>
    
    <form class="editform" method="post" action="" enctype="multipart/form-data">
        <h1>Editar Usuário</h1>
        <?php 
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM admins WHERE userID =" . $id;
        $command = mysqli_query($db, $sql);
        $return = mysqli_fetch_assoc($command);
        ?>
        <img style="display: block; margin-top: -30px; margin-left: 120px; width: 150px; height: 150px; border: 3px solid #00930f; border-radius: 50%;"src="Images/<?php echo $return['imagem']; ?>"> 
        <input type="file" name="anexo">
        <input style="float: left;" type='text' name='nome' value='<?php echo $return['nome']; ?>' required>
        <input style="float: right;" type='email' name='email' value='<?php echo $return['email']; ?>' required>
        <input style="float: left;" type='text' name='user' value='<?php echo $return['usuario']; ?>' required>
        <input style="float: right;" type='password' name='senha' placeholder='Altere/Confirme sua senha' required>
        <input style="float: left;" class="edit-btn" type='submit' name='editar' value='EDITAR'>
    </form>

    <?php

        if (isset($_POST['editar'])) {
            if (isset($_POST['anexo'])) {
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
                
                        $sql2 = "UPDATE admins SET nome = '$nome', usuario = '$user', email = '$email', senha = '$senha', imagem = '$filename' WHERE userID = $id";
                        if (mysqli_query($db, $sql2)) {
                            header('Location: painel.php');
                        } else {
                            echo "Error updating record: " . mysqli_error($db);
                        }
                    } else {
                        echo "Erro ao enviar o arquivo!";
                    }
                }
            } else {
                $nome2 = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $user2 = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email2 = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $senha2 = sha1($_POST['senha']);
                
                $sql3 = "UPDATE admins SET nome = '$nome2', usuario = '$user2', email = '$email2', senha = '$senha2' WHERE userID = $id";
                if (mysqli_query($db, $sql3)) {
                    header('Location: painel.php');
                } else {
                    echo "Error updating record: " . mysqli_error($db);
                }
            }
        } else{
            echo "<b style='color: white, margin: 30px'>Preencha todos os campos</b>";
        }
    ?>
</body>
</html>