create database prueba

use prueba;

create table persona(
  id int auto_increment primary key,
  cui BIGINT,
  nombre varchar(100),
  telefono int,
  direccion varchar(200),
  contrasena varchar(100)
);

INSERT INTO persona(cui, nombre, telefono,direccion,contrasena) VALUES 
select * from persona where cui = 2831827410101 and contrasena = 'contrasena1'

('2831827410101','Erick Alvarado','58496745','san lucas','contrasena1'),
('2831827415678','Alexander Guerra','45738549','guatemala','contrasena2'),
('2831827413456','Carla Orellana','98765421','antigua','contrasena3')