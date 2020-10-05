<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Criar conta</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="Bootstrap/dist/bootstrap.min.css">
  <link rel="stylesheet" href="css/telaCadastroUsuarioStyle.css">

  <script>
    function Validar(frmInsUsuario){
      var nome = frmInsUsuario.nome.value;
      var cpf = document.getElementById('txtCPF').value;
      var endereco = document.getElementById('txtEnder').value;
      var email = document.getElementById('txtEmail').value;
      var senha = document.getElementById('txtSenha').value;
      var completo = document.getElementById('txtComplemento').value;
      var cidade = document.getElementById('txtCidade').value;
      var estado = document.getElementById('txtEstado').value;
      var cep = document.getElementById('txtCEP').value;


      if (nome == "") {
        alert('iam goku');
        document.getElementById('nome_erro').innerHTML = "oie";
        document.getElementById('nome_erro').style.color = 'green';
        document.getElementById('txtNome').focus();
        return false;

      } else {
        document.getElementById('nome-erro').innerHTML = "";
      }

      if (cpf == "") {
        document.getElementById('cpf-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('cpf-erro').style.color = 'red';
        document.getElementById('txtCPF').focus();
        return false;
      } else {
        document.getElementById('cpf-erro').innerHTML = "";
      }

      if (endereco == "") {
        document.getElementById('endereco-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('endereco-erro').style.color = 'red';
        document.getElementById('txtEnder').focus();
        return false;
      } else {
        document.getElementById('endereco-erro').innerHTML = "";
      }

      if (email == "") {
        document.getElementById('email-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('email-erro').style.color = 'red';
        document.getElementById('txtEmail').focus();
        return false;
      } else {
        document.getElementById('email-erro').innerHTML = "";
      }

      if (senha == "") {
        document.getElementById('senha-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('senha-erro').style.color = 'red';
        document.getElementById('txtSenha').focus();
        return false;
      } else {
        document.getElementById('senha-erro').innerHTML = "";
      }

      if (complemento == "") {
        document.getElementById('complemento-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('complemento-erro').style.color = 'red';
        document.getElementById('txtComplemento').focus();
        return false;
      } else {
        document.getElementById('complemento-erro').innerHTML = "";
      }

      if (cidade == "") {
        document.getElementById('cidade-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('cidade-erro').style.color = 'red';
        document.getElementById('txtCidade').focus();
        return false;
      } else {
        document.getElementById('cidade-erro').innerHTML = "";
      }

      if (estado == "") {
        document.getElementById('estado-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('estado-erro').style.color = 'red';
        document.getElementById('txtEstado').focus();
        return false;
      } else {
        document.getElementById('estado-erro').innerHTML = "";
      }

      if (cep == "") {
        document.getElementById('cep-erro').innerHTML = "*Campo obrigatório, preencha o campo!";
        document.getElementById('cep-erro').style.color = 'red';
        document.getElementById('txtCEP').focus();
        return false;
      } else {
        document.getElementById('cep-erro').innerHTML = "";
      }
      frmInsUsuario.submit();
    }
  </script>
</head>

<body>
  <div class="card-group">
    <div class="img-left d-none d-md-flex"></div>
    <div class="card">
      <div class="card-header">Criar conta MyFootWear</div>
      <div class="card-body">
        <form  method="POST" id="frmInsUsuario" name="frmInsUsuario" onsubmit="Validar(); return false;">
          <div class="form-row">
            <div class="form-group col-md-7">
              <label for="inputEmail4">Nome</label>
              <input type="text" class="form-control" placeholder="Nome completo" id="txtNome" name="txtNome">
              <small id="erro_nome"></small>
            </div>
            <div class="form-group col-md-5">
              <label for="inputPassword4">CPF</label>
              <input type="text" class="form-control" placeholder="CPF" id="txtCPF" name="txtCPF">
              <small id="cpf-erro"></small>
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Endereço</label>
            <input type="text" class="form-control" placeholder="Rua dos Programadores, nº 0" id="txtEnder" name="txtEnder">
            <small id="endereco-erro"></small>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" placeholder="Email" id="txtEmail" name="txtEmail">
              <small id="email-erro"></small>
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Senha</label>
              <input type="password" class="form-control" placeholder="Senha" id="txtSenha" name="txtSenha">
              <small id="senha-erro"></small>
            </div>
          </div>
          <div class="form-group">
            <label for="inputComplemento">Complemento</label>
            <input type="text" class="form-control" placeholder="Apartamento, hotel, casa, etc." id="txtComplemento" name="txtComplemento">
            <small id="complemento-erro"></small>
          </div>
          <div class="form-row">
            <div class="form-group col-md-5">
              <label for="inputCity">Cidade</label>
              <input type="text" class="form-control" placeholder="Cidade..." id="txtCidade" name="txtCidade">
              <small id="cidade-erro"></small>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEstado">Estado</label>
              <select id="inputEstado" class="form-control" placeholde="UF" id="txtEstado" name="txtEstado">
                <option selected>Escolher...</option>
                <option>SP</option>
              </select>
              <small id="estado-erro"></small>
            </div>
            <div class="form-group col-md-3">
              <label for="inputCEP">CEP</label>
              <input type="text" class="form-control" placeholder="CEP" id="txtCEP" name="txtCEP">
              <small id="cep-erro"></small>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn btn-dark btn-block">Criar conta</button>
            <button type="button" class="btn btn-primary btn btn-dark btn-block" onclick="JavaScript:location.href='telaLogin.php'">Já possuí uma conta?</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>