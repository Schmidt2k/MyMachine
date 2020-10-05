<?php
    session_start();
?>

<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Login</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    <link rel='stylesheet' href='Bootstrap/dist/bootstrap.min.css'>
    <link rel='stylesheet' href='css/telaLoginStyle.css'>

    <script>
        function Validar(frmLogin) {
            var email = document.getElementById('email').value;
            var senha = document.getElementById('senha').value;

            if (email == '') {
                document.getElementById('email-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
                document.getElementById('email-erro').style.color = 'red';
                document.getElementById('email').focus();
                document.getElementById('msg').style.visibility = "hidden";
                return false;
            } else {
                document.getElementById('email-erro').innerHTML = '';
                document.getElementById('msg').style.visibility = "hidden";
            }

            if (senha == '') {
                document.getElementById('senha-erro').innerHTML = '*Campo obrigatório, preencha o campo!';
                document.getElementById('senha-erro').style.color = 'red';
                document.getElementById('senha').focus();
                document.getElementById('msg').style.visibility = "hidden";
                return false;
            } else {
                document.getElementById('senha-erro').innerHTML = '';
                document.getElementById('msg').style.visibility = "hidden";
            }
            frmLogin.submit();
        }
    </script>
</head>

<body>
    <div class='card-group'>
        <div class='img-left d-none d-md-flex'></div>
        <div class='card'>
            <div class='card-header'>MyMachine.com</div>
            <div class='card-body'>
                <h4 class='title text-center'>
                    Entrar
                </h4>
                <form action='login.php' method='POST' id='frmLogin' name='frmLogin' onsubmit='Validar(); return false;'>
                    <div class='bloco-input'>
                        <div class='form-group'>
                            <label for=''>Endereço de email</label>
                            <input type='email' class='form-control' id='email' name='email' aria-describedby='emailHelp' placeholder='Seu email'>
                            <small id='email-erro'></small>
                        </div>
                        <div class='form-group'>
                            <label for=''>Senha</label>
                            <input type='password' class='form-control' id='senha' name='senha' aria-describedby='passwordHelp' placeholder='Senha'>
                            <small id='senha-erro'></small>
                        </div>
                    </div>
                        <div class='msgErro' id='msg'>
                            <?php
                                if (isset($_SESSION['erro'])) {
                                    echo $_SESSION['erro'];
                                    unset($_SESSION['erro']);
                                }
                            ?>
                        </div>
                    <div class='botoes'>
                        <button type='submit' class='btn btn-primary btn btn-dark  btn-block'>Entrar</button>
                        <button type='button' class='btn btn-primary btn btn-dark  btn-block' onclick="JavaScript:location.href='telaCadastro.php'">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>

</html>