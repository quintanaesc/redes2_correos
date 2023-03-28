CREATE DATABASE email_service;

USE email_service;

CREATE TABLE empleado (
  id_empleado INT AUTO_INCREMENT PRIMARY KEY,
  nickname CHAR(20),
  cuenta CHAR(20),
  pass CHAR(20)
);

CREATE TABLE correo (
  id_correo INT AUTO_INCREMENT PRIMARY KEY,
  id_remitente INT,
  id_destinatario INT,
  asunto CHAR(50),
  contenido CHAR(200),
  fecha_envio DATETIME,
  FOREIGN KEY (id_remitente) REFERENCES empleado(id_empleado),
  FOREIGN KEY (id_destinatario) REFERENCES empleado(id_empleado)
);

USE email_service;

-- Insertar empleados aleatorios
INSERT INTO empleado (nickname, cuenta, pass)
VALUES 
    ('jdoe', 'jdoe@fino.com', '123456'),
    ('jsmith', 'jsmith@fino.com', 'password'),
    ('rlee', 'rlee@fino.com', 'secret'),
    ('amiller', 'amiller@fino.com', 'changeme'),
    ('jwu', 'jwu@fino.com', 'letmein'),
    ('mlee', 'mlee@fino.com', 'abc123'),
    ('agarcia', 'agarcia@fino.com', 'hello'),
    ('skim', 'skim@fino.com', 'password1'),
    ('cchen', 'cchen@fino.com', 'qwerty'),
    ('rpatel', 'rpatel@fino.com', 'admin');

-- Insertar correos aleatorios
INSERT INTO correo (id_remitente, id_destinatario, asunto, contenido, fecha_envio)
SELECT 
    empleado1.id_empleado AS id_remitente,
    empleado2.id_empleado AS id_destinatario,
    CONCAT('Asunto ', FLOOR(RAND() * 1000)) AS asunto,
    SUBSTR('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed elit quis elit finibus sodales. Nulla convallis leo ac justo sollicitudin varius. Quisque sed est vel felis facilisis malesuada a eu dui. ', 1, 50) AS contenido,
    NOW() - INTERVAL FLOOR(RAND() * 604800) SECOND AS fecha_envio
FROM 
    empleado AS empleado1, 
    empleado AS empleado2
WHERE 
    empleado1.id_empleado <> empleado2.id_empleado
ORDER BY 
    RAND()
LIMIT 30;