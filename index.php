<?php require_once "include/mysqlconecta.inc"; ?>
<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Integraçãoffffffffffffffffff</title>
    <!--<link rel="shortcut icon" href="assets/images/logo/ico.ico" />-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">    

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">

    <style>
        #tela-inicial{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;            
        }        
    </style>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>      
</head>

<body>

<nav class="navbar navbar-light">
    <div class="container d-block">        
        <a class="navbar-brand ms-4" href="">
            <h2>Tela Inicial</h2>
        </a>
    </div>
</nav>


<div class="container">
    <div class="card mt-5">        
        <div class="card-body" id="tela-inicial">
            <a href="cadastro.php" class="btn btn-primary" style="margin-bottom:10px">Cadastro</a>            
            <a href="consulta.php" class="btn btn-primary" onclick="">Consulta</a>
        </div>
    </div>
</div>
    
 
   
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/vendors/toastify/toastify.js"></script>

<script>
$('#informativos').addClass('active');

function marcar_como_lido(id_mensagem,cpf_servidor){         
    
    $('#carregando').css("display", "flex");

    $.ajax({
        url: 'assets/ajax/marcar_como_lido.php',
        type: 'POST',
        data: jQuery.param({ id_mensagem,cpf_servidor }),
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(data) { 
            $('#inf_'+id_mensagem).html(data);                
            $('#div_inf_'+id_mensagem).html('<h6 style="color: #999"><i>Leitura realizada em...</i></h6>');  
        },
        error: function () {
            alert("error");
        }
    }); 
            
}    

</script>                     

<script src="assets/js/main.js"></script>    
</body>

</html>