<?php
// Arquivo responsavel por chamar consultas no model home.php e envia as informações para a página home

use Application\core\Controller;

class Home extends Controller
{
    // Encaminha as informações e o usuário para a home da empresa
    public function admin()
    {
        $this->verification();
        if($this->permission){
            $conn = $this->model('home');
            $alunos = $conn::listAlunos();
            $this->view('home/admin',["alunos" => $alunos]);
        } else {
            $this->view('erro404');
        }

    }

    // public function aluno()
    // {
    //     $this->verification();
    //     if($this->permission){
    //         $this->view('home/aluno');
    //     } else {
    //         $this->view('erro404');
    //     }
    // }

    // Encaminha as informações e o usuário para a home do passageiro
    // public function aluno()
    // {
    //     $this->verification();
    //     if($this->permission){
    //         $id = $_SESSION['ID_EMP'];
    //         $conn = $this->model('home');
    //         $viagens_aux = $conn::listViagens($id);
    //         $confirm = $conn::listViagensConfirm($_SESSION['ID']);

    //         $viagens = [];
    //         foreach($viagens_aux as $viagem){
    //             $confirmado = false;
    //             foreach($confirm as $id){
    //                 if($viagem['id_viagem'] == $id['idviagem']){
    //                     $confirmado = true;
    //                 }
    //             }
    //             if(!$confirmado){
    //                 array_push($viagens, $viagem);
    //             }
    //         }
    //         $this->view('home/passenger', ['viagens' => $viagens]);
    //     } else {
    //         $this->view('erro404');
    //     }
    // }

    // // Encaminha as informações e o usuário para a home do motorista
    // public function motorista()
    // {
    //     $this->verification();
    //     if($this->permission){
    //         $id = $_SESSION['ID'];
    //         $conn = $this->model('home');
    //         $viagens = $conn::listViagemMot($id);
    //         $this->view('home/driver', ['viagens' => $viagens]);
    //     } else {
    //         $this->view('erro404');
    //     }
    // }
}
?>