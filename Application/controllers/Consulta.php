<?php
// Arquivo responsável por chamar os select no model consulta.php e enviar as informações para a página
use Application\core\Controller;

class Consulta extends Controller
{
    public function aprovacao()
    {
        $this->verification();
        if($this->permission && $_SESSION['nivel'] == 1){
            $conn = $this->model('consulta');
            $documentos = $conn::GetDocsPendentes();
            $this->view('aprovaDocumento/aprovaDoc', ['documentos' => $documentos]);
        }
    } 

    public function documento($id)
    {
        $this->verification();
        if($this->permission && $_SESSION['nivel'] == 1){
            $conn = $this->model('consulta');
            $documento = $conn::GetDoc($id);
            $this->view('aprovaDocumento/verDocumento', ['documento' => $documento]);
        }
    } 
}

?>