<?php //remPro.php
    include 'conexao.php'; 
    //recuperação de valores do formulário pelo método POST
    $pro_id = trim($_POST['pro_id']); //veio por meio do hidden

    
    if (!empty($pro_id)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "DELETE FROM produtos WHERE pro_id=?";
        $query = $pdo->prepare($sql); 
        $query->execute(array($pro_id));
        Conexao::desconectar(); 
    }
    header("location:listarProdutos.php"); 

?>