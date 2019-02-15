-- Adminer 4.6.3 PostgreSQL dump

DROP TABLE IF EXISTS "sample_data";
DROP SEQUENCE IF EXISTS sample_data_id_seq;
CREATE SEQUENCE sample_data_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 1 CACHE 1;

CREATE TABLE "public"."sample_data" (
    "first_name" character varying(255) NOT NULL,
    "last_name" character varying(255) NOT NULL,
    "age" integer NOT NULL,
    "gender" character varying(255) NOT NULL,
    "id" integer DEFAULT nextval('sample_data_id_seq') NOT NULL
) WITH (oids = false);

INSERT INTO "sample_data" ("first_name", "last_name", "age", "gender", "id") VALUES
('Tiny',	'Marry',	19,	'female',	1),
('Dolores',	'Brooks',	29,	'female',	2),
('Cindy',	'Dahl',	24,	'female',	3),
('George',	'Fagan',	30,	'male',	4),
('Chelsea',	'Mendoza',	18,	'female',	5),
('Wayne',	'Hodges',	27,	'male',	6),
('Eric',	'Smith1111',	31,	'male',	7),
('Robert',	'Owens',	42,	'male',	8),
('Candace',	'Hand',	27,	'female',	9),
('William',	'Sosa',	36,	'male',	10),
('Patricia',	'Davis',	23,	'female',	11),
('Nancy1122',	'Sedlacek',	21,	'female',	12),
('t2',	't23456',	21,	'female',	13),
('t3',	't3',	22,	'male',	21),
('t4444',	't4',	44,	'female',	22);

-- 2019-02-13 17:05:45.231+07
