-- SQL 
-- vim: set ts=3 sw=3 sts=3 si ai: 
-- 
-- openmanagement-mysql.sql
-- -----------------------------------------------------------------------------
-- (c) 2008 NEXTEL DE MEXICO
-- 
-- Andres Aquino <cesar.aquino@nextel.com.mx>
-- $Id: openmanagement-mysql.sql 196 2008-09-09 13:40:11Z andresaquino $

-- Nomenclatura
-- Nombre tablas en singular, para crear los modelos de datos.

-- 1: Crear la instancia (openmanagement)
-- > SELECT user,host,password FROM user;
-- > INSERT INTO user(user,host,password) VALUES('openmanagement','localhost',PASSWORD('pawaman'));
-- > GRANT ALL ON openmanagement.* TO 'openmanagement'@'localhost';
-- > FLUSH PRIVILEGES;


-- 2: Crear tablas

-- user: datos de las cuentas de sistema
DROP TABLE IF EXISTS account;
CREATE TABLE account (
	id INTEGER NOT NULL AUTO_INCREMENT,
	username VARCHAR(16) NOT NULL DEFAULT '',
	uid INTEGER,
	gid INTEGER,
	last_change TIMESTAMP DEFAULT current_timestamp,
	PRIMARY KEY(id)
) ENGINE=InnoDB CHARSET=UTF8;


-- server: servidores registrados
DROP TABLE IF EXISTS servers;
CREATE TABLE servers (
	id INTEGER NOT NULL AUTO_INCREMENT,
	hostname VARCHAR(60) DEFAULT '',
	ip VARCHAR(15),
	PRIMARY KEY(id)
) ENGINE=InnoDB CHARSET=UTF8;


-- request: solicitud de alta/modificación de usuario
DROP TABLE IF EXISTS requests;
CREATE TABLE requests (
	id INTEGER NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id)
) ENGINE=InnoDB CHARSET=UTF8;


-- employee: usuarios responsables de las cuentas en servidores
DROP TABLE IF EXISTS employees;
CREATE TABLE employees (
	id INTEGER NOT NULL AUTO_INCREMENT,
	full_name VARCHAR(100),
	position VARCHAR(60),
	record INTEGER,
	iden VARCHAR(20),
	area VARCHAR(20),
	enterprise VARCHAR(30),
	type_of CHAR(1),
	supervisor_id INTEGER NOT NULL,
	photo TEXT,
	PRIMARY KEY(id)
) ENGINE=InnoDB CHARSET=UTF8;


-- account: cuentas de usuario para ingresar a servidores
DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts (
	server_id INTEGER NOT NULL,
	user_id INTEGER NOT NULL,
	employee_id INTEGER NOT NULL,
	password TEXT,
	status BOOLEAN,
	purpose TEXT,
	record_date date,
	FOREIGN KEY(server_id)
		REFERENCES servers(id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY(user_id)
		REFERENCES users(id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY(employee_id)
		REFERENCES employees(id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
) ENGINE=InnoDB CHARSET=UTF8;



-- password: registro historico de password usados
DROP TABLE IF EXISTS passwords;
CREATE TABLE passwords (
	user_id INTEGER NOT NULL,
	password TEXT,
	lastdate date,
	FOREIGN KEY(user_id)
		REFERENCES users(id)
		ON DELETE CASCADE
		ON UPDATE CASCADE
) ENGINE=InnoDB CHARSET=UTF8;


--
