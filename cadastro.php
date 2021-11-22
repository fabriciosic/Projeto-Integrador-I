<?php require_once "include/mysqlconecta.inc"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Projeto Integração</title>
    <!--<link rel="shortcut icon" href="assets/images/logo/ico.ico" />-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">    

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>      
</head>

<body>

<nav class="navbar navbar-light">
    <div class="container d-block">   
        <a href="index.php"><i class="bi bi-chevron-left"></i></a>     
        <a class="navbar-brand ms-4" href="">
            <h2>Tela Cadastro</h2>
        </a>
    </div>
</nav>


<div class="container">
    <div class="card mt-5">        
        <div class="card-body">
            <div class="row">        
                <div>
                    <form action="atualizar_produto.php" method="POST" enctype="multipart/form-data" id="formulario">
                        <h6>Buscar Código SAP</h6>
                        <div class="form-group position-relative">
                            <input type="text" class="form-control" id="produto"/>
                        </div>
                        <div style="display: none;flex-direction: column;align-items: center" id="carregando_espelho">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden" style="flex: 1"></span>
                            </div>
                            <div>
                                <span style="flex: 1">Buscando produto...</span>
                            </div>                                    
                        </div> 
                        <a class="btn btn-primary" onclick="clicar()">Buscar Produto</a>
                        <hr />
                        <div id="div_resultado_busca"></div>
                    </form>
                </div>      
            </div>
        </div>
    </div>
</div>
    
 
   
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/vendors/toastify/toastify.js"></script>

<script>

function buscar_produto(texto){         
    
    $('#carregando').css("display", "flex");

    $.ajax({
        url: 'assets/ajax/busca_produto.php',
        type: 'POST',
        data: jQuery.param({ texto }),
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function(data) {                            
            $('#div_resultado_busca').html(data);                         
        },
        error: function () {
            alert("error");
        }
    });             
}    

function clicar(){   
    let texto = document.getElementById('produto').value;    
    buscar_produto(texto);
}
function clicar_automatico(codigoRecuperado){  
      
    let texto2 = codigoRecuperado;     
    buscar_produto(texto2);
}
</script>  

<script src="assets/js/main.js"></script>    
</body>

<?php 
$codigo_logix_recuperado = $_GET['p']; 

if(!empty($codigo_logix_recuperado) && !is_null($codigo_logix_recuperado)){?>
    <script>
            var codigo = <?php echo $codigo_logix_recuperado; ?>;
            clicar_automatico(codigo);
       
    </script>
<?php } ?>   
</html>