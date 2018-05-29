<?php
session_start();
//session_destroy();
//session_unset();
//require_once 'classes/Rotas.php';
spl_autoload_register(function($class) {
    include './classesBanco/' . $class . '.php';
});
$usuarioLogado=1;
//https://stackoverflow.com/questions/34810124/fatal-error-uncaught-error-call-to-a-member-function-select-on-null
//require_once 'classes/Usuarios.php';
//https://getbootstrap.com/docs/4.0/components/forms/#how-it-works
//echo "oi";
//https://bytenota.com/php-display-a-base64-image-from-database-in-html/
//https://getbootstrap.com/docs/3.3/components/
//https://www.server-world.info/en/note?os=Debian_9&p=httpd&f=8
//https://github.com/RobinHerbots/Inputmask

$fotoDefault="fig.jpg";
?>
<!DOCTYPE html>
<html lang="pt-BR">
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
  <script src="./bootstrap-select-1.12.4/dist/js/bootstrap-select.min.js"></script>

  <script src="./inputmask-3.x/dist/jquery.inputmask.bundle.js"></script>
  <script src="./inputmask-3.x/dist/inputmask/phone-codes/phone.js"></script>
  <script src="./inputmask-3.x/dist/inputmask/phone-codes/phone-be.js"></script>
  <script src="./inputmask-3.x/dist/inputmask/phone-codes/phone-ru.js"></script>

  <script src="./jquery-maskmoney-master/dist/jquery.maskMoney.min.js" type="text/javascript"></script>

