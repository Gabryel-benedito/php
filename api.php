<?php
// Conectar ao banco de dados
$servername = "localhost"; // Endereço do servidor
$username = "root"; // Nome de usuário do banco
$password = "aluno.etec"; // Senha do banco (caso não haja, deixa em branco)
$dbname = "teste"; // Nome do banco de dados

// Criando a conexão com o banco de dados
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificando se a conexão foi bem-sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Definindo o tipo de resposta como JSON
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Verificar o método da requisição HTTP
$method = $_SERVER['REQUEST_METHOD'];









function curso($campo)
{
    //Remove espaços em branco extras no início e no fim
    $campoTratado = trim($campo);

    //Verifica se o campo está vazio
    if (empty($campoTratado)) {
        echo json_encode(["mensagem" => "O nome do curso não pode ficar vazio"]);
        return false;
    }

    if (preg_match('/^[a-zA-Z\s]+$/u', $campoTratado)) {
        return true;
    } else {
        echo json_encode(["mensagem" => "Não é permitdo caracteres especias ou numeros no nome do curso"]);
        return false;
    }
}

function vagas($num)
{

    $numVagas = $num;

    if ($numVagas > 0 && floor($numVagas) == $numVagas) {
        return true;
    } else {
        echo json_encode(["mensagem" => "O numero de vagas tem que ser inteiro e positivo"]);
        return false;
    }
}

function periodo($per)
{
    $periodo = $per;

    if ($periodo == "Noite" || $periodo == "Manhã" || $periodo == "Tarde") {
        return true;
    } else {
        echo json_encode(["mensagem" => "o período deve corresponder aos seguintes valores?: Noite, Manhã ou Tarde "]);
        return false;
    }
}


switch ($method) {
    case 'GET':
        // Verificar se foi passado um código de curso (ID)
        if (isset($_GET['cod'])) {
            // Buscar um curso específico pelo código
            $cod = $_GET['cod'];
            $sql = "SELECT * FROM cursos WHERE cod = $cod";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $curso = mysqli_fetch_assoc($result);
                echo json_encode($curso);
            } else {
                echo json_encode(["mensagem" => "Curso não encontrado"]);
            }
        }else if(isset($_GET['nome'])){
            $nome = $_GET['nome'];
            $sql = "SELECT * FROM cursos WHERE curso LIKE ' %$nome% '";
            $result = mysqli_query($conn, $sql);
        }else if(isset($_GET['nome']) && isset($_GET['cod'])){

            echo json_encode(["mensagem" => "Erro: envie apenas 'cod' ou 'nome', não ambos."]);
            break;
        }else {
            // Buscar todos os cursos
            $sql = "SELECT * FROM cursos";
            $result = mysqli_query($conn, $sql);
            $cursos = [];

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $cursos[] = $row;
                }
                echo json_encode($cursos);
            } else {
                echo json_encode(["mensagem" => "Nenhum curso encontrado"]);
            }
        }
        break;

    case 'POST':
        // Criar um novo curso
        $dados = json_decode(file_get_contents('php://input'), true); // Ler os dados JSON enviados

        // Verificar se os dados foram passados corretamente
        if (isset($dados['curso'], $dados['vagas'], $dados['periodo']) && curso($dados['curso']) && vagas($dados['vagas']) && periodo($dados['periodo']) ) {
            $curso = $dados['curso'];
            $vagas = $dados['vagas'];
            $periodo = $dados['periodo'];

            // Inserir o novo curso no banco
            $sql = "INSERT INTO cursos (curso, vagas, periodo) VALUES ('$curso', $vagas, '$periodo')";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(["mensagem" => "Curso criado com sucesso!"]);
            } else {
                echo json_encode(["mensagem" => "Erro ao criar o curso: " . mysqli_error($conn)]);
            }
        } else {
            echo json_encode(["mensagem" => "Dados incompletos."]);
        }
        break;

    case 'PUT':
        // Atualizar um curso existente
        $dados = json_decode(file_get_contents('php://input'), true); // Ler os dados JSON enviados

        // Verificar se os dados foram passados corretamente
        if (isset($dados['cod']) && curso(isset($dados['curso'])) && isset($dados['vagas']) && isset($dados['periodo'])) {
            $cod = $dados['cod'];
            $curso = $dados['curso'];
            $vagas = $dados['vagas'];
            $periodo = $dados['periodo'];

            // Atualizar o curso no banco
            $sql = "UPDATE cursos SET curso = '$curso', vagas = $vagas, periodo = '$periodo' WHERE cod = $cod";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(["mensagem" => "Curso atualizado com sucesso!"]);
            } else {
                echo json_encode(["mensagem" => "Erro ao atualizar o curso: " . mysqli_error($conn)]);
            }
        } else {
            echo json_encode(["mensagem" => "Dados incompletos."]);
        }
        break;

    case 'DELETE':
        // Excluir um curso
        if (isset($_GET['cod'])) {
            $cod = $_GET['cod'];

            // Excluir o curso do banco
            $sql = "DELETE FROM cursos WHERE cod = $cod";
            if (mysqli_query($conn, $sql)) {
                echo json_encode(["mensagem" => "Curso excluído com sucesso!"]);
            } else {
                echo json_encode(["mensagem" => "Erro ao excluir o curso: " . mysqli_error($conn)]);
            }
        } else {
            echo json_encode(["mensagem" => "Código do curso não fornecido."]);
        }
        break;

    default:
        echo json_encode(["mensagem" => "Método não permitido."]);
        break;
}

// Fechar a conexão com o banco
mysqli_close($conn);
