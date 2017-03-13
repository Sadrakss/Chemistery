<?php
require_once "../model/Pergunta.php";

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 24/02/2017
 * Time: 11:23
 */
class PerguntaController
{

    public function __construct()
    {
        if (isset($_GET['q']) and $_GET['q'] == "listar") {
            $pergunta = new Pergunta();
            $pergunta->listagem();
        }

        if (isset($_GET['b']) and $_GET['b'] == "cadastrar") {
            if($this->cadastroPergunta()) {
                echo"<script>alert('Pergunta enviada com sucesso!')</script>";
            }else{
                echo"<script>alert('Pergunta não enviada, erro!')</script>";
            }
        }
    }

    public function cadastroPergunta()
    {
        $p = new Pergunta();
        $p->setProduto($_POST['perguntaProduto']);
        $p->setUsuario($_POST['perguntaIdUsuario']);
        $p->setDescricao($_POST['perguntaDescricao']);
       return $p->cadastroPergunta();

    }

    public function consultaPerguntaByIdUsuario($idUsuario)
    {
        $pergunta = new Pergunta();
        return $pergunta->consultaPerguntaBy($idUsuario);
    }


    /**
     * PerguntaController constructor.
     */

}

new PerguntaController();