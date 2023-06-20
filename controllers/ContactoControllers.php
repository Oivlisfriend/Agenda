<?php

require_once 'services/ContactoService.php';

class ContactoController
{

    public function redirect($location)
    {
        header('Location: ' . $location);
    }

    private $contactoService = NULL;

    public function __construct()
    {
        $this->contactoService = new ContactoService();
    }
    public function requestsHandler()
    {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'list') {
                $this->getAllContacto();
            } else if ($op == 'new') {
                $this->saveContact();
            } else if ($op == 'delete') {
                $this->deleteContact();
            } else if ($op == 'details') {
                $this->editContacto();
            } else {
                //$this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            //    $this->showError("Application error", $e->getMessage());
        }
    }

    public function editContacto()
    {
        $nome = '';
        $email = '';
        $telemovel = '';
        $endereco = '';

        if (isset($_POST['form-submitted'])) {

            $nome = isset($_POST['nome']) ? filter_input(INPUT_POST, 'nome') : NULL;
            $codContacto = isset($_POST['id']) ? filter_input(INPUT_POST, 'id') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $telemovel = isset($_POST['telemovel']) ? filter_input(INPUT_POST, 'telemovel') : NULL;
            $endereco = isset($_POST['endereco']) ? filter_input(INPUT_POST, 'endereco') : NULL;

            try {
                $this->contactoService->editContacto($codContacto, $nome, $email, $telemovel, $endereco);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;
        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }
        $contact = $this->contactoService->getContacto($id);


        include 'view/editarContacto.php';
    }

    public function saveContact()
    {
        $nome = '';
        $email = '';
        $telemovel = '';
        $endereco = '';
        $errors = array();

        if (isset($_POST['form-submitted'])) {

            $nome = isset($_POST['nome']) ? filter_input(INPUT_POST, 'nome') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $telemovel = isset($_POST['telemovel']) ? filter_input(INPUT_POST, 'telemovel') : NULL;
            $endereco = isset($_POST['endereco']) ? filter_input(INPUT_POST, 'endereco') : NULL;
            try {
                $this->contactoService->createNewContacto($nome, $email, $telemovel, $endereco);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        include 'view/criarContacto.php';
    }
    public function deleteContact()
    {
        $filterId = filter_input(INPUT_GET, 'id');
        $id = isset($filterId) ? $filterId : NULL;
        if (!$id) {
            throw new Exception('Ocorreu um erro.');
        }
        try {
            $this->contactoService->deleteContacto($id);
            $this->redirect('index.php');
            return;
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }
    public function getAllContacto()
    {
        $contacts = $this->contactoService->getAllContacto();
        include './view/contactos.php';
    }
}
