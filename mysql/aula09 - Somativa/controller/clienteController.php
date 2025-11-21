<?php
require_once __DIR__ . "\\..\\model\\clienteDAO.php";
class ClienteController {
    private $dao;
    public function __construct()
    {
        $this->dao = new ClienteDAO();
       
    }

    public function criar($nome,$celular,$CPF,$CEP,$DATANASC) {
        $this->dao->criar($nome,$celular,$CPF,$CEP,$DATANASC);
    }

    public function listar(){
        $this->dao->listar();
    }

    public function deletar($id){
        $this->dao->deletar($id);
    }

    public function atualizar($ID,$nomenovo,$celularnovo,$novocpf,$novocep,$novadatanasc) {
        $this->dao->atualizar($ID,$nomenovo,$celularnovo,$novocpf,$novocep,$novadatanasc);
    }
  }

?>