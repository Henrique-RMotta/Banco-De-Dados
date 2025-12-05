<?php

require_once __DIR__ . "\\..\\model\\mecanicoDAO.php";
class MecanicoController {
    private $dao;
    public function __construct()
    {
        $this->dao = new MecanicoDAO();
       
    }

    public function criar($nome,$cpf,$celular,$cep,$datanasc,$mec_especialidade) {
        $this->dao->criar($nome,$cpf,$celular,$cep,$datanasc,$mec_especialidade);
    }

    public function listar(){
        $this->dao->listar();
    }

    public function deletar($id){
        $this->dao->deletar($id);
    }

    public function atualizar($ID,$nomenovo,$cpfnovo,$celularnovo,$cepnovo,$datanascnova,$mec_especialidade) {
        $this->dao->atualizar($ID,$nomenovo,$cpfnovo,$celularnovo,$cepnovo,$datanascnova,$mec_especialidade);
    }
  }

?>