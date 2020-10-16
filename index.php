<?php
session_start();
if (!isset($_SESSION['Nome'])) {
    header('location:login.php');
}

// recuperar produtos do banco para listar
include 'conexao.php';
$pdo = Conexao::conectar();
$sql = 'SELECT * FROM produtos WHERE Quantidade > 0';
$listaProdutos = $pdo->query($sql);

?>
<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <title>MyMachine.com</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='shortcut icon' href='imagens/icon_index.ico' type='image/x-icon' />
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>

<body>

    <!-- Barra Superior -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">
            <a class="navbar-brand mb-0  h1" href="#">Inicio</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSite">

                <ul class="navbar-nav mr-auto h5">
                    <li class="nav-item">
                        <a class="nav-link" href="#produtos"> Produtos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Sobre </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto h5">
                    <li class="navbar-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navDrop">
                            <?php echo $_SESSION['Nome'] ?>
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="#">Meu carrinho</a>

                            <?php if (isset($_SESSION['Tipo'])) { ?>
                                <div class="dropdown-divider"> </div>
                                <a class="dropdown-item" href="listarProdutos.php" target="_blank"> Gerenciar </a>
                            <?php
                            }
                            ?>

                            <div class="dropdown-divider"> </div>

                            <a class="dropdown-item label-success btn" type='button' value='Sair' onclick="JavaScript:location.href='logout.php'">
                                Sair
                            </a>

                        </div>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Sessão de Slides -->

    <div id="carouselSite" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">

        <ol class="carousel-indicators">
            <li data-target="#carouselSite" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSite" data-slide-to="1"></li>
            <li data-target="#carouselSite" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagens/Slide1.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h3> Nova linhagem Razer </h3>
                    <p> Destrua nos games com os novos periféricos da linha Razer </p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="imagens/Slide2.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h3> O Pai ta ON! </h3>
                    <p> Adquira os equipamentos e mostre quem é que manda nessa porr@ </p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="imagens/Slide3.jpg" class="img-fluid d-block">
                <div class="carousel-caption d-none d-md-block">
                    <h3> Precisão em dia </h3>
                    <p> Seja preciso com os melhores mouses do mercado atual </p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselSite" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Anterior</span>
        </a>

        <a class="carousel-control-next" href="#carouselSite" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Avançar</span>
        </a>

    </div>

    <!-- Barra central -->
    <a name='produtos'></a>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning wd-12">

        <div class="table-responsive-xl col-md-12 mt-5 bg-light pt-3 border border-danger">
            <div class='float-right'>
                <select>
                    <option selected disabled>Selecione...</option>
                    <option>Todos</option>
                    <option>Teclados</option>
                    <option>Mouses</option>
                    <option>Mousepads</option>
                    <option>Headsets</option>
                </select>
            </div>
            <table class="table border border-secondary">
                <tr class="bg-primary text-black">
                    <th>Produto</th>
                    <th>Categoria</th>
                    <th>Fabricante</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th scope="col" colspan="1">Comprar</th>
                </tr>
                <?php
                foreach ($listaProdutos as $produto) {
                ?>
                    <tr>
                        <td><img src='imagens/catalogo/<?php echo $produto['Imagem'] ?>'></td>
                        <td class="align-middle"><?php echo $produto['Categoria']; ?> </td>
                        <td class="align-middle"><?php echo $produto['Fabricante']; ?></td>
                        <td class="align-middle"><?php echo $produto['Nome']; ?></td>
                        <td class="align-middle"><?php echo  number_format($produto['Valor'], 2, ',', '.'); ?></td>

                        <td class="align-middle"><a class="btn" onclick="JavaScript:location.href='frmRemProdutos.php?ID=' + 
                           <?php echo $produto['ID']; ?>">
                                <i class="material-icons">shopping_cart</i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </nav>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>