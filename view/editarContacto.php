<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Telefônica</title>
    <link rel="stylesheet" href="content/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="content/css/agendaTelefonica.css" />

</head>

<body>
    <section class="main">
        <div class=" dados">
            <h1>Agenda Telefônica</h1>
            <form class="" name="form" method="post" id="form">
                <label for="nome" class="nome">Nome:</label>
                <input type="text" name="nome" value="<?php echo $contact->getNome(); ?>" id="nome" placeholder="Nome Completo" aria-required="Campo Obrigatório">

                <label for="telefone" class="telefone">Telefone</label>
                <input type="tel" name="telemovel" value="<?php echo $contact->getTelemovel(); ?>" id="telemovel" placeholder="9xx xxx xxx" aria-required="Campo Obrigatório">
                <input type="hidden" name="id" value="<?php echo $contact->getCodContacto(); ?>" />
                <label for="email" class="email">Email:</label>
                <input type="email" name="email" value="<?php echo $contact->getEmail(); ?>" id="email" class="form-control" placeholder="anizia@example.com" aria-required="Campo Obrigatório" onclick="addContact()">
                <label for="endereco" class="endereco">Endereço:</label>
                <input type="text" value="<?php echo $contact->getEndereco(); ?>" name="endereco" id="endereco" placeholder="Centralidade do Kilamba, bloco A" aria-required="Campo Obrigatório" onclick="addContact()">
                <div class="justify-content-center">
                    <button type="submit" class="btn btn-success mt-3">Editar Contacto</button>
                </div>
                <input type="hidden" name="form-submitted" value="1" />

            </form>
        </div>

    </section>


    <script src="agendaTelefonica.js"></script>

</body>

</html>