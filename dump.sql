--
-- PostgreSQL database dump
--

-- Dumped from database version 14.2
-- Dumped by pg_dump version 14.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    cd_cat integer NOT NULL,
    desc_cat character varying(50) NOT NULL
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- Name: categoria_cd_cat_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categoria_cd_cat_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_cd_cat_seq OWNER TO postgres;

--
-- Name: categoria_cd_cat_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categoria_cd_cat_seq OWNED BY public.categoria.cd_cat;


--
-- Name: compra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.compra (
    cd_compra integer NOT NULL,
    cd_func integer NOT NULL,
    cd_prod integer NOT NULL,
    dt_compra date NOT NULL
);


ALTER TABLE public.compra OWNER TO postgres;

--
-- Name: compra_cd_compra_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.compra_cd_compra_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.compra_cd_compra_seq OWNER TO postgres;

--
-- Name: compra_cd_compra_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.compra_cd_compra_seq OWNED BY public.compra.cd_compra;


--
-- Name: funcionario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.funcionario (
    cd_func integer NOT NULL,
    nome_func character varying(50) NOT NULL,
    end_func character varying(100) NOT NULL,
    cpf_func character(11) NOT NULL,
    tipo_func integer NOT NULL,
    login character varying(50),
    senha character varying(50),
    chave_usuario character varying(50),
    email character varying
);


ALTER TABLE public.funcionario OWNER TO postgres;

--
-- Name: funcionario_cd_func_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.funcionario_cd_func_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.funcionario_cd_func_seq OWNER TO postgres;

--
-- Name: funcionario_cd_func_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.funcionario_cd_func_seq OWNED BY public.funcionario.cd_func;


--
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto (
    cd_prod integer NOT NULL,
    nome_prod character varying(50) NOT NULL,
    quant_prod integer NOT NULL,
    tipo_prod integer NOT NULL,
    arquivo character varying
);


ALTER TABLE public.produto OWNER TO postgres;

--
-- Name: produto_cd_prod_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produto_cd_prod_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produto_cd_prod_seq OWNER TO postgres;

--
-- Name: produto_cd_prod_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produto_cd_prod_seq OWNED BY public.produto.cd_prod;


--
-- Name: produto_imagens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto_imagens (
    cd_prod integer NOT NULL,
    id_prod integer NOT NULL,
    arquivos character varying(100)
);


ALTER TABLE public.produto_imagens OWNER TO postgres;

--
-- Name: produto_imagens_cd_prod_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produto_imagens_cd_prod_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produto_imagens_cd_prod_seq OWNER TO postgres;

--
-- Name: produto_imagens_cd_prod_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produto_imagens_cd_prod_seq OWNED BY public.produto_imagens.cd_prod;


--
-- Name: tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tipo (
    cd_tipo integer NOT NULL,
    desc_tipo character varying(50) NOT NULL
);


ALTER TABLE public.tipo OWNER TO postgres;

--
-- Name: tipo_cd_tipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tipo_cd_tipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_cd_tipo_seq OWNER TO postgres;

--
-- Name: tipo_cd_tipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tipo_cd_tipo_seq OWNED BY public.tipo.cd_tipo;


--
-- Name: categoria cd_cat; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria ALTER COLUMN cd_cat SET DEFAULT nextval('public.categoria_cd_cat_seq'::regclass);


--
-- Name: compra cd_compra; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra ALTER COLUMN cd_compra SET DEFAULT nextval('public.compra_cd_compra_seq'::regclass);


--
-- Name: funcionario cd_func; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.funcionario ALTER COLUMN cd_func SET DEFAULT nextval('public.funcionario_cd_func_seq'::regclass);


--
-- Name: produto cd_prod; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto ALTER COLUMN cd_prod SET DEFAULT nextval('public.produto_cd_prod_seq'::regclass);


--
-- Name: produto_imagens cd_prod; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_imagens ALTER COLUMN cd_prod SET DEFAULT nextval('public.produto_imagens_cd_prod_seq'::regclass);


--
-- Name: tipo cd_tipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo ALTER COLUMN cd_tipo SET DEFAULT nextval('public.tipo_cd_tipo_seq'::regclass);


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.categoria VALUES (2, 'HD');
INSERT INTO public.categoria VALUES (3, 'PROCESSADOR');
INSERT INTO public.categoria VALUES (4, 'PLACA DE VÍDEO');
INSERT INTO public.categoria VALUES (5, 'MONITOR');
INSERT INTO public.categoria VALUES (6, 'TECLADO');
INSERT INTO public.categoria VALUES (7, 'MOUSE');
INSERT INTO public.categoria VALUES (8, 'NOTEBOOK');
INSERT INTO public.categoria VALUES (9, 'DESKTOP');
INSERT INTO public.categoria VALUES (11, 'CARTÃO SD');
INSERT INTO public.categoria VALUES (10, 'PEN DRIVE');
INSERT INTO public.categoria VALUES (12, 'MEMORIA');
INSERT INTO public.categoria VALUES (13, 'FONE DE OUVIDO');


