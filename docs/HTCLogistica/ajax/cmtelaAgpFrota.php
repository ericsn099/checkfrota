<?php
include "../Conn/conexao.php";
$return = '';
$sqlTipo = "SELECT * FROM frota ORDER BY placa ASC";
$dados = mysqli_query($conn, $sqlTipo);
if (mysqli_num_rows($dados) > 0) {
    echo '<option value="">PLACA</option>';
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <option  value="' . $linha["id"] . '">' . $linha["placa"] . ' </option>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}
