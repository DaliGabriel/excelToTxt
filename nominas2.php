<?php
header("Pragma: no-cache");

$cid = ftp_connect("hostname");
	$resultado = ftp_login($cid, "user","password");
	if ((!$cid) || (!$resultado)) {
//		echo "Fallo en la conexión<tr>"; die;
	} else {
//		echo "Conectado.<tr>";
	}
	ftp_pasv ($cid, true) ;
	ftp_chdir($cid, "ufil");  
	$archivo = $_FILES["dropzone-file"]["name"];
	$remoto = $_FILES["dropzone-file"]["tmp_name"];
	$tama = $_FILES["dropzone-file"]["size"];
    //C:\inetpub\wwwroot\ufil\
	$ruta = "C:/inetpub/wwwroot/ufil/".$archivo;
		if (is_uploaded_file($remoto)){
			copy($remoto, $ruta);
//			echo "<tr>Exito Archivo Subido  " . $local;		
		}
		else {
//			echo "<tr>no se pudo subir el archivo " . $local;
		}
//	echo "<tr>Ruta:".$ruta;
	ftp_close($cid); 
$nombre = "./../ufil/".$archivo;


require("reader.php");
$datos = new Spreadsheet_Excel_Reader();
$datos->read($nombre);
$celdas = $datos->sheets[0]['cells'];

	$i=1;
    while($celdas[$i][1]!="")
    {
    $cuenta=$celdas[$i][1];
    $pago=$celdas[$i][2];
    $nombre=$celdas[$i][3];
    //$m.=" $cuenta -  $pago - $nombre \n";
    
    
$cuenta_f =$cuenta;
//asegura que la cuenta tenga 10 digitos de longitud y rellena con un cero del lado izquierdo para completar los 10 digitos
$cuenta =str_pad($cuenta_f,10, '0',STR_PAD_LEFT);

$column1 = "000000001";

$column2 = "99".$cuenta;
//(int)$pago*100
//
$monto_total = $pago * 100;
$column3 =str_pad((string)$monto_total,15, '0',STR_PAD_LEFT);

$column4 = $nombre;
$column5 = "001001";
//                             agrega 16 espacios                            agrega 10 espacios                         sgrega un tamaño de 40 y rellena con puntitos lo faltante
$content = $column1.str_repeat('&nbsp;', 16).$column2.str_repeat('&nbsp;', 10).$column3.str_pad($column4,40, '.').$column5."\n";
//                              Remplaza los puntos por espacios
$m.= str_replace(".","&nbsp;",$content);


$i++;
    }
    
$fp = fopen('xxx.txt', 'w');
fwrite($fp, $m);
fclose($fp);

//read the entire string
$str=file_get_contents('xxx.txt');
//replace something in the file string - this is a VERY simple example
$texto = str_replace("&nbsp;"," ",$str);
//write the entire string
file_put_contents('xxx.txt', $texto);

$file_url = 'C:\inetpub\wwwroot\nominas\xxx.txt';
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
readfile($file_url);
?>