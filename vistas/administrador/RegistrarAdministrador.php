<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Registrar Administrador</title>
</head>

<body>
    <header>
        <?php include "../../modulos/nav.php"; ?>
    </header>
    <?php
    require "../../clases/Administrador.php";
    $admin = new Administrador();
    //asignamos variable para los deptos
    $departamentos = $admin->departamento();

    ?>
    <h1 class="text-center">Registro de Administrador</h1>
    <div class="container">
        <form action="" method="POST">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre">

            <label for="">Apellido</label>
            <input type="text" class="form-control" name="apellido">

            <label for="">Salario</label>
            <input type="text" class="form-control" name="salario">

            <label for="">Carnet</label>
            <input type="text" class="form-control" name="carnet">

            <label for="">Telefono</label>
            <input type="text" class="form-control" name="telefono">

            <label for="">Correo</label>
            <input type="text" class="form-control" name="correo">

            <label for="">Contraseña</label>
            <input type="text" class="form-control" name="password" required>

            <label for="">Seleccione Departamento</label>
            <select name="departamento" id="" class="form-control">
                <?php
                foreach ($departamentos as $item) { ?>
                    <option value=" <?php echo $item["id"]; ?>"><?php echo $item["nombre"]; ?> </option>
                <?php } ?>
            </select>

            <input type="submit" class="btn btn-success mt-4" value="Registrar">
        </form>
        <?php $admin->insertar(); ?>
    </div>
    <?php include "../../modulos/footer.php"; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>