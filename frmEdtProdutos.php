<?php //frmEdtPro.php
    session_start(); 

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
    $total = $pro_quantidade * $pro_valor; 
    Conexao::desconectar(); 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Produtos</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>
<body>
<div  class="container grey darken-2 col s10">
        <div class= " brown lighten-1 col s10">
             <h3>Editar Produto</h3>
        </div>
        <div class="row">
              <form action="edtProdutos.php" method="post" id="frmEdtProdutos" name="frmEdtProdutos" class="col s12">
                    
                    <div class= "input-field col s8">
                        <div class="row">
                            <label for="lblPro_Id"><blockquote>ID: <?php echo $pro_id;?></blockquote></label>
                            <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $pro_id;?>">
                        </div>
                    </div>  
                    <div class= "input-field col s8">
                            <label for="lblPro_Categoria">Informe a Categoria:</label>
                            <input type="text"  class="form-control"
                                id="txtPro_Categoria" name="txtPro_categoria" value="<?php echo $pro_descricao;?>">
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_Nome">Informe o Nome:</label>
                            <input type="text" class="form-control"
                            id="txtPro_Nome" name="txtPro_Nome"  value="<?php echo $pro_nome;?>"> 
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_Nome">Informe a Descrição:</label>
                            <input type="text" class="form-control"
                            id="txtPro_Descricao" name="txtPro_Descricao"  value="<?php echo $pro_nome;?>"> 
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_descricao">Informe o Valor</label>
                            <input step="0.01" type="number" class="form-control" 
                            id="txtValor" name="txtValor" onblur="calcular()" value="<?php echo $valor;?>">
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_descricao">Informe o Quantidade</label>
                            <input step="0.01" type="number" class="form-control" 
                            id="txtValor" name="txtValor" onblur="calcular()" value="<?php echo $valor;?>">
                    </div>
                    <div class="input-field col s8">
                        <label for="lblTotal"><b>Total: </b><label id="total"></label><?php echo $total;?></label>
                    </div>

                    <div class="input-field col s10">
                        <br>
                        <button class="btn waves-effect waves-light" type="submit" name="btnGrv">Gravar
                            <i class="material-icons right">save</i>
                          </button>

                       <button class="btn waves-effect waves-light orange" type="reset" name="btnLimpar">Limpar
                            <i class="material-icons right">brush</i>
                         </button>
                                
                       
                         <button class="btn waves-effect waves-light  indigo darken-4" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarProdutos.php'">Voltar
                            <i class="material-icons right">arrow_back</i> 
                         </button>

                    </div>
              </form>  
        </div>

    </div>
</body>
</html>

<script>
function calcular(){

    var valor1 = parseInt(document.getElementById('txtPro_Quantidade').value, 10);
    var valor2 = parseInt(document.getElementById('txtPro_Valor').value, 10);
    var result = valor1*valor2; 
    if (isNaN(result)) 
        result = 0;
    document.getElementById("total").innerHTML = ""; 
    document.getElementById("total").innerHTML = result.toFixed(2); 

    //document.getElementById('result').value = result;
}
</script>