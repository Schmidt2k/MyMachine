<?php //frmRemPro.php
    session_start(); 
    if (!isset($_SESSION['usuario']))
         Header("Location: index.php"); 

    include 'conexao.php'; 
    //recuperar o valor pelo método GET
    $pro_id = trim($_GET['pro_id']);
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT * FROM produtos WHERE pro_id=?";
    $query = $pdo->prepare($sql); 
    $query->execute(array($pro_id));
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $pro_categoria = $dados['pro_categoria'];
    $pro_nome = $dados['pro_nome'];
    $pro_descricao = $dados['pro_descricao'];
    $pro_valor = $dados['pro_valor'];
    $pro_quantidade = $dados['pro_quantidade'];
    $total = $pro_quantidade *$pro_valor; 
    Conexao::desconectar(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remoção de Produto</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
    <div  class="valing-wrapper">
        <div class="row s12">
            <h3>Remover Produto</h3>
        </div>
    <div class="row">
      <form action="remProdutos.php" method="post" id="frmRemProdutos" name="frmRemProdutos" class="col s12">
    
        <div class="row">
            <div class= "input-field col s12">
                <label for="lblPro_Id"><h5><b>ID:</b> <?php echo $pro_id;?></h5></label>
                <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_id;?>">
            </div>
        </div>  
        <div class="row">
            <div class= "input-field col s12">
                <label for="lblPro_Categoria"><h5><b>Categoria:</b> <?php echo $pro_categoria;?></h5></label>
            </div>
        </div> 
        <div class="row">
            <div class= "input-field col s12">
                <label for="lblPro_Nome"><h5><b>Nome:</b> <?php echo $pro_nome;?></h5></label>
            </div>
        </div> 
        <div class="row">
            <div class= "input-field col s12">
                <label for="lblPro_Descrição"><h5><b>Descrição:</b> <?php echo $pro_descricao;?></h5></label>
            </div>
        </div>
        <div class="row">
            <div class= "input-field col s12">
                <label for="lblPro_Valor"><h5><b>Valor:</b> <?php echo $pro_valor;?></h5></label>
            </div>
        </div>
        <div class="row">
            <div class= "input-field col s12">
                <label for="lblPro_Quantidade"><h5><b>Quantidade:</b> <?php echo $pro_quantidade;?></h5></label>
            </div>
        </div>
        <div class="row s12">
         <br>
            <div class= "input-field col s14">
            <button class="btn waves-effect waves-light" type="submit" name="btnGrv">Remover
                <i class="material-icons right">remove_circle</i>
            </button>                  
                       
             <button class="btn waves-effect waves-light  indigo darken-4" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarProdutos.php'">Voltar
                 <i class="material-icons right">arrow_back</i> 
             </button>
            </div>
        </div> 
      </form>
    </div>

    </div>
</body>
</html>
