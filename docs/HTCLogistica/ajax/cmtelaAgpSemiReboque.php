<?php
include "../Conn/conexao.php";
$return = '';
$sqlTipo = "SELECT id, placar FROM reboque WHERE id > 1 ORDER BY placar ASC";
$dados = mysqli_query($conn, $sqlTipo);
if (mysqli_num_rows($dados) > 0) {
    echo '<option value="1">SEMI REBOQUE</option>';
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <option  value="' . $linha["id"] . '">' . $linha["placar"] . ' </option>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}
