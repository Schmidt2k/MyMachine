<?php //Método de inserção do Usuario
include 'conexao.php';

//Coletar o valor dos campos do formulário Cadastrar Usuario.
//cpf, ender, email, senha, complemento, cidade, estado, cep
$nome = trim( $_POST['txtNome'] );
$cpf = trim( $_POST['txtCPF'] );
$ender = trim( $_POST['txtEnder'] );
$email = trim( $_POST['txtEmail'] );
$senha = trim( $_POST['txtSenha'] );
$complemento = trim( $_POST['txtComplemento'] );
$cidade = trim( $_POST['txtCidade'] );
$estado = trim( $_POST['txtEstado'] );
$cep = trim( $_POST['txtCEP'] );

if ( !empty( $nome ) && !empty( $cpf ) && !empty( $ender ) && !empty( $email ) &&
!empty( $senha ) && !empty( $complemento ) && !empty( $cidade ) && !empty( $estado ) ) {
    $pdo = Conexao::conectar();
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql = 'INSERT INTO Usuarios (Nome, CPF, Endereco, Email, Senha, Complemento, Cidade, Estado, CEP) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?)';
    $query = $pdo->prepare( $sql );
    $query->execute ( array( $nome, $cpf, $ender, $email, $senha, $complemento, $cidade, $estado, $cep) );
    Conexao::desconectar();
    echo PDO::ERRMODE_EXCEPTION;
    header("location:index.php");
}
else{
    header("location:telaCadastro.php");
}
