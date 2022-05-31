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
		<form action='' method='post'  id= Usuarios>
			<div class='form-group'>
				<label for='desc'>IdUsuario</label>
				<input type='number ' name='idUsuario' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Email</label>
				<input type='text' name='email' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Senha</label>
				<input type='text' name='senha' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>IdNivelUsuario</label>
				<input type='number ' name='idNivelUsuario' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Nome</label>
				<input type='text' name='nome' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Cpf</label>
				<input type='text' name='cpf' class='form-control' >
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
				<label for='desc'>Foto</label>
				<input type='text' name='foto' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Ativo</label>
				<input type='text' name='ativo' class='form-control' >
			</div>
			<button type='submit' class='btn btn-dark' id='btn-confirma'>Submit</button>
		</form>
	</div>
</body>
</html>