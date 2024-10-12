<?php
// Arquivo responsável por consultar o nivel de acesso, as devidas informações e encaminhar para as páginas certas

use Application\core\Controller;

class Login extends Controller // 'parâmetro/função'
{
    //chama a view index.php do /login 
    public function index()
    {
        $this->view('login/index'); // 'nome da pasta da view / nome do arquivo'
    }

    // Realiza o login
    public function login()
    {
        //recebe as informações
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $conn = $this->model('login');
        $data = $conn::findNivel($email, $senha);

        if (!empty($data)) {
            session_start();
            // consulta o nivel de acesso
            foreach ($data as $user) {
                $_SESSION['nivel'] = $user['nivelPermissao'];
            }

            // 1 - Administrador
            // 2 - Estudante
            switch ($_SESSION['nivel']) {
                case 1:
                    $admin = $conn::findUser($email, $senha);
                    foreach ($admin as $aux) {
                        $_SESSION['ID'] = $aux['idUsuario'];
                        $_SESSION['NOME'] = $aux['nome']; //administrador
                    }
                    header("Location: /home/admin");
                    break;
                case 2:
                    $aluno = $conn::findUser($email, $senha); //findEstudante
                    foreach ($aluno as $aux) {
                        $_SESSION['ID'] = $aux['idUsuario'];
                        $_SESSION['NOME'] = $aux['nome'];
                    }
                    header("Location: /home/aluno");
                    break;
            }
        } else {
            $this->view('erro404');
        }
    }

    // Realiza o logout da conta e encerra a sessão
    public function logout()
    {
        $this->verification();
        if ($this->permission) {
            session_destroy();
            $this->permission = false;
            echo "<script>window.location.href = '/login';</script>";
        }
        $this->view('login/index');
    }
}
