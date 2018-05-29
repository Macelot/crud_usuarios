<!--https://silviomoreto.github.io/bootstrap-select/examples/-->
<!--http://www.andrebuzzo.com.br/sistema-de-login-e-senha-criptografados-parte-01/#.Wvn5LS_OoWo-->
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

	<script>

		function fn_exluir(valor) {
			if(confirm("ATENÇÃO!! Tem certeza que deseja continuar?")){
				document.getElementById("id_ui").value=valor;
				document.getElementById("MyUploadForm").submit();
			}
		}
		function fn_alterar(valor) {
			document.getElementById("id_uiAlterar").value=valor;
			//alert(valor);
			document.getElementById("MyUploadForm").action="cadastro.php?id_Alt="+valor;
			document.getElementById("MyUploadForm").submit();
		}
		function vai(){
			document.getElementById("MyUploadForm").submit();
		}
		function abrePagina(ondeVai,busca){
			//alert(onde);
			if (busca==undefined)
			busca = "";
			console.log(ondeVai);
			ondeVai=(ondeVai-1)*10;
			//window.location.replace("lista.php?busca=SIM&buscar="+busca+"&pagina="+ondeVai+"&onde=ini");
			window.open("lista.php?busca=SIM&buscar="+busca+"&pagina="+ondeVai,"_self");
			//location.href("lista.php?busca=SIM&buscar="+busca+"&pagina="+ondeVai);
			//document.getElementById("MyUploadForm").submit();
		}
		  $('select[name=seleciona]').selectpicker();
    //$(window).on('load',function(){
    //    $('#myModal').modal('show');
    //});
	</script>
<script type="text/javascript" src="./js/funcs.js"></script>
<script type="text/javascript" src="./js/functions.js"></script>
<body>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
spl_autoload_register(function($class) {
	include './classesBanco/' . $class . '.php';
});
$fotoDefault="fig.jpg";

$usuario = new Usuarios();

//teste para excluir
if(isset($_POST['id_ui'])){
	//echo "excluindo";
	//echo " ".$_POST['id_ui']." ";
	//die();
	$exclui=$_POST['id_ui'];
	$usuario->delete($exclui);
	//reload();
}

$digitou="";
if(isset($_REQUEST['buscar'])){
	$digitou=$_REQUEST['buscar'];
}
$ordem="tblUsuario_id";
if(isset($_REQUEST['ordem'])){
	$ordem=$_REQUEST['ordem'];
}
$tipo="ASC";
if(isset($_REQUEST['tipo'])){
	$tipo=$_REQUEST['tipo'];
}
$pagina=0;
if(isset($_REQUEST['pagina'])){
	$pagina=$_REQUEST['pagina'];
}
if(isset($_REQUEST['onde'])){
	if($_REQUEST['onde']=="prox"){
		$tot=$usuario->descobreTotal($digitou);
		if($pagina<(intval($tot->total)-10))
			$pagina+=10;
	}
	if($_REQUEST['onde']=="ant"){
		if($pagina>0)
			$pagina-=10;
	}
	if($_REQUEST['onde']=="ini")
		$pagina=0;
	if($_REQUEST['onde']=="fim"){
		$tot=$usuario->descobreTotal($digitou);
		//          50       -           0
		$pagina=intval(($tot->total-1)/10)*10;
		//echo "...".$pagina;
	}
}
?>
<form action="lista.php" method="post" enctype="multipart/form-data" name="MyUploadForm" id="MyUploadForm">
	<table class="w3-table-all">
		<tr>
			<td align="left">
				<div class="col-lg-6">
			    <div class="input-group">
			      <input type="text" name="buscar" class="form-control" placeholder="Buscar por..." value="<?php echo $digitou;?>" onkeyup="buscarUsuarios(this.value,<?php echo $pagina;?>,'<?php echo $ordem;?>','<?php echo $tipo;?>')">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button" onclick="vai();">Buscar!</button>
			      </span>
						</div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			  </td>
			  <td>
				<button type="button" class="btn btn-success" data-toggle="modal" onclick="window.open('cadastro.php','_self');">Novo</button>
			  </td>
			  <td>
				Total de Usuários <b><?php echo $usuario->descobreTotal($digitou)->total;?></b>
			  </td>
			</tr>
		<!--tr>
			<td colspan="2"><input class="w3-button w3-button w3-input w3-border w3-hover-blue" type="submit" value="Procurar" name="submit2"></td>
		</tr-->
	</table>

	<table class="w3-table-allCenter">
		<tr>
			<td><a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&onde=ini"><i class="fa fa-angle-double-left fa-3x"></i></a></td>
			<td><a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&onde=ant"><i class="fa fa-angle-left fa-3x"></i></a></td>
			<td><select class="selectpicker" name="seleciona" onchange="abrePagina(this.selectedIndex+1,'<?php echo $digitou;?>')">
					<?php
					$to=$usuario->descobreTotal($digitou);
					$totPag=intval(($to->total-1)/10)+1;
					for($i=0;$i<$totPag;$i++){
						$che="";
						if ($i==(($pagina+10)/10)-1)
							$che="selected";
						?>
					<option value="<?php echo ($i+1);?>" <?php echo $che?>>Página <?php echo ($i+1);?></option>
					<?php
					}?>
				</select>
			</td>
			<td><a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&onde=prox"><i class="fa fa-angle-right fa-3x"></i></a></td>
			<td><a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&onde=fim"><i class="fa fa-angle-double-right fa-3x"></i></a></td>
		</tr>
	</table>


