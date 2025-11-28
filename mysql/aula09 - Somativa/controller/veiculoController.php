<?php
require_once __DIR__ . "\\..\\model\\veiculoDAO.php";
class VeiculoController {
    private $dao;
    public function __construct()
    {
        $this->dao = new VeiculoDAO();
       
    }

    public function criar($modelo,$marca,$placa,$cor,$cli_id) {
        $this->dao->criar($modelo,$marca,$placa,$cor,$cli_id);
    }

    public function listar(){
        $this->dao->listar();
    }

    public function deletar($id){
        $this->dao->deletar($id);
    }

    public function atualizar($ID,$modelonovo,$marcanova,$placanova,$cornova,$cli_id) {
        $this->dao->atualizar($ID,$modelonovo,$marcanova,$placanova,$cornova,$cli_id);
    }

    public function buscarClientesID (){
        $this->dao->buscarClientesID();
    }
  }

?>