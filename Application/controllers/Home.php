<?php
// Arquivo responsavel por chamar consultas no model home.php e envia as informações para a página home

use Application\core\Controller;

class Home extends Controller
{
    // Encaminha as informações e o usuário para a home da empresa
    public function admin()
    {
        $this->verification();
        if ($this->permission) {
            $conn = $this->model('home');
            $alunos = $conn::listAlunos();
            $instituicoes = $conn::listInstituicoes();
            $this->view('home/admin', ["alunos" => $alunos, 'instituicoes' => $instituicoes]);
        } else {
            $this->view('erro404');
        }
    }

    public function aluno()
    {
        $this->verification();
        if ($this->permission) {
            $conn = $this->model('home');
            $alunoLogado = $conn::ListAlunoLogado($_SESSION['ID']);
            $lastInst = $conn::lastIntituicoes($_SESSION['ID']);
            $this->view('home/aluno', ['aluno' => $alunoLogado, 'instituicao' => $lastInst]);
        } else {
            $this->view('erro404');
        }
    }
}