</head>


		<script>
		    var ch = '<?php echo sha1(time()); ?>';
		</script>
		<script language="JavaScript">
			function exclui() {
				if(confirm("ATENÇÃO!! Tem certeza que deseja continuar?")){
					document.Formulario.Deletar.value = "SIM";
					document.Formulario.submit();
				}
			}

			function onFileSelected(event) {
				var selectedFile = event.target.files[0];
			  var reader = new FileReader();
			  var imgtag = document.getElementById("myimage");
			  imgtag.title = selectedFile.name;
			  reader.onload = function(event) {
					imgtag.src = event.target.result;
			  };
			  reader.readAsDataURL(selectedFile);
			}
      $('select[name=selCargo]').selectpicker();
      $('select[name=selRaca]').selectpicker();
      $('select[name=selDepartamento]').selectpicker();

      function selecionar(valor,nomeGerente) {
  			document.getElementById("hddIdGerente").value=valor;
  			document.getElementById("txtGerente").value=nomeGerente;
  			$('#gerenteModal').modal('toggle');
  			//document.data-dismiss="modal";
  		}

      //funciona mas não fica legal de usar
      //$(document).ready(function(){
      //  $(txtSalario2).inputmask('R$ 999.999.999,99', { numericInput: true });
      //});

      $(function() {
        $('#txtSalario').maskMoney();
      })

      //$('#txtTelefone').inputmask({
      //  mask: ["(99) 9999-9999", "(99) 99999-9999"]
      //});
      //$('#txtTelefone').inputmask('(99) 9999[9]-9999');

      //$('#txtTelefone').inputmask({"mask": "(999) 999-9999"}); //specifying options
      $(document).ready(function(){
        $("#txtTelefone").inputmask("+55 999 99 9-9999-9999");
      });


		</script>
	<body>
  	<?php
      ini_set('display_errors', 1);
      error_reporting(E_ALL);
			$usuario = new Usuarios();
			// Cadastro de Usuario
      $formularioTipo = "Cadastrar";
			if (isset($_POST['cadastrar'])){
        date_default_timezone_set("America/Sao_Paulo");
				if(isset($_POST['txtNome'])){
			    $nome  = mb_convert_case(filter_input(INPUT_POST,"txtNome",FILTER_SANITIZE_MAGIC_QUOTES),MB_CASE_TITLE,'UTF-8');
				}else{
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> O campo Nome é obrigatório!!! </div>';
					//break;
				}
				if(isset($_POST['emlEmail']))
		    	$email = filter_input(INPUT_POST,"emlEmail",FILTER_SANITIZE_MAGIC_QUOTES);
				else
					$email="";

        if(isset($_POST['txtTelefone']))
		    	$telefone = filter_input(INPUT_POST,"txtTelefone",FILTER_SANITIZE_MAGIC_QUOTES);
				else
					$telefone="";

		    $dataCadastro = date("Y-m-d h:i:s");
				$senha  = filter_input(INPUT_POST,"pwdSenha",FILTER_SANITIZE_MAGIC_QUOTES);
				$senha2  = filter_input(INPUT_POST,"pwdSenha2",FILTER_SANITIZE_MAGIC_QUOTES);
				if($senha!=$senha2){
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> Verifique as senhas digitadas!!! </div>';
					//break;
				}
				if(isset($_POST['txtSalario'])){
					$salario = filter_input(INPUT_POST,"txtSalario",FILTER_SANITIZE_MAGIC_QUOTES);
          $salario = substr($salario,3);
          $salario = str_replace(".", "", $salario);
          $salario = str_replace(",", ".", $salario);
        }
				else
					$salario = 0;
				$cargo = filter_input(INPUT_POST,"selCargo",FILTER_SANITIZE_MAGIC_QUOTES);

				if($_FILES['filFoto']['name']){
          $fileFoto = fopen($_FILES['filFoto']['tmp_name'], "r");
					$bites = fread($fileFoto, $_FILES['filFoto']['size']);
          //$image = fopen($_FILES['filFoto']['tmp_name'], "r");
          $base64Image = base64_encode($bites);

					//$fileFoto = fopen($_FILES['filFoto']['tmp_name'], "r");
					//$bites = fread($fileFoto, $_FILES['filFoto']['size']);
					//$foto = addslashes($bites);
          $foto=$base64Image;
				}else{
					$foto = null;
				}

				$idDepartamento="";
				if( (isset($_POST['selDepartamento'])) && ($_POST['selDepartamento']!="") ){
					foreach ($_POST['selDepartamento'] as $selectedOption)
					    $idDepartamento.=$selectedOption.",";
				}
				else
					$idDepartamento = NULL;

				if( (isset($_POST['hddIdGerente'])) && ($_POST['hddIdGerente']!="") ){
					$idGerente = filter_input(INPUT_POST,"hddIdGerente",FILTER_SANITIZE_MAGIC_QUOTES);
				}
				else
					$idGerente = NULL;

				if(isset($_POST['txaObs']))
					$obs = filter_input(INPUT_POST,"txaObs",FILTER_SANITIZE_MAGIC_QUOTES);
				else
						$obs = "";


        if(isset($_POST['radGender']))
			    $sexo = $_POST['radGender'];
        else
          $sexo = "";


				$diasBanco = "";
				if(isset($_POST['chkDias'])){
          $dias = $_POST['chkDias'];
					foreach ($dias as $diasSelecionados=>$value) {
            $diasBanco.=$value.",";
			    }
        }
				if(isset($_POST['selRaca']))
					$raca = filter_input(INPUT_POST,"selRaca",FILTER_SANITIZE_MAGIC_QUOTES);
				else
					$raca = "";

        $usuario->setNome($nome);
		    $usuario->setEmail($email);
        $usuario->setTelefone($telefone);
		    $usuario->setSenha($senha);
		    $usuario->setSalario($salario);
		    $usuario->setCargo($cargo);
		    $usuario->setFoto($foto);
		    $usuario->setIdDepartamento($idDepartamento);
		    $usuario->setIdGerente($idGerente);
		    $usuario->setObs($obs);
		    $usuario->setSexo($sexo);
		    $usuario->setDias($diasBanco);
		    $usuario->setRaca($raca);
        $usuario->setUsuarioCadastro($usuarioLogado);
		    if ($usuario->insert()) {
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> Incluido com sucesso!!! </div>';
				} else {
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> Erro ao inserir!!! </div>';
      	}
			}//fecha if do cadastrar

      //Exclusão do Usuário
			//if (isset($_POST['excluir_ui'])){
			//	$id = $_POST['id_ui'];
			//	$usuario->delete($id);
			//}
      //teste para alterar
      $nome="";
      $email="";
      $telefone="";
      $senha="";
      $salario="";
      $cargo="";
      $foto="";
      $idDepartamento="";
      $idGerente="";
	  $nomeGerente="";
      $obs="";
      $sexo="";
      $diasBanco="";
      $raca="";
	  $deps[]="";
    $versao="";
    $idAltera="";
      if(isset($_POST['id_uiAlterar'])){
      	//echo "alterando";
      	//echo " ".$_POST['id_ui']." ";
      	//die();
        $idAltera=$_REQUEST['id_Alt'];
      	$alterar=$_POST['id_uiAlterar'];
      	$dados=$usuario->findUnitJoin($alterar);
        //var_dump($dados);
        $formularioTipo = "Alterar";
        $nome=$dados->tblUsuario_nome;
        $email=$dados->tblUsuario_email;
        $telefone=$dados->tblUsuario_telefone;
        $senha=$dados->tblUsuario_senha;
        $salario="R$ ".number_format($dados->tblUsuario_salario,2, ',', '.');
        $cargo=$dados->tblUsuario_cargo;
        //echo $cargo;
        $foto=$dados->tblUsuario_foto;
        //$idDepartamento=$dados->tblUsuario_idDepartamento_tblDepartamento;
        $idGerente=$dados->tblUsuario_idGerente_tblUsuario;
        $nomeGerente=$dados->nomeGerente;
        $obs=$dados->tblUsuario_observacoes;
        $sexo=$dados->tblUsuario_sexo;
        $diasBanco=$dados->tblUsuario_dias;
        $raca=$dados->tblUsuario_raca;
        $versao=$dados->tblUsuario_versao;
        //echo "vvvvvvvvvv".$versao;
      	//reload();
        //buscar departamentos do usuário
        $departamentoMostra = new Departamentos();
        $a=0;
        foreach ($departamentoMostra->findAllDepFomUser($alterar) as $key => $value) {
          echo $value->tblDepartamento_id;
          $deps[$a++]=$value->tblDepartamento_id;
          //tblDepartamento_descricao
        }
      }


			//Alterarção do Usuário
			if (isset($_POST['alterar']) ) {
				$id=$_POST['id_uii'];
        date_default_timezone_set("America/Sao_Paulo");
				if(isset($_POST['txtNome'])){
			    $nome  = filter_input(INPUT_POST,"txtNome",FILTER_SANITIZE_MAGIC_QUOTES);
				}else{
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> O campo Nome é obrigatório!!! </div>';
					//break;
				}
				if(isset($_POST['emlEmail']))
		    	$email = filter_input(INPUT_POST,"emlEmail",FILTER_SANITIZE_MAGIC_QUOTES);
				else
					$email="";

        if(isset($_POST['txtTelefone']))
		    	$telefone = filter_input(INPUT_POST,"txtTelefone",FILTER_SANITIZE_MAGIC_QUOTES);
				else
					$telefone="";

		    $dataCadastro = date("Y-m-d h:i:s");
				$senha  = filter_input(INPUT_POST,"pwdSenha",FILTER_SANITIZE_MAGIC_QUOTES);
				$senha2  = filter_input(INPUT_POST,"pwdSenha2",FILTER_SANITIZE_MAGIC_QUOTES);
				if($senha!=$senha2){
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> Verifique as senhas digitadas!!! </div>';
					//break;
				}
        if(isset($_POST['txtSalario'])){
					$salario = filter_input(INPUT_POST,"txtSalario",FILTER_SANITIZE_MAGIC_QUOTES);
          $salario = substr($salario,3);
          $salario = str_replace(".", "", $salario);
          $salario = str_replace(",", ".", $salario);
        }
				else
					$salario = 0;
				$cargo = filter_input(INPUT_POST,"selCargo",FILTER_SANITIZE_MAGIC_QUOTES);

				if($_FILES['filFoto']['name']){
          $fileFoto = fopen($_FILES['filFoto']['tmp_name'], "r");
					$bites = fread($fileFoto, $_FILES['filFoto']['size']);
          //$image = fopen($_FILES['filFoto']['tmp_name'], "r");
          $base64Image = base64_encode($bites);

					//$fileFoto = fopen($_FILES['filFoto']['tmp_name'], "r");
					//$bites = fread($fileFoto, $_FILES['filFoto']['size']);
					//$foto = addslashes($bites);
          $foto=$base64Image;
				}else{
           if(isset($_POST['fotoBanco'])){
            //echo "file";
            $bites=$_POST['fotoBanco'];
            //$foto = base64_encode($bites);
            $foto=$bites;
          }else{
            $foto = null;
          }
        }
					//$foto = null;


				$idDepartamento="";
				if( (isset($_POST['selDepartamento'])) && ($_POST['selDepartamento']!="") ){
					foreach ($_POST['selDepartamento'] as $selectedOption)
					    $idDepartamento.=$selectedOption.",";
				}
				else
					$idDepartamento = NULL;

				if( (isset($_POST['hddIdGerente'])) && ($_POST['hddIdGerente']!="") ){
					$idGerente = filter_input(INPUT_POST,"hddIdGerente",FILTER_SANITIZE_MAGIC_QUOTES);
				}
				else
					$idGerente = NULL;

				if(isset($_POST['txaObs']))
					$obs = filter_input(INPUT_POST,"txaObs",FILTER_SANITIZE_MAGIC_QUOTES);
				else
						$obs = "";


        if(isset($_POST['radGender']))
			    $sexo = $_POST['radGender'];
        else
          $sexo = "";


				$diasBanco = "";
				if(isset($_POST['chkDias'])){
          $dias = $_POST['chkDias'];
					foreach ($dias as $diasSelecionados=>$value) {
            $diasBanco.=$value.",";
			    }
        }
				if(isset($_POST['selRaca']))
					$raca = filter_input(INPUT_POST,"selRaca",FILTER_SANITIZE_MAGIC_QUOTES);
				else
					$raca = "";

        $versao =  filter_input(INPUT_POST,"hddVersao",FILTER_SANITIZE_MAGIC_QUOTES);


        $usuario->setNome($nome);
		    $usuario->setEmail($email);
        $usuario->setTelefone($telefone);
		    $usuario->setSenha($senha);
		    $usuario->setSalario($salario);
		    $usuario->setCargo($cargo);
		    $usuario->setFoto($foto);
		    $usuario->setIdDepartamento($idDepartamento);
		    $usuario->setIdGerente($idGerente);
		    $usuario->setObs($obs);
		    $usuario->setSexo($sexo);
		    $usuario->setDias($diasBanco);
		    $usuario->setRaca($raca);
        $resp=$usuario->update($id,$versao);
        if ($resp===2){
          echo '<div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Erro!</strong> Erro ao alterar!!! Você ficou muito tempo inativo. Tente novamente. </div>';
        }else if ($resp) {
          $formularioTipo = "Alterar";
					echo '<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>OK!</strong> Alterado com sucesso!!! </div>';
          //limpar campos
          $nome="";
          $email="";
          $telefone="";
          $senha="";
          $salario="";
          $cargo="";
          $foto="";
          $idDepartamento="";
          $idGerente="";
    	  $nomeGerente="";
          $obs="";
          $sexo="";
          $diasBanco="";
          $raca="";
    	  $deps[]="";
        $versao="";
        $idAltera="";

      } else {
					echo '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Erro!</strong> Erro ao alterar!!! </div>';
      	}

			}//fecha if do alterar

      ?>



	<form name="Formulario" method="post" action="cadastro.php" enctype="multipart/form-data" class="form-horizontal">
	 <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading">Formulário <?php echo $formularioTipo; ?></div>
        <div class="panel-body">

		<!-- Nome -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
      	<input name="txtNome" type="text" class="form-control" required  maxlength="30" value="<?php echo $nome;?>">
			</div>
    </div>
		<!-- E-mail -->
	  <div class="form-group">
    	<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
    		<input name="emlEmail" type="email" class="form-control" maxlength="50" value="<?php echo $email;?>">
	    </div>
		</div>
    <!-- Telefone -->
	  <div class="form-group">
    	<label class="col-sm-2 control-label">Telefone222</label>
			<div class="col-sm-10">
        <input name="txtTelefone" id="txtTelefone" type="text" class="form-control" value="<?php echo $telefone;?>">
	    </div>
		</div>
		<!-- Senha -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
				<input name="pwdSenha" type="password" class="form-control" maxlength="10" value="<?php echo $senha;?>">
			</div>
		</div>
		<!-- Repetir Senha -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Repetrir Senha</label>
			<div class="col-sm-10">
				<input name="pwdSenha2" type="password" class="form-control" value="<?php echo $senha;?>">
			</div>
		</div>
	  <!-- Salário -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Salário 22</label>
			<div class="col-sm-10">
				<input name="txtSalario" id="txtSalario" type="text" class="form-control" data-prefix="R$ "  maxlength="13" data-thousands="." data-decimal="," value="<?php echo $salario;?>">

      </div>
		</div>
		<!-- Cargo -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-10">
				<select class="selectpicker" name="selCargo" id="selCargo">
					<option value="0">Selecione um cargo</option>
					<?php
					$cargoMostra = new Cargos();
					foreach ($cargoMostra->findAll() as $key => $value) {
            $selCargo="";
            ?>
						<option value="<?php echo $value->tblCargo_id;?>"><?php echo $value->tblCargo_descricao;?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<!-- Foto -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Foto</label>
			<div class="col-sm-10">
				<?php
					if($foto==null){
						echo '<img id="myimage" class="img-fluid img-thumbnail img-responsive" src="'.$fotoDefault.'"/>';
					}else{
            echo '<input type="hidden" name="fotoBanco" value="'.$foto.'">';
						echo '<img id="myimage" class="img-fluid img-thumbnail img-responsive" src="data:image/jpeg;base64,'.$foto.'"/>';
					}?><br><br>
				<input type="file" class="form-control-file" name="filFoto" onchange="onFileSelected(event)" >
			</div>
		</div>
		<!-- Departamento -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Departamento</label>
			<div class="col-sm-10">
				<select class="selectpicker" multiple name="selDepartamento[]">
				  <option>Selecione o(s) departamento(s)</option>
					<?php
					$departamentoMostra = new Departamentos();
					foreach ($departamentoMostra->findAll() as $key => $value) {
            $selDep="";

            if(in_array($value->tblDepartamento_id, $deps)){
                $selDep="selected";?>
                <script>
                $('select[name=selDepartamento]').val(<?php echo "'".$value->tblDepartamento_id."'";?>);
                </script>
              <?php }
            ?>
						<option value="<?php echo $value->tblDepartamento_id;?>" <?php echo $selDep;?>><?php echo ($value->tblDepartamento_descricao);?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<!-- Gerente -->
		<div class="btn-group btn-group-justified" role="group">
			<div class="form-group">
				<label class="col-sm-2 control-label">Gerente</label>
				<div class="col-sm-4">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
						Clique para selecionar o <b>Gerente</b>
					</button>

				</div>
				<div class="col-sm-5">
					<input name="txtGerente" id="txtGerente"  type="text" class="form-control" value="<?php echo $nomeGerente;?>" readonly>
					<input name="hddIdGerente" id="hddIdGerente" type="hidden" class="form-control" value="<?php echo $idGerente;?>">
				</div>
			</div>
		</div>
		<!-- Observações -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Observações</label>
			<div class="col-sm-10">
				<textarea name="txaObs" class="form-control" rows="5"><?php echo $obs;?></textarea>
			</div>
		</div>
		<!-- Sexo -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Sexo</label>
			<div class="col-sm-10">
				<label class="radio-inline">
					<input type="radio" name="radGender" value="Masculino" <?php if ($sexo == "Masculino") echo "checked" ?> >Masculino
				</label>
				<label class="radio-inline">
  				<input type="radio" name="radGender" value="Feminino" <?php if ($sexo == "Feminino") echo "checked" ?>>Feminino
				</label>
				<label class="radio-inline">
  				<input type="radio" name="radGender" value="Outro" <?php if ($sexo == "Outro") echo "checked" ?>> Outro
				</label>
			</div>
		</div>
		<!-- dias -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Escolha os dias</label>
			<div class="form-check">

				<label class="checkbox-inline">
					<input type="checkbox" name="chkDias[]" value="Segunda" <?php if(strpos($diasBanco, "Segunda")!==FALSE){ echo "checked";}?> class="form-check-input">Segunda-Feira
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="chkDias[]" value="Terça" <?php if(strpos($diasBanco, "Terça")!==FALSE){ echo "checked";}?> class="form-check-input">Terça-Feira
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="chkDias[]" value="Quarta" <?php if(strpos($diasBanco, "Quarta")!==FALSE){ echo "checked";}?> class="form-check-input">Quarta-Feira
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="chkDias[]" value="Quinta" <?php if(strpos($diasBanco, "Quinta")!==FALSE){ echo "checked";}?> class="form-check-input">Quinta-Feira
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="chkDias[]" value="Sexta" <?php if(strpos($diasBanco, "Sexta")!==FALSE){ echo "checked";}?> class="form-check-input">Sexta-Feira
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="chkDias[]" value="Sábado" <?php if(strpos($diasBanco, "Sábado")!==FALSE){ echo "checked";}?> class="form-check-input">Sabado
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="chkDias[]" value="Domingo" <?php if(strpos($diasBanco, "Domingo")!==FALSE){ echo "checked";}?> class="form-check-input">Domingo
				</label>
			</div>
		</div>
		<!-- raça -->
		<div class="form-group">
			<label class="col-sm-2 control-label">Raça</label>
			<div class="col-sm-10">
				<select class="selectpicker" name="selRaca">
					<option selected>Escolha 1 opção</option>
					<option value="Branco">Branco</option>
					<option value="Pardo">Pardo</option>
					<option value="Negro">Negro</option>
				</select>
			</div>
		</div>



    <!-- botão Cadastrar -->
		<div class="form-group">
			<label class="col-sm-2 control-label"> </label>
			<div class="col-sm-10">
				<input type="hidden" name="hddVersao" value="<?php echo $versao;?>">
        <input type="hidden" name="id_uii" value="<?php echo $idAltera?>">
        <!-- botão Alterar -->
        <?php
        if(isset($_POST['id_uiAlterar'])){
        ?>
            <input name="alterar" type="submit" class="btn btn-success" value="Alterar">
        <?php
        }else{
        ?>
				    <input name="cadastrar" type="submit" class="btn btn-success" value="Cadastrar">
        <?php
        }
        ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" onclick="window.open('lista.php','_self');">Listar</button>
			</div>
		</div>
	</form>

	  </div>
  </div>

</div>

<div class="modal fade bd-example-modal-lg" id="gerenteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selecione o Gerente </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
		include('listaModal.php');
		?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <!--button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>







  <!-- Fim form cadastrar -->
  <?php
  if(isset($_POST['id_uiAlterar'])){
    ?>
    <script>
      $('select[name=selCargo]').val(<?php echo $cargo;?>);
      $('select[name=selRaca]').val(<?php echo "'".$raca."'";?>);

      $('.selectpicker').selectpicker('refresh');
    </script>
    <?php
  }
  ?>

  <script src="./js/script.js"></script>
</body>
</html>
