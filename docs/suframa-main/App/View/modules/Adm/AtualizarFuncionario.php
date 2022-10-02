<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/styleIndex.css" />
	<title>Principal</title>
</head>

<body>
	<div class="container">
		<div class="container-area">
			<form action="../Controller/atualizar_funcionario.php" method="POST">
				<div class="input-item">
					<div class="icon">
						<i class="fa-solid fa-file-signature"></i>
					</div>
					
						<input type='hidden' name='id' value=""  required />
						<input type='hidden' name='nome' placeholder='Digite seu nome' value="" required />
				</div>
				<div class="input-item">
					<div class="icon">
						<i class="fa-solid fa-id-card"></i>
					</div>
					<input type="number" name="cpf" placeholder="Digite seu cpf" value="" onkeydown="return FilterInput(event)" onpaste="handlePaste(event)" required />
				</div>
				<div class="input-item">
					<div class="icon">
						<i class="fa-sharp fa-solid fa-user"></i>

					</div>
					<input type="text" name="login" placeholder="Digite seu login" value="" required />
				</div>
				<div class="input-item">
					<div class="icon">
						<i class="fa-solid fa-lock"></i>
					</div>
					<input type="password" name="senha" placeholder="Digite sua senha" value="" required />
				</div>
				<div class="info-select" >
					<label for="">Área de atuação atual: </label><br>
					<label for="">Cargo atual: </label><br>
					<label for="">Tipo de user atual: </label><br>
				</div>
			
			<div class="input-item">
				<select name="area_atuacao_id" id="area_atuacao_id" class="select">
					<option value="">Área de Atuação </option>
					
				</select>
			</div>
			<div class="input-item">
				<select name="cargo_id" id="cargo_id" class="select">
					<option value="">Cargo</option>
					
				</select>
			</div>
			<div class="input-item">
				<select name="usuario" id="usuario" class="select">
					<option value="">Tipo de usuário </option>
					<option value="2">Usuário</option>
					<option value="1">Administrador </option>
				</select>
			</div>

			<div class=" entrar">
				<input type="submit" value="salvar" />
			</div>
			<a href="/adm">VOLTAR</a>
			</form>
		</div>
	</div>
</body>

</html>