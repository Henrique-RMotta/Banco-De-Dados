<?php
class ServicoDAO {
    private $conn;
    public function __construct(){
         $this->conn = new mysqli("localhost","root","senaisp","OficinaMecanicaSomativa");
     }

    public function criar($nome, $detalhes, $data_inicio, $data_fim, $status, $valor, $PE_ID, $VEI_ID, $MEC_ID,$CLI_ID)
    {
        try {
            $nome = $this->conn->real_escape_string($nome);
            $detalhes = $this->conn->real_escape_string($detalhes);
            $data_inicio = $this->conn->real_escape_string($data_inicio);
            $data_fim = $this->conn->real_escape_string($data_fim);
            $status = $this->conn->real_escape_string($status);
            // tratar PE_ID vindo do form: '' ou 'NULL' -> SQL NULL, caso contrário inteiro
            if ($PE_ID === '' || $PE_ID === null || strtoupper($PE_ID) === 'NULL') {
                $peIdPart = "NULL";
            } else {
                $peIdPart = intval($PE_ID);
            }

            // garantir inteiros para VEI_ID ,MEC_ID  e CLI_ID
            $veiIdPart = intval($VEI_ID); 
            $mecIdPart = intval($MEC_ID);
            $cliIdPart = intval($CLI_ID);
            // tratar valor (NULL ou número)
            if ($valor === '' || $valor === null) {
                $valorPart = "NULL";
            } else {
                $valor = str_replace(',', '.', $valor);
                $valorPart = "'" . $this->conn->real_escape_string($valor) . "'";
            }

            $sql = "INSERT INTO SERVICO 
                (SE_NOME, SE_DETALHES, SE_DATA_INICIO, SE_DATA_FIM, SE_STATUS, SE_VALOR, PE_ID, VEI_ID, MEC_ID,CLI_ID)
                VALUES
                ('$nome','$detalhes','$data_inicio','$data_fim','$status', $valorPart, $peIdPart, $veiIdPart, $mecIdPart,$cliIdPart)";

            $this->conn->query($sql);
        } catch (Exception $e) {
            echo "Erro ao tentar criar:" . $e;
        }
    }
    public function listar()
    {
        $result = $this->conn->query("SELECT 
                    s.SE_ID, s.SE_NOME, s.SE_DETALHES, s.SE_DATA_INICIO, s.SE_DATA_FIM, s.SE_STATUS, s.SE_VALOR,
                    p.PE_NOME AS PECA_NOME, v.VEI_MODELO, m.MEC_NOME, c.CLI_NOME
                FROM SERVICO s
                LEFT JOIN PECAS p ON s.PE_ID = p.PE_ID
                LEFT JOIN VEICULO v ON s.VEI_ID = v.VEI_ID
                LEFT JOIN MECANICO m ON s.MEC_ID = m.MEC_ID
                LEFT JOIN CLIENTE c ON v.CLI_ID = c.CLI_ID
                ORDER BY s.SE_DATA_INICIO DESC");

        echo "<table>";
        echo "<tr>
                <th>ID</th><th>Serviço</th><th>Detalhes</th><th>Data Início</th><th>Data Fim</th>
                <th>Status</th><th>Valor</th><th>Peça</th><th>Veículo</th><th>Mecânico</th><th>Cliente</th><th>Deletar</th><th>Atualizar</th>
              </tr>";

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['SE_ID']}</td>
                    <td>{$row['SE_NOME']}</td>
                    <td>{$row['SE_DETALHES']}</td>
                    <td>{$row['SE_DATA_INICIO']}</td>
                    <td>{$row['SE_DATA_FIM']}</td>
                    <td>{$row['SE_STATUS']}</td>
                    <td>{$row['SE_VALOR']}</td>
                    <td>{$row['PECA_NOME']}</td>
                    <td>{$row['VEI_MODELO']}</td>
                    <td>{$row['MEC_NOME']}</td>
                    <td>{$row['CLI_NOME']}</td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='acao' value='deletar'>
                            <input type='hidden' name='id' value='{$row['SE_ID']}'>
                            <button type='submit'>Deletar</button>
                        </form>
                    </td>
                    <td>
                        <a href='atualizarServico.php?se_id={$row['SE_ID']}&se_nome={$row['SE_NOME']}&se_detalhes={$row['SE_DETALHES']}&se_data_inicio={$row['SE_DATA_INICIO']}&se_data_fim={$row['SE_DATA_FIM']}&se_status={$row['SE_STATUS']}&se_valor={$row['SE_VALOR']}&pe_nome={$row['PECA_NOME']}&vei_modelo={$row['VEI_MODELO']}&mec_nome={$row['MEC_NOME']}'>
                            <button type='button'>Atualizar</button>
                        </a>
                    </td>
                </tr>
                ";
            }
        }

        echo "</table>";
    }

    public function atualizar($ID, $novonome, $detalhes, $data_inicio, $data_fim, $status,$valor,$PE_ID,$VEI_ID,$MEC_ID,$CLI_ID)
    {
        // sanitização básica
        $ID = intval($ID);
        $novonome = $this->conn->real_escape_string($novonome);
        $detalhes = $this->conn->real_escape_string($detalhes);
        $data_inicio = $this->conn->real_escape_string($data_inicio);
        $data_fim = $this->conn->real_escape_string($data_fim);
        $status = $this->conn->real_escape_string($status);

        // tratar PE_ID vindo do form: '' / null / 'NULL' -> SQL NULL, caso contrário inteiro
        if ($PE_ID === '' || $PE_ID === null || strtoupper($PE_ID) === 'NULL') {
            $peIdPart = "NULL";
        } else {
            $peIdPart = intval($PE_ID);
        }

        // garantir inteiros para VEI_ID e MEC_ID
        $veiIdPart = intval($VEI_ID);
        $mecIdPart = intval($MEC_ID);
        $cliIdPart = intval($CLI_ID);
        // tratar valor (NULL ou número)
        if ($valor === '' || $valor === null) {
            $valorPart = "NULL";
        } else {
            $valor = str_replace(',', '.', $valor);
            $valorPart = "'" . $this->conn->real_escape_string($valor) . "'";
        }

        $sql = "UPDATE SERVICO SET
                    SE_NOME = '$novonome',
                    SE_DETALHES = '$detalhes',
                    SE_DATA_INICIO = '$data_inicio',
                    SE_DATA_FIM = '$data_fim',
                    SE_STATUS = '$status',
                    SE_VALOR = $valorPart,
                    PE_ID = $peIdPart,
                    VEI_ID = $veiIdPart,
                    MEC_ID = $mecIdPart,
                    CLI_ID = $cliIdPart
                WHERE SE_ID = '$ID'";

        $this->conn->query($sql);
    }

    public function deletar($id)
    {
        $this->conn->query("DELETE from SERVICO where SE_ID = '$id'");
    }

    public function buscarVeiculosID() {
        $result = $this->conn->query("SELECT VEI_ID, VEI_MODELO FROM VEICULO ORDER BY VEI_MODELO");
        
        while ($row = $result->fetch_assoc()){
            echo "<option value='{$row['VEI_ID']}'>{$row['VEI_MODELO']}</option>";
        }
    }

    public function buscarMecanicosID() {
        $result = $this->conn->query("SELECT MEC_ID, MEC_NOME FROM MECANICO ORDER BY MEC_NOME");
        
        while ($row = $result->fetch_assoc()){
            echo "<option value='{$row['MEC_ID']}'>{$row['MEC_NOME']}</option>";
        }
    }   

      public function buscarClientesID() {
        $result = $this->conn->query("SELECT CLI_ID, CLI_NOME FROM CLIENTE ORDER BY CLI_NOME");
        
        while ($row = $result->fetch_assoc()){
            echo "<option value='{$row['CLI_ID']}'>{$row['CLI_NOME']}</option>";
        }
    }

    public function buscarPecasID() {
        $result = $this->conn->query("SELECT PE_ID, PE_NOME FROM PECAS ORDER BY PE_NOME");
        
        while ($row = $result->fetch_assoc()){
            echo "<option value='{$row['PE_ID']}'>{$row['PE_NOME']}</option>";
        }
    }
}

?>