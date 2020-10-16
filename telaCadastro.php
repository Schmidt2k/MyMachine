<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Criar conta</title>

  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
  <link rel='stylesheet' href='Bootstrap/dist/bootstrap.min.css'>
  <link rel='shortcut icon' href='imagens/icon_cadastro.ico' type='image/x-icon' />
  <link rel='stylesheet' href='css/cadastroUsuario.css'/>
  <script>
    function Valida(frmCad) {

      var nome = document.getElementById('txtNome').value;
      var cpf = document.getElementById('txtCPF').value;
      var endereco = document.getElementById('txtEnder').value;
      var email = document.getElementById('txtEmail').value;
      var senha = document.getElementById('txtSenha').value;
      var cidade = document.getElementById('txtCidade').value;
      var estado = document.getElementById('txtEstado').value;
      var cep = document.getElementById('txtCEP').value;


      if (nome == '') {
        document.getElementById('nome-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('nome-erro').style.color = "red";
        document.getElementById('txtNome').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('nome-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }

      if (cpf == '') {
        document.getElementById('cpf-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('cpf-erro').style.color = "red";
        document.getElementById('txtCPF').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('cpf-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }

      if (endereco == '') {
        document.getElementById('endereco-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('endereco-erro').style.color = "red";
        document.getElementById('txtEnder').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('endereco-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }

      if (email == '') {
        document.getElementById('email-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('email-erro').style.color = "red";
        document.getElementById('txtEmail').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('email-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }

      if (senha == '') {
        document.getElementById('senha-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('senha-erro').style.color = "red";
        document.getElementById('txtSenha').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('senha-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }

      if (cidade == '') {
        document.getElementById('cidade-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('cidade-erro').style.color = "red";
        document.getElementById('txtCidade').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('cidade-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }

      if (estado == '') {
        document.getElementById('estado-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('estado-erro').style.color = "red";
        document.getElementById('txtEstado').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('estado-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }

      if (cep == '') {
        document.getElementById('cep-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
        document.getElementById('cep-erro').style.color = "red";
        document.getElementById('txtCEP').focus();
        document.getElementById('msg').style.visibility = "hidden";
        return false;
      } else {
        document.getElementById('cep-erro').innerHTML = '';
        document.getElementById('msg').style.visibility = "hidden";
      }
      submit.frmCad();
    }
  </script>

</head>

<body>
  <form action='insUsuario.php' method='POST' id='frmCad' name='frmCad' onsubmit='Valida(); return false;'>
    <div class='w-50 p-3'>
      <div class='table table-responsive-x bg-white border border-secondary col-md-12 p-0'>
        <div class='table border border-dark bg-primary text-white  mb-0'>
          <h3 class='p-1 ml-3 mt-3'>Cadastro</h3>
        </div>
        <div class='p-3'>
          <div class='form-row'>
            <div class='form-group  col-md-7'>
              <label for=''>Nome</label>
              <input type='text' class='form-control' placeholder='Nome completo' id='txtNome' name='txtNome'>
              <small id='nome-erro'></small>
            </div>
            <div class='form-group col-md-5'>
              <label for=''>CPF</label>
              <input type='text' class='form-control' placeholder='CPF (somente números)' id='txtCPF' name='txtCPF'>
              <small id='cpf-erro'></small>
            </div>
          </div>
          <div class='form-group'>
            <label for=''>Endereço</label>
            <input type='text' class='form-control' placeholder='Bairro, Rua, Nº, Complemento' id='txtEnder' name='txtEnder'>
            <small id='endereco-erro'></small>
          </div>
          <div class='form-row'>
            <div class='form-group col-md-8'>
              <label for=''>Email</label>
              <input type='email' class='form-control' placeholder='Email' id='txtEmail' name='txtEmail'>
              <small id='email-erro'></small>
            </div>
            <div class='form-group col-md-4'>
              <label for=''>Senha</label>
              <input type='password' class='form-control' placeholder='Senha' id='txtSenha' name='txtSenha'>
              <small id='senha-erro'></small>
            </div>
          </div>
          <div class='form-row'>
            <div class='form-group col-md-5'>
              <label for=''>Cidade</label>
              <input type='text' class='form-control' placeholder='Cidade...' id='txtCidade' name='txtCidade'>
              <small id='cidade-erro'></small>
            </div>
            <div class='form-group col-md-4'>
              <label for=''>Estado</label>
              <select class='form-control' placeholde='UF' id='txtEstado' name='txtEstado'>
                <option selected>Escolher...</option>
                <option>SP</option>
              </select>
              <small id='estado-erro'></small>
            </div>
            <div class='form-group col-md-3'>
              <label for=''>CEP</label>
              <input type='text' class='form-control' placeholder='CEP' id='txtCEP' name='txtCEP'>
              <small id='cep-erro'></small>
            </div>
          </div>
          <div id="msg">
            <?php
            if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
            ?>
          </div>
          <div>
            <button type='submit' class='btn btn-primary btn btn-dark btn-block'>Criar conta</button>
            <button type='button' class='btn btn-primary btn btn-dark btn-block' onclick="JavaScript:location.href='telaLogin.php'">Já possuí uma conta?</button>
          </div>
        </div>
        <div class='card-header border border-dark bg-primary mt-2'>
          <p class='text-center mt-3 text-white'> MyMachine Group® </p>
        </div>
      </div>
    </div>
  </form>
</body>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>

</html>