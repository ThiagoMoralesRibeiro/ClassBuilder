<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<title>Form PHP</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
	<script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>
	<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
	<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
</head>
<body>
	<div class='container m-5 p-5'>
		<h2>Insert form</h2>
		<form action='' method='post'  id= Pedidos>
			<div class='form-group'>
				<label for='desc'>IdPedido</label>
				<input type='number ' name='idPedido' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>IdUsuario</label>
				<input type='number ' name='idUsuario' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtPedido</label>
				<input type='date' ='dtPedido' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtPagamento</label>
				<input type='date' ='dtPagamento' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtNotaFiscal</label>
				<input type='date' ='dtNotaFiscal' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>NotaFiscal</label>
				<input type='text' name='notaFiscal' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtEnvio</label>
				<input type='date' ='dtEnvio' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtRecebimento</label>
				<input type='date' ='dtRecebimento' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>TipoFrete</label>
				<input type='number ' name='tipoFrete' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>RastreioFrete</label>
				<input type='text' name='rastreioFrete' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Entregaendereco</label>
				<input type='text' name='entregaendereco' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaNumero</label>
				<input type='text' name='entregaNumero' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaCompl</label>
				<input type='text' name='entregaCompl' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaBairro</label>
				<input type='text' name='entregaBairro' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaCidade</label>
				<input type='text' name='entregaCidade' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaUF</label>
				<input type='text' name='entregaUF' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaCEP</label>
				<input type='text' name='entregaCEP' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaTelefone</label>
				<input type='text' name='entregaTelefone' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>EntregaRefer</label>
				<input type='text' name='entregaRefer' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>ValorTotal</label>
				<input type='number' name='valorTotal' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>QtdItems</label>
				<input type='number ' name='qtdItems' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtDevolucao</label>
				<input type='date' ='dtDevolucao' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>MotivoDevolucao</label>
				<input type='text' name='motivoDevolucao' class='form-control' >
			</div>
			<button type='submit' class='btn btn-dark' id='btn-confirma'>Submit</button>
		</form>
	</div>
</body>
</html>