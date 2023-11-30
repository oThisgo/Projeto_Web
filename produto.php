<!DOCTYPE html>
<html lang="pt-Br">
<?php
include_once 'Includes/head.php';
include_once 'Includes/db.php';

$id = $_REQUEST['id'];
$sql = "SELECT * FROM produtos WHERE ProdutoID =" . $id;
$resultado = mysqli_query($db,$sql);

include_once 'Includes/headerprod.php';
?>

<body>
<div style="display: block; margin-top: 100px; padding-left: 50px; height: fit-content; width: 95%; margin-right: auto; margin-left: auto; background-color: white; border-radius: 25px; padding-bottom: 30px; margin-bottom: 30px;" id="box">
  <?php 
    while ($row = mysqli_fetch_array($resultado)) {
      echo '
      <h3 style="display: block; position: relative; margin-left: 650px; top: 50px; height: fit-content; width: fit-content; text-align: center; font-size: 28px;" id="product-title">'.$row['nome'].'</h3>
      <div style="display: inline-block; margin-left: 10px;" class="card">
          <div class = "product-imgs">
            <div class = "img-display">
              <div class = "img-showcase">
                <img src = "Images/'.$row['imagem'].'">
                <img src = "Images/'.$row['imagem2'].'">
                <img src = "Images/'.$row['imagem3'].'">
              </div>
            </div>
            <div class = "img-select">
              <div class = "img-item">
                <a href = "#" data-id = "1">
                  <img style="border: 1px solid grey; border-radius: 10px;" height= 80px width= 80px src = "Images/'.$row['imagem'].'">
                </a>
              </div>
              <div class = "img-item">
                <a href = "#" data-id = "2">
                  <img style="border: 1px solid grey; border-radius: 10px;" height= 80px width= 80px src = "Images/'.$row['imagem2'].'">
                </a>
              </div>
              <div class = "img-item">
                <a href = "#" data-id = "3">
                  <img style="border: 1px solid grey; border-radius: 10px;" height= 80px width= 80px src = "Images/'.$row['imagem3'].'">
                </a>
              </div>
            </div>
          </div>
      </div>
      <h1 style="display: inline-block; color: #00930f; margin-left: 8%; position: relative; top: -300px;">R$ '.$row['preco'].'</h1>
      <a style="display: block; width: fit-content; position: relative; left: 36%; top: -320px;" id="comprar-produto" href="carrinho.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-cart-fill" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        &nbspCOMPRAR
      </a>
      <a href="favoritos.php">
        <svg style="display: inline-block; background-color:#00930f; padding: 6.5px; padding-left: 10px; padding-right: 10px; border-radius: 5px; position:relative; top: -363px; left: 48.5%; cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-heart-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg>
      </a>
      <h3 style="display: block; margin-top: 50px; width: fit-content; padding-bottom: 15px; border-bottom: 2px solid grey;" id="descricao">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00930f" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
        <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
      </svg>
      DESCRIÇÃO DO PRODUTO
      </h3>
      <p style="display: block; text-align: justify; margin-right: 300px;">
        '.$row['descricao'].'
      </p>';
    }
  ?>
</div>
<script src="animation.js"></script>
</body>

<?php
include_once 'Includes/footer.php';
?>

</html>