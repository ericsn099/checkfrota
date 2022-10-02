<?php
require_once "../Conn/conexao.php";
require_once "../Modelo/Frota.php";
$return = '';
if (isset($_POST["sqlChecklist"])) {
    $placa = mysqli_real_escape_string($conn, $_POST["sqlChecklist"]);
    $sqlChecklist = "SELECT frota.id, frota.placa, tipocaminhao.nome 
    FROM frota, tipocaminhao 
    WHERE frota.id_tipocaminhao = tipocaminhao.id and frota.placa like '%$placa%'
    ORDER BY frota.placa 
    ASC; ";
} else {
    $sqlChecklist = "SELECT frota.id, frota.placa, tipocaminhao.nome 
    FROM frota, tipocaminhao 
    WHERE frota.id_tipocaminhao = tipocaminhao.id
    ORDER BY frota.placa 
    ASC; ";
}
$dados = mysqli_query($conn, $sqlChecklist);
if (mysqli_num_rows($dados) > 0) {
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <tr>
            <td class="tg-tr">' . $linha["placa"] . '</td>
            <td class="tg-tr">' . $linha["nome"] . '</td>
            <td class="tg-tr"><a href="alterarFrota.php?id=' . $linha["id"] . '">ALTERAR</td>
            <td class="tg-tr"><a href="../Controller/excluir_frota.php?id=' . $linha["id"] . '">EXCLUIR</td>
        </tr>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}