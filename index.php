<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>MyMachine.com</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/bootstrap-navbar.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/index.css" type="text/css">
        <link rel="shortcut icon" href="imagens/icon_index.ico" type="image/x-icon"/>
    </head>
    
    <body>

        <nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #02c6ed" >
         <!-- LOGO MYFOOTWEAR -->
        <a class="navbar-brand" href="#">MyMachine.com</a>

        <!-- LINK INICIO -->
        <ul class="navbar-nav">
    
            <!-- CATALOGO DROP -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" ;href="#" id="navbardrop" data-toggle="dropdown">PERIFÉRICOS</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Mouses</a>
                    <a class="dropdown-item" href="#">Teclados</a>
                    <a class="dropdown-item" href="#">Headsets</a>
                    <a class="dropdown-item" href="#">Mouse Pads</a>
                </div>
            </li>
            &emsp;
            
            <!-- LINK SOBRE -->
            <li class="nav-item">
                <a class="nav-link" href="#">SOBRE</a>
            </li>
            
            <li class="nav-item">
                <?php 
                    echo $_SESSION['Nome'];
                ?>
            </li>   
        
        </ul>
        </nav>
 
        <div>
        </div>
      

        <div class="rodape">
            <div class="rede-sociais">
                    <a href="https://pt-br.facebook.com/" target="_blank" data-content="https://pt-br.facebook.com/" data-type="external" rel="noopener">
                        <img src="imagens/rede sociais/logo-facebook.png" href="//www.google.com.br" width="75px" height="75px" class="img-circle" alt="Facebook">
                    </a>
                    &emsp;&emsp;&emsp;&emsp;
                    <a href="https://www.instagram.com/?hl=pt-br" target="_blank" data-content="https://www.instagram.com/?hl=pt-br" data-type="external" rel="noopener">
                        <img src="imagens/rede sociais/logo-instagram.jfif" width="75px" height="75px" class="img-circle" alt="Instagram">
                    </a>
                    &emsp;&emsp;&emsp;&emsp;
                    <a href="https://www.whatsapp.com/?lang=pt_br" target="_blank" data-content="https://www.whatsapp.com/?lang=pt_br" data-type="external" rel="noopener">
                        <img src="imagens/rede sociais/logo-whatsapp.jfif" width="75px" height="75px" class="img-circle" alt="Whatsapp">
                    </a>
            </div>
            <div class="txtDesen" >
                <p class="font_10" style="line-height:1.79em; text-align: center; ">
                <span class="color_15">©2020 MyMachine.com.</span>
                </p>
            
                <p class="font_10" style="line-height:1.79em; text-align:center;">
                    <span class="color_15"> Desenvolvido por Guilherme Schmidt Loureiro e Luiz Antonio S. D'Aurelio </span>
                </p>
            </div>
        </div>
    </body>
</html>
