<?php

    require_once __DIR__ . "\\..\\controller\\clienteController.php";

    $id = $_GET['cli_id'];
    $nome = $_GET['cli_nome'];
    $celular = $_GET['cli_celular'];
    $cpf = $_GET['cli_cpf'];
    $cep = $_GET['cli_cep'];
    $datanasc = $_GET['cli_datanasc'];

    $controller = new ClienteController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        if ($acao == 'atualizar'){
            $controller->atualizar($id,$_POST['nomenovo'],$_POST['celularnovo'],$_POST['CPFnovo'],$_POST['CEPnovo'],$_POST['DATA_NASCnovo']);
        }
    }
?>
    

<h1>Atualizar Clientes</h1>
<form method="POST">
    <input type="hidden" value="atualizar" name="acao">
    nome: <input type="text" name='nomenovo' placeholder="Digite o nome" value="<?php echo $nome ?>"required>
    celular: <input type="number" name='celularnovo' placeholder="Digite número de celular sem traços" value="<?php echo $celular ?>" required>
    CPF:  <input type="number" name='CPFnovo' placeholder="Digite o CPF sem pontos e traços" value="<?php echo $cpf ?>" required>
    CEP:  <input type="number" name='CEPnovo' placeholder="Digite o CEP sem pontos e traços" value="<?php echo $cep ?>" required>
    DATA NASCIMENTO: <input type="text" name='DATA_NASCnovo' placeholder="Digite a data de nascimento com traços" value="<?php echo $datanasc ?>" required>
    <button type="submit">Atualizar</button>
    <a href="index.php"><button type="button">Voltar</button></a>
</form>