<?php

    require_once __DIR__ . "\\..\\controller\\mecanicoController.php";

    $id = $_GET['mec_id'];
    $nome = $_GET['mec_nome'];
    $cpf = $_GET['mec_cpf'];
    $celular = $_GET['mec_celular'];
    $cep = $_GET['mec_cep'];
    $datanasc = $_GET['mec_datanasc'];
    $mecesp = $_GET['mec_especialidade'];
    $controller = new MecanicoController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        if ($acao == 'atualizar'){
            $controller->atualizar($id,$_POST['nomenovo'],$_POST['CPFnovo'],$_POST['celularnovo'],$_POST['CEPnovo'],$_POST['DATA_NASCnovo'],$_POST['MEC_ESPECIALIDADEnovo']);
              header("Location: mecanico.php");
            exit();
        }
    }
?>
    

<h1>Atualizar Mecânicos</h1>
<form method="POST">
    <input type="hidden" value="atualizar" name="acao">
    nome: <input type="text" name='nomenovo' placeholder="Digite o nome" value="<?php echo $nome ?>"required>
    CPF:  <input type="number" name='CPFnovo' placeholder="Digite o CPF sem pontos e traços" value="<?php echo $cpf ?>" required>
    celular: <input type="number" name='celularnovo' placeholder="Digite número de celular sem traços" value="<?php echo $celular ?>" required>
    CEP:  <input type="number" name='CEPnovo' placeholder="Digite o CEP sem pontos e traços" value="<?php echo $cep ?>" required>
    DATA NASCIMENTO: <input type="text" name='DATA_NASCnovo' placeholder="Digite a data de nascimento com traços" value="<?php echo $datanasc ?>" required>
    especialidade: <input type="text" name='MEC_ESPECIALIDADEnovo' placeholder="Digite a Especialidade do Mecanico" value = "<?php echo $mecesp ?>"required>
    <button type="submit">Atualizar</button>
    <a href="indexMecanico.php"><button type="button">Voltar</button></a>
</form>