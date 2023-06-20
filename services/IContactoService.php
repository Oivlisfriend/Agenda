<?php

interface IContactoService
{
    public function getAllContacto();

    public function getContacto($codContacto);

    public function createNewContacto($nome, $email, $telemovel, $endereco);

    public function editContacto($codContacto, $nome, $email, $telemovel, $endereco);

    public function deleteContacto($codContatcto);
}
