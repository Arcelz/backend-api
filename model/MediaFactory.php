<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 21/08/2017
 * Time: 16:11
 */

namespace model;


abstract class MediaFactory
{
    public $nome;
    public $descricao;
    public $genero;
    public $idadeRecomendada;
    public $formato;
    public $caminho;

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    /**
     * @return mixed
     */
    public function getIdadeRecomendada()
    {
        return $this->idadeRecomendada;
    }

    /**
     * @param mixed $idadeRecomendada
     */
    public function setIdadeRecomendada($idadeRecomendada)
    {
        $this->idadeRecomendada = $idadeRecomendada;
    }

    /**
     * @return mixed
     */
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * @param mixed $formato
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;
    }

    /**
     * @return mixed
     */
    public function getCaminho()
    {
        return $this->caminho;
    }

    /**
     * @param mixed $caminho
     */
    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;
    }
    
    public abstract function listar();

    public abstract function cadastrar();

    public abstract function deletar();

    public abstract function alterar();
}