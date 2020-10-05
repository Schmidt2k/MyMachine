<?php // pagina de controle de acesso ao login

    session_start();

    $email = trim($_POST['email']);
    $senha = md5($_POST['senha']);

    include 'conexao.php';
    $pdo = Conexao::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM Usuarios WHERE Email LIKE ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($email));
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $nome = $dados['Nome'];
    Conexao::desconectar();

    if($senha == md5($dados['Senha']) && $dados['Email']!=null){

        $_SESSION['Nome'] = $nome;
        header("location:index.php");
    }
    else{   
        header("location:TelaLogin.php");
        if($email!=$dados['Email'] || $senha!=$dados['Senha'] && $dados['Email']!=null){
            $_SESSION['erro'] = "<div class='alert alert-danger' id='alert'> Ops! E-mail ou Senha inválidos!</div>";
        }
    }
?>