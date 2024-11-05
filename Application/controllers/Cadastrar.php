<?php
// Arquivo responsável por realizar os cadastros e chamar os inserts do model cadastrar.php

use Application\core\Controller;

class Cadastrar extends Controller
{

    // Cadastro do aluno
    public function aluno()
    {
        $nome = $_POST['nomeAluno'];
        $matricula = $_POST['matriculaAluno'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $dataIngresso = $_POST['dataIngresso'];
        $instituicao = $_POST['instituicao'];
        $faseAtual = $_POST['faseAtual'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conn = $this->model('cadastrar');
        $insertUser = $conn::insertUsuario($nome, $email, $senha, '2');
        $insert = $conn::insertAluno($nome, $matricula, $cpf, $telefone, $dataIngresso, $instituicao, $faseAtual, $email, $senha);
        header("location: /home/admin");
    }

    // Cadastro do veiculo
    public function veiculo()
    {
        $empresa = $_SESSION['ID'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $marca = $_POST['marca'];
        $situacao = $_POST['situacao'];
        $lugares = $_POST['lugares'];
        $status = $_POST['status'];

        $conn = $this->model('cadastrar');
        $insert = $conn->insertVeiculo($empresa, $modelo, $placa, $marca, $situacao, $lugares, $status);

        if ($insert > 0) {
            header('Location: /consulta/veiculos');
        } else {
            $this->view('erro404');
        }
    }

    // Cadastro dos pontos
    public function ponto()
    {
        $empresa = $_SESSION['ID'];
        $apelido = $_POST['apelido'];
        $rua = $_POST['rua'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $ponto = $_POST['ponto-ref'];
        $hora = $_POST['hora'];

        $conn = $this->model('cadastrar');
        $insert = $conn::insertPonto($empresa, $apelido, $rua, $bairro, $cidade, $ponto, $hora);

        if ($insert > 0) {
            header('Location: /consulta/ponto');
        } else {
            $this->view('erro404');
        }
    }
}
