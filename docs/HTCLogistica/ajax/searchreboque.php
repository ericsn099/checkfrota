<?php
include "../Conn/conexao.php";
$return = '';
if (isset($_POST["sqlChecklist"])) {
    $placa = mysqli_real_escape_string($conn, $_POST["sqlChecklist"]);
    $sqlChecklist = "SELECT reboque.id, reboque.placar, tiporeboque.nome 
    FROM reboque, tiporeboque 
    WHERE reboque.tiporeboque_id = tiporeboque.id and reboque.id > 1 and reboque.placar like '%$placa%'
    ORDER BY reboque.placar
    ASC; ";
} else {
    $sqlChecklist = "SELECT reboque.id, reboque.placar, tiporeboque.nome 
    FROM reboque, tiporeboque 
    WHERE reboque.tiporeboque_id = tiporeboque.id and reboque.id > 1
    ORDER BY reboque.placar
    ASC; ";
}
$dados = mysqli_query($conn, $sqlChecklist);
if (mysqli_num_rows($dados) > 0) {
    while ($linha = mysqli_fetch_array($dados)) {
        $return .= '
        <tr>
            <td class="tg-tr">' . $linha["placar"] . '</td>
            <td class="tg-tr">' . $linha["nome"] . '</td>
            <td class="tg-tr"><a href="alterarReboque.php?id=' . $linha["id"] . '">ALTERAR</td>
            <td class="tg-tr"><a href="../Controller/excluir_reboque.php?id=' . $linha["id"] . '">EXCLUIR</td>
        </tr>';
    }
    echo $return;
} else {
    echo 'SEM RESULTADOS...';
}
