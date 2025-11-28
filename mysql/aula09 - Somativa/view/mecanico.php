<?php
require_once __DIR__ ."\\..\\controller\\mecanicoController.php";
$controller = new MecanicoController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    if ($acao === 'criar') {
        $controller->criar(
          $_POST['nome'],
          $_POST['CPF'],
          $_POST['celular'],
          $_POST['CEP'],
          $_POST['DATA_NASC']
        );
    } elseif ($acao === 'deletar') {
        $controller->deletar($_POST['id']);
    }
}
?>
<?php
    include_once 'header.php';
?>
<main>
    <h1>Cadastrar Mecânicos</h1>
    <form method="POST">
        <input type="hidden" value="criar" name="acao">
        nome: <input type="text" name='nome' placeholder="Digite o nome" required>
        CPF:  <input type="number" name='CPF' placeholder="Digite o CPF sem pontos e traços" required>
        celular: <input type="number" name='celular' placeholder="Digite número de celular sem traços" required>
        CEP:  <input type="number" name='CEP' placeholder="Digite o CEP sem pontos e traços" required>
        DATA NASCIMENTO: <input type="text" name='DATA_NASC' placeholder="Digite a data de nascimento com traços" required>
        <button type='submit'>Criar</button>
    </form>
    <?php 
        $controller ->listar();
    ?>
</main>