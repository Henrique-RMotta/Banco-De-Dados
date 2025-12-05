<?php
require_once __DIR__ ."\\..\\controller\\servicoController.php";

$se_id = $_GET['se_id'];
$se_nome = $_GET['se_nome'];
$se_detalhes = $_GET['se_detalhes'];
$se_data_inicio = $_GET['se_data_inicio'];
$se_data_fim = $_GET['se_data_fim'];
$se_status = $_GET['se_status'];
$se_valor = $_GET['se_valor'];
$pe_nome = $_GET['pe_nome'];
$vei_modelo = $_GET['vei_modelo'];
$mec_nome = $_GET['mec_nome'];
$controller = new ServicoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $acao = $_POST['acao'] ?? '';
    if ($acao == 'atualizar'){
        $controller->atualizar(
            $se_id,
            $_POST['nome_novo'],
            $_POST['detalhes_novo'],
            $_POST['data_inicio_nova'],
            $_POST['data_fim_nova'],
            $_POST['status_novo'],
            $_POST['valor_novo'],
            $_POST['pe_id_novo'],
            $_POST['vei_id_novo'],
            $_POST['mec_id_novo'],
            $_POST['cli_id_novo'],
        );
        header("Location: servico.php");
        exit();
    }
}
?>

<?php include_once "header.php"; ?>

<main>
    <h1>Atualizar Serviço</h1>
    <form method="POST">
        <input type="hidden" value="atualizar" name="acao">
        
        Nome: <input type="text" name="nome_novo" placeholder="Digite o nome do serviço" value="<?php echo $se_nome; ?>" required>
        
        Detalhes: <input type="text" name="detalhes_novo" placeholder="Digite os detalhes do serviço" value="<?php echo $se_detalhes; ?>" required>
        
        Data Início: <input type="date" name="data_inicio_nova" value="<?php echo $se_data_inicio; ?>" required>
        
        Data Fim: <input type="date" name="data_fim_nova" value="<?php echo $se_data_fim; ?>" required>
        
        Status:
        <select name="status_novo" required>
            <option value="">Selecione um status</option>
            <option value="ATIVO" <?php echo ($se_status == 'ATIVO') ? 'selected' : ''; ?>>ATIVO</option>
            <option value="FINALIZADO" <?php echo ($se_status == 'FINALIZADO') ? 'selected' : ''; ?>>FINALIZADO</option>
            <option value="AGUARDANDO" <?php echo ($se_status == 'AGUARDANDO') ? 'selected' : ''; ?>>AGUARDANDO</option>
        </select>
        
        Valor: <input type="number" step="0.01" name="valor_novo" placeholder="Digite o valor" value="<?php echo $se_valor; ?>" required>
        
        Peça:
        <select name="pe_id_novo">
            <option value="0">Selecione uma peça (opcional)</option>
            <?php $controller->buscarPecasID(); ?>
        </select>
        
        Veículo:
        <select name="vei_id_novo" required>
            <option value="">Selecione um veículo</option>
            <?php $controller->buscarVeiculosID(); ?>
        </select>
        
        Mecânico:
        <select name="mec_id_novo" required>
            <option value="">Selecione um mecânico</option>
            <?php $controller->buscarMecanicosID(); ?>
        </select>
              Cliente:
        <select name="cli_id_novo" required>
            <option value="">Selecione um Cliente</option>
            <?php 
                $controller->buscarClientesID();
            ?>
        </select>
        <button type="submit">Atualizar</button>
        <a href="servico.php"><button type="button">Voltar</button></a>
    </form>
</main>