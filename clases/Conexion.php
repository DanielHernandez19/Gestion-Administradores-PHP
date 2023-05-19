<?php
class Conexion
{
    protected $conectar;

    public function conectar()
    {
        $this->conectar = mysqli_connect("localhost", "root", "root", "crudempleados_k", 3308);
    }
}
