<?php
require_once __DIR__ ."\\..\\controller\\servicoController.php";
$controller = new ServicoController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    if ($acao === 'criar') {
        $controller->criar(
          $_POST['nome'],
          $_POST['detalhes'],
          $_POST['data_inicio'],
          $_POST['data_fim'],
          $_POST['status'],
          $_POST['valor'],
          $_POST['pe_id'],
          $_POST['vei_id'],
          $_POST['mec_id']
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
    <h1>Cadastrar Serviços</h1>
    <form method="POST">
        <input type="hidden" value="criar" name="acao">
        nome: <input type="text" name='nome' placeholder="Digite o nome do serviço" required>
        detalhes: <input type="text" name='detalhes' placeholder="Digite os detalhes do serviço" required>
        data início: <input type="date" name='data_inicio' required>
        data fim: <input type="date" name='data_fim' required>
        status: 
        <select name="status" required>
            <option value="">Selecione um status</option>
            <option value="ATIVO">ATIVO</option>
            <option value="FINALIZADO">FINALIZADO</option>
            <option value="AGUARDANDO">AGUARDANDO</option>
        </select>
        valor: <input type="number" step="0.01" name='valor' placeholder="Digite o valor" required>
        peça:
        <select name="pe_id">
            <option value="">Selecione uma peça (opcional)</option>
            <?php 
                $controller->buscarPecasID();
            ?>
        </select>
        veículo:
        <select name="vei_id" required>
            <option value="">Selecione um veículo</option>
            <?php 
                $controller->buscarVeiculosID();
            ?>
        </select>
        mecânico:
        <select name="mec_id" required>
            <option value="">Selecione um mecânico</option>
            <?php 
                $controller->buscarMecanicosID();
            ?>
        </select>
        <button type='submit'>Criar</button>
    </form>
    <?php 
        $controller ->listar();
    ?>
</main>