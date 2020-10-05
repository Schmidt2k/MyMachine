<?php //inspro.php
    include 'conexao.php'; 
    //recuperação de valores do formulário pelo método POST
    $pro_categoria = trim($_POST['txtPro_Categoria']); 
    $pro_nome = trim($_POST['txtPro_Nome']); 
    $pro_descricao = trim($_POST['txtPro_Descricao']);
    $pro_valor = trim($_POST['txtPro_Valor']);
    $pro_quantidade = trim($_POST['txtPro_Quantidade']);
    
    if (!empty($pro_categoria) && !empty($pro_nome) && !empty($pro_descricao) && !empty($pro_valor)&& !empty($pro_quantidade)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO produtos(pro_categoria, pro_nome, pro_descricao, pro_valor, pro_quantidade) VALUES(?, ?, ?, ?, ?);";
        $query = $pdo->prepare($sql); 
        $query->execute(array($pro_categoria, $pro_nome, $pro_descricao, $pro_valor, $pro_quantidade));
        Conexao::desconectar(); 
    }
    header("location:listarProdutos.php"); 

?>