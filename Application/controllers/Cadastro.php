<?php
// Encaminha o usuário para as páginas de cadastro

use Application\core\Controller;

class Cadastro extends Controller
{
    public function admin()
    {
        $this->view('cadastro/admin');
    }

    public function aluno()
    {
        $this->view('cadastro/aluno');
    }

    public function horas()
    {
        $this->view('cadastro/horas');
    }

    public function instituicao()
    {
        $this->view('cadastro/instituicao');
    }

    public function novoAluno()
    {
        $this->view('cadastro/novoAluno');
    }

    public function novoDocumento($id) {
        $this->view('cadastro/novoDocumento',['id' => $id]);
    }

    public function deletarAluno($id){
        $conn = $this->model('cadastrar');
        $delete = $conn::deleteAluno($id);
        header("Location: /home/admin");
    }
}

?>