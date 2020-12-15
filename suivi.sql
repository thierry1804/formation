CREATE TABLE public.suivi_bayard_traitement
(
  id integer NOT NULL DEFAULT nextval('suivi_bayard_traitement_id_seq'::regclass),
  date_traitement date,
  heure character varying,
  societe integer,
  nature_traitement integer,
  nb_pli_type integer,
  duree_typage double precision,
  nb_pli_saisie integer,
  duree_saisie double precision,
  temps integer,
  now timestamp without time zone DEFAULT now(),
  CONSTRAINT suivi_bayard_traitement_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.suivi_bayard_traitement
  OWNER TO si;
