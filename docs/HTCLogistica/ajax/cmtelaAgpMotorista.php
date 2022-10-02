<?php
include "../Conn/conexao.php";
$return = '';
$sqlTipo = "SELECT * FROM motorista ORDER BY nome ASC";
$dados = mysqli_query($conn, $sqlTipo);
if (mysqli_num_rows($dados) > 0) {
    echo '<option value="" id="motorista">MOTORISTA</option>';
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <option  value="' . $linha["id"] . '" id="motorista" >' . $linha["nome"] . ' </option>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}
