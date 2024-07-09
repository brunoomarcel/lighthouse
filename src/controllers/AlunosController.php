<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Aluno;

class AlunosController extends Controller {

    public function add() {
        $this->render('add');
    }

    public function addAction() {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $mensalidade = filter_input(INPUT_POST, 'mensalidade', FILTER_VALIDATE_FLOAT);
        $senha = filter_input(INPUT_POST, 'senha');
        $status_aluno = filter_input(INPUT_POST, 'status_aluno', FILTER_VALIDATE_BOOLEAN);
        $observacao = filter_input(INPUT_POST, 'observacao');

        if($name && $email) {
            $data = Aluno::select()->where('email', $email)->execute();

            if(count($data) === 0) {
                Aluno::insert([
                    'nome' => $name,
                    'email' => $email,
                    'telefone' => $telefone,
                    'mensalidade' => $mensalidade,
                    'senha' => password_hash($senha, PASSWORD_DEFAULT), // Armazene a senha de forma segura
                    'status_aluno' => $status_aluno,
                    'observacao' => $observacao
                ])->execute();

                $this->redirect('/');
            } else {
                $_SESSION['error'] = "Email já existente. Por favor, use um email diferente.";
                $this->redirect('/novo'); // Redireciona para a página do formulário
            }

        }

        $this->redirect('/novo');
    } 

    public function edit($args) {
        $aluno = Aluno::select()->find($args['id']);
        $this->render('edit', [
            'aluno' => $aluno
        ]);
    }

    public function editAction($args) {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $telefone = filter_input(INPUT_POST, 'telefone');
        $mensalidade = filter_input(INPUT_POST, 'mensalidade', FILTER_VALIDATE_FLOAT);
        $status_aluno = filter_input(INPUT_POST, 'status_aluno', FILTER_VALIDATE_BOOLEAN);
        $observacao = filter_input(INPUT_POST, 'observacao');

        if($name && $email) {
            Aluno::update()
                ->set('nome', $name)
                ->set('email', $email)
                ->set('telefone', $telefone)
                ->set('mensalidade', $mensalidade)
                ->set('status_aluno', $status_aluno)
                ->set('observacao', $observacao)
                ->where('id', $args['id'])
            ->execute();

            $this->redirect('/');
        }
        $this->redirect('/usuario/'.$args['id'].'/editar');
            
    }

    public function del($args) {
        Aluno::delete()->where('id', $args['id'])->execute();
        $this->redirect('/');
    }

    public function updateStatusAction($args) {
        $aluno_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status_aluno = filter_input(INPUT_POST, 'status_aluno', FILTER_VALIDATE_BOOLEAN);
    
        if ($aluno_id !== false) {
            $status_aluno = $status_aluno ? 1 : 0; // Converte booleano para 0 ou 1
    
            Aluno::update([
                'status_aluno' => $status_aluno,
            ])->where('id', $aluno_id)->execute();
        }
    
        $this->redirect('/alunos');
    }
    
    
}
