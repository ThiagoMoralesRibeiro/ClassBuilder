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
		<form action='' method='post'  id= Estoque>
			<div class='form-group'>
				<label for='desc'>IdEstoque</label>
				<input type='number ' name='idEstoque' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>IdProduto</label>
				<input type='number ' name='idProduto' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtEntrada</label>
				<input type='text' name='dtEntrada' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Quantidade</label>
				<input type='number ' name='quantidade' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtFabricacao</label>
				<input type='text' name='dtFabricacao' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>DtVencimento</label>
				<input type='text' name='dtVencimento' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>NfCompra</label>
				<input type='text' name='nfCompra' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>PrecoCompra</label>
				<input type='number' name='precoCompra' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>IcmsCompra</label>
				<input type='number' name='icmsCompra' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>PrecoVenda</label>
				<input type='number' name='precoVenda' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>QtdVendida</label>
				<input type='number ' name='qtdVendida' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>QtdOcorrencia</label>
				<input type='number ' name='qtdOcorrencia' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Ocorrencia</label>
				<input type='text' name='ocorrencia' class='form-control' >
			</div>
			<button type='submit' class='btn btn-dark' id='btn-confirma'>Submit</button>
		</form>
	</div>
</body>
</html>