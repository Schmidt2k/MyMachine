<?php //frmRemPro.php
    session_start(); 
    if (!isset($_SESSION['Nome']))
         header("Location:telaLogin.php"); 

    include 'conexao.php'; 
    //recuperar o valor pelo método GET
    $id = trim($_GET['ID']);
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT * FROM produtos WHERE ID=?";
    $query = $pdo->prepare($sql); 
    $query->execute(array($id));
    $dados = $query->fetch(PDO::FETCH_ASSOC);
    $pro_imagem = $dados['Imagem'];
    $pro_categoria = $dados['Categoria'];
    $pro_nome = $dados['Nome'];
    $pro_fabricante = $dados['Fabricante'];
    $pro_valor = $dados['Valor'];
    $pro_quantidade = $dados['Quantidade'];
    $total = $pro_quantidade *$pro_valor; 
    Conexao::desconectar(); 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Produtos</title>

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    <link rel='stylesheet' href='Bootstrap/dist/bootstrap.min.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='shortcut icon' href='imagens/icon_gerenciar.ico' type='image/x-icon'/>


</head>
<body>
<div  class="table-responsive-xl ml-5 mr-5 mt-2">
        <div class="border border-secondary">
        <div class= "table border border-secondary bg-primary">
             <h3>Atualizar produto</h3>
        </div>
              <form action="edtProdutos.php" method="post" id="frmEdtProdutos.php" name="frmEdtProdutos" class="col s12">
              <img class="img-responsive float-right mr-5" src='imagens/catalogo/<?php echo $pro_imagem; ?>'>                    <div class= "form-group">
                        <div class="form-group">
                            <label for="lblPro_Id"><blockquote><h1>ID: <?php echo $id;?></h1></blockquote></label>
                            <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $id;?>">
                        </div>
                    </div>  
                    <div class= "form-group">
                            <label for="lblPro_Categoria"><h5>Informe a Categoria:</h5></label>
                            <input type="text"  class="form-control"
                                id="txtPro_Categoria" name="txtPro_Categoria" value="<?php echo $pro_categoria;?>">
                    </div>
                    <div class= "form-group">
                            <label for="lblPro_Nome"><h5>Informe o Nome:</h5></label>
                            <input type="text"  class="form-control"
                                id="txtPro_Nome" name="txtPro_Nome" value="<?php echo $pro_nome;?>">
                    </div>
                    <div class= "form-group">
                            <label for="lblPro_Descricao"><h5>Informe a Descrição:</h5></label>
                            <input type="text"  class="form-control"
                                id="txtPro_Fabricante" name="txtPro_Fabricante" value="<?php echo $pro_fabricante;?>">
                    </div>
                    <div class="form-group">
                            <label for="lblPro_Valor"><h5>Informe o Valor:</h5></label>
                            <input step="0.01" type="number" class="form-control" 
                            id="txtPro_Valor" name="txtPro_Valor" onblur="calcular()" value="<?php echo $pro_valor;?>">
                    </div>
                    <div class="form-group">
                            <label for="lblPro_Quantidade"><h5>Informe a Quantidade:</h5></label>
                            <input step="0.01" type="number" class="form-control" 
                            id="txtPro_Quantidade" name="txtPro_Quantidade" onblur="calcular()" value="<?php echo $pro_quantidade;?>">
                    </div>

                    <div class="form-group">
                        <label for="lblTotal"><b>Total: </b><label id="total"></label><?php echo $total;?></label>
                    </div>

                    <div class="form-group">
                        <br>
                        <button class="btn btn-primary btn btn-success" type="submit" name="btnGrv">Gravar
                            <i class="material-icons right">save</i>
                        </button>

                        <button class="btn btn-primary btn btn-dark" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarProdutos.php'">Voltar
                            <i class="material-icons right">arrow_back</i> 
                        </button>
                    </div>
              </form>  
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<script>
function calcular(){

    var valor1 = parseInt(document.getElementById('txtProQuantidade').value, 10);
    var valor2 = parseInt(document.getElementById('txtPro_Valor').value, 10);
    var result = valor1*valor2; 
    if (isNaN(result)) 
        result = 0;
    document.getElementById("total").innerHTML = ""; 
    document.getElementById("total").innerHTML = result.toFixed(2); 

    //document.getElementById('result').value = result;
}
</script>