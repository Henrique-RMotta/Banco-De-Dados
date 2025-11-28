<?php
class PecasDAO {
    private $conn;
     public function __construct(){
         $this->conn = new mysqli("localhost","root","senaisp","OficinaMecanicaSomativa");
     }
    public function criar($nome,$estado,$descricao,$veiculoscompativel,$qtde,$valor) {
        try {
            $this->conn->query("CREATE TABLE IF NOT EXISTS PECAS (
                PE_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                PE_NOME VARCHAR(60) NOT NULL,
                PE_ESTADO VARCHAR(60) NOT NULL,
                PE_DESCRICAO VARCHAR(255) NOT NULL,
                PE_VEICULOSCOMPATIVEL VARCHAR(255) NOT NULL,
                PE_QTDE INT NOT NULL,
                PE_VALOR DECIMAL(6,2) NOT NULL
            );");
           $this->conn->query("INSERT INTO PECAS(PE_NOME,PE_ESTADO,PE_DESCRICAO,PE_VEICULOSCOMPATIVEL,PE_QTDE,PE_VALOR) values ('$nome','$estado','$descricao','$veiculoscompativel','$qtde','$valor') ");
        } catch (Exception $e) {
            echo "Erro ao tentar criar:" . $e;
        }
       } 
    public function listar () {
            $result = $this->conn->query("SELECT * FROM PECAS");
            echo "<table>";
            echo "<tr><th>id</th><th>Nome</th><th>Estado</th><th>Descrição</th><th>Veículos Compatíveis</th><th>Quantidade</th><th>Valor</th><th>Deletar</th><th>Atualizar</th></tr>";
            while ($row = $result -> fetch_assoc()) {
                echo "
                <tr> 
                <td>{$row['PE_ID']}</td>
                <td>{$row['PE_NOME']}</td>
                <td>{$row['PE_ESTADO']}</td>
                <td>{$row['PE_DESCRICAO']}</td>
                <td>{$row['PE_VEICULOSCOMPATIVEL']}</td>
                <td>{$row['PE_QTDE']}</td>
                <td>{$row['PE_VALOR']}</td>
                <td>
                    <form method='POST'>
                    <input type='hidden' name='acao' value='deletar'>
                    <input type='hidden' name='id' value='{$row['PE_ID']}'>
                    <button type='submit'>Deletar</button>
                    </form>
                </td>
                <td> 
                    <a href='atualizarPecas.php?pe_id={$row['PE_ID']}&pe_nome={$row['PE_NOME']}&pe_estado={$row['PE_ESTADO']}&pe_descricao={$row['PE_DESCRICAO']}&pe_veiculoscompativel={$row['PE_VEICULOSCOMPATIVEL']}&pe_qtde={$row['PE_QTDE']}&pe_valor={$row['PE_VALOR']}'><button type='button'>Atualizar</button></a>
                </tr>
                ";
            }       
    }

    public function atualizar($ID,$nomenovo,$estadonovo,$descricaonova,$veiculocompativel,$qtdenova,$valornovo) {
        $this->conn->query("UPDATE PECAS SET PE_NOME = '$nomenovo', PE_ESTADO = '$estadonovo', PE_DESCRICAO = '$descricaonova', PE_VEICULOSCOMPATIVEL = '$veiculocompativel', PE_QTDE = '$qtdenova', PE_VALOR = '$valornovo' WHERE PE_ID = '$ID'");
    }

    public function deletar($id){
        $this->conn->query("DELETE from PECAS where PE_ID = '$id'");
    }
     
    }

?>