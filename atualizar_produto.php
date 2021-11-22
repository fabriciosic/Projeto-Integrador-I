<?php
include "include/mysqlconecta.inc";

$id_produto = $_POST['id_produto'];

$sql = "select * from produtos where id_produto = $id_produto";
$result = @mysqli_query($conexao,$sql) or die("Erro no banco de dados! 01"); 
$rows = mysqli_fetch_array($result);

$codigo_logix = $rows['codigo_logix'];
$name_foto1 = $rows['foto1'];
$name_foto2 = $rows['foto2'];
$name_foto3 = $rows['foto3'];

if ($_FILES['foto1']['size'][0] > 0){    
    $dir = 'uploads/';        
    
    if ($name_foto1 <> ''){
        unlink($dir.$foto1);
    }
    //Extensões permitidas
    $ext = array("jpg","JPG","jpeg","JPEG","png","PNG");

    //Obtendo info. dos arquivos
    $f_name_1 	= $_FILES['foto1']['name'];
    $f_tmp_1 		= $_FILES['foto1']['tmp_name'];
    $f_type_1 	= $_FILES['foto1']['type'];

    //Pegando o nome
    $name_foto1	=	'pic_1_'.date('YmdHis') . '.jpeg';

    //Verificando se o campo contem arquivo
    if ( ($name_foto1!="")) {
        $name_foto1." - ";
        //Movendo arquivo's do upload
        $up = move_uploaded_file($f_tmp_1[0], $dir.$name_foto1);
	  
    } 
}

if ($_FILES['foto2']['size'][0] > 0){    
    $dir = 'uploads/';
    
    if ($name_foto2 <> ''){
        unlink($dir.$name_foto2);
    }
    //Extensões permitidas
    $ext = array("jpg","JPG","jpeg","JPEG","png","PNG");

    //Obtendo info. dos arquivos
    $f_name_2 	= $_FILES['foto2']['name'];
    $f_tmp_2 		= $_FILES['foto2']['tmp_name'];
    $f_type_2 	= $_FILES['foto2']['type'];

    //Pegando o nome
    $name_foto2	=	'pic_2_'.date('YmdHis') . '.jpeg';

    //Verificando se o campo contem arquivo
    if ( ($name_foto2!="")) {
        $name_foto2." - ";
        //Movendo arquivo's do upload
        $up = move_uploaded_file($f_tmp_2[0], $dir.$name_foto2);
	  
    }      
}

if ($_FILES['foto3']['size'][0] > 0){    
    $dir = 'uploads/';        
    
    if ($name_foto3 <> ''){
        unlink($dir.$name_foto3);
    }
    //Extensões permitidas
    $ext = array("jpg","JPG","jpeg","JPEG","png","PNG");

    //Obtendo info. dos arquivos
    $f_name_3 	= $_FILES['foto3']['name'];
    $f_tmp_3 		= $_FILES['foto3']['tmp_name'];
    $f_type_3 	= $_FILES['foto3']['type'];

    //Pegando o nome
    $name_foto3	=	'pic_3_'.date('YmdHis') . '.jpeg';

    //Verificando se o campo contem arquivo
    if ( ($name_foto3!="")) {
        $name_foto3." - ";
        //Movendo arquivo's do upload
        $up = move_uploaded_file($f_tmp_3[0], $dir.$name_foto3);
	  
    }      
}

$sql = "update produtos set foto1='$name_foto1', foto2='$name_foto2', foto3='$name_foto3' where id_produto = $id_produto";
@mysqli_query($conexao,$sql) or die("Erro no banco de dados!"); 


echo "<script>location.href=\"cadastro.php?p=$codigo_logix\";</script>";
exit;
?>