--
-- Data for Name: compra; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: funcionario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.funcionario VALUES (1, 'Fabio Souza', 'Rua.São paulo - 234', '23456789022', 4, 'admin1', 'admin1', NULL, NULL);
INSERT INTO public.funcionario VALUES (4, 'Fabiane teixeira', 'Av.bento gonçalves', '33345678900', 3, 'admin2', 'admin2', NULL, NULL);
INSERT INTO public.funcionario VALUES (6, 'Pedro Nogueira', 'Rua.Alvares coelho', '5678904554 ', 3, NULL, NULL, NULL, NULL);
INSERT INTO public.funcionario VALUES (7, 'Flavio moreira', 'Av.fernando pessoa', '09987654323', 8, NULL, NULL, NULL, NULL);
INSERT INTO public.funcionario VALUES (9, 'Flavia gonçalves', 'av.fernando osorio', '23456789033', 5, NULL, NULL, NULL, NULL);
INSERT INTO public.funcionario VALUES (10, 'ALMA FLORES ', 'GENERAL OSÓRIO', '30067890423', 3, NULL, NULL, NULL, NULL);
INSERT INTO public.funcionario VALUES (3, 'William Silva', 'Av.fernando osorio-678', '00956745688', 2, 'admin3', '1234', 'M2ZPU6ERqx31nAAQ1EmhfMF7X1jUODL12uZT1B1ULHMBEZh37n', 'williamteixeira.pl585@academico.ifsul.edu.br');


--
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produto VALUES (136, 'LG', 8, 5, NULL);
INSERT INTO public.produto VALUES (137, 'GOLDENFIR', 4, 2, NULL);
INSERT INTO public.produto VALUES (138, 'ACER', 10, 8, NULL);
INSERT INTO public.produto VALUES (139, 'HEADPHONE', 34, 13, NULL);


--
-- Data for Name: produto_imagens; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produto_imagens VALUES (10, 136, 'upload_imagens/tv.jpg');
INSERT INTO public.produto_imagens VALUES (11, 136, 'upload_imagens/1g.jpg');
INSERT INTO public.produto_imagens VALUES (12, 136, 'upload_imagens/monitor.jpg');
INSERT INTO public.produto_imagens VALUES (13, 137, 'upload_imagens/goldenfir.jpg');
INSERT INTO public.produto_imagens VALUES (14, 137, 'upload_imagens/HD SSD.jpg');
INSERT INTO public.produto_imagens VALUES (15, 137, 'upload_imagens/hd-ssd-m2.png');
INSERT INTO public.produto_imagens VALUES (16, 138, 'upload_imagens/iii2.jpeg');
INSERT INTO public.produto_imagens VALUES (17, 138, 'upload_imagens/note.jpg');
INSERT INTO public.produto_imagens VALUES (18, 138, 'upload_imagens/notebook.jpg');
INSERT INTO public.produto_imagens VALUES (19, 139, 'upload_imagens/foneheadset.jpg');
INSERT INTO public.produto_imagens VALUES (20, 139, 'upload_imagens/HEAD.jpg');
INSERT INTO public.produto_imagens VALUES (21, 139, 'upload_imagens/HEADPHONE.jpg');


--
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tipo VALUES (2, 'ESTOQUISTA');
INSERT INTO public.tipo VALUES (3, 'ADMINISTRATIVO');
INSERT INTO public.tipo VALUES (4, 'VENDEDOR');
INSERT INTO public.tipo VALUES (5, 'SUBGERENTE');
INSERT INTO public.tipo VALUES (8, 'CONFERENTE');
INSERT INTO public.tipo VALUES (9, 'GERENTE');


--
-- Name: categoria_cd_cat_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categoria_cd_cat_seq', 13, true);


--
-- Name: compra_cd_compra_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.compra_cd_compra_seq', 8, true);


--
-- Name: funcionario_cd_func_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.funcionario_cd_func_seq', 10, true);


--
-- Name: produto_cd_prod_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produto_cd_prod_seq', 139, true);


--
-- Name: produto_imagens_cd_prod_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produto_imagens_cd_prod_seq', 21, true);


--
-- Name: tipo_cd_tipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tipo_cd_tipo_seq', 9, true);


--
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (cd_cat);


--
-- Name: compra compra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra
    ADD CONSTRAINT compra_pkey PRIMARY KEY (cd_compra);


--
-- Name: funcionario funcionario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT funcionario_pkey PRIMARY KEY (cd_func);


--
-- Name: produto_imagens produto_imagens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_imagens
    ADD CONSTRAINT produto_imagens_pkey PRIMARY KEY (cd_prod);


--
-- Name: produto produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_pkey PRIMARY KEY (cd_prod);


--
-- Name: tipo tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tipo
    ADD CONSTRAINT tipo_pkey PRIMARY KEY (cd_tipo);


--
-- Name: compra compra_cd_func_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra
    ADD CONSTRAINT compra_cd_func_fkey FOREIGN KEY (cd_func) REFERENCES public.funcionario(cd_func) ON DELETE CASCADE;


--
-- Name: compra compra_cd_prod_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra
    ADD CONSTRAINT compra_cd_prod_fkey FOREIGN KEY (cd_prod) REFERENCES public.produto(cd_prod) ON DELETE CASCADE;


--
-- Name: funcionario funcionario_tipo_func_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.funcionario
    ADD CONSTRAINT funcionario_tipo_func_fkey FOREIGN KEY (tipo_func) REFERENCES public.tipo(cd_tipo) ON DELETE CASCADE;


--
-- Name: produto_imagens produto_imagens_id_prod_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto_imagens
    ADD CONSTRAINT produto_imagens_id_prod_fkey FOREIGN KEY (id_prod) REFERENCES public.produto(cd_prod);


--
-- Name: produto produto_tipo_prod_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_tipo_prod_fkey FOREIGN KEY (tipo_prod) REFERENCES public.categoria(cd_cat) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

