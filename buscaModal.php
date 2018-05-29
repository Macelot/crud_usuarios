<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="icon" href="/favicon.ico" />

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Teste selects..</title>
		<link href="./style/estilo.css" rel="stylesheet">

		<!-- Animate.css -->
		<link rel="stylesheet" href="./css/animate.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="./css/magnific-popup.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="./css/icomoon.css">
		<!-- Theme style  -->
		<!--link rel="stylesheet" href="./css/style2.css"-->

		<!-- para selects-->
		<link rel="stylesheet" href="./bootstrap-3.3.4/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="./bootstrap-select-1.12.4/dist/css/bootstrap-select.css">
		<script src="./jquery/1.11.3/jquery.min.js"></script>
		<script src="./bootstrap-3.3.4/dist/js/bootstrap.min.js"></script>
		<script src="./bootstrap-select-1.12.4/dist/js/bootstrap-select.js"></script>

	</head>
<?php
// Incluir aquivo de conexão
spl_autoload_register(function($class) {
	include './classesBanco/' . $class . '.php';
});
$usuario = new Usuarios();



// Recebe o valor enviado
$digitou = $_GET['valor'];
$pagina = $_GET['pagina'];
$ordem = $_GET['ordem'];
$tipo = $_GET['tipo'];

echo "<thead>".
	"<tr class='active'>".
		"<th width='5%'>Id</th>".
		"<th width='20%'>Nome</th>".
		"<th width='20%'>E-mail</th>".
		"<th width='15%'>Salário</th>".
		"<th width='10%'>Sexo</th>".
		"<th width='10%'>Raça</th>".
	  "<th width='20%' colspan='2'>Operações</th>".
	  "</tr>".
"</thead>";

// Procura titulos no banco relacionados ao valor
foreach ($usuario->findAllSelect($digitou,0,$ordem,$tipo) as $key => $value) {

//$s="SELECT * FROM tblUsuario WHERE tblUsuario_nome LIKE '%".$digitou."%' OR  tblUsuario_email LIKE '%".$digitou."%' LIMIT ".$pagina.",10;";
//echo $s;
//$sql = mysql_query($s);

// Exibe todos os valores encontrados


	echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$value->tblUsuario_id."')\">" .
	"<tr>".
	"<td>".$value->tblUsuario_id."</td>".
	"<td>".$value->tblUsuario_nome."</td><td>".$value->tblUsuario_email."</td>".
	 "<td>".$value->tblUsuario_salario."</td><td>".$value->tblUsuario_sexo."</td>".
	 "<td>".$value->tblUsuario_raca."</td>".
	 "<td><button type='button' class='btn btn-info' name='excluir_ui' onclick=\"selecionar(".$value->tblUsuario_id.",'".$value->tblUsuario_nome."');\" >Selecionar</button></td>".
	 "</tr>";
}
// Acentuação
//header("Content-Type: text/html; charset=UTF-8",true);
?>
