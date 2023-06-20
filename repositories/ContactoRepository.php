<?php

include_once 'dbconfig/DbConnection.php';
include_once 'models/Contacto.php';
include_once 'repositories/IContactoRepository.php';

class ContactoRepository implements IContactoRepository
{

    private $db;

    function __construct()
    {
        $this->db = DbConnection::getInstance();
    }
    public function edit($codContacto, $nome, $email, $telemovel, $endereco)
    {
        echo "id " . $codContacto . " nome " . $nome . " email " . $email . " telefone " . $telemovel . " endereço " . $endereco;
        try {
            $stmt = $this->db->prepare("UPDATE contatos set nome= :nome,email = :email, telemovel=:telemovel,endereco=:endereco where codContacto=:codContacto");
            $stmt->bindparam(":codContacto", $codContacto);
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":telemovel", $telemovel);
            $stmt->bindparam(":endereco", $endereco);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll()
    {

        $contactos = array();
        $stmt = $this->db->prepare("SELECT * FROM contatos");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $contacto) {

            $contactos[] = new Contacto($contacto['codContacto'], $contacto['telemovel'], $contacto['nome'], $contacto['endereco'], $contacto['email']);
        }
        return $contactos;
    }

    public function selectById($codContacto)
    {

        $stmt = $this->db->prepare("SELECT * FROM contatos WHERE codContacto=:codContacto");
        $stmt->execute(['codContacto' => $codContacto]);
        $contacto = $stmt->fetch();
        return new Contacto($contacto['codContacto'], $contacto['telemovel'], $contacto['nome'], $contacto['endereco'], $contacto['email']);
    }

    public function insert($nome, $email, $telemovel, $endereco)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO contatos (nome,email,telemovel,endereco) VALUES(:nome,:email, :telemovel, :endereco)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":telemovel", $telemovel);
            $stmt->bindparam(":endereco", $endereco);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($codContacto)
    {
        try {

            $stmt = $this->db->prepare("DELETE FROM contatos WHERE codContacto=:codContacto");
            $stmt->bindparam(":codContacto", $codContacto);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
