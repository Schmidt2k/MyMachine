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
$total = $pro_quantidade * $pro_valor;
Conexao::desconectar();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remoção de Produto</title>

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    <link rel='stylesheet' href='Bootstrap/dist/bootstrap.min.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='shortcut icon' href='imagens/icon_gerenciar.ico' type='image/x-icon' />


</head>

<body>
    <div class="table-responsive-xl col-md-6 m-5">
        <div class="border border-secondary">
            <div class="table border border-secondary bg-primary">
                <h3>Remover Produto</h3>
            </div>
            <form action="remProdutos.php" method="GET" id="frmRemProdutos" name="frmRemProdutos" class="col s12">
            <img class="img-responsive float-right mr-5" src='imagens/catalogo/<?php echo $pro_imagem; ?>'>
                <div class="form-group">
                    <label for="lblPro_Id">
                        <h5>ID:<?php echo $id; ?></h5>
                    </label>
                    <input type="hidden" name="pro_id" id="pro_id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <label for="lblPro_Categoria">
                        <h5>Categoria:<?php echo $pro_categoria; ?></h5>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblPro_Nome">
                        <h5>Nome:<?php echo $pro_nome; ?></h5>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblPro_Descricao">
                        <h5>Descrição: <?php echo $pro_fabricante; ?></h5>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblPro_Valor">
                        <h5>Valor: <?php echo $pro_valor; ?></h5>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblPro_Quantidade">
                        <h5>Quantidade: <?php echo $pro_quantidade; ?></h5>
                    </label>
                </div>
                <div class="form-group">
                    <label for="lblTotal">
                        <h5>Total R$:<label id="total"></label><?php echo $total; ?><h5>
                    </label>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn btn-danger" type="submit" name="btnGrv">Remover
                        <i class="material-icons right">remove_circle</i>
                    </button>

                    <button class="btn btn-primary btn btn-dark" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarProdutos.php'">Voltar
                        <i class="material-icons right">arrow_back</i>
                    </button>
                </div>
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