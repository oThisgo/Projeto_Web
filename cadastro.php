<?php
include_once 'Includes/headlogin.php';
include_once 'Includes/headerlogin.php';
?>

<body>
  <form style="display: block; border-radius: 25px; margin-top: 130px; margin-bottom: 50px; width: 800px; height: fit-content; background-color: white; padding: 100px; margin-right: auto; margin-left: auto;" action="perfil.php" id="container">
    <fieldset id="field">
      <div id="titulo">
        <h1 style="text-align: center; margin-top: -30px; margin-bottom: 50px; color: #00930f">CRIAR CONTA</h1>
      </div>
      <div style="color: #grey;" id="conta">
        <label id="contatype">Tipo de conta</label>
        <div style="margin-bottom: 30px;"id="tipoConta">
            <input type="radio" name="tipopessoa" value="física" checked><label>Pessoa Física</label>
            <input type="radio" name="tipopessoa" value="juridica"><label>Pessoa Física</label>
        </div>
      </div>
      <div id="nome_cpf">
        <input style="width: 260px; border: 3px solid #9e9e9e; padding: 10px; margin-right: 10px; margin-bottom: 10px; border-radius: 15px;" type="text" name="nome" id="nome" placeholder="Nome completo">
        <input style="width: 260px; border: 3px solid #9e9e9e; padding: 10px; border-radius: 15px;" type="text" name="CPF" id="CPF" placeholder="CPF">
      </div>
      <div id="data_telefone">
        <input style="width: 260px; color: #9e9e9e; border: 3px solid #9e9e9e; padding: 10px; margin-right: 10px; margin-bottom: 10px; border-radius: 15px;" type="date" nome="nascimento" id="nascimento" placeholder="Data de nascimento">
        <input style="width: 260px; border: 3px solid #9e9e9e; padding: 10px; margin-right: 10px; margin-bottom: 10px; border-radius: 15px;" type="number" name="celular" id="celular" placeholder="Telefone celular">
      </div>
      <div id="emaildiv">
        <input style="width: 535px; padding: 10px; margin-right: 10px; border: 3px solid #9e9e9e; margin-bottom: 10px; border-radius: 15px;" type="email" name="email" id="email" placeholder="E-mail">
      </div>
      <div id="senha_confsenha">
        <input style="width: 260px; border: 3px solid #9e9e9e; padding: 10px; margin-right: 10px; margin-bottom: 10px; border-radius: 15px;" type="password" name="senha" id="senha" placeholder="Criar senha">
        <input style="width: 260px; border: 3px solid #9e9e9e; padding: 10px; margin-right: 10px; margin-bottom: 10px; border-radius: 15px;" type="password" name="confSenha" id="confSenha" placeholder="Confirmar senha">
      </div>
      <div id="politicas">
        <input type="checkbox" name="politicas"> Li e estou de acordo com as poíticas da empresa e políticas de privacidade
      </div>
      <div id="botao">
        <input value=Confirmar style="display: block; margin-right: auto; margin-left: auto; margin-top: 30px; font-size: 30px; padding-right: 80px; padding-left: 80px; width: fit-content; height: fit-content; background-color: #00930f; border: 1px solid transparent;" class="btn btn-primary" type="submit">
      </div>
      
    </fieldset>
    
  </form>
<script src="animation.js"></script>
</body>
<?php
include_once 'Includes/footer.php';
?>

</html>