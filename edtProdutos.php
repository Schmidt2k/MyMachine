<?php //edtPro.php
    include 'conexao.php'; 
    //recuperação de valores do formulário pelo método POST
    $pro_id = trim($_POST['pro_id']); //veio por meio do hidden
    $pro_categoria = trim($_POST['txtPro_Categoria']);  //demais text
    $pro_nome = trim($_POST['txtPro_Nome']); 
    $pro_fabricante = trim($_POST['txtPro_Fabricante']);
    $pro_valor = trim($_POST['txtPro_Valor']);
    $pro_quantidade = trim($_POST['txtPro_Quantidade']);  
    
    if (!empty($pro_id) && !empty($pro_categoria) && !empty($pro_nome) && !empty($pro_fabricante) && !empty($pro_valor) && !empty($pro_quantidade)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE produtos SET Nome=?, Categoria=?, Fabricante=?, Valor=?, Quantidade=? WHERE ID=?";
        $query = $pdo->prepare($sql); 
        $query->execute(array($pro_nome, $pro_categoria, $pro_fabricante, $pro_valor, $pro_quantidade, $pro_id));
        Conexao::desconectar(); 
    }
    header("location:listarProdutos.php"); 

?>

