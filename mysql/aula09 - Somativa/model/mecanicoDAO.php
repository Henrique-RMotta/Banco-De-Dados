<?php
class MecanicoDAO {
    private $conn;
     public function __construct(){
         $this->conn = new mysqli("localhost","root","senaisp","OficinaMecanicaSomativa");
     }
    public function criar($nome,$cpf,$celular,$cep,$datanasc,$mec_especialidade) {
        try {
            $this->conn->query("CREATE TABLE IF NOT EXISTS MECANICO (
                MEC_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                MEC_NOME VARCHAR(60) NOT NULL,
                MEC_CPF VARCHAR(14) NOT NULL,
                MEC_CELULAR VARCHAR(14) NOT NULL,
                MEC_CEP VARCHAR(9) NOT NULL,
                MEC_DATANASC DATE NOT NULL,
                MEC_ESPECIALIDADE VARCHAR(255) NOT NULL
            );");
           $this->conn->query("INSERT INTO MECANICO(MEC_NOME,MEC_CPF,MEC_CELULAR,MEC_CEP,MEC_DATANASC,MEC_ESPECIALIDADE) values ('$nome','$cpf','$celular','$cep','$datanasc','$mec_especialidade') ");
        } catch (Exception $e) {
            echo "Erro ao tentar criar:" . $e;
        }
       } 
    public function listar () {
            $result = $this->conn->query("SELECT * FROM MECANICO");
            echo "<table>";
            echo "<tr><th>id</th><th>Nome</th><th>CPF</th><th>Celular</th><th>CEP</th><th>Data_Nasc</th><th>Especialidade</th><th>Deletar</th><th>Atualizar</th></tr>";
            while ($row = $result -> fetch_assoc()) {
                echo "
                <tr> 
                <td>{$row['MEC_ID']}</td>
                <td>{$row['MEC_NOME']}</td>
                <td>{$row['MEC_CPF']}</td>
                <td>{$row['MEC_CELULAR']}</td>
                <td>{$row['MEC_CEP']}</td>
                <td>{$row['MEC_DATANASC']}</td>
                <td>{$row['MEC_ESPECIALIDADE']}</td>
                <td>
                    <form method='POST'>
                    <input type='hidden' name='acao' value='deletar'>
                    <input type='hidden' name='id' value='{$row['MEC_ID']}'>
                    <button type='submit'>Deletar</button>
                    </form>
                </td>
                <td> 
                    <a href='atualizarMecanico.php?mec_id={$row['MEC_ID']}&mec_nome={$row['MEC_NOME']}&mec_cpf={$row['MEC_CPF']}&mec_celular={$row['MEC_CELULAR']}&mec_cep={$row['MEC_CEP']}&mec_datanasc={$row['MEC_DATANASC']}&mec_especialidade={$row['MEC_ESPECIALIDADE']}'><button type='button'>Atualizar</button></a>
                </tr>
                ";
            }       
    }

    public function atualizar($ID,$nomenovo,$cpfnovo,$celularnovo,$cepnovo,$datanascnova,$mec_especialidade) {
        $this->conn->query("UPDATE MECANICO SET MEC_NOME = '$nomenovo', MEC_CPF = '$cpfnovo', MEC_CELULAR = '$celularnovo', MEC_CEP = '$cepnovo', MEC_DATANASC = '$datanascnova' WHERE MEC_ID = '$ID', MEC_ESPECIALIDADE = '$mec_especialidade'");
    }

    public function deletar($id){
        $this->conn->query("DELETE from MECANICO where MEC_ID = '$id'");
    }
     
    }

?>