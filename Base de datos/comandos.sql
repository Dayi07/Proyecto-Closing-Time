use closingtime;

-- Comandos DLL -- 

DROP VIEW ''; -- Eliminar alguna vista --

ALTER TABLE usuario ADD FOREIGN KEY (Est_plan) REFERENCES plan(Estado_plan); -- Declaramos la FOREIGN KEY --
ALTER TABLE compra ADD FOREIGN KEY (Usuario_id) REFERENCES usuario(Id_usuario);



-- Comandos DML --

INSERT INTO  usuario (Nombre_usuario, Edad_usuario, Correo_usuario, Contraseña_usuario) 
    VALUES ('$Nombre', '$Edad','$Correo', '$Contrasena'); -- Ingresamos datos a la BD

SELECT * FROM usuario WHERE Correo_usuario = '$Correo' AND Contraseña_usuario = '$Contrasena'; -- Buscamos datos en la BD

UPDATE usuario SET Contraseña_usuario = '$ContraNueva' WHERE  Correo_usuario = '$Correo'; -- Cambiamos datos en la BD

SELECT * FROM usuario WHERE Correo_usuario = "marilyn@gmail.com"; -- Buscar datos segun una condicion