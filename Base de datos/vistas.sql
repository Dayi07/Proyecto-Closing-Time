-- VISTAS -- 

-- USUARIOS MAYORES Y MENORES DE EDAD --
SELECT * FROM `closingtime`.`Mayores_edad`;
CREATE VIEW Mayores_edad AS
SELECT Id_usuario, Correo_usuario
FROM usuario
WHERE Edad_usuario >= 18;
 
SELECT * FROM `closingtime`.`Menores_edad`;
CREATE VIEW Menores_edad AS
SELECT Id_usuario, Correo_usuario
FROM usuario
WHERE Edad_usuario < 18;



-- USUARIOS CON PLAN ACTIVO E INACTIVO --
SELECT * FROM `closingtime`.`Usu_planAct`;
CREATE VIEW Usu_planAct AS
SELECT Id_usuario, Nombre_usuario, Correo_usuario
FROM usuario
WHERE Est_plan = 1;

SELECT * FROM `closingtime`.`Usu_planDes`;
CREATE VIEW Usu_planDes AS
SELECT Id_usuario, Nombre_usuario, Correo_usuario
FROM usuario
WHERE Est_plan = 0;



-- COMPRAS DE PLANES SEMANAL --
SELECT * FROM `closingtime`.`planes_semanal`;

use closingtime;
CREATE VIEW planes_semanal AS 
SELECT Id_compra, Codigo_plan, Usuario_id, Nombre_plan
FROM compra 
INNER JOIN plan
ON Nombre_plan = plan.Nombre_plan WHERE Codigo_plan = 1 AND Id_plan = 1;



-- COMPRAS DE PLANES MENSUAL --
SELECT * FROM `closingtime`.`planes_mensual`;

use closingtime;
CREATE VIEW planes_mensual AS 
SELECT Id_compra, Codigo_plan, Usuario_id, Nombre_plan
FROM compra 
INNER JOIN plan
ON Nombre_plan = plan.Nombre_plan WHERE Codigo_plan = 2 AND Id_plan = 2;



-- COMPRAS DE PLANES ANUAL --
SELECT * FROM `closingtime`.`planes_anual`;

use closingtime;
CREATE VIEW planes_anual AS 
SELECT Id_compra, Codigo_plan, Usuario_id, Nombre_plan
FROM compra 
INNER JOIN plan
ON Nombre_plan = plan.Nombre_plan WHERE Codigo_plan = 3 AND Id_plan = 3;