<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 21/08/2017
 * Time: 15:57
 */

namespace controller;

use view\View;
use model\Video;

class VideoController
{
    /**
     * VideoController constructor.
     */
    public $video;

    public function __construct($campo = "", $valor = "")
    {
        $this->video = new Video();
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "GET") {
            if (isset($campo)) {
                $this->video->listar($campo, $valor);
            } else {
                $this->video->listar();
            }
        } else if ($method == "POST") {
            $this->video->cadastrar();
        } else if ($method == "PUT") {
            $this->video->alterar();
        } else if ($method == "DELETE") {
            $this->video->deletar();
        } else {
            View::render("Mensagem : Metodo Não implementado");
        }
    }

    public function listar($campo = "", $valor = "")
    {
        $data = array("mensagem" => "Tabaco bem massa");
        if ($campo != "" and $valor != "") {
            $data = array(
                "Mensagem" => "tabaco bem massa", $campo => $valor);
        }
        return View::render($data);
    }
}