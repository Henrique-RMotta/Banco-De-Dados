<?php
class VeiculoDAO
{
    private $conn;
    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "senaisp", "OficinaMecanicaSomativa");
    }
    public function criar($modelo, $marca, $placa, $cor, $cli_id)
    {
        try {
            $this->conn->query("CREATE TABLE if not exists VEICULO (
            VEI_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL PRIMARY KEY,
            VEI_MODELO VARCHAR(60) NOT NULL,
            VEI_MARCA VARCHAR(60) NOT NULL,
            VEI_PLACA VARCHAR(60) NOT NULL,
            VEI_COR VARCHAR(60) NOT NULL,
            CLI_ID INT NOT NULL,
            FOREIGN KEY(CLI_ID) REFERENCES CLIENTE(CLI_ID)
);");
            $this->conn->query("INSERT INTO Veiculo(VEI_MODELO,VEI_MARCA,VEI_PLACA,VEI_COR,CLI_ID) values ('$modelo','$marca','$placa','$cor','$cli_id') ");
        } catch (Exception $e) {
            echo "Erro ao tentar criar:" . $e;
        }
    }
    public function listar()
    {
        $result = $this->conn->query("SELECT c.CLI_ID, c.CLI_NOME, v.VEI_MODELO, v.VEI_MARCA, v.VEI_PLACA, v.VEI_COR, v.VEI_ID
    FROM VEICULO v
    INNER JOIN CLIENTE c ON v.CLI_ID = c.CLI_ID 
    ORDER BY v.VEI_MODELO");

        echo "<table>";
        echo "<tr><th>ID</th><th>Modelo</th><th>Marca</th><th>Placa</th><th>Cor</th><th>Cliente</th><th>Deletar</th><th>Atualizar</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "
    <tr> 
        <td>{$row['VEI_ID']}</td>
        <td>{$row['VEI_MODELO']}</td>
        <td>{$row['VEI_MARCA']}</td>
        <td>{$row['VEI_PLACA']}</td>
        <td>{$row['VEI_COR']}</td>
        <td>{$row['CLI_NOME']}</td>
        <td>
            <form method='POST'>
                <input type='hidden' name='acao' value='deletar'>
                <input type='hidden' name='id' value='{$row['VEI_ID']}'>
                <button type='submit'>Deletar</button>
            </form>
        </td>
        <td> 
            <a href='atualizarVeiculo.php?vei_id={$row['VEI_ID']}&vei_modelo={$row['VEI_MODELO']}&vei_marca={$row['VEI_MARCA']}&vei_placa={$row['VEI_PLACA']}&vei_cor={$row['VEI_COR']}&cli_id={$row['CLI_ID']}'><button type='button'>Atualizar</button></a>
        </td>
    </tr>";
        }

        echo "</table>";
    }

    public function atualizar($ID, $modelonovo, $marcanova, $placanova, $cornova, $cli_id)
    {
        $this->conn->query("UPDATE VEICULO SET VEI_MODELO= '$modelonovo', VEI_MARCA = '$marcanova', VEI_PLACA = '$placanova', VEI_COR = '$cornova', CLI_ID = '$cli_id' WHERE VEI_ID = '$ID'");
    }

    public function deletar($id)
    {
        $this->conn->query("DELETE from VEICULO where VEI_ID = '$id'");
    }

    public function buscarClientesID()
    {
        $result = $this->conn->query("SELECT CLI_ID, CLI_NOME FROM CLIENTE ORDER BY CLI_NOME");

        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['CLI_ID']}' echo 'selected'>{$row['CLI_NOME']}</option>";
        }
    }
}
