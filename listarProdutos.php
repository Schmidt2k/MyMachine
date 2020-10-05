<?php
    //verificar se o usuario tem acesso
    session_start();

       

    // recuperar produtos do banco para listar
    include 'conexao.php';  
    $pdo = Conexao::conectar(); 
    $sql = 'Select * from produtos order by pro_nome;';
    $listaProdutos = $pdo->query($sql); 
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Listar Produtos</title>
</head>

<body>
    <div id="content">


    <div  class="row s10">
      <h3 class="text-amber">Listar Produtos   
       <a class="btn-floating btn-large waves-effect waves-light green"
        onclick="JavaScript:location.href='frmInsProdutos.php'"><i class="material-icons">add</i></a>
      </h3>
    </div>
    <table  class="striped highlight  blue lighten-3 responsive-table">
        <tr  class = "orange lighten-4" class="blue-text text-darken-2">
            <th>ID</th>
            <th>Categoria</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th>Total</th>
            
        
        </tr>
        <?php
           foreach ($listaProdutos as $produto){
        ?> 
        <tr  class="black-text  accent-4"  >
            <td><?php echo $produto['pro_id']; ?></td>
            <td><?php echo $produto['pro_categoria']; ?> </td>
            <td><?php echo $produto['pro_nome']; ?></td>
            <td><?php echo $produto['pro_descricao']; ?></td>
            <td><?php echo  number_format($produto['pro_valor'], 2, ',', '.'); ?></td>
            <td><?php echo $produto['pro_quantidade']; ?></td>
            <?php $total = $produto['pro_quantidade'] * $produto['pro_valor']; ?>
            <td><?php echo number_format($total, 2, ',', '.');$total ?></td>
            
            <td><a class="btn-floating btn-small waves-effect waves-light orange"
                  onclick="JavaScript:location.href='frmEdtProdutos.php?id=' + 
                           <?php echo $produto['pro_id'];?>">
                  <i class="material-icons">edit</i></a></td>
            
                  <td><a class="btn-floating btn-small waves-effect waves-light red"
                  onclick="JavaScript:location.href='frmRemProdutos.php?id=' + 
                           <?php echo $produto['pro_id'];?>">
                  <i class="material-icons">delete_forever</i></a></td>
        </tr>

        <?php
           } 
        ?>

    </table>
    </div>
</body>

</html>