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
        $search = $_GET['search'];
        $sql = "SELECT * FROM produtos WHERE nome LIKE '%$search%' LIMIT 5";
        $resultado = mysqli_query($db,$sql);

        echo '
        <h3 style="display: block; width: 100%; background-color: #00930f; color: white; padding: 10px;"class="categoria" id="'.$search.'">Resultados de pesquisa para: '.$search.'</h3>';

        if($resultado){
            while($row = mysqli_fetch_array($resultado)){
                echo '
                    <div id="produtos">
                        <img height=200px width=200px style="display: block; margin-right: auto; margin-left: auto;" id="img-produtos" src="Images/' . $row['imagem'] . '">
                        <h3 id="nome-produtos">' . $row['nome'] . '</h3>
                        <h3 id="preco-produtos">R$' . $row['preco'] . '</h3>
                        <a id="comprar-home" href="produto.php?id='.$row['ProdutoID'].'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>&nbspCOMPRAR
                        </a>
                    </div>';
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