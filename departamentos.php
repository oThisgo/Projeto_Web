<!DOCTYPE html>
<html lang="pt-Br">

<?php

include_once 'Includes/head.php';
include_once 'Includes/db.php';
include_once 'Includes/headerprod.php';
?>

<body>
    
<div style="margin-top: 150px;" id="blocos-produtos">
        
    <?php
        $cat = $_REQUEST['cat'];
        $sql = "SELECT * FROM departamentos WHERE DepartamentoID =" . $cat;
        $resultado = mysqli_query($db,$sql);
        if ($resultado) {
            while ($row = mysqli_fetch_array($resultado)) {
                $departamento = $row['departamento'];
                echo '
                <h3 style="display: block; width: 100%; background-color: #00930f; color: white; padding: 10px;"class="categoria" id="'.$departamento.'">'.$departamento.'</h3>';

                $sql1 = "SELECT * FROM produtos WHERE departamento = '$departamento'";
                $resultado1 = mysqli_query($db,$sql1);

                if($resultado1){
                    while($row1 = mysqli_fetch_array($resultado1)){
                        echo '
                        <div id="produtos">
                            <img height=200px width=200px style="display: block; margin-right: auto; margin-left: auto;" id="img-produtos" src="Images/' . $row1['imagem'] . '">
                            <h3 id="nome-produtos">' . $row1['nome'] . '</h3>
                            <h3 id="preco-produtos">R$' . $row1['preco'] . '</h3>
                            <a id="comprar-home" href="produto.php?id='.$row1['ProdutoID'].'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>&nbspCOMPRAR
                            </a>
                        </div>';
                    }
                }
            }       
        } 
    ?>

</div>
<script src="animation.js"></script>
</body>

<?php
include_once 'Includes/footer.php';
?>

</html>