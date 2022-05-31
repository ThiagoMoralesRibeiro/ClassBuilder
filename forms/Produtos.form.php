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
		<form action='' method='post'  id= Produtos>
			<div class='form-group'>
				<label for='desc'>IdProduto</label>
				<input type='number ' name='idProduto' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Fabricante</label>
				<input type='text' name='fabricante' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Nome</label>
				<input type='text' name='nome' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Marca</label>
				<input type='text' name='marca' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Modelo</label>
				<input type='text' name='modelo' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>IdCategoria</label>
				<input type='number ' name='idCategoria' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Descricao</label>
				<input type='text' name='descricao' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>UnidadeMedida</label>
				<input type='text' name='unidadeMedida' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Largura</label>
				<input type='number' name='largura' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Altura</label>
				<input type='number' name='altura' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Profundidade</label>
				<input type='number' name='profundidade' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Peso</label>
				<input type='number' name='peso' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Cor</label>
				<input type='text' name='cor' class='form-control' >
			</div>
			<button type='submit' class='btn btn-dark' id='btn-confirma'>Submit</button>
		</form>
	</div>
</body>
</html>