
-----------------------------------------------------------------------
-- actividad
-----------------------------------------------------------------------

DROP TABLE "actividad" CASCADE;

CREATE TABLE "actividad"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	"ejecutada" BOOLEAN,
	"ponente" VARCHAR(255),
	"cedula_ponente" VARCHAR(255),
	"sexo_ponente" BOOLEAN,
	"nacionalidad_ponente" INTEGER,
	"cantidad_participantes_m" INTEGER,
	"cantidad_participantes_f" INTEGER,
	"alcanzo_tiempo" BOOLEAN,
	"causas_incumplimiento" TEXT,
	"observaciones" TEXT,
	"id_tipo_actividad" INTEGER,
	"fecha" DATE,
	"hora" TIMESTAMP,
	"facilitador" VARCHAR(255),
	"id_feria" INTEGER,
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- estado
-----------------------------------------------------------------------

DROP TABLE "estado" CASCADE;

CREATE TABLE "estado"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	"id_pais" INTEGER,
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- feria
-----------------------------------------------------------------------

DROP TABLE "feria" CASCADE;

CREATE TABLE "feria"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	"descripcion" VARCHAR(255),
	"fecha_inicio" DATE,
	"fecha_fin" DATE,
	"id_pais" INTEGER,
	"id_estado" INTEGER,
	"id_municipio" INTEGER,
	"id_parroquia" INTEGER,
	"id_region" INTEGER,
	"costo" NUMERIC,
	"libro_mas_vendido" VARCHAR(255),
	"autor_libro_mas_vendido" VARCHAR(255),
	"extension_superficie" VARCHAR(255),
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- feria_selloeditorial
-----------------------------------------------------------------------

DROP TABLE "feria_selloeditorial" CASCADE;

CREATE TABLE "feria_selloeditorial"
(
	"id" bigserial NOT NULL,
	"id_feria" INTEGER,
	"id_selloeditorial" INTEGER,
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- municipio
-----------------------------------------------------------------------

DROP TABLE "municipio" CASCADE;

CREATE TABLE "municipio"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	"id_estado" INTEGER,
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- pais
-----------------------------------------------------------------------

DROP TABLE "pais" CASCADE;

CREATE TABLE "pais"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- parroquia
-----------------------------------------------------------------------

DROP TABLE "parroquia" CASCADE;

CREATE TABLE "parroquia"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255) NOT NULL,
	"id_municipio" INTEGER,
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- region
-----------------------------------------------------------------------

DROP TABLE "region" CASCADE;

CREATE TABLE "region"
(
	"id" INTEGER NOT NULL,
	"nombre" VARCHAR(255),
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- sello_editorial
-----------------------------------------------------------------------

DROP TABLE "sello_editorial" CASCADE;

CREATE TABLE "sello_editorial"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	"id_pais" INTEGER,
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- tipo_actividad
-----------------------------------------------------------------------

DROP TABLE "tipo_actividad" CASCADE;

CREATE TABLE "tipo_actividad"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- usuario
-----------------------------------------------------------------------

DROP TABLE "usuario" CASCADE;

CREATE TABLE "usuario"
(
	"id" bigserial NOT NULL,
	"nombre" VARCHAR(255),
	"apellido" VARCHAR(255),
	"cedula" VARCHAR(255),
	"isbn" VARCHAR(255),
	"login" VARCHAR(255),
	"contrasena" VARCHAR(255),
	"sf_guard_user" INTEGER,
	"sexo" BOOLEAN,
	"sf_guard_user_group" INTEGER,
	"correo" VARCHAR(255),
	"telefono" VARCHAR(255),
	PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- visitante
-----------------------------------------------------------------------

DROP TABLE "visitante" CASCADE;

CREATE TABLE "visitante"
(
	"id" bigserial NOT NULL,
	"fecha" DATE,
	"numero" INTEGER,
	"id_feria" INTEGER,
	PRIMARY KEY ("id")
);

ALTER TABLE "actividad" ADD CONSTRAINT "actividad_FK_1"
	FOREIGN KEY ("nacionalidad_ponente")
	REFERENCES "pais" ("id");

ALTER TABLE "actividad" ADD CONSTRAINT "actividad_FK_2"
	FOREIGN KEY ("id_tipo_actividad")
	REFERENCES "tipo_actividad" ("id");

ALTER TABLE "actividad" ADD CONSTRAINT "actividad_FK_3"
	FOREIGN KEY ("id_feria")
	REFERENCES "feria" ("id");

ALTER TABLE "estado" ADD CONSTRAINT "estado_FK_1"
	FOREIGN KEY ("id_pais")
	REFERENCES "pais" ("id");

ALTER TABLE "feria" ADD CONSTRAINT "feria_FK_1"
	FOREIGN KEY ("id_pais")
	REFERENCES "pais" ("id");

ALTER TABLE "feria" ADD CONSTRAINT "feria_FK_2"
	FOREIGN KEY ("id_estado")
	REFERENCES "estado" ("id");

ALTER TABLE "feria" ADD CONSTRAINT "feria_FK_3"
	FOREIGN KEY ("id_municipio")
	REFERENCES "municipio" ("id");

ALTER TABLE "feria" ADD CONSTRAINT "feria_FK_4"
	FOREIGN KEY ("id_parroquia")
	REFERENCES "parroquia" ("id");

ALTER TABLE "feria" ADD CONSTRAINT "feria_FK_5"
	FOREIGN KEY ("id_region")
	REFERENCES "region" ("id");

ALTER TABLE "feria_selloeditorial" ADD CONSTRAINT "feria_selloeditorial_FK_1"
	FOREIGN KEY ("id_feria")
	REFERENCES "feria" ("id");

ALTER TABLE "feria_selloeditorial" ADD CONSTRAINT "feria_selloeditorial_FK_2"
	FOREIGN KEY ("id_selloeditorial")
	REFERENCES "sello_editorial" ("id");

ALTER TABLE "municipio" ADD CONSTRAINT "municipio_FK_1"
	FOREIGN KEY ("id_estado")
	REFERENCES "estado" ("id");

ALTER TABLE "parroquia" ADD CONSTRAINT "parroquia_FK_1"
	FOREIGN KEY ("id_municipio")
	REFERENCES "municipio" ("id");

ALTER TABLE "sello_editorial" ADD CONSTRAINT "sello_editorial_FK_1"
	FOREIGN KEY ("id_pais")
	REFERENCES "pais" ("id");

ALTER TABLE "visitante" ADD CONSTRAINT "visitante_FK_1"
	FOREIGN KEY ("id_feria")
	REFERENCES "feria" ("id");
