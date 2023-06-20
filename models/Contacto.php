<?php

class Contacto
{

    //ATRIBUTOS
    private $codContacto;
    private $telemovel;
    private $nome;
    private $endereco;
    private $email;

    //CONSTRUTORES


    public function __construct($codContacto, $telemovel, $nome,  $endereco, $email)
    {
        $this->telemovel = $telemovel;
        $this->codContacto = $codContacto;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->email = $email;
    }

    //GET AND SET
    public function getTelemovel()
    {
        return $this->telemovel;
    }

    public function setTelemovel($telemovel)
    {
        $this->$telemovel = $telemovel;
    }
    public function getCodContacto()
    {
        return $this->codContacto;
    }

    public function setCodContacto($codContacto)
    {
        $this->$codContacto = $codContacto;
    }
  
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function seEmail($email)
    {
        $this->email = $email;
    }
}
