<?php
class ClienteDAO {
    private $conn;
     public function __construct(){
         $this->conn = new mysqli("localhost","root","senaisp","OficinaMecanicaSomativa");
     }
    public function criar($nome,$celular,$CPF,$CEP,$DATANASC) {
        try {
            $this->conn->query("CREATE TABLE IF NOT EXISTS CLIENTE (
                CLI_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL PRIMARY KEY,
                CLI_NOME VARCHAR(60) NOT NULL,
                CLI_CELULAR VARCHAR(14) NOT NULL,
                CLI_CPF VARCHAR(14) NOT NULL,
                CLI_CEP VARCHAR(9) NOT NULL,
                CLI_DATANASC DATE NOT NULL
            );");
           $this->conn->query("INSERT INTO Cliente(CLI_NOME,CLI_CELULAR,CLI_CPF,CLI_CEP,CLI_DATANASC) values ('$nome','$celular','$CPF','$CEP','$DATANASC') ");
        } catch (Exception $e) {
            echo "Erro ao tentar criar:" . $e;
        }
       } 
    public function listar () {
            $result = $this->conn->query("SELECT * FROM CLIENTE");
            echo "<table>";
            echo "<tr><th>id</th><th>Nome</th><th>Celular</th><th>CPF</th><th>CEP</th><th>Data_Nasc</th><th>Deletar</th><th>Atualizar</th></tr>";
            while ($row = $result -> fetch_assoc()) {
                echo "
                <tr> 
                <td>{$row['CLI_ID']}</td>
                <td>{$row['CLI_NOME']}</td>
                <td>{$row['CLI_CELULAR']}</td>
                <td>{$row['CLI_CPF']}</td>
                <td>{$row['CLI_CEP']}</td>
                <td>{$row['CLI_DATANASC']}</td>
                <td>
                    <form method='POST'>
                    <input type='hidden' name='acao' value='deletar'>
                    <input type='hidden' name='id' value='{$row['CLI_ID']}'>
                    <button type='submit'>Deletar</button>
                    </form>
                </td>
                <td> 
                    <a href='atualizarCliente.php?cli_id={$row['CLI_ID']}&cli_nome={$row['CLI_NOME']}&cli_celular={$row['CLI_CELULAR']}&cli_cpf={$row['CLI_CPF']}&cli_cep={$row['CLI_CEP']}&cli_datanasc={$row['CLI_DATANASC']}'><button type='button'>Atualizar</button></a>
                </tr>
                ";
            }       
    }

    public function atualizar($ID,$nomenovo,$celularnovo,$novocpf,$novocep,$novadatanasc) {
        $this->conn->query("UPDATE CLIENTE SET CLI_NOME = '$nomenovo', CLI_CELULAR = '$celularnovo', CLI_CPF = '$novocpf', CLI_CEP = '$novocep', CLI_DATANASC = '$novadatanasc' WHERE CLI_ID = '$ID'");
    }

    public function deletar($id){
        $this->conn->query("DELETE from CLiente where CLI_ID = '$id'");
    }
     
    }

?>