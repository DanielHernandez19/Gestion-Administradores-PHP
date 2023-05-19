<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include "../../modulos/nav.php"; ?>
    </header>
    <?php
    require "../../clases/Administrador.php";
    $admin = new Administrador;
    $datos = $admin->getAdministrador();

    ?>
    <div class="container">
        <h1 class="text-center">Lista de Administrador</h1>
        <table class="table table-dark">
            <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Carnet</th>

                <th>Acciones</th>
            </thead>
            <tbody>
                <?php foreach ($datos as $item) { ?>
                    <tr>
                        <td><?php echo $item['nombre'] ?></td>
                        <td><?php echo $item['apellido'] ?></td>
                        <td><?php echo $item['carnet'] ?></td>
                        <td>
                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ModalAdministrador<?php echo $item["id"]; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                                Ver Mas</button>
                        </td>
                        <td>
                            <form action="./actualizarAdministrador.php" method="POST">
                                <input type="hidden" name="id_administrador" value="<?php echo $item["id"]; ?>">
                                <button type="submit" class="btn btn-warning" value="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="POST">
                                <input type="hidden" name="id_administrador" value="<?php echo $item["id"]; ?>">
                                <button type="submit" class="btn btn-danger" value="Eliminar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="ModalAdministrador<?php echo $item["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $item["nombre"] .  " " . $item["apellido"]; ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- asignamos los datos del administrador -->
                                    <h3 class="text-center text-primary">Informacion del Administrador</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Telefono: </strong> <?php echo $item["telefono"] ?></p>
                                            <p><strong>Carnet: </strong> <?php echo $item["carnet"] ?></p>
                                            <p><strong>Correo: </strong> <?php echo $item["correo"] ?></p>
                                        </div>

                                        <div class="col-md-6">
                                            <p><strong>Salario: </strong> <?php echo $item["salario"] ?></p>
                                            <p><strong>Departamento: </strong> <?php echo $item["departamento"] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
        <?php $admin->desactivar();  ?>
    </div>
    <?php include "../../modulos/footer.php"; ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>