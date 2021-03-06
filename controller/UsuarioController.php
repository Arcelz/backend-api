<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 21/08/2017
 * Time: 15:31
 */

namespace controller;

use model\Usuario;
use model\validator\UsuarioValidate;
use util\DataConversor;
use util\Token;
use view\View;

class UsuarioController implements IController
{
    private $token;




    /**
     *
     */
    public function post()
    {

        $usuario = new Usuario();
        $data = new DataConversor();
        $data = $data->converter();
        $validar = new UsuarioValidate();
        $validar = $validar->validateUsuarioCriar($data);
        if ($validar === true) {
            $date = date('Y-m-d');
            $usuario->setNome($data['nome']);
            $usuario->setEmail($data['email']);
            $usuario->setAvatar($data['avatar']);
            $usuario->setSenha($data['senha']);
            $usuario->setDataNascimento($data['data_nascimento']);
            $usuario->setDataCriacao($date);
            $usuario->setDataAlteracao($date);
            View::render($usuario->cadastrar());
        } else {
            View::render($validar);
        }
    }

    public function get($params = [])
    {
        $this->token = new Token();
        $this->token = $this->token->token();
        $usuario = new Usuario();
        if (isset($params['id'])) {
            $usuario->setId($params['id']);
        }
        if (isset($params['nome'])) {
            $usuario->setNome($params['nome']);
        }

        View::render($usuario->listar());
    }

    public function put($params = [])
    {
        $this->token = new Token();
        $this->token->token();
        $data = new DataConversor();
        $data = $data->converter();
        $validar = new UsuarioValidate();
        $validar = $validar->validateUsuarioAlterar($data);
        if ($validar === true) {
            $usuario = new Usuario();
            $usuario->setId($this->token->retornaIdUsuario());
            if (isset($data['avatar'])) {
                $usuario->setAvatar($data['avatar']);
            }
            if (isset($data['nome'])) {
                $usuario->setNome($data['nome']);
            }
            if (isset($data['senha'])) {
                $usuario->setSenha($data['senha']);
            }
            if (isset($data['isControleDosPais'])) {
                $usuario->setIsControleDosPais($data['isControleDosPais']);
            }
            View::render($usuario->alterar());
        } else {
            View::render($validar);
        }


    }

    public function delete($params = [])
    {
        // TODO: Implement delete() method.
    }


}