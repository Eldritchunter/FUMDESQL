<?php
// Arquivo de select no banco para as consultas

namespace Application\models;

use Application\core\Database;
use PDO;

class Consulta 
{
    public static function GetDocsPendentes()
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tbDocumentos AS d JOIN tbAluno AS a ON d.aluno_idAluno = a.idAluno WHERE d.statusDocumento = 0");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function GetDoc(string $idDocumento)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT * FROM tbDocumentos AS d JOIN tbAluno AS a ON d.aluno_idAluno = a.idAluno WHERE d.idDocumentos = :ID", array(':ID' => $idDocumento));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>