create database crudempleados_k;
use crudempleados_k;

create table rol(
	id int auto_increment,
	nombre varchar(50),
    primary key(id)
);

CREATE TABLE `estado` (
  `id` int auto_increment,
  `estado` varchar(20),
  primary key(id)
);

create table cargo(
	id int auto_increment,
	nombre varchar(50),
    primary key(id)
);

create table departamento(
	id int auto_increment,
	nombre varchar(50),
    primary key(id)
);

create table empleado(
	`id` int auto_increment,
	`nombre` varchar(50),
    `apellido` varchar(50),
    `salario` double,
    `carnet` varchar(50),
    `telefono` int,
    `correo` varchar(50),
    password varchar(10),
    id_departamento int,
    id_cargo int,
    id_rol int,
    id_estado int,
    primary key(id),
    foreign key (id_departamento) references departamento(id),
    foreign key (id_cargo) references cargo(id),
    foreign key (id_rol) references rol(id),
    foreign key (id_estado) references estado(id)
);
INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `salario`, `carnet`, `telefono`, `correo`, `password`, `id_departamento`, `id_cargo`, 
`id_rol`, `id_estado`) VALUES
(1, 'Jose Luis', 'rosales', 850.25, 'CA1248', 6523145, 'luis@hotmail.com', '123', 4, 2, 1, 1),
(2, 'Carolina ', 'jimenez', 800, 'ma125', 62514789, 'carolinam@gmail.com', '12345', 4, 3, 1, 1),
(3, 'Maria Carmen', 'Benitez Juarez', 500, 'MBJ2023', 75502063, 'carmenMari@gmail.com', '12345', 3, 1, 1, 1);

select * from empleado;

select * from rol;
create table administrador(
	`id` int auto_increment,
	`nombre` varchar(50),
    `apellido` varchar(50),
    `salario` double,
    `carnet` varchar(50),
    `telefono` int,
    `correo` varchar(50),
    password varchar(10),
    id_departamento int,
    id_rol int,
    id_estado int,
    primary key(id),
    foreign key (id_departamento) references departamento(id),
    foreign key (id_rol) references rol(id),
    foreign key (id_estado) references estado(id)
);
INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `salario`, `carnet`, `telefono`, `correo`, `password`, `id_departamento`, `id_rol`, 
`id_estado`) VALUES
(1, 'Jose Luis', 'rosales', 850.25, 'CA1248', 6523145, 'luis@hotmail.com', '123', 4, 2, 1);

select * from administrador;

/* DML*/
/*Insertar registros*/
INSERT INTO cargo(nombre) VALUES ('vendedor');
INSERT INTO cargo(nombre) VALUES ('gerente');
INSERT INTO cargo(nombre) VALUES ('cajero');
INSERT INTO cargo(nombre) VALUES ('conserge');

/*Consultar registros*/
select * from cargo;

/*Insertar registros*/
INSERT INTO rol(nombre) VALUES ('empleado');
INSERT INTO rol(nombre) VALUES ('administrador');

/*Insertar registros*/
INSERT INTO departamento(nombre) VALUES ('San Salvador');
INSERT INTO departamento(nombre) VALUES ('Cabañas');
INSERT INTO departamento(nombre) VALUES ('San Miguel');
INSERT INTO departamento(nombre) VALUES ('Chalatenango');
INSERT INTO departamento(nombre) VALUES ('Ahuachapan');

/*Insertar registros*/
INSERT INTO `estado` (`id`, `estado`) VALUES
(1, 'activo'),
(2, 'inactivo');

/*Insertar registros*/


SELECT empleado.*, departamento.nombre AS departamento, cargo.nombre AS cargo FROM empleado
 INNER JOIN departamento ON empleado.id_departamento = departamento.id
 INNER JOIN cargo ON empleado.id_cargo = cargo.id 
 WHERE empleado.id = 1;