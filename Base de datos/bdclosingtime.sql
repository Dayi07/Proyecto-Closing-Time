create database ClosingTime; 
use closingtime;

drop database closingtime;


-- Estructura de la tabla `USUARIO` --
use Closingtime;
select * from usuario;

CREATE TABLE usuario (
  Id_usuario int PRIMARY KEY AUTO_INCREMENT,
  Nombre_usuario varchar(20) NOT NULL,
  Correo_usuario varchar(20) NOT NULL,
  Edad_usuario int(2) NOT NULL,
  Contraseña_usuario varchar(20) NOT NULL,
  Foto_perfil longblob
);





-- Estructura de la tabla `PLAN`
use closingtime;
CREATE TABLE plan (
  Id_plan int PRIMARY KEY AUTO_INCREMENT,
  usuarioID int NOT NULL,
  Nombre_plan varchar(20) NOT NULL,
  Costo_plan int(11) NOT NULL,
  Tiempo_limite datetime NOT NULL,
  Estado_plan boolean DEFAULT False,
  FOREIGN KEY (usuarioID) REFERENCES usuario(Id_usuario) -- Declaramos la FOREIGN KEY --
);




-- Estructura de la tabla `CRONOMETRO`
use closingtime;
CREATE TABLE cronometro (
  Id_cronometro int PRIMARY KEY AUTO_INCREMENT,
  usuarioID int NOT NULL,
  Cantidad_tiempo time NOT NULL,
  Tiempo_personalizado time,
  FOREIGN KEY (usuarioID) REFERENCES usuario(Id_usuario) -- Declaramos la FOREIGN KEY --

);


 use closingtime;
 DELETE FROM Documentos WHERE Codigo_documento = 10;

-- Estructura de la tabla `DOCUMENTOS`
use closingtime;
select * from Documentos;
CREATE TABLE Documentos (
  Codigo_documento int PRIMARY KEY AUTO_INCREMENT,
  usuarioID int NOT NULL,
  Fecha_Hora_entrega datetime NOT NULL, 
  Tipo_documento varchar(20) NOT NULL,
  Estado_documento varchar(15) NOT NULL,
  Archivo varchar(50) NOT NULL,
  FOREIGN KEY (usuarioID) REFERENCES usuario(Id_usuario) -- Declaramos la FOREIGN KEY --
);
use closingtime;
alter table Documentos add Estado_documento varchar(15) NOT NULL;


-- Estructura de la tabla intermedia 'entre usuario y plan'
use closingtime;
CREATE TABLE usuario_plan (
  usuario_id int NOT NULL, 
  plan_id int NOT NULL, 
  entidad_pago varchar (15) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuario(Id_usuario),
  FOREIGN KEY (plan_id) REFERENCES plan(Id_plan)
);