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
        $sql = "SELECT * FROM produtos";
        $resultado = mysqli_query($db,$sql);

        echo '
        <h3 style="display: block; width: 100%; background-color: #00930f; color: white; padding: 10px;"class="categoria" id="fav">
            <svg style="display: inline-block; position: relative; top: 5px; margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg>FAVORITOS
        </h3>';

        if($resultado){
            while($row = mysqli_fetch_array($resultado)){
                echo '
                    <div style="display: block; border-radius: 25px; width:100%; margin-right: auto; margin-left: auto; background-color: white; margin-bottom: 30px; padding: 10px;"id="produtos-fav">
                        <svg style="display: inline-block; margin-bottom: 160px; margin-left: 15px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#00930f" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                        <img height=200px width=200px style="display: inline-block; margin-right: auto; margin-left: auto;" id="img-produtos" src="Images/' . $row['imagem'] . '">
                        <h3 style="display: inline-block; position:relative; top: -160px; margin-left: 30px; id="nome-produtos-fav">' . $row['nome'] . '</h3>
                        <h3 style="display: inline-block; position: absolute; left:80%; margin-top: 70px;" id="preco-produtos-fav">R$' . $row['preco'] . '</h3>
                        <a id="comprar-fav" style="display: block; position: absolute; left: 79.3%; margin-top: -100px; height: fit-content; width: fit-content; text-decoration: none; padding: 10px; color: white; font-weight: bold; border-radius: 5px; background-color: #00930f; " href="produto.php?id='.$row['ProdutoID'].'">
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