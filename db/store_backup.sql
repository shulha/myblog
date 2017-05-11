PGDMP                 
        u           store    9.5.6    9.5.6 o    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           1262    17130    store    DATABASE     w   CREATE DATABASE store WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_UA.UTF-8' LC_CTYPE = 'ru_UA.UTF-8';
    DROP DATABASE store;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    6            �           0    0    public    ACL     �   REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;
                  postgres    false    6                        3079    12397    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    17218 
   parameters    TABLE     x   CREATE TABLE parameters (
    id integer NOT NULL,
    title character varying(100),
    unit character varying(255)
);
    DROP TABLE public.parameters;
       public         postgres    false    6            �            1259    17216    attributes_id_seq    SEQUENCE     s   CREATE SEQUENCE attributes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.attributes_id_seq;
       public       postgres    false    200    6            �           0    0    attributes_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE attributes_id_seq OWNED BY parameters.id;
            public       postgres    false    199            �            1259    17133    basket    TABLE     �   CREATE TABLE basket (
    id integer NOT NULL,
    order_id integer,
    product_id integer,
    amount integer,
    price_product money
);
    DROP TABLE public.basket;
       public         postgres    false    6            �            1259    17131    basket_id_seq    SEQUENCE     o   CREATE SEQUENCE basket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.basket_id_seq;
       public       postgres    false    6    182            �           0    0    basket_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE basket_id_seq OWNED BY basket.id;
            public       postgres    false    181            �            1259    17179 
   categories    TABLE     �   CREATE TABLE categories (
    id integer NOT NULL,
    name character varying(100),
    parent_id integer,
    url character varying(150)
);
    DROP TABLE public.categories;
       public         postgres    false    6            �            1259    17177    categories_id_seq    SEQUENCE     s   CREATE SEQUENCE categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categories_id_seq;
       public       postgres    false    6    192            �           0    0    categories_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE categories_id_seq OWNED BY categories.id;
            public       postgres    false    191            �            1259    17237    creditcards    TABLE     i   CREATE TABLE creditcards (
    id integer NOT NULL,
    card_number integer,
    expiration_date date
);
    DROP TABLE public.creditcards;
       public         postgres    false    6            �            1259    17235    creditcards_id_seq    SEQUENCE     t   CREATE SEQUENCE creditcards_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.creditcards_id_seq;
       public       postgres    false    204    6            �           0    0    creditcards_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE creditcards_id_seq OWNED BY creditcards.id;
            public       postgres    false    203            �            1259    17226    users    TABLE     u  CREATE TABLE users (
    id integer NOT NULL,
    name character varying(100),
    login character varying(100),
    password character varying(100),
    "group" character varying(100),
    discount real,
    phone integer,
    email character varying(100),
    address text,
    creditcard_id integer,
    token character varying(100),
    roles character varying(150)
);
    DROP TABLE public.users;
       public         postgres    false    6            �            1259    17224    customers_id_seq    SEQUENCE     r   CREATE SEQUENCE customers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.customers_id_seq;
       public       postgres    false    6    202            �           0    0    customers_id_seq    SEQUENCE OWNED BY     3   ALTER SEQUENCE customers_id_seq OWNED BY users.id;
            public       postgres    false    201            �            1259    17171 
   deliveries    TABLE     �   CREATE TABLE deliveries (
    id integer NOT NULL,
    delivery_date date,
    weight double precision,
    volume double precision,
    delivery_price money,
    status character varying(100)
);
    DROP TABLE public.deliveries;
       public         postgres    false    6            �            1259    17169    deliveries_id_seq    SEQUENCE     s   CREATE SEQUENCE deliveries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.deliveries_id_seq;
       public       postgres    false    6    190            �           0    0    deliveries_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE deliveries_id_seq OWNED BY deliveries.id;
            public       postgres    false    189            �            1259    17141    orders    TABLE     �  CREATE TABLE orders (
    id integer NOT NULL,
    staff_id integer,
    delivery_id integer,
    user_id integer,
    price money,
    delivery_method character varying(100),
    payment_method character varying(100),
    status character varying(100),
    time_date date,
    comment text,
    order_id integer,
    product_id integer,
    amount integer,
    name character varying(255),
    address text,
    phone integer
);
    DROP TABLE public.orders;
       public         postgres    false    6            �            1259    17139    orders_id_seq    SEQUENCE     o   CREATE SEQUENCE orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.orders_id_seq;
       public       postgres    false    184    6             	           0    0    orders_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE orders_id_seq OWNED BY orders.id;
            public       postgres    false    183            �            1259    17259    pages    TABLE     �   CREATE TABLE pages (
    id integer NOT NULL,
    title character varying(50),
    content text,
    url character varying(150)
);
    DROP TABLE public.pages;
       public         postgres    false    6            �            1259    17257    pages_id_seq    SEQUENCE     n   CREATE SEQUENCE pages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.pages_id_seq;
       public       postgres    false    6    206            	           0    0    pages_id_seq    SEQUENCE OWNED BY     /   ALTER SEQUENCE pages_id_seq OWNED BY pages.id;
            public       postgres    false    205            �            1259    17206    parameters_values    TABLE     �   CREATE TABLE parameters_values (
    id integer NOT NULL,
    parameters_id integer,
    products_id integer,
    text text,
    number double precision,
    date date,
    value character varying(255)
);
 %   DROP TABLE public.parameters_values;
       public         postgres    false    6            �            1259    17187    photogallery    TABLE     y   CREATE TABLE photogallery (
    id integer NOT NULL,
    name character varying(100),
    path character varying(150)
);
     DROP TABLE public.photogallery;
       public         postgres    false    6            �            1259    17185    photogallery_id_seq    SEQUENCE     u   CREATE SEQUENCE photogallery_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.photogallery_id_seq;
       public       postgres    false    6    194            	           0    0    photogallery_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE photogallery_id_seq OWNED BY photogallery.id;
            public       postgres    false    193            �            1259    17160 	   positions    TABLE     g   CREATE TABLE positions (
    id integer NOT NULL,
    title character varying(100),
    notice text
);
    DROP TABLE public.positions;
       public         postgres    false    6            �            1259    17158    positions_id_seq    SEQUENCE     r   CREATE SEQUENCE positions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.positions_id_seq;
       public       postgres    false    6    188            	           0    0    positions_id_seq    SEQUENCE OWNED BY     7   ALTER SEQUENCE positions_id_seq OWNED BY positions.id;
            public       postgres    false    187            �            1259    17195    products    TABLE     �   CREATE TABLE products (
    id integer NOT NULL,
    title character varying(100),
    description text,
    category_id integer,
    gallery_id integer,
    store character varying(100),
    preview character varying(255),
    price money
);
    DROP TABLE public.products;
       public         postgres    false    6            �            1259    17193    products_id_seq    SEQUENCE     q   CREATE SEQUENCE products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public       postgres    false    196    6            	           0    0    products_id_seq    SEQUENCE OWNED BY     5   ALTER SEQUENCE products_id_seq OWNED BY products.id;
            public       postgres    false    195            �            1259    17152    staffs    TABLE     �   CREATE TABLE staffs (
    id integer NOT NULL,
    name character varying(100),
    position_id integer,
    email character varying(100),
    phone integer
);
    DROP TABLE public.staffs;
       public         postgres    false    6            �            1259    17150    staffs_id_seq    SEQUENCE     o   CREATE SEQUENCE staffs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.staffs_id_seq;
       public       postgres    false    6    186            	           0    0    staffs_id_seq    SEQUENCE OWNED BY     1   ALTER SEQUENCE staffs_id_seq OWNED BY staffs.id;
            public       postgres    false    185            �            1259    17204    values_id_seq    SEQUENCE     o   CREATE SEQUENCE values_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.values_id_seq;
       public       postgres    false    198    6            	           0    0    values_id_seq    SEQUENCE OWNED BY     <   ALTER SEQUENCE values_id_seq OWNED BY parameters_values.id;
            public       postgres    false    197            3           2604    17136    id    DEFAULT     X   ALTER TABLE ONLY basket ALTER COLUMN id SET DEFAULT nextval('basket_id_seq'::regclass);
 8   ALTER TABLE public.basket ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    182    181    182            8           2604    17182    id    DEFAULT     `   ALTER TABLE ONLY categories ALTER COLUMN id SET DEFAULT nextval('categories_id_seq'::regclass);
 <   ALTER TABLE public.categories ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    191    192    192            >           2604    17240    id    DEFAULT     b   ALTER TABLE ONLY creditcards ALTER COLUMN id SET DEFAULT nextval('creditcards_id_seq'::regclass);
 =   ALTER TABLE public.creditcards ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    204    204            7           2604    17174    id    DEFAULT     `   ALTER TABLE ONLY deliveries ALTER COLUMN id SET DEFAULT nextval('deliveries_id_seq'::regclass);
 <   ALTER TABLE public.deliveries ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    189    190    190            4           2604    17144    id    DEFAULT     X   ALTER TABLE ONLY orders ALTER COLUMN id SET DEFAULT nextval('orders_id_seq'::regclass);
 8   ALTER TABLE public.orders ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    184    183    184            ?           2604    17262    id    DEFAULT     V   ALTER TABLE ONLY pages ALTER COLUMN id SET DEFAULT nextval('pages_id_seq'::regclass);
 7   ALTER TABLE public.pages ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    206    205    206            <           2604    17221    id    DEFAULT     `   ALTER TABLE ONLY parameters ALTER COLUMN id SET DEFAULT nextval('attributes_id_seq'::regclass);
 <   ALTER TABLE public.parameters ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    200    200            ;           2604    17209    id    DEFAULT     c   ALTER TABLE ONLY parameters_values ALTER COLUMN id SET DEFAULT nextval('values_id_seq'::regclass);
 C   ALTER TABLE public.parameters_values ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    198    197    198            9           2604    17190    id    DEFAULT     d   ALTER TABLE ONLY photogallery ALTER COLUMN id SET DEFAULT nextval('photogallery_id_seq'::regclass);
 >   ALTER TABLE public.photogallery ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    194    193    194            6           2604    17163    id    DEFAULT     ^   ALTER TABLE ONLY positions ALTER COLUMN id SET DEFAULT nextval('positions_id_seq'::regclass);
 ;   ALTER TABLE public.positions ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    188    187    188            :           2604    17198    id    DEFAULT     \   ALTER TABLE ONLY products ALTER COLUMN id SET DEFAULT nextval('products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    195    196    196            5           2604    17155    id    DEFAULT     X   ALTER TABLE ONLY staffs ALTER COLUMN id SET DEFAULT nextval('staffs_id_seq'::regclass);
 8   ALTER TABLE public.staffs ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    185    186    186            =           2604    17229    id    DEFAULT     Z   ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('customers_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    202    202            	           0    0    attributes_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('attributes_id_seq', 1, false);
            public       postgres    false    199            �          0    17133    basket 
   TABLE DATA               J   COPY basket (id, order_id, product_id, amount, price_product) FROM stdin;
    public       postgres    false    182   �u       	           0    0    basket_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('basket_id_seq', 1, false);
            public       postgres    false    181            �          0    17179 
   categories 
   TABLE DATA               7   COPY categories (id, name, parent_id, url) FROM stdin;
    public       postgres    false    192   v       		           0    0    categories_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('categories_id_seq', 1, false);
            public       postgres    false    191            �          0    17237    creditcards 
   TABLE DATA               @   COPY creditcards (id, card_number, expiration_date) FROM stdin;
    public       postgres    false    204   ,v       
	           0    0    creditcards_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('creditcards_id_seq', 1, false);
            public       postgres    false    203            	           0    0    customers_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('customers_id_seq', 1, false);
            public       postgres    false    201            �          0    17171 
   deliveries 
   TABLE DATA               X   COPY deliveries (id, delivery_date, weight, volume, delivery_price, status) FROM stdin;
    public       postgres    false    190   Iv       	           0    0    deliveries_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('deliveries_id_seq', 1, false);
            public       postgres    false    189            �          0    17141    orders 
   TABLE DATA               �   COPY orders (id, staff_id, delivery_id, user_id, price, delivery_method, payment_method, status, time_date, comment, order_id, product_id, amount, name, address, phone) FROM stdin;
    public       postgres    false    184   fv       	           0    0    orders_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('orders_id_seq', 1, false);
            public       postgres    false    183            �          0    17259    pages 
   TABLE DATA               1   COPY pages (id, title, content, url) FROM stdin;
    public       postgres    false    206   �v       	           0    0    pages_id_seq    SEQUENCE SET     4   SELECT pg_catalog.setval('pages_id_seq', 1, false);
            public       postgres    false    205            �          0    17218 
   parameters 
   TABLE DATA               .   COPY parameters (id, title, unit) FROM stdin;
    public       postgres    false    200   �v       �          0    17206    parameters_values 
   TABLE DATA               _   COPY parameters_values (id, parameters_id, products_id, text, number, date, value) FROM stdin;
    public       postgres    false    198   �v       �          0    17187    photogallery 
   TABLE DATA               /   COPY photogallery (id, name, path) FROM stdin;
    public       postgres    false    194   �v       	           0    0    photogallery_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('photogallery_id_seq', 1, false);
            public       postgres    false    193            �          0    17160 	   positions 
   TABLE DATA               /   COPY positions (id, title, notice) FROM stdin;
    public       postgres    false    188   �v       	           0    0    positions_id_seq    SEQUENCE SET     8   SELECT pg_catalog.setval('positions_id_seq', 1, false);
            public       postgres    false    187            �          0    17195    products 
   TABLE DATA               c   COPY products (id, title, description, category_id, gallery_id, store, preview, price) FROM stdin;
    public       postgres    false    196   w       	           0    0    products_id_seq    SEQUENCE SET     7   SELECT pg_catalog.setval('products_id_seq', 1, false);
            public       postgres    false    195            �          0    17152    staffs 
   TABLE DATA               >   COPY staffs (id, name, position_id, email, phone) FROM stdin;
    public       postgres    false    186   1w       	           0    0    staffs_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('staffs_id_seq', 1, false);
            public       postgres    false    185            �          0    17226    users 
   TABLE DATA               z   COPY users (id, name, login, password, "group", discount, phone, email, address, creditcard_id, token, roles) FROM stdin;
    public       postgres    false    202   Nw       	           0    0    values_id_seq    SEQUENCE SET     5   SELECT pg_catalog.setval('values_id_seq', 1, false);
            public       postgres    false    197            S           2606    17223    attributes_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY parameters
    ADD CONSTRAINT attributes_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.parameters DROP CONSTRAINT attributes_pkey;
       public         postgres    false    200    200            A           2606    17138    basket_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY basket
    ADD CONSTRAINT basket_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.basket DROP CONSTRAINT basket_pkey;
       public         postgres    false    182    182            K           2606    17184    categories_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_pkey;
       public         postgres    false    192    192            W           2606    17242    creditcards_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY creditcards
    ADD CONSTRAINT creditcards_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.creditcards DROP CONSTRAINT creditcards_pkey;
       public         postgres    false    204    204            U           2606    17234    customers_pkey 
   CONSTRAINT     K   ALTER TABLE ONLY users
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.users DROP CONSTRAINT customers_pkey;
       public         postgres    false    202    202            I           2606    17176    deliveries_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY deliveries
    ADD CONSTRAINT deliveries_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.deliveries DROP CONSTRAINT deliveries_pkey;
       public         postgres    false    190    190            C           2606    17149    orders_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_pkey;
       public         postgres    false    184    184            Y           2606    17267 
   pages_pkey 
   CONSTRAINT     G   ALTER TABLE ONLY pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.pages DROP CONSTRAINT pages_pkey;
       public         postgres    false    206    206            M           2606    17192    photogallery_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY photogallery
    ADD CONSTRAINT photogallery_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.photogallery DROP CONSTRAINT photogallery_pkey;
       public         postgres    false    194    194            G           2606    17168    positions_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY positions
    ADD CONSTRAINT positions_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.positions DROP CONSTRAINT positions_pkey;
       public         postgres    false    188    188            O           2606    17203    products_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public         postgres    false    196    196            E           2606    17157    staffs_pkey 
   CONSTRAINT     I   ALTER TABLE ONLY staffs
    ADD CONSTRAINT staffs_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.staffs DROP CONSTRAINT staffs_pkey;
       public         postgres    false    186    186            Q           2606    17214    values_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY parameters_values
    ADD CONSTRAINT values_pkey PRIMARY KEY (id);
 G   ALTER TABLE ONLY public.parameters_values DROP CONSTRAINT values_pkey;
       public         postgres    false    198    198            Z           2606    17268    basket_order_id_fkey    FK CONSTRAINT     n   ALTER TABLE ONLY basket
    ADD CONSTRAINT basket_order_id_fkey FOREIGN KEY (order_id) REFERENCES orders(id);
 E   ALTER TABLE ONLY public.basket DROP CONSTRAINT basket_order_id_fkey;
       public       postgres    false    182    184    2115            [           2606    17273    basket_product_id_fkey    FK CONSTRAINT     t   ALTER TABLE ONLY basket
    ADD CONSTRAINT basket_product_id_fkey FOREIGN KEY (product_id) REFERENCES products(id);
 G   ALTER TABLE ONLY public.basket DROP CONSTRAINT basket_product_id_fkey;
       public       postgres    false    182    196    2127            `           2606    17278    categories_parent_id_fkey    FK CONSTRAINT     |   ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES categories(id);
 N   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_parent_id_fkey;
       public       postgres    false    192    192    2123            ]           2606    17293    orders_delivery_id_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_delivery_id_fkey FOREIGN KEY (delivery_id) REFERENCES deliveries(id);
 H   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_delivery_id_fkey;
       public       postgres    false    184    190    2121            \           2606    17288    orders_staff_id_fkey    FK CONSTRAINT     n   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_staff_id_fkey FOREIGN KEY (staff_id) REFERENCES staffs(id);
 E   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_staff_id_fkey;
       public       postgres    false    184    186    2117            ^           2606    17298    orders_user_id_fkey    FK CONSTRAINT     k   ALTER TABLE ONLY orders
    ADD CONSTRAINT orders_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);
 D   ALTER TABLE ONLY public.orders DROP CONSTRAINT orders_user_id_fkey;
       public       postgres    false    184    202    2133            c           2606    17318 $   parameters_values_parameters_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY parameters_values
    ADD CONSTRAINT parameters_values_parameters_id_fkey FOREIGN KEY (parameters_id) REFERENCES parameters(id);
 `   ALTER TABLE ONLY public.parameters_values DROP CONSTRAINT parameters_values_parameters_id_fkey;
       public       postgres    false    2131    200    198            d           2606    17323 "   parameters_values_products_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY parameters_values
    ADD CONSTRAINT parameters_values_products_id_fkey FOREIGN KEY (products_id) REFERENCES products(id);
 ^   ALTER TABLE ONLY public.parameters_values DROP CONSTRAINT parameters_values_products_id_fkey;
       public       postgres    false    198    2127    196            a           2606    17308    products_category_id_fkey    FK CONSTRAINT     |   ALTER TABLE ONLY products
    ADD CONSTRAINT products_category_id_fkey FOREIGN KEY (category_id) REFERENCES categories(id);
 L   ALTER TABLE ONLY public.products DROP CONSTRAINT products_category_id_fkey;
       public       postgres    false    2123    196    192            b           2606    17313    products_gallery_id_fkey    FK CONSTRAINT     |   ALTER TABLE ONLY products
    ADD CONSTRAINT products_gallery_id_fkey FOREIGN KEY (gallery_id) REFERENCES photogallery(id);
 K   ALTER TABLE ONLY public.products DROP CONSTRAINT products_gallery_id_fkey;
       public       postgres    false    194    196    2125            _           2606    17303    staffs_position_id_fkey    FK CONSTRAINT     w   ALTER TABLE ONLY staffs
    ADD CONSTRAINT staffs_position_id_fkey FOREIGN KEY (position_id) REFERENCES positions(id);
 H   ALTER TABLE ONLY public.staffs DROP CONSTRAINT staffs_position_id_fkey;
       public       postgres    false    186    188    2119            e           2606    17283    users_creditcard_id_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY users
    ADD CONSTRAINT users_creditcard_id_fkey FOREIGN KEY (creditcard_id) REFERENCES creditcards(id);
 H   ALTER TABLE ONLY public.users DROP CONSTRAINT users_creditcard_id_fkey;
       public       postgres    false    202    2135    204            �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �     