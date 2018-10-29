--CATALOGOS 

--catalogo usuario
CREATE TABLE usuario (
  id serial PRIMARY KEY,
  nombres text,
  apellidos text,
  correo text,
  imagenURL text,
  contrasenia chkpass, 
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);
--catalogo rol
CREATE TABLE rol (
  id serial PRIMARY KEY,
  nombre text
);
--entidades fuertes
CREATE TABLE perfil (
  id serial PRIMARY KEY,
  usuario_id integer REFERENCES usuario ON DELETE CASCADE ON UPDATE CASCADE,
  rol_id integer REFERENCES rol ON DELETE CASCADE ON UPDATE CASCADE,
  sys_admin_id integer REFERENCES perfil ON DELETE CASCADE ON UPDATE CASCADE,
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

--catalogo empresas
CREATE TABLE empresa ( 
  id serial PRIMARY KEY,
  razon_social text,
  logoURL text,
  sys_admin_id integer REFERENCES perfil ON DELETE CASCADE ON UPDATE CASCADE,
  contacto text DEFAULT 'contacto@contacto.com',
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

CREATE TABLE empresa_admin(
  admin_id integer REFERENCES perfil ON DELETE CASCADE ON UPDATE CASCADE,
  empresa_id integer REFERENCES empresa ON DELETE CASCADE ON UPDATE CASCADE,
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

CREATE TABLE admin_empleados(
  admin_id integer REFERENCES perfil ON DELETE CASCADE ON UPDATE CASCADE,
  empleado_id integer REFERENCES perfil ON DELETE CASCADE ON UPDATE CASCADE,
  _visible boolean DEFAULT true,
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

--entidad campanas
CREATE TABLE campania (
  id serial PRIMARY KEY,
  community_manager_id integer REFERENCES perfil ON DELETE CASCADE ON UPDATE CASCADE,
  nombre text,
  objetivos jsonb DEFAULT '["Aumentar ventas", "Promocionar producto nuevo"]',
  propositos jsonb DEFAULT '["ampliar el alcance del producto"]',
  fecha_inicio date,
  fecha_cierre date,
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

--entidad red semantica
CREATE TABLE red_semantica(
  id serial PRIMARY KEY,
  campania_id integer REFERENCES campania ON DELETE CASCADE ON UPDATE CASCADE,
  red jsonb DEFAULT '{"nombre": "nodo padre", "id": 1, "kpis": {"kpis_acumulados": {"likes": 0}}, "hijos": [{"nombre": "nodo hijo", "id":2, "kpis":{"kpis_acumulados": {"likes": 0}},"hijos":[]}]}',
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

CREATE TABLE estado_tarea(
  id serial PRIMARY KEY,
  nombre text
);

CREATE TABLE tarea(
  id serial PRIMARY KEY,
  estado_tarea_id integer REFERENCES estado_tarea ON DELETE CASCADE ON UPDATE CASCADE,
  red_id integer REFERENCES red_semantica ON DELETE CASCADE ON UPDATE CASCADE,
  nodo_id integer,
  descripcion text,
  condiciones_aceptacion jsonb DEFAULT '[{"nombre": "", "estado": false},{"nombre": "conseguir # likes", "estado": false}]',
  requisitos jsonb DEFAULT '["# impresiones en el primer dia", "imagen atractiva"]',
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

CREATE TABLE subtarea(
  id serial PRIMARY KEY,
  tarea_id integer REFERENCES tarea ON DELETE CASCADE ON UPDATE CASCADE,
  empleado_id integer REFERENCES perfil ON DELETE CASCADE ON UPDATE CASCADE,
  estado_tarea_id integer REFERENCES estado_tarea ON DELETE CASCADE ON UPDATE CASCADE,
  descripcion text,
  entrega timestamp WITH TIME ZONE,
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
);

CREATE TABLE publicacion(
  id serial PRIMARY KEY,
  tarea_id integer REFERENCES tarea ON DELETE CASCADE ON UPDATE CASCADE,
  facebook_id text,
  contenido jsonb DEFAULT '{"titulo": "", "contenido": "", "link": "", "fotourl": ["", ""], "videourl": "", "fechapublicacion": ""}',
  _create timestamp WITH TIME ZONE,
  _update timestamp WITH TIME ZONE,
  _erase timestamp WITH TIME ZONE
  
);

