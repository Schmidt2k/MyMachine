<?php //compProdutos.php
    include 'conexao.php';
    session_start(); 
    //recuperação de valores do formulário pelo método GET
    $pro_id = trim($_GET['pro_id']); //veio por meio do hidden
    $pro_quantidade = trim($_GET['pro_quantidade']);
    $qtd = trim($_GET['txtPro_Quantidade']);
    $valor = trim($_GET['txtPro_Valor']);
    $imagem = trim($_GET['pro_imagem']);
    $valor_total = $qtd*$valor;
    $quantidade = $pro_quantidade-$qtd;
    $timezone = new DateTimeZone('America/Sao_Paulo');
    $agora = new DateTime('now', $timezone); 
    $data = $agora->format('d/m/Y H:i');


    if (!empty($pro_id)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE produtos SET Quantidade=? WHERE ID=?";
        $query = $pdo->prepare($sql); 
        $query->execute(array($quantidade, $pro_id));
        Conexao::desconectar(); 
    }

    $pdo = Conexao::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuarios WHERE Nome=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION['Nome']));
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $CPF_Cli = $dados['CPF'];
    $Nome_Cli = $dados['Nome'];
    $Ender_Cli = $dados['Endereco'];
    Conexao::desconectar();


     if (!empty($imagem) && !empty($CPF_Cli) && !empty($Ender_Cli) && !empty($Nome_Cli) && !empty($qtd) && !empty($valor) && !empty($valor_total) && !empty($data)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO vendas(Imagem, Nome, CPF, Endereco, Quantidade, Valor, Total, Data_Compra) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
        $query = $pdo->prepare($sql); 
        $query->execute(array($imagem, $Nome_Cli, $CPF_Cli, $Ender_Cli, $qtd , $valor, $valor_total, $data));
        Conexao::desconectar(); 
    }
    header("location:index.php"); 
