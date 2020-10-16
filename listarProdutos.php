<?php
//verificar se o usuario tem acesso
session_start();
if (!isset($_SESSION['Nome']))
    header("Location:telaLogin.php");


// recuperar produtos do banco para listar
include 'conexao.php';
$pdo = Conexao::conectar();
$sql = 'SELECT * FROM produtos ORDER BY Nome;';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='shortcut icon' href='imagens/icon_gerenciar.ico' type='image/x-icon'/>
    <title>Listar Produtos</title>
</head>

<body>

    <div class="table-responsive-xl col-md-12 mt-5">
        <h3>PRODUTOS
            <a class="produtos">
                <a class="btn-floating btn-large waves-effect waves-light green" onclick="JavaScript:location.href='frmInsProdutos.php'"><i class="material-icons">add</i></a>
            </a>
        </h3>
        <table class="table border border-secondary">
            <tr class="bg-primary text-white">
                <th>Produto</th>
                <th>ID</th>
                <th>Categoria</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Total</th>
                <th scope="col" colspan="2">Funções</th>
            </tr>
            <?php
            foreach ($listaProdutos as $produto) {
            ?>
                <tr>
                    <td><img src='imagens/catalogo/<?php echo $produto['Imagem']?>'></td>
                    <td class="align-middle"><?php echo $produto['ID']; ?></td>
                    <td class="align-middle"><?php echo $produto['Categoria']; ?> </td>
                    <td class="align-middle"><?php echo $produto['Nome']; ?></td>
                    <td class="align-middle"><?php echo $produto['Fabricante']; ?></td>
                    <td class="align-middle"><?php echo $produto['Quantidade']; ?></td>
                    <td class="align-middle"><?php echo  number_format($produto['Valor'], 2, ',', '.'); ?></td>
                    <?php $total = $produto['Quantidade'] * $produto['Valor']; ?>
                    <td class="align-middle"><?php echo number_format($total, 2, ',', '.');
                        $total ?></td>


                    <td class="align-middle"><a class="btn-floating btn-small waves-effect waves-light black" onclick="JavaScript:location.href='frmEdtProdutos.php?ID=' + 
                           <?php echo $produto['ID']; ?>">
                            <i class="material-icons">edit</i></a></td>

                    <td class="align-middle"><a class="btn-floating btn-small waves-effect waves-light black" onclick="JavaScript:location.href='frmRemProdutos.php?ID=' + 
                           <?php echo $produto['ID']; ?>">
                            <i class="material-icons">delete_forever</i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>