<?php
    session_start();  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de Produtos</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div  class="container grey lighten-4 col s12">
        <div class= " brown lighten-4 col s12">
             <h3>Adicionar Novo Produto</h3>
        </div>
        <div class="row">
              <form action="insProdutos.php" method="post" id="frmInsProdutos" name="frmInsProdutos" class="col s12">
                    <div class= "input-field col s8">
                            <label for="lblPro_Categoria">Informe a Categoria:</label>
                            <input type="text"  class="form-control"
                                id="txtPro_Categoria" name="txtPro_Categoria">
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_Nome">Informe o Nome:</label>
                            <input type="text" class="form-control"
                            id="txtPro_Nome" name="txtProNome">
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_Descricao">Informe a Descrição:</label>
                            <input type="text" class="form-control" 
                            id="txtPro_Descricao" name="txtPro_Descricao">
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_Valor">Informe o Valor:</label>
                            <input type="number" class="form-control" 
                            id="txtPro_Valor" name="txtPro_Valor">
                    </div>
                    <div class="input-field col s8">
                            <label for="lblPro_Quantidade">Informe a Quantidade:</label>
                            <input type="number" class="form-control" 
                            id="txtPro_Quantidade" name="txtPro_Quantidade" onblur="calcular()">
                    </div>
                    <div class="input-field col s8">
                        <label for="lblTotal"><b>Total: </b>  <label id="total"></label> </label>
                    </div>
                
                    <div class="input-field col s8">
                        <br>
                        <button class="btn waves-effect waves-light" type="submit" name="btnGrv">Gravar
                            <i class="material-icons right">save</i>
                       </button>

                       <button class="btn waves-effect waves-light orange " type="reset" name="btnLimpar">Limpar
                            <i class="material-icons right">brush</i>
                         </button>
                                
                       
                         <button class="btn waves-effect waves-light  indigo darken-4" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarProdutos.php'">Voltar
                            <i class="material-icons right">arrow_back</i> 
                         </button>

                    </div>
              </form>  
            </div>
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
  
    document.getElementById("total").innerHTML = result.toFixed(2); 

    //document.getElementById('result').value = result;
}
</script>