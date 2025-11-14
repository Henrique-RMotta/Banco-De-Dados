<?php
$conn = new mysqli("localhost","root","senaisp","OficinaMecanicaSomativa");
$selecionador = $_GET['selecionador'];
$nome = $_POST['nome'];
$celular = $_POST['celular'];
$CPF = $_POST['CPF'];
$CEP = $_POST['CEP'];
$DATANASC = $_POST['DATA_NASC'];

class Cliente {
    public function criar($nome,$celular,$CPF,$CEP,$DATANASC,$conn) {
        try {
            $query = $conn->query("INSERT INTO Cliente(CLI_NOME,CLI_CELULAR,CLI_CPF,CLI_CEP,CLI_DATANASC) values ('$nome','$celular','$CPF','$CEP','$DATANASC') ");
                echo "Dados salvos com sucesso";
                echo '<a href="index.php">voltar </a>';  
        } catch (Exception $e) {
            echo $e;
        }
       } 
    public function listar ($conn) {
        try {
            $result = $conn->query("SELECT * FROM CLIENTE");
            echo "<table>";
            echo "<tr><th>id</th><th>Nome</th><th>Celular</th><th>CPF</th><th>CEP</th><th>DATA de Nascimento</th></tr>";
            while ($row = $result -> fetch_assoc()) {
                echo "
                <tr> 
                <td>{$row['CLI_ID']}</td>
                <td>{$row['CLI_NOME']}</td>
                <td>{$row['CLI_CELULAR']}</td>
                <td>{$row['CLI_CPF']}</td>
                <td>{$row['CLI_CEP']}</td>
                <td>{$row['CLI_DATANASC']}</td>
                </tr>
                ";
            }
        } catch (Exception $e) {
            echo $e;
        }
            
    }
    
    }
$controller = new Cliente();
if ($selecionador == "criar") {
    $controller->criar($nome,$celular,$CPF,$CEP,$DATANASC,$conn);
} else if ($selecionador == "listar"){
    $controller->listar($conn);
}
?>