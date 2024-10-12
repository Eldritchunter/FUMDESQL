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
}

?>