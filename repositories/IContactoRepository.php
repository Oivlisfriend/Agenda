<?php


interface IContactoRepository
{
    public function edit($codContacto, $nome, $email, $telemovel, $endereco);

    public function selectAll();

    public function selectById($codContatcto);

    public function insert($nome, $email, $telemovel, $endereco);

    public function delete($codContatcto);
}
