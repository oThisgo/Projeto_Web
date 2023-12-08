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
<body>
    <a id='back' href="painel.php">Voltar</a>
    <form class="editform" method="post" action="" enctype="multipart/form-data">
        <h1>Editar Produto</h1>
        <?php 
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM produtos WHERE ProdutoID =" . $id;
        $command = mysqli_query($db, $sql);
        $return = mysqli_fetch_assoc($command);
        ?>
        <img style="width: 80px; height: 80px; border: 3px solid #00930f; border-radius: 50%;"src="../Images/<?php echo $return['imagem']; ?>"> 
        <input type="file" name="anexo" value='<?php echo $return['imagem']; ?>'>
        <img style="width: 80px; height: 80px; border: 3px solid #00930f; border-radius: 50%;"src="../Images/<?php echo $return['imagem2']; ?>"> 
        <input type="file" name="anexo2" value='<?php echo $return['imagem2']; ?>'>
        <img style="width: 80px; height: 80px; border: 3px solid #00930f; border-radius: 50%;"src="../Images/<?php echo $return['imagem3']; ?>"> 
        <input type="file" name="anexo3" value='<?php echo $return['imagem3']; ?>'>
        <input style="display: block; float: left;" type='text' name='nome' value='<?php echo $return['nome']; ?>' required>
        <textarea style="display: block; height: 200px; width: 500px; max-width: 500px; float: left;" name='descricao' required><?php echo $return['descricao']; ?></textarea>
        <select style="margin-bottom: 15px;" name='secao' required>
            <?php
            
            $secoes = "SELECT secao FROM secoes";
            $result = mysqli_query($db, $secoes);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value=".$row['SecaoID'].">".$row['secao']."</option>";
            }

            ?> 
        </select><br>
        <select name='departamento' required>
            <?php
            
            $departamentos = "SELECT departamento FROM departamentos";
            $result2 = mysqli_query($db, $departamentos);
            while ($row2 = mysqli_fetch_array($result2)) {
                echo "<option value=".$row2['DepartamentoID'].">".$row2['departamento']."</option>";
            }

            ?> 
        </select>
        <input style="display: block; margin-top: 40px; float: left;" type='number' name='preco' value='<?php echo $return['preco']; ?>' required>
        <input style="margin-top: 40px; margin-left: 50px;" class="edit-btn" type='submit' name='editar' value='EDITAR'>
    </form>

    <?php
        if (isset($_POST['editar'])) {
            if (!empty($_FILES['anexo']['name'])) {
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
                        $senha = sha1(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                
                        $sql2 = "UPDATE usuarios SET nome = '$nome', usuario = '$user', email = '$email', senha = '$senha', imagem = '$filename' WHERE userID = $id";
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
                $senha2 = sha1(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                
                $sql3 = "UPDATE usuarios SET nome = '$nome2', usuario = '$user2', email = '$email2', senha = '$senha2' WHERE userID = $id";
                if (mysqli_query($db, $sql3)) {
                    header('Location: painel.php');
                } else {
                    echo "Error updating record: " . mysqli_error($db);
                }
            }
        } else{
            echo "<b style='color: red;'>Preencha todos os campos</b>";
        }
    ?>
</body>
</html>
<?php
} else {
    header('Location: index.php');
}
?>