

	<script>

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



	</script>
<script type="text/javascript" src="./js/funcsModal.js"></script>
<script type="text/javascript" src="./js/functions.js"></script>
<body>
<?php

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
				Total de Usuários <b><?php echo $usuario->descobreTotal($digitou)->total;?></b>
			  </td>
			</tr>
		<!--tr>
			<td colspan="2"><input class="w3-button w3-button w3-input w3-border w3-hover-blue" type="submit" value="Procurar" name="submit2"></td>
		</tr-->
	</table>




<table id="products-table" class="table table-striped table-bordered table-hover">
<div id="resultado">

</div>
<br /><br />

<thead>
	<tr class="active">
		<th width='5%'>Id </th>
		<th width='20%'>Nome</th>
		<th width='20%'>E-mail</th>
		<th width='15%'>Salário</th>
		<th width='10%'>Sexo</th>
		<th width='10%'>Raça</th>
	  <th width='20%' colspan='2'>Operações</th>
	  </tr>
</thead>
 <tbody>
<div id="conteudo">
<?php
//echo "buscando....";
foreach ($usuario->findAllSelect($digitou,$pagina,$ordem,$tipo) as $key => $value) {
	echo "<tr>";
	echo "<td class='text-center'>".$value->tblUsuario_id."</td>";
	echo "<td class='text-center'>".$value->tblUsuario_nome."</td><td>".$value->tblUsuario_email."</td>";
	echo "<td class='text-center'>".$value->tblUsuario_salario."</td><td>".$value->tblUsuario_sexo."</td>";
	echo "<td class='text-center'>".$value->tblUsuario_raca."</td>";?>
	<td>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="selecionar(<?php echo $value->tblUsuario_id;?>,'<?php echo $value->tblUsuario_nome;?>');">Selecionar</button>

	</td>
	</tr>
	<?php
}
?>
</div>
</tbody>
</table>


</form>


</body>
</html>
