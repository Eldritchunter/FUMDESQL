<?php
// Arquivo de select para o sistema de login

namespace Application\models;

use Application\core\Database;
use PDO;

class Login
{
    // Consulta o nivel de acesso
    public static function findNivel(string $email, string $senha)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT nivelPermissao FROM tbUsuario WHERE email = :EMAIL && senha = SHA1(:SENHA)",
                                array(':EMAIL' => $email, ':SENHA' => $senha));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Consulta as informações da empresa
    public static function findUser(string $email, string $senha)
    {
        $conn = new Database();
        $result = $conn->executeQuery("SELECT idUsuario FROM tbUsuario  WHERE email = :EMAIL && senha = SHA1(:SENHA)",
                                array(':EMAIL' => $email, ':SENHA' => $senha));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>