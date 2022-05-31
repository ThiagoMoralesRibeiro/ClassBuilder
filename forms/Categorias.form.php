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
		<form action='' method='post'  id= Categorias>
			<div class='form-group'>
				<label for='desc'>IdCategoria</label>
				<input type='number ' name='idCategoria' class='form-control' >
			</div>
			<div class='form-group'>
				<label for='desc'>Descricao</label>
				<input type='text' name='descricao' class='form-control' >
			</div>
			<button type='submit' class='btn btn-dark' id='btn-confirma'>Submit</button>
		</form>
	</div>
</body>
</html>