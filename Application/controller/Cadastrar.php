<?php
// Arquivo responsável por realizar os cadastros e chamar os inserts do model cadastrar.php

use Application\core\Controller;

class Cadastrar extends Controller
{
    // Cadastro da empresa
    public function Aluno()
    {
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        //Valido até o fim do ano em que foi realizado o cadastro
        $validade = date('Y') . "-12-31";

        //Cria um token aleatório para a empresa
        $token = bin2hex(random_bytes(10));

        $conn = $this->model('cadastrar');
        $insert = $conn::insertAluno($nome, $matricula, $cpf, $telefone, $token, $validade);
        $insertAluno = $conn::insertUsuario($matricula, $cpf, '1');
        header('Location: /login');
        
        if ($insert > 0) {
            header('Location: /login');
        } else {
            $this->view('erro404');
        }
    }

    // Cadastro do passageiro
    public function Instituicao()
    {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $instituicao = $_POST['instituicao'];
        $ingresso = $_POST['ingresso'];
        $ano = $ingresso . '-01';
        $codigo = $_POST['codigo'];

        $conn = $this->model('cadastrar');
        $insert = $conn::insertPassageiro($nome, $cpf, $telefone, $instituicao, $ano);
        foreach ($insert as $id) {
            $idAluno = $id['id_aluno'];
        }
        $insertEnd = $conn::insertEndereco($rua, $numero, $bairro, $cidade, $estado, $cep, $idAluno);

        // Valido por semestre
        $solicitacao = date('Y-m-d');
        if (date('m') >= 6) {
            $expiracao = date('Y') . "-12-31";
        } else {
            $expiracao = date('Y') . "-07-31";
        }
        $insertSolicitacao = $conn::insertSolicitacao($codigo, $idAluno, $solicitacao, $expiracao);

        if ($insert > 0 || $insertEnd > 0 || $insertSolicitacao > 0) {
            header('Location: /login');
        } else {
            $this->view('erro404');
        }
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
