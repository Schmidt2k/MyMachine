<?php //Método de inserção do Usuario
session_start();
include 'conexao.php';

//Coletar o valor dos campos do formulário Cadastrar Usuario.
//cpf, ender, email, senha, cidade, estado, cep
$nome = trim($_POST['txtNome']);
$cpf = trim($_POST['txtCPF']);
$ender = trim($_POST['txtEnder']);
$email = trim($_POST['txtEmail']);
$senha = trim($_POST['txtSenha']);
$cidade = trim($_POST['txtCidade']);
$estado = trim($_POST['txtEstado']);
$cep = trim($_POST['txtCEP']);

$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM Usuarios WHERE Email LIKE ?";
$query = $pdo->prepare($sql);
$query->execute(array($email));
$dados = $query->fetch(PDO::FETCH_ASSOC);
$email_search = $dados['Email'];
$sql = "SELECT * FROM Usuarios WHERE CPF LIKE ?";
$query = $pdo->prepare($sql);
$query->execute(array($cpf));
$dados = $query->fetch(PDO::FETCH_ASSOC);
$cpf_search = $dados['CPF'];
Conexao::desconectar();

if ( !empty($nome) && !empty($cpf) && !empty($ender) && !empty($email) && !empty($senha) && !empty($cidade) && !empty($estado) && !empty($cep)) {
    if ($cpf_search!=null || $email_search !=null) {
        header("location:telaCadastro.php");
        $_SESSION['msg'] = "<div class='alert alert-danger'> Ops! conta já existente! <u><a href='telaLogin.php'>Entrar</a></u></div>";
    } else {
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO Usuarios (Nome, CPF, Endereco, Email, Senha, Cidade, Estado, CEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $cpf, $ender, $email, $senha, $cidade, $estado, $cep));
        Conexao::desconectar();
        echo PDO::ERRMODE_EXCEPTION;
        header("location:telaLogin.php");
    }
} else {
    header('location:telaCadastro.php');
}
