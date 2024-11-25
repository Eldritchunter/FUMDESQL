<?php
// Arquivo de select para as páginas home

namespace Application\models;

use Application\core\Database;
use PDO;

class Home
{
    // Lista os alunos para o administrador.
    public static function listInstituicoes()
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT a.idAluno, d.nomeInstituicao FROM tbAluno AS a
        LEFT JOIN (
            SELECT * FROM (
                SELECT 
                    idDocumentos,
                    aluno_idAluno,
                    nomeInstituicao,
                    dataDocumento,
                    ROW_NUMBER() OVER (PARTITION BY aluno_idAluno ORDER BY dataDocumento DESC) AS ordem
                FROM tbDocumentos
            ) AS DocumentosFiltrados
            WHERE ordem <= 3
        ) AS d ON a.idAluno = d.aluno_idAluno
        ORDER BY a.nomeAluno, d.dataDocumento DESC;");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function listAlunos()
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tbAluno");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lista os destalhes pessoais do próprio aluno.
    public static function ListAlunoLogado($idAluno)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tbAluno WHERE idAluno = :idAluno", array(':idAluno' => $idAluno));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    //
    public static function lastIntituicoes(string $id)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tbdocumentos WHERE aluno_idAluno = :ID ORDER BY dataDocumento DESC LIMIT 3 ;", array(':ID' => $id));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
