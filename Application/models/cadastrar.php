<?php
// Arquivo de insert dos cadastros 

namespace Application\models;

use Application\core\Database;
use PDO;

class Cadastrar
{
    // Insere o usuário.
    public static function insertUsuario(string $nome, string $email, string $senha, string $nivel)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            "INSERT INTO tbUsuario(nome, email, senha, nivelPermissao) VALUES (:NOME, :EMAIL, SHA1(:SENHA), :NIVEL)",
            array(':NOME' => $nome, ':EMAIL' => $email, ':SENHA' => $senha, ':NIVEL' => $nivel)
        );
        return $result->rowCount();
    }

    // Insere o Aluno registrado.
    public static function insertAluno(string $nome, string $matricula, string $cpf, string $telefone, string $dataIngresso, string $instituicao, string $faseAtual, string $email)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            "INSERT INTO tbAluno(nomeAluno, matriculaAluno, cpf, telefone, dataIngresso, instituicao, faseAtual, email, idUsuario) VALUES (:NOME, :MATRICULA, :CPF, :TEL, :DAT, :INST, :FASE, :EMAIL, (SELECT idUsuario FROM tbUsuario WHERE email = :EMAIL))",
            array(':NOME' => $nome, ':MATRICULA' => $matricula, ':CPF' => $cpf, ':TEL' => $telefone, ':DAT' => $dataIngresso, ':INST' => $instituicao, ':FASE' => $faseAtual, ':EMAIL' => $email)
        );
        return $result->rowCount();
    }

    // Insere o documento do aluno.
    public static function insertDocumento(string  $idAluno, string $caminhoDoc, string $dataDoc, string $horasDoc)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            "INSERT INTO tbDocumentos(aluno_idAluno, caminhoDocumento, dataDocumento, horasDocumento) VALUES (:ID, :CAMINHO, :DATADOC, :HORADOC)",
            array(':ID' => $idAluno, ':CAMINHO' => $caminhoDoc, ':DATADOC' => $dataDoc, ':HORADOC' => $horasDoc)
        );
        return $result->rowCount();
    }

    // Insere as horas.
    public static function insertPendencia(string $semestre, string $ano, string $quantidadePendente, string $idAluno)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            "INSERT INTO tbHoraspendentes(semestre, ano, quantidadePendente, aluno_idAluno) VALUES (:SEM, :ANO, :QTD, :ID)",
            array(':SEM' => $semestre, ':ANO' => $ano, ':QTD' => $quantidadePendente, ':ID' => $idAluno)
        );
        return $result->rowCount();
    }
}
