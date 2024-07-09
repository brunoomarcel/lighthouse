<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Aluno;

class HomeController extends Controller {

    public function index() {

        $alunos = Aluno::select()->execute();
        
        $this->render('home', [
            'alunos' => $alunos
        ]);
    }

}