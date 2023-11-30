<!DOCTYPE html>
<html lang="pt-Br">
<?php
include_once 'Includes/head.php';
include_once 'Includes/db.php';
include_once 'Includes/headerprod.php';
?>

<body>
<h3 style="display: block; width: 90%; border-radius: 10px; padding-bottom: 5px; margin-left: auto; margin-right: auto; background-color: #00930f; color: white; padding: 10px; margin-top: 130px;" id="cart">
    <svg style="position: relative; top: 5px;"xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>CARRINHO
</h3>
<div style="display: block; width: 92%; height: fit-content; margin-left: auto; margin-right: auto;" id="bloco-carrinho">
    <div style="display: inline-block; padding-top: 5px; margin-top: 30px; padding-left: 5px; height: 300px; width: 45%; margin-right: 50px; margin-left: auto; background-color: white; border-radius: 25px; padding-bottom: 30px; margin-bottom: 30px;" id="box">
        <fieldset style="border: 1px solid transparent;">
            <legend>
                <svg style="display: inline-block; margin-right: 10px; position:relative; top:6px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="CurrentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg>SELECIONE O ENDEREÇO
            </legend>
            <div style="display: block; float: left; width: fit-content; height: fit-content; background-color: gray; color: black; padding: 10px; font-weight: bold; margin-top: 20px; border-radius: 25px; border-left: 3px solid #00930f;">
                <p>Rua tal tal</p>
                <p>Número tal tal</p>
                <p>CEP 94010010 - POA RS</p>
            </div>
            <a style="display: block; color: #00930f; text-decoration: none; float: right; position: relative; top: 40px; right: 30px;" href="#">Editar</a>
            <br>
            <a style="display: block; color: #00930f; text-decoration: none; float: right; position: relative; top: 60px; right: 30px;" href="#">Novo endereço</a>
            <br>
            <a style="display: block; color: #00930f; text-decoration: none; float: right; position: relative; top: 80px; right: 30px;" href="#">Selecionar outro</a>
        </fieldset>
    </div>
    <div style="display: inline-block; float:right; padding-top: 5px; margin-top: 30px; padding-left: 5px; height: 300px; width: 45%; margin-right: auto; margin-left: auto; background-color: white; border-radius: 25px; padding-bottom: 30px; margin-bottom: 30px;" id="box">
        <fieldset style="border: 1px solid transparent;">
            <legend>
            <svg style="display: inline-block; margin-right: 10px; position:relative; top:6px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>FRETE
            </legend>
            <div>
                <input style="display: inline-block; margin-top: 10px; margin-bottom: 15px;" type="radio" name="frete" value="fedex" checked><label>FedEX - R$49.99</label>
                <br>
                <input style="display: inline-block; margin-top: 10px; margin-bottom: 15px;" type="radio" name="frete" value="Magazine Luiza"><label>Magazine Luiza - R$49.99</label>
                <br>
                <input style="display: inline-block; margin-top: 10px; margin-bottom: 15px;" type="radio" name="frete" value="sedex"><label>SEDEX - R$49.99</label>
                <br>
                <input style="display: inline-block; margin-top: 10px; margin-bottom: 15px;" type="radio" name="frete" value="tnt"><label>TNT - R$49.99</label>
                <br>
                <input style="display: inline-block; margin-top: 10px; margin-bottom: 15px;" type="radio" name="frete" value="correios"><label>Correios - R$49.99</label>
            </div>
        </fieldset>
    </div>
    <div style="display: block; padding-top: 5px; margin-top: 30px; padding-left: 5px; height: fit-content; width: 100%; margin-right: auto; margin-left: auto; background-color: white; border-radius: 25px; padding-bottom: 30px; margin-bottom: 30px;" id="box">
        <fieldset style="border: 1px solid transparent;">
            <legend>
            <svg style="display: inline-block; margin-right: 10px; position:relative; top:6px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
            </svg>PRODUTO
            </legend>
            <div style="display: block; margin-top: 50px; border-radius: 25px; width:100%; margin-right: auto; margin-left: auto; margin-bottom: 30px; padding: 10px;"id="produtos-fav">
                <img height=200px width=200px style="display: inline-block; margin-right: auto; margin-left: auto;" id="img-produtos" src="Images/ps5.jpg">
                <h3 style="display: inline-block; position:relative; top: -160px; margin-left: 30px;" id="nome-produtos-fav">Console de videogame Sony Playstation 5</h3>
                <h3 style="display: inline-block; position: absolute; left:80%; margin-top: 70px;" id="preco-produtos-fav">R$4499.99</h3>
                <a id="comprar-fav" style="display: block; position: absolute; left: 79.3%; margin-top: -100px; height: fit-content; width: fit-content; text-decoration: none; padding: 10px; color: white; font-weight: bold; border-radius: 5px; background-color: #00930f; " href="produto.php?id=2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>&nbspCOMPRAR
                </a>
            </div>
        </fieldset>
    </div>
</div>
<script src="animation.js"></script>
</body>

<?php
include_once 'Includes/footer.php';
?>

</html>