<?php
include "../Conn/conexao.php";
$return = '';
if (isset($_POST["datahora"])) {
    $datahora = mysqli_real_escape_string($conn, $_POST["datahora"]);
    $datahora = "SELECT frota.placa, checklist.id, motorista.nome, checklist.datahora, checklist.sig 
    FROM frota, motorista, checklist 
    where checklist.id_frota = frota.id 
    and checklist.id_motorista = motorista.id and datahora like '%$datahora%'
    order by checklist.datahora 
    DESC;";
} else {
    $datahora = "SELECT frota.placa, checklist.id, motorista.nome, checklist.datahora, checklist.sig 
    FROM frota, motorista, checklist 
    where checklist.id_frota = frota.id 
    and checklist.id_motorista = motorista.id
    order by checklist.datahora 
    DESC;";
}
$dados = mysqli_query($conn, $datahora);
if (mysqli_num_rows($dados) > 0) {
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <tr>
            <td class="tg-tr">' . $linha["nome"] . '</td>
            <td class="tg-tr" id="frotaTd">' . $linha["placa"] . '</td>
            <td class="tg-tr" id="saidaTd">' . $linha["datahora"] . '</td>
            <td class="tg-tr" id="detalhesTd"><a href="detalhesRelatorio.php?check=' . $linha["id"] . '">DETALHES</td>
            <td class="tg-tr" id="assinaturaTd"><img src="' . $linha["sig"] . '"/></td>
            </form>
        </tr>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}