<table id="products-table" class="table table-striped table-bordered table-hover">
<div id="resultado">

</div>
<br /><br />

<thead>
	<tr class="active">
		<th width='7%'nowrap>Id <a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&ordem=tblUsuario_id&tipo=ASC"><i class="fa fa-angle-up"></i></a>
						  <a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&ordem=tblUsuario_id&tipo=DESC"><i class="fa fa-angle-down"></i></a></th>
		<th width='20%'>Nome</th>
		<th width='18%'>E-mail</th>
		<th width='15%'>Salário <a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&ordem=tblUsuario_salario&tipo=ASC"><i class="fa fa-angle-up"></i></a>
						  <a href="lista.php?busca=SIM&buscar=<?php echo $digitou;?>&pagina=<?php echo $pagina;?>&ordem=tblUsuario_salario&tipo=DESC"><i class="fa fa-angle-down"></i></a></th>
		<th width='10%'>Sexo</th>
		<th width='10%'>Raça</th>
	  <th width='20%' colspan='2'>Operações</th>
	  </tr>
</thead>
 <tbody>
<div id="conteudo">
<?php
//echo "buscando....";$nombre_format_francais = number_format($number, 2, ',', ' ');
foreach ($usuario->findAllSelect($digitou,$pagina,$ordem,$tipo) as $key => $value) {
	echo "<tr>";
	echo "<td class='text-center'>".$value->tblUsuario_id."</td>";
	echo "<td class='text-center'>".$value->tblUsuario_nome."</td><td>".$value->tblUsuario_email."</td>";
	echo "<td class='text-center'>".number_format($value->tblUsuario_salario,2, ',', '.')."</td><td>".$value->tblUsuario_sexo."</td>";
	echo "<td class='text-center'>".$value->tblUsuario_raca."</td>";?>
	<td>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="fn_alterar(<?php echo $value->tblUsuario_id;?>);">Alterar</button>

			<button type="button" class="btn btn-danger" name="excluir_ui" onclick="fn_exluir(<?php echo $value->tblUsuario_id;?>);" >Excluir</button>
	</td>
	</tr>
	<?php
}
?>
</div>
</tbody>
</table>
<input name="id_ui" id="id_ui" type="hidden" value=""/>
<input name="id_uiAlterar" id="id_uiAlterar" type="hidden" value=""/>

</form>


 <script>
 	$('select[name=seleciona]').val(<?php echo (($pagina+10)/10);?>);
 	$('.selectpicker').selectpicker('refresh');
 </script>


 <script src="./js/script.js"></script>


</body>
</html>
