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
		<form action='' method='post'  id= Institucional>
			<div class='form-group'>
				<label for='desc'>IdInstituicao</label>
				<input type='number ' name='idInstituicao' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Nome</label>
				<input type='text' name='nome' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Cpf_cnpj</label>
				<input type='text' name='cpf_cnpj' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>TipoPessoa</label>
				<input type='text' name='tipoPessoa' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Endereco</label>
				<input type='text' name='endereco' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Bairro</label>
				<input type='text' name='bairro' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Cidade</label>
				<input type='text' name='cidade' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Uf</label>
				<input type='text' name='uf' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Cep</label>
				<input type='text' name='cep' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Telefone</label>
				<input type='text' name='telefone' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Email</label>
				<input type='text' name='email' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Logo</label>
				<input type='text' name='logo' class='form-control' >
			</div>
			<button type='submit' class='btn btn-dark' id='btn-confirma'>Submit</button>
		</form>
	</div>
</body>
</html>