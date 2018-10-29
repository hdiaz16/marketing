INSERT INTO rol (nombre) VALUES
('root'),
('administrador'),
('community manager'),
('diseñador'),
('generador'),
('cliente');

INSERT INTO estado_tarea (nombre) VALUES
('en proceso'),
('aceptada'),
('cancelada'),
('atrasada');

INSERT INTO usuario (nombres, apellidos, correo, imagenURL, contrasenia, _create, _update) VALUES
('Miguel', 'Flores', 'miguel@admin.com', '/usuario.png', '1234', now(), now()),
('Hector', '', 'hector@admin.com', '/usuario.png', '1234', now(), now()),
('Williams', '', 'Williams@admin.com', '/usuario.png', '1234', now(), now());

INSERT INTO perfil (usuario_id, rol_id, _create, _update) VALUES
(1, 2, now(), now()),
(2, 2, now(), now()),
(3, 2, now(), now());

UPDATE perfil SET sys_admin_id = 1 WHERE usuario_id = 1;
UPDATE perfil SET sys_admin_id = 2 WHERE usuario_id = 2;
UPDATE perfil SET sys_admin_id = 3 WHERE usuario_id = 3;
