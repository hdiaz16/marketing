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
('Miguel', 'Flores', 'miguel@root.com', '/usuario.png', '1234', now(), now()),
('Hector', '', 'hector@admin.com', '/usuario.png', '1234', now(), now()),
('Williams', '', 'williams@admin.com', '/usuario.png', '1234', now(), now()),
('Williams2', '', 'williams2@cm.com', '/usuario.png', '1234', now(), now()),
('Paris', '', 'paris@dis.com', '/usuario.png', '1234', now(), now()),
('Paris2', '', 'paris2@dis.com', '/usuario.png', '1234', now(), now()),
('Emma', '', 'emma@gen.com', '/usuario.png', '1234', now(), now()),
('Emma2', '', 'emma2@gen.com', '/usuario.png', '1234', now(), now());

INSERT INTO perfil (usuario_id, rol_id, _create, _update) VALUES
(1, 1, now(), now());
UPDATE perfil set sys_admin_id = 1 where id = 1;

INSERT INTO perfil (usuario_id, sys_admin_id, rol_id, _create, _update) VALUES
(2, 1, 2, now(), now()),
(3, 1, 2, now(), now()),
(4, 3, 3, now(), now()),
(5, 2, 4, now(), now()),
(6, 3, 4, now(), now()),
(7, 2, 5, now(), now()),
(8, 3, 5, now(), now());

INSERT INTO empresa (razon_social, sys_admin_id, contacto, _create, _update) 
VALUES
('Agencia publicitaria WHM', 1, '{"nombre": "dr Miguel Flores", "telefono": "3123123", "correo": "gersonzarate@gmail.com"}', now(), now()),
('Centro Médico Córdoba', 1, '{"nombre": "dr placido zarate", "telefono": "3123123"}', now(), now()),
('Veterinaria patitas', 1, '{"nombre": "dr Florentino Rayas", "telefono": "3123123"}', now(), now());

INSERT INTO empresa_admin (admin_id, empresa_id, _create, _update)
VALUES
(2, 1, now(), now()),
(3, 2, now(), now());


INSERT INTO admin_empleados(admin_id, empleado_id, _create, _update)
VALUES
(2, 4, now(), now()),
(3, 4, now(), now()),
(2, 5, now(), now()),
(3, 6, now(), now()),
(2, 7, now(), now()),
(3, 8, now(), now());


INSERT INTO campania (community_manager_id, nombre, objetivos, propositos, fecha_inicio, fecha_cierre, _create, _update)
VALUES
(4, 'Examen de vista 20% descuento', '["objetivo 1", "objetivo 2"]', '["proposito 1", "proposito 2"]', '2018-11-10', '2018-12-10', now(), now()),
(4, 'Desparasitación 20% descuento', '["objetivo 1", "objetivo 2"]', '["proposito 1", "proposito 2"]', '2018-11-10', '2018-12-10', now(), now());

INSERT INTO red_semantica (campania_id, red, _create,_update)
VALUES
(1, '{"id": 1, "nombre": "exámenes de la visión", "hijos":[{"id": 2, "nombre": "prevencion"}, {"id": 3, "nombre": "tratamientos", "hijos":[]}]}', now(), now()),
(2, '{"id": 1, "nombre": "Desparasitación", "hijos":[{"id": 2, "nombre": "prevencion"}, {"id": 3, "nombre": "tratamientos", "hijos":[]}]}', now(), now());

INSERT INTO campania_empleados (campania_id, empleado_id, _visible)
VALUES
(1, 5, true),
(1, 6, true),
(2, 7, true),
(2, 8, true);

INSERT INTO tarea (estado_tarea_id, red_id, nodo_id, descripcion, condiciones_aceptacion, requisitos, _create, _update)
VALUES
(1, 1, 2, 'publicitar examenes de retina', '[{"condicion": "condicion 1", "aceptada": false}, {"condicion": "condicion 2", "aceptada": true}]', '[{"requisito": "requisito 1", "aceptado": false}, {"requisito": "requisito 2", "aceptado": true}]', now(), now()),
(1, 2, 3, 'resaltar la importancia de higiene de mascotas', '[{"condicion": "condicion 1", "aceptada": false}, {"condicion": "condicion 2", "aceptada": true}]', '[{"requisito": "requisito 1", "aceptado": false}, {"requisito": "requisito 2", "aceptado": true}]', now(), now());

INSERT INTO publicacion (tarea_id, _create, _update)
VALUES
(1, now(), now()),
(2, now(), now());

INSERT INTO subtarea (tarea_id, empleado_id, estado_tarea_id, descripcion, entrega, _create, _update)
VALUES
(1, 7, 1, 'consigue una imagen de ojos con perdida absoluto de vista', '2018-11-30', now(), now()),
(1, 5, 1, 'consigue una imagen de perros antes y despues de desparacitar', '2018-11-30', now(), now());

