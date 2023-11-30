<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivonas Store</title>
    <link href="styles.css" rel="stylesheet">
</head>

<header>
    <svg style="cursor: pointer; display: inline-block; position: absolute; left:3%; top: 20%;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#00930f" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </svg>

    <a href="index.php">
      <img style="display: inline-block; margin-top: 20px; margin-left: 150px;" height=60% src="Images/LOGO.png">
    </a>

    <form method="get" action="pesquisa.php" id="barradepesquisa">
        <input type="text" name="search" id="busca"/>
        <svg style="cursor: pointer; display: inline-block; position: absolute; left: 85%; top: 10%; height: fit-content; width: fit-content; background-color: white; border-left: 1px solid grey; padding: 8px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00930f" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
    </form>

    <a href="favoritos.php">
        <svg style="display: inline-block; position: absolute; right: 20%; top: 35%; cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#00930f" class="bi bi-heart-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg>
    </a>

    <a id="carrinho" href="carrinho.php">
        <svg style="display: inline-block; position: absolute; right: 15%; top: 30%; cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#00930f" class="bi bi-cart-fill" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
    </a>

    <a href="login.php">
        <svg style="display: inline-block; position: absolute; right: 4%; top: 18.5%; border-left: 1px solid #232323; padding-left: 53px; cursor: pointer;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#00930f" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
    </a>
</header>

<div id="submenu">
    <ul id="categorias">
        <div style="position: absolute; left: -550px;" class="dropdown">
            <button class="dropbtn"><b>DEPARTAMENTOS</b></button>
            <div class="dropdown-content">
                <?php
                $sql0 = "SELECT * FROM departamentos";
                $resultado0 = mysqli_query($db,$sql0);

                while ($row0 = mysqli_fetch_array($resultado0)) {
                    echo '
                    <a href="departamentos.php?cat='.$row0['DepartamentoID'].'">
                        '.$row0['departamento'].'
                    </a>';
                }
                ?>
            </div>
        </div>
        <?php

            $sql = "SELECT * FROM secoes";
            $resultado = mysqli_query($db,$sql);

            if($resultado){
                while ($row = mysqli_fetch_array($resultado)) {
                    echo'
                    <a id="link-submenu" href="#'.$row['secao'].'">
                        <li id="submenu-categorias">'.$row['secao'].'</li>
                    </a>';
                }
            }

        ?>   
    <ul>
</div>
<hr id="rgb">

</html>