<?php
require_once __DIR__ . "\\..\\model\\servicoDAO.php";

class ServicoController {
    private $dao;

    public function __construct()
    {
        $this->dao = new ServicoDAO();
    }

    public function criar($nome, $detalhes, $data_inicio, $data_fim, $status, $valor, $PE_ID, $VEI_ID, $MEC_ID) {
        $this->dao->criar($nome, $detalhes, $data_inicio, $data_fim, $status, $valor, $PE_ID, $VEI_ID, $MEC_ID);
    }

    public function listar() {
        $this->dao->listar();
    }

    public function deletar($id) {
        $this->dao->deletar($id);
    }

    public function atualizar($ID, $novonome, $detalhes, $data_inicio, $data_fim, $status, $valor, $PE_ID, $VEI_ID, $MEC_ID) {
        $this->dao->atualizar($ID, $novonome, $detalhes, $data_inicio, $data_fim, $status, $valor, $PE_ID, $VEI_ID, $MEC_ID);
    }

    public function buscarVeiculosID() {
        $this->dao->buscarVeiculosID();
    }

    public function buscarMecanicosID() {
        $this->dao->buscarMecanicosID();
    }

    public function buscarPecasID() {
        $this->dao->buscarPecasID();
    }
}

?>