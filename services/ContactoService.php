<?php

include_once 'repositories/ContactoRepository.php';
include_once 'services/IContactoService.php';

class ContactoService implements IContactoService
{
    private $ContactoRepository = NULL;

    public function __construct()
    {
        $this->ContactoRepository = new ContactoRepository();
    }

    public function getAllContacto()
    {
        try {

            $res = $this->ContactoRepository->selectAll();
            return $res;
        } catch (Exception $e) {
        }
    }

    public function getContacto($codContacto)
    {
        try {
            $res = $this->ContactoRepository->selectById($codContacto);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createNewContacto($nome, $email, $telemovel, $endereco)
    {
        try {

            $res = $this->ContactoRepository->insert($nome, $email, $telemovel, $endereco);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function editContacto($codContacto, $nome, $email, $telemovel, $endereco)
    {
        try {
            $res = $this->ContactoRepository->edit($codContacto, $nome, $email, $telemovel, $endereco);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function deleteContacto($codContacto)
    {
        try {
            $res = $this->ContactoRepository->delete($codContacto);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
