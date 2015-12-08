-- Database: caronas

-- DROP DATABASE caronas;

CREATE DATABASE caronas
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'Portuguese_Brazil.1252'
       LC_CTYPE = 'Portuguese_Brazil.1252'
       CONNECTION LIMIT = -1;


-- Table: caronas

-- DROP TABLE caronas;

CREATE TABLE caronas
(
  id integer NOT NULL DEFAULT nextval('carona_id_seq'::regclass),
  endereco_origem character varying(140) NOT NULL,
  numero_vagas integer,
  CONSTRAINT carona_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE caronas
  OWNER TO postgres;
