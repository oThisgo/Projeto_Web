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
        <img style="width: 100px; height: 100px; border: 3px solid #00930f; border-radius: 50%;"src="../Images/<?php echo $return['imagem']; ?>"> 
        <img style="width: 100px; height: 100px; border: 3px solid #00930f; border-radius: 50%;"src="../Images/<?php echo $return['imagem2']; ?>"> 
        <img style="width: 100px; height: 100px; border: 3px solid #00930f; border-radius: 50%;"src="../Images/<?php echo $return['imagem3']; ?>"> 
        <input type="file" name="anexo[]" multiple>
        <input style="display: block; float: left;" type='text' name='nome' value='<?php echo $return['nome']; ?>' required>
        <textarea style="display: block; height: 200px; width: 500px; max-width: 500px; float: left;" name='descricao' required><?php echo $return['descricao']; ?></textarea>
        <select style="margin-bottom: 15px;" name='secao' required>
            <?php
            
            $secoes = "SELECT secao FROM secoes";
            $result = mysqli_query($db, $secoes);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value=".$row['secao'].">".$row['secao']."</option>";
            }

            ?> 
        </select><br>
        <select name='departamento' required>
            <?php
            
            $departamentos = "SELECT departamento FROM departamentos";
            $result2 = mysqli_query($db, $departamentos);
            while ($row2 = mysqli_fetch_array($result2)) {
                echo "<option value=".$row2['departamento'].">".$row2['departamento']."</option>";
            }

            ?> 
        </select>
        <input style="display: block; margin-top: 40px; float: left;" type='number' name='preco' value='<?php echo $return['preco']; ?>' required>
        <input style="margin-top: 40px; margin-left: 50px;" class="edit-btn" type='submit' name='editar' value='EDITAR'>
    </form>

    <?php
        if (isset($_POST['editar']) && !empty($_POST['secao']) && !empty($_POST['departamento']) && !empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['preco']) && is_numeric($_POST['preco'])) {
            if (!empty($_FILES['anexo']['name'])) {
                $imagens = [];
                $total = count($_FILES['anexo']['name']);
                for ($i = 0; $i < $total; $i++) {
                    $imgname = $_FILES['anexo']['name'][$i];
                    $fileextension = pathinfo($imgname);
                    $extensions = ['png', 'jpeg', 'jpg'];
                    $filetype = $_FILES['anexo']['type'][$i];
                    $types = ['image/png', 'image/jpeg', 'image/jpg'];
                    $filesize = $_FILES['anexo']['size'][$i];
                    $maxsize = 1024 * 1024 * 5;
                    $erros = [];

                    if ($filesize > $maxsize) {
                        $erros[] = "Arquivo $i muito grande";
                    }

                    if (!in_array($fileextension['extension'], $extensions)) {
                        $erros[] = "Formato do arquivo $i não permitido";
                    } 

                    if (!in_array($filetype, $types)) {
                        $erros[] = "Tipo do arquivo $i não permitido";
                    }

                    if (!empty($erros)){
                        foreach ($erros as $erro) {
                            echo $erro . "<br>";
                        } 
                    } else {
                        $tempname = $_FILES['anexo']['tmp_name'][$i];
                        $folder = "../Images/";
                        $data = date('d-m-Y_h-i-s');
                        $filename = $data."_".$imgname;
    
                        if(move_uploaded_file($tempname, $folder.$filename)){
                            $imagens[] = $filename;
                    
                        } else {
                            echo "Erro ao enviar o arquivo!";
                        }
                    }
                }

                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $secao = $_POST['secao'];
                $departamento = $_POST['departamento'];
                $descricao = htmlspecialchars(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $preco = $_POST['preco'];
                $img1 = $imagens[0];
                $img2 = $imagens[1];
                $img3 = $imagens[2];
                $sql2 = "UPDATE produtos SET nome = '$nome', preco = '$preco', imagem = '$img1', imagem2 = '$img2', imagem3 = '$img3', descricao = '$descricao', secao = '$secao', departamento = '$departamento' WHERE ProdutoID = $id";
       
                if (mysqli_query($db, $sql2)) {
                    header('Location: painel.php');
                } else {
                    echo "Erro no Update: " . mysqli_error($db);
                }

            } else {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $secao = $_POST['secao'];
                $departamento = $_POST['departamento'];
                $descricao = htmlspecialchars(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $preco = $_POST['preco'];
                $sql3 = "UPDATE produtos SET nome = '$nome', preco = '$preco', descricao = '$descricao', secao = '$secao', departamento = '$departamento' WHERE ProdutoID = $id";
       
                if (mysqli_query($db, $sql3)) {
                    header('Location: painel.php');
                } else {
                    echo "Erro no Update: " . mysqli_error($db);
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