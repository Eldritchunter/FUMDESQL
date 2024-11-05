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
    public static function insertAluno(string $nome, string $matricula, string $cpf, string $telefone, string $dataIngresso, string $instituicao, string $faseAtual, string $email, string $senha)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            "INSERT INTO tbAluno(nomeAluno, matriculaAluno, cpf, telefone, dataIngresso, instituicao, faseAtual, email, idUsuario) VALUES (:NOME, :MATRICULA, :CPF, :TEL, :DAT, :INST, :FASE, :EMAIL, (SELECT idUsuario FROM tbUsuario WHERE email = :EMAIL AND senha = SHA1(:SENHA)))",
            array(':NOME' => $nome, ':MATRICULA' => $matricula, ':CPF' => $cpf, ':TEL' => $telefone, ':DAT' => $dataIngresso, ':INST' => $instituicao, ':FASE' => $faseAtual, ':EMAIL' => $email, ':SENHA' => $senha)
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

    public static function deleteAluno(string $id){
        $conn = new Database();
        $result = $conn->executeQuery("DELETE FROM tbAluno WHERE idAluno = :ID", array(':ID' => $id));
        $result = $conn->executeQuery("DELETE FROM tbUsuario WHERE idUsuario = :ID", array(':ID' => $id));
        return $result->rowCount();
    }

}
