<?php
require_once __DIR__ . "\\..\\model\\pecasDAO.php";
class PecasController {
    private $dao;
    public function __construct()
    {
        $this->dao = new PecasDAO();
       
    }

    public function criar($nome,$estado,$descricao,$veiculoscompativel,$qtde,$valor) {
        $this->dao->criar($nome,$estado,$descricao,$veiculoscompativel,$qtde,$valor);
    }

    public function listar(){
        $this->dao->listar();
    }

    public function deletar($id){
        $this->dao->deletar($id);
    }

    public function atualizar($ID,$nomenovo,$estadonovo,$descricaonova,$veiculocompativel,$qtdenova,$valornovo) {
        $this->dao->atualizar($ID,$nomenovo,$estadonovo,$descricaonova,$veiculocompativel,$qtdenova,$valornovo);
    }
  }

?>