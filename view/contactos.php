<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Telefônica</title>
    <link rel="stylesheet" href="content/bootstrap/css/bootstrap.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web">
    </script>
</head>

<body>
    <div class="navbar bg-light mb-4  navbar-default navbar-static-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <h1 class="navbar-brand text-dark">Lista telefônica</h1>
            </div>
        </div>
    </div>
    <div class="container mb-3">
        <a href="index.php?op=new" class="text-light fw-bold btn btn-large btn-success">
            <i class="ph ph-plus fw-bold"></i>

            &nbsp; Add new contact
        </a>
    </div>

    <div class="container">
        <table class='table table-bordered table-responsive'>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>E - mail ID</th>
                <th>Address</th>
                <th colspan="2" align="center">Actions</th>
            </tr>
            <?php foreach ($contacts as $contact) : ?>
                <tr>
                    <td><?php echo $contact->getCodContacto(); ?></td>
                    <td><?php echo $contact->getNome(); ?></td>
                    <td><?php echo $contact->getTelemovel(); ?></td>
                    <td><?php echo $contact->getEmail(); ?></td>
                    <td><?php echo $contact->getEndereco(); ?></td>
                    <td align="center">
                        <a class="text-decoration-none" href="index.php?op=details&id=<?php echo $contact->getCodContacto(); ?>"><i class="ph ph-pencil-simple"></i></a>
                    </td>
                    <td align="center">
                        <a class="text-decoration-none" href="index.php?op=delete&id=<?php echo $contact->getCodContacto(); ?>"><i class="ph ph-trash text-danger "></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="7" align="center">
                    <div class="pagination-wrap">
                    </div>
                </td>
            </tr>
            <input type="hidden" name="form-submitted" value="1" />

        </table>
    </div>

    <script src="scripts/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>