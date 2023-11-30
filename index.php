<!DOCTYPE html>
<html lang="pt-Br">
<?php
    include_once 'Includes/head.php';
    include_once 'Includes/db.php';
    include_once 'Includes/headermain.php';
?>

<body>

    <div class="carousel">
        <div class="carousel-inner">
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item">
                <img width=2150 height=600 src="https://i.pinimg.com/originals/e0/14/8b/e0148b1086ba9877d95ba4cbfd4a796b.jpg">
            </div>
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                <img width=2150 height=600 src="https://www.e-retail.com/wp-content/uploads/2021/12/razer-banner.jpg">
            </div>
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item">
                <img width=2150 height=600 src="https://cdna.artstation.com/p/assets/images/images/053/685/658/large/john-lord-ralla-night-owl-razer-new-arrivals.jpg?1662778041">
            </div>
            <label for="carousel-3" class="carousel-control prev control-1">‹</label>
            <label for="carousel-2" class="carousel-control next control-1">›</label>
            <label for="carousel-1" class="carousel-control prev control-2">‹</label>
            <label for="carousel-3" class="carousel-control next control-2">›</label>
            <label for="carousel-2" class="carousel-control prev control-3">‹</label>
            <label for="carousel-1" class="carousel-control next control-3">›</label>
            <ol class="carousel-indicators">
                <li>
                    <label for="carousel-1" class="carousel-bullet">_</label>
                </li>
                <li>
                    <label for="carousel-2" class="carousel-bullet">_</label>
                </li>
                <li>
                    <label for="carousel-3" class="carousel-bullet">_</label>
                </li>
            </ol>
        </div>
    </div>

    <div id="blocos-produtos">
        
        <?php
            $sql = "SELECT * FROM secoes";
            $resultado = mysqli_query($db,$sql);

            if($resultado){

                while ($row = mysqli_fetch_array($resultado)) {
                    $secao = $row['secao'];
                    echo '
                    <h3 class="secao" id="'.$secao.'">'.$secao.'</h3>';

                    $sql1 = "SELECT * FROM produtos WHERE secao = '$secao'";
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

        <h3 class="secao" id="todos">TODOS</h3>

        <?php

            $sql2 = "SELECT * FROM produtos";
            $resultado2 = mysqli_query($db,$sql2);

            if($resultado2){

                while ($row2 = mysqli_fetch_array($resultado2)){
                    echo '
                    <div id="produtos">
                        <img height=200px width=200px style="display: block; margin-right: auto; margin-left: auto;" id="img-produtos" src="Images/' . $row2['imagem'] . '">
                        <h3 id="nome-produtos">' . $row2['nome'] . '</h3>
                        <h3 id="preco-produtos">R$' . $row2['preco'] . '</h3>
                        <a id="comprar-home" href="produto.php?id='.$row2['ProdutoID'].'">
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