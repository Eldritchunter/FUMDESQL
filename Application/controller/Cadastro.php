<?php
// Encaminha o usuário para as páginas de cadastro

use Application\core\Controller;

class Cadastro extends Controller
{
    public function tipo()
    {
        $this->view('cadastro/type');
    }

    public function Aluno()
    {
        $this->view('cadastro/Aluno');
    }

    public function instituicoes()
    {
        $this->view('cadastro/Intintuicao');
    }

    public function horasTrabalhadas()
    {
        $this->view('cadastro/horasTrabalhadas');
    }
}

?>