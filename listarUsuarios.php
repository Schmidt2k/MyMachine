<?php
    //verificar se o usuario tem acesso
    session_start(); 

    // recuperar produtos do banco para listar
    include 'conexao.php';  
    $pdo = Conexao::conectar(); 
    $sql = 'Select * from usuarios order by Nome;';
    $listaUsuarios = $pdo->query($sql); 
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
    <title>Listar Usuarios</title>
</head>

<body>
    <div id="content">

    <div  class="row s10">
        <h3 class="text-amber">Listar Usuarios</h3>
    </div>
    
    <table  class="striped highlight  blue lighten-3 responsive-table">
        <tr  class = "orange lighten-4" class="blue-text text-darken-2">
            <th>Nome</th>
            <th>CPF</th>
            <th>Endereço</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Complemento</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
            <th>Tipo</th>
            <th COLSPAN="2">Função</th>
        
        </tr>
        <?php
           foreach ($listaUsuarios as $usuario) {
        ?> 
        <tr  class="black-text  accent-4"  >
            <td><?php echo $usuario['Nome']; ?></td>
            <td><?php echo $usuario['CPF']; ?> </td>
            <td><?php echo $usuario['Endereco']; ?></td>
            <td><?php echo $usuario['Email']; ?></td>
            <td><?php echo $usuario['Senha']; ?></td>
            <td><?php echo $usuario['Complemento']; ?></td>
            <td><?php echo $usuario['Cidade']; ?></td>
            <td><?php echo $usuario['Estado']; ?></td>
            <td><?php echo $usuario['CEP']; ?></td>
            <td><?php echo $usuario['Tipo']; ?></td>
            
           
            
            
            
            <td><a class="btn-floating btn-small waves-effect waves-light orange"
                  onclick="JavaScript:location.href='frmEdtPro.php?id=' + 
                           <?php echo $produto['id'];?>">
                  <i class="material-icons">edit</i></a></td>
            <td><a class="btn-floating btn-small waves-effect waves-light red"
                  onclick="JavaScript:location.href='frmRemPro.php?id=' + 
                           <?php echo $produto['id'];?>">
                  <i class="material-icons">delete_forever</i></a></td>
        </tr>

        <?php
           } 
        ?>

    </table>
    </div>
</body>

</html>