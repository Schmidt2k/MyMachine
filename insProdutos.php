<?php //inspro.php
    include 'conexao.php'; 
    //recuperação de valores do formulário pelo método POST
    $Categoria = trim($_POST['txtPro_Categoria']); 
    $Nome = trim($_POST['txtPro_Nome']); 
    $Fabricante = trim($_POST['txtPro_Fabricante']);
    $Quantidade = trim($_POST['txtPro_Quantidade']);
    $Valor = trim($_POST['txtPro_Valor']);
    $Imagem = trim($_POST['imagemProduto']);

    if (!empty($Categoria) && !empty($Nome) && !empty($Fabricante) && !empty($Quantidade) && !empty($Valor) && !empty($Imagem)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO produtos(Nome, Categoria, Fabricante, Quantidade, Valor, Imagem) VALUES(?, ?, ?, ?, ?, ?);";
        $query = $pdo->prepare($sql); 
        $query->execute(array($Nome, $Categoria, $Fabricante, $Quantidade, $Valor, $Imagem));
        Conexao::desconectar(); 
    }
    header("location:listarProdutos.php"); 

?>