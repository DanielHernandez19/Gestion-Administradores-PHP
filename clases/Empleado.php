<?php

require "Conexion.php";

class Empleado extends Conexion
{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $carnet;
    protected $salario;
    protected $telefono;
    protected $correo;
    protected $password;
    protected $id_departamento;
    protected $id_cargo;
    protected $id_rol;
    protected $id_estado;

    /**CRUD */

    //metodo para los depto
    public function departamento()
    {
        $this->conectar();
        $query = "SELECT * FROM departamento";
        //ejecutando la consulta
        $resultado = mysqli_query($this->conectar, $query);
        return $resultado;
    }

    public function cargo()
    {
        $this->conectar();
        $query = "SELECT * FROM cargo";
        //ejecutando la consulta
        $resultado = mysqli_query($this->conectar, $query);
        return $resultado;
    }

    public function rol()
    {
        $this->conectar();
        $query = "SELECT * FROM rol";
        //ejecutando la consulta
        $resultado = mysqli_query($this->conectar, $query);
        return $resultado;
    }

    public function insertar()
    {
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['salario'], $_POST['carnet'], $_POST['telefono'], $_POST['correo'], $_POST['password'], $_POST['departamento'], $_POST['cargo'])) {
            $this->nombre = $_POST['nombre'];
            $this->apellido = $_POST['apellido'];
            $this->salario = $_POST['salario'];
            $this->carnet = $_POST['carnet'];
            $this->telefono = $_POST['telefono'];
            $this->correo = $_POST['correo'];
            $this->password = $_POST['password'];
            $this->id_departamento = $_POST['departamento'];
            $this->id_cargo = $_POST['cargo'];
            $this->id_rol = 1;
            $this->id_estado = 1; //empleado activo

            //consulta para insertar datos
            $query = "INSERT INTO empleado(nombre, apellido, salario, carnet, telefono, correo, password, id_departamento, id_cargo, id_rol, id_estado)
            VALUES ('$this->nombre', '$this->apellido', $this->salario, '$this->carnet', $this->telefono, '$this->correo', '$this->password', 
            $this->id_departamento, $this->id_cargo, $this->id_rol, $this->id_estado)";
            $result = mysqli_query($this->conectar, $query);

            //validando que se guardo el registro
            if (!empty($result)) {
                header("location: empleados.php");
            } else {
                echo "Error al registrar empleado";
            }
        }
    }

    //obteniendo empleado
    public function getEmpleado()
    {
        $this->conectar();
        $query = "SELECT empleado.*, departamento.nombre AS departamento, cargo.nombre AS cargo  FROM empleado INNER JOIN departamento ON empleado.id_departamento = departamento.id INNER JOIN cargo ON empleado.id_cargo = cargo.id WHERE empleado.id_estado = 1";
        $result = mysqli_query($this->conectar, $query);
        return $result;
    }

    //obteniendo un empleado en base a su id
    public function getEmpleadoById()
    {
        if (isset($_POST['id_empleado'])) {
            $this->id = $_POST['id_empleado'];
            $this->conectar();
            $query = "SELECT empleado.*, departamento.nombre AS departamento, cargo.nombre AS cargo  FROM empleado INNER JOIN departamento ON empleado.id_departamento = departamento.id INNER JOIN cargo ON empleado.id_cargo = cargo.id WHERE empleado.id = $this->id";
            $result = mysqli_query($this->conectar, $query);
            return $result; //[]
        }
    }

    //actualizando el empleado
    public function actualizar()
    {
        if (isset($_POST['nombre'], $_POST['apellido'], $_POST['salario'], $_POST['carnet'], $_POST['telefono'], $_POST['correo'], $_POST['password'], $_POST['departamento'], $_POST['cargo'], $_POST['id_empleado'])) {

            //asignando a las propiedades los campos del formulario
            $this->nombre = $_POST['nombre'];
            $this->apellido = $_POST['apellido'];
            $this->salario = $_POST['salario'];
            $this->carnet = $_POST['carnet'];
            $this->telefono = $_POST['telefono'];
            $this->correo = $_POST['correo'];
            $this->password = $_POST['password'];
            $this->id_departamento = $_POST['departamento'];
            $this->id_cargo = $_POST['cargo'];
            $this->id = $_POST['id_empleado'];

            //consulta para actualizar un empleado por su id
            $query = "UPDATE empleado SET nombre = '$this->nombre', apellido = '$this->apellido', salario = $this->salario, carnet = '$this->carnet', telefono = $this->telefono, correo = '$this->correo', password = '$this->password', id_departamento = $this->id_departamento, id_cargo = $this->id_cargo WHERE id = $this->id";

            $result = mysqli_query($this->conectar, $query);
            //validando que se haya guardado el registro y retorne a otra vista

            //empty => verifica si algo esta vacio o no
            if (!empty($result)) {
                //redireccionando al index
                header("location: empleados.php");
            } else {
                echo "Error al actualizar el empleado";
            }
        }
    }

    //actualizando el estado del empleado en inactivo
    public function desactivar()
    {
        if (isset($_POST['id_empleado'])) {
            $this->id = $_POST['id_empleado']; //6
            $this->id_estado = 2; //empleado inactivo
            $this->conectar();
            $query = "UPDATE empleado SET id_estado = $this->id_estado WHERE id = $this->id";
            $result = mysqli_query($this->conectar, $query);
            if (!empty($result)) {
                echo "";
            } else {
                echo "No se pudo desactivar el empleado";
            }
        }
    }
}
