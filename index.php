<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Contratos</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Cadastro de Contratos</h1>
    <?php
  
    require_once 'db_config.php';

  
    $sql = "SELECT Tb_banco.nome AS nome_do_banco, Tb_convenio.verba, Tb_contrato.codigo AS codigo_do_contrato, Tb_contrato.data_inclusao, Tb_contrato.valor, Tb_contrato.prazo
            FROM Tb_contrato
            JOIN Tb_convenio_servico ON Tb_contrato.convenio_servico = Tb_convenio_servico.codigo
            JOIN Tb_convenio ON Tb_convenio_servico.convenio = Tb_convenio.codigo
            JOIN Tb_banco ON Tb_convenio.banco = Tb_banco.codigo";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Nome do Banco</th>
                    <th>Verba</th>
                    <th>Código do Contrato</th>
                    <th>Data de Inclusão</th>
                    <th>Valor</th>
                    <th>Prazo</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["nome_do_banco"] . "</td>
                    <td>" . $row["verba"] . "</td>
                    <td>" . $row["codigo_do_contrato"] . "</td>
                    <td>" . $row["data_inclusao"] . "</td>
                    <td>" . $row["valor"] . "</td>
                    <td>" . $row["prazo"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }

  
    $conn->close();
    ?>
</body>
</html>


