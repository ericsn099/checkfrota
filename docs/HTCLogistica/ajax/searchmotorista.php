<?php
include "../Conn/conexao.php";
$return = '';
if (isset($_POST["sqlChecklist"])) {
    $checar = mysqli_real_escape_string($conn, $_POST["sqlChecklist"]);
    $sqlChecklist = "SELECT * 
    FROM motorista WHERE nome like '%$checar%' or cpf like '%$checar%' or habilitacao like '%$checar%'
    ORDER BY motorista.nome 
    ASC; ";
} else {
    $sqlChecklist = "SELECT * 
    FROM motorista
    ORDER BY motorista.nome 
    ASC; ";
}
$dados = mysqli_query($conn, $sqlChecklist);
if (mysqli_num_rows($dados) > 0) {
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <tr>
            <td class="tg-tr">'. $linha['nome'] .'</td>
            <td class="tg-tr">'. $linha['cpf'] .'</td>
            <td class="tg-tr">'. $linha['habilitacao'] .'</td>
            <td class="tg-tr"><a href="alterarMotorista.php?id= '. $linha['id'] .'">ALTERAR</td>
            <td class="tg-tr"><a href="../Controller/excluir_motorista.php?id='. $linha['id'] .'">EXCLUIR</td>
        </tr>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}