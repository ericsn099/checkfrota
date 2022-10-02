<?php
include "../Conn/conexao.php";
$return = '';
$sqlChecklist = "SELECT * FROM tipocaminhao";
$dados = mysqli_query($conn, $sqlChecklist);
if (mysqli_num_rows($dados) > 0) {
    echo "<option>SELECIONE UM TIPO DE FROTA</option>";
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <option  value="' . $linha["id"] . '">' . $linha["nome"] . ' </option>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}

