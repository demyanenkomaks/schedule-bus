PGDMP     9                    x            schedule-bus    11.3    11.3 Y    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    17106    schedule-bus    DATABASE     �   CREATE DATABASE "schedule-bus" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';
    DROP DATABASE "schedule-bus";
             postgres    false            �            1259    17107    auth_assignment    TABLE     �   CREATE TABLE public.auth_assignment (
    item_name character varying(64) NOT NULL,
    user_id character varying(64) NOT NULL,
    created_at integer
);
 #   DROP TABLE public.auth_assignment;
       public         postgres    false            �            1259    17110 	   auth_item    TABLE     �   CREATE TABLE public.auth_item (
    name character varying(64) NOT NULL,
    type smallint NOT NULL,
    description text,
    rule_name character varying(64),
    data bytea,
    created_at integer,
    updated_at integer
);
    DROP TABLE public.auth_item;
       public         postgres    false            �            1259    17116    auth_item_child    TABLE     }   CREATE TABLE public.auth_item_child (
    parent character varying(64) NOT NULL,
    child character varying(64) NOT NULL
);
 #   DROP TABLE public.auth_item_child;
       public         postgres    false            �            1259    17119 	   auth_rule    TABLE     �   CREATE TABLE public.auth_rule (
    name character varying(64) NOT NULL,
    data bytea,
    created_at integer,
    updated_at integer
);
    DROP TABLE public.auth_rule;
       public         postgres    false            �            1259    17125    contacts_station    TABLE     �  CREATE TABLE public.contacts_station (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    address character varying(255),
    working character varying(255),
    contacts character varying(255),
    latitude character varying(15),
    longitude character varying(15),
    created_at integer,
    updated_at integer,
    user_created integer,
    user_updated integer
);
 $   DROP TABLE public.contacts_station;
       public         postgres    false            �            1259    17131    contacts_station_id_seq    SEQUENCE     �   CREATE SEQUENCE public.contacts_station_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.contacts_station_id_seq;
       public       postgres    false    200            �           0    0    contacts_station_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.contacts_station_id_seq OWNED BY public.contacts_station.id;
            public       postgres    false    201            �            1259    17133    flights    TABLE     �   CREATE TABLE public.flights (
    id bigint NOT NULL,
    id_route integer NOT NULL,
    id_station integer NOT NULL,
    "order" integer
);
    DROP TABLE public.flights;
       public         postgres    false            �            1259    17136    flights_id_seq    SEQUENCE     w   CREATE SEQUENCE public.flights_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.flights_id_seq;
       public       postgres    false    202            �           0    0    flights_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.flights_id_seq OWNED BY public.flights.id;
            public       postgres    false    203            �            1259    17138    menu    TABLE     �   CREATE TABLE public.menu (
    id integer NOT NULL,
    name character varying(128) NOT NULL,
    parent integer,
    route character varying(255),
    "order" integer,
    data bytea
);
    DROP TABLE public.menu;
       public         postgres    false            �            1259    17144    menu_id_seq    SEQUENCE     �   CREATE SEQUENCE public.menu_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.menu_id_seq;
       public       postgres    false    204            �           0    0    menu_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.menu_id_seq OWNED BY public.menu.id;
            public       postgres    false    205            �            1259    17146 	   migration    TABLE     g   CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);
    DROP TABLE public.migration;
       public         postgres    false            �            1259    17149    news    TABLE     /  CREATE TABLE public.news (
    id integer NOT NULL,
    title text NOT NULL,
    url text NOT NULL,
    img text,
    abbreviated text,
    text_full text,
    created_at integer,
    updated_at integer,
    user_created integer,
    user_updated integer,
    date_placement timestamp with time zone
);
    DROP TABLE public.news;
       public         postgres    false            �            1259    17155    news_id_seq    SEQUENCE     �   CREATE SEQUENCE public.news_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.news_id_seq;
       public       postgres    false    207            �           0    0    news_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.news_id_seq OWNED BY public.news.id;
            public       postgres    false    208            �            1259    17264    partners    TABLE     o   CREATE TABLE public.partners (
    id integer NOT NULL,
    title text NOT NULL,
    img text,
    url text
);
    DROP TABLE public.partners;
       public         postgres    false            �            1259    17262    partners_id_seq    SEQUENCE     �   CREATE SEQUENCE public.partners_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.partners_id_seq;
       public       postgres    false    216            �           0    0    partners_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.partners_id_seq OWNED BY public.partners.id;
            public       postgres    false    215            �            1259    17157    route_schedule    TABLE     I  CREATE TABLE public.route_schedule (
    id integer NOT NULL,
    otpr time with time zone NOT NULL,
    prib time with time zone NOT NULL,
    flight character varying(10) NOT NULL,
    route text NOT NULL,
    car_model text,
    capacity integer,
    periodicity text,
    carrier text,
    url_pdf text,
    file_bus text
);
 "   DROP TABLE public.route_schedule;
       public         postgres    false            �            1259    17163    route_schedule_id_seq    SEQUENCE     �   CREATE SEQUENCE public.route_schedule_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.route_schedule_id_seq;
       public       postgres    false    209            �           0    0    route_schedule_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.route_schedule_id_seq OWNED BY public.route_schedule.id;
            public       postgres    false    210            �            1259    17165    station    TABLE     m   CREATE TABLE public.station (
    id integer NOT NULL,
    title text NOT NULL,
    address text NOT NULL
);
    DROP TABLE public.station;
       public         postgres    false            �            1259    17171    station_id_seq    SEQUENCE     �   CREATE SEQUENCE public.station_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.station_id_seq;
       public       postgres    false    211            �           0    0    station_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.station_id_seq OWNED BY public.station.id;
            public       postgres    false    212            �            1259    17173    user    TABLE     �  CREATE TABLE public."user" (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    auth_key character varying(32) NOT NULL,
    password_hash character varying(255) NOT NULL,
    password_reset_token character varying(255),
    email character varying(255),
    status smallint DEFAULT 10 NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    verification_token character varying(255) DEFAULT NULL::character varying
);
    DROP TABLE public."user";
       public         postgres    false            �            1259    17181    user_id_seq    SEQUENCE     �   CREATE SEQUENCE public.user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public       postgres    false    213            �           0    0    user_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;
            public       postgres    false    214            �
           2604    17183    contacts_station id    DEFAULT     z   ALTER TABLE ONLY public.contacts_station ALTER COLUMN id SET DEFAULT nextval('public.contacts_station_id_seq'::regclass);
 B   ALTER TABLE public.contacts_station ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    200            �
           2604    17184 
   flights id    DEFAULT     h   ALTER TABLE ONLY public.flights ALTER COLUMN id SET DEFAULT nextval('public.flights_id_seq'::regclass);
 9   ALTER TABLE public.flights ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    203    202            �
           2604    17185    menu id    DEFAULT     b   ALTER TABLE ONLY public.menu ALTER COLUMN id SET DEFAULT nextval('public.menu_id_seq'::regclass);
 6   ALTER TABLE public.menu ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    204            �
           2604    17186    news id    DEFAULT     b   ALTER TABLE ONLY public.news ALTER COLUMN id SET DEFAULT nextval('public.news_id_seq'::regclass);
 6   ALTER TABLE public.news ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    208    207            �
           2604    17267    partners id    DEFAULT     j   ALTER TABLE ONLY public.partners ALTER COLUMN id SET DEFAULT nextval('public.partners_id_seq'::regclass);
 :   ALTER TABLE public.partners ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    216    215    216            �
           2604    17187    route_schedule id    DEFAULT     v   ALTER TABLE ONLY public.route_schedule ALTER COLUMN id SET DEFAULT nextval('public.route_schedule_id_seq'::regclass);
 @   ALTER TABLE public.route_schedule ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    210    209            �
           2604    17188 
   station id    DEFAULT     h   ALTER TABLE ONLY public.station ALTER COLUMN id SET DEFAULT nextval('public.station_id_seq'::regclass);
 9   ALTER TABLE public.station ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    212    211            �
           2604    17189    user id    DEFAULT     d   ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);
 8   ALTER TABLE public."user" ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    214    213            t          0    17107    auth_assignment 
   TABLE DATA               I   COPY public.auth_assignment (item_name, user_id, created_at) FROM stdin;
    public       postgres    false    196   �e       u          0    17110 	   auth_item 
   TABLE DATA               e   COPY public.auth_item (name, type, description, rule_name, data, created_at, updated_at) FROM stdin;
    public       postgres    false    197   �e       v          0    17116    auth_item_child 
   TABLE DATA               8   COPY public.auth_item_child (parent, child) FROM stdin;
    public       postgres    false    198   �f       w          0    17119 	   auth_rule 
   TABLE DATA               G   COPY public.auth_rule (name, data, created_at, updated_at) FROM stdin;
    public       postgres    false    199   *g       x          0    17125    contacts_station 
   TABLE DATA               �   COPY public.contacts_station (id, title, address, working, contacts, latitude, longitude, created_at, updated_at, user_created, user_updated) FROM stdin;
    public       postgres    false    200   Gg       z          0    17133    flights 
   TABLE DATA               D   COPY public.flights (id, id_route, id_station, "order") FROM stdin;
    public       postgres    false    202   �g       |          0    17138    menu 
   TABLE DATA               F   COPY public.menu (id, name, parent, route, "order", data) FROM stdin;
    public       postgres    false    204   �m       ~          0    17146 	   migration 
   TABLE DATA               8   COPY public.migration (version, apply_time) FROM stdin;
    public       postgres    false    206   �m                 0    17149    news 
   TABLE DATA               �   COPY public.news (id, title, url, img, abbreviated, text_full, created_at, updated_at, user_created, user_updated, date_placement) FROM stdin;
    public       postgres    false    207   �n       �          0    17264    partners 
   TABLE DATA               7   COPY public.partners (id, title, img, url) FROM stdin;
    public       postgres    false    216   sp       �          0    17157    route_schedule 
   TABLE DATA               �   COPY public.route_schedule (id, otpr, prib, flight, route, car_model, capacity, periodicity, carrier, url_pdf, file_bus) FROM stdin;
    public       postgres    false    209   �p       �          0    17165    station 
   TABLE DATA               5   COPY public.station (id, title, address) FROM stdin;
    public       postgres    false    211   �v       �          0    17173    user 
   TABLE DATA               �   COPY public."user" (id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, verification_token) FROM stdin;
    public       postgres    false    213   v{       �           0    0    contacts_station_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.contacts_station_id_seq', 2, true);
            public       postgres    false    201            �           0    0    flights_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.flights_id_seq', 319, true);
            public       postgres    false    203            �           0    0    menu_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.menu_id_seq', 1, false);
            public       postgres    false    205            �           0    0    news_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.news_id_seq', 12, true);
            public       postgres    false    208            �           0    0    partners_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.partners_id_seq', 1, true);
            public       postgres    false    215            �           0    0    route_schedule_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.route_schedule_id_seq', 45, true);
            public       postgres    false    210            �           0    0    station_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.station_id_seq', 55, true);
            public       postgres    false    212            �           0    0    user_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('public.user_id_seq', 4, true);
            public       postgres    false    214            �
           2606    17191 $   auth_assignment auth_assignment_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.auth_assignment
    ADD CONSTRAINT auth_assignment_pkey PRIMARY KEY (item_name, user_id);
 N   ALTER TABLE ONLY public.auth_assignment DROP CONSTRAINT auth_assignment_pkey;
       public         postgres    false    196    196            �
           2606    17193 $   auth_item_child auth_item_child_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.auth_item_child
    ADD CONSTRAINT auth_item_child_pkey PRIMARY KEY (parent, child);
 N   ALTER TABLE ONLY public.auth_item_child DROP CONSTRAINT auth_item_child_pkey;
       public         postgres    false    198    198            �
           2606    17195    auth_item auth_item_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.auth_item
    ADD CONSTRAINT auth_item_pkey PRIMARY KEY (name);
 B   ALTER TABLE ONLY public.auth_item DROP CONSTRAINT auth_item_pkey;
       public         postgres    false    197            �
           2606    17197    auth_rule auth_rule_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.auth_rule
    ADD CONSTRAINT auth_rule_pkey PRIMARY KEY (name);
 B   ALTER TABLE ONLY public.auth_rule DROP CONSTRAINT auth_rule_pkey;
       public         postgres    false    199            �
           2606    17199 &   contacts_station contacts_station_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.contacts_station
    ADD CONSTRAINT contacts_station_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.contacts_station DROP CONSTRAINT contacts_station_pkey;
       public         postgres    false    200            �
           2606    17201    route_schedule flight 
   CONSTRAINT     c   ALTER TABLE ONLY public.route_schedule
    ADD CONSTRAINT flight UNIQUE (flight) INCLUDE (flight);
 ?   ALTER TABLE ONLY public.route_schedule DROP CONSTRAINT flight;
       public         postgres    false    209    209            �
           2606    17203    flights flights_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.flights
    ADD CONSTRAINT flights_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.flights DROP CONSTRAINT flights_pkey;
       public         postgres    false    202            �
           2606    17205    menu menu_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.menu DROP CONSTRAINT menu_pkey;
       public         postgres    false    204            �
           2606    17207    migration migration_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);
 B   ALTER TABLE ONLY public.migration DROP CONSTRAINT migration_pkey;
       public         postgres    false    206            �
           2606    17209    news news_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.news DROP CONSTRAINT news_pkey;
       public         postgres    false    207            �
           2606    17272    partners partners_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.partners
    ADD CONSTRAINT partners_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.partners DROP CONSTRAINT partners_pkey;
       public         postgres    false    216            �
           2606    17211 "   route_schedule route_schedule_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.route_schedule
    ADD CONSTRAINT route_schedule_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.route_schedule DROP CONSTRAINT route_schedule_pkey;
       public         postgres    false    209            �
           2606    17213    station station_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.station
    ADD CONSTRAINT station_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.station DROP CONSTRAINT station_pkey;
       public         postgres    false    211            �
           2606    17215 
   news title 
   CONSTRAINT     V   ALTER TABLE ONLY public.news
    ADD CONSTRAINT title UNIQUE (title) INCLUDE (title);
 4   ALTER TABLE ONLY public.news DROP CONSTRAINT title;
       public         postgres    false    207    207            �
           2606    17217    user user_email_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_email_key UNIQUE (email);
 ?   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_email_key;
       public         postgres    false    213            �
           2606    17219 "   user user_password_reset_token_key 
   CONSTRAINT     o   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_password_reset_token_key UNIQUE (password_reset_token);
 N   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_password_reset_token_key;
       public         postgres    false    213            �
           2606    17221    user user_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_pkey;
       public         postgres    false    213            �
           2606    17223    user user_username_key 
   CONSTRAINT     W   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_username_key UNIQUE (username);
 B   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_username_key;
       public         postgres    false    213            �
           1259    17224    idx-auth_assignment-user_id    INDEX     \   CREATE INDEX "idx-auth_assignment-user_id" ON public.auth_assignment USING btree (user_id);
 1   DROP INDEX public."idx-auth_assignment-user_id";
       public         postgres    false    196            �
           1259    17225    idx-auth_item-type    INDEX     J   CREATE INDEX "idx-auth_item-type" ON public.auth_item USING btree (type);
 (   DROP INDEX public."idx-auth_item-type";
       public         postgres    false    197            �
           2606    17226 .   auth_assignment auth_assignment_item_name_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_assignment
    ADD CONSTRAINT auth_assignment_item_name_fkey FOREIGN KEY (item_name) REFERENCES public.auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;
 X   ALTER TABLE ONLY public.auth_assignment DROP CONSTRAINT auth_assignment_item_name_fkey;
       public       postgres    false    196    197    2770            �
           2606    17231 *   auth_item_child auth_item_child_child_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_item_child
    ADD CONSTRAINT auth_item_child_child_fkey FOREIGN KEY (child) REFERENCES public.auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;
 T   ALTER TABLE ONLY public.auth_item_child DROP CONSTRAINT auth_item_child_child_fkey;
       public       postgres    false    198    197    2770            �
           2606    17236 +   auth_item_child auth_item_child_parent_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_item_child
    ADD CONSTRAINT auth_item_child_parent_fkey FOREIGN KEY (parent) REFERENCES public.auth_item(name) ON UPDATE CASCADE ON DELETE CASCADE;
 U   ALTER TABLE ONLY public.auth_item_child DROP CONSTRAINT auth_item_child_parent_fkey;
       public       postgres    false    2770    197    198            �
           2606    17241 "   auth_item auth_item_rule_name_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.auth_item
    ADD CONSTRAINT auth_item_rule_name_fkey FOREIGN KEY (rule_name) REFERENCES public.auth_rule(name) ON UPDATE CASCADE ON DELETE SET NULL;
 L   ALTER TABLE ONLY public.auth_item DROP CONSTRAINT auth_item_rule_name_fkey;
       public       postgres    false    199    2775    197            �
           2606    17246    menu menu_parent_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.menu
    ADD CONSTRAINT menu_parent_fkey FOREIGN KEY (parent) REFERENCES public.menu(id) ON UPDATE CASCADE ON DELETE SET NULL;
 ?   ALTER TABLE ONLY public.menu DROP CONSTRAINT menu_parent_fkey;
       public       postgres    false    204    2781    204            �
           2606    17665    flights route    FK CONSTRAINT     �   ALTER TABLE ONLY public.flights
    ADD CONSTRAINT route FOREIGN KEY (id_route) REFERENCES public.route_schedule(id) ON DELETE CASCADE;
 7   ALTER TABLE ONLY public.flights DROP CONSTRAINT route;
       public       postgres    false    202    2791    209            �
           2606    17256    flights station    FK CONSTRAINT     s   ALTER TABLE ONLY public.flights
    ADD CONSTRAINT station FOREIGN KEY (id_station) REFERENCES public.station(id);
 9   ALTER TABLE ONLY public.flights DROP CONSTRAINT station;
       public       postgres    false    211    2793    202            t   U   x���paÅ�A���.6]l����.NCNCS3Kcsc�.l��(����@5@����8�8c��J�S�8M@�=... �)W      u   �   x�m�K
�@���Q\8��<:��:��/Z�ڍ[�� XD=C�F��Eh!|�?��&���ٿ�ұ��� ������+Ǣ&%��+>�~Ïo�[|F|�g� �*v�]���E�*�#1�����+�~c�O�#�&����j����+G]�����JY������z纩�!��t�m�      v   o   x�KI-K��/H-�����paÅ�`r�}�.�_�qag
LWbJnf�~qfI*P��	�\�T����@�@���8�
a�K�S���AT|y*\;��	����� �	@L      w      x������ � �      x   }   x�U���0��*���r��_T�b ���HQ$��;�� ���<Ox�3fL�ꈕqś��w�l���ٷ�g���zĊ6LG"�lC�NTz.�+N5/�J�>D�����8��`�1;(2;W      z   �  x�5�[�9D�K���=����c".�c�+��袎��ů��g��}�_����m�s�f�?�Y�������;��q[�V]�i=,e����~=�"&r�K,䔣��%_q����v�_�evy�@^����~g��8�Z-qZ�-��F�r����?ҁ��t�#�t����tL:�A�:��@��%8�@'�*Љ�
t���@�p��ۜH:2]:
"�z� �"��)��!Uڶ:R5m+,�"]i帿�ʛ]xsޣ-�)/
t��¡�8ۺ�7�������ã8w ���i�R���+�=�j�z�����n?��׏���jD[��|~�6�?���y�$�D��g���F;���<�����[����\K���~H��*��_Yk7��+z�oV�w���\��R�c�-�{�\��}�ɡ���熐�Ol��`���Y�&�I�GD%_�t�j����|�T.W��
׫�D[/[w�0*�
�ڭ՝��d];�N[�å�e��_��A����|EX�e8�3/ñ�yoy=�n���W,��z���J�j`MrT��/9I�*9ɂJ���+9�L~� #�Xd��.�X�=9�Ǝ�����!s��)s��1si�n�\�W0�4��4҆J7j�3?@b�P�?�2�1oڜg޴9ϼis�y�f����x�']Y�'$/�`�yB��ɮ�l�@�9�͜�h������}��p�*���T��P_�a8��UAE�ص�eW$8|F��QN���Ưs*ϻ��w	��k��q��c��!�7cBͤ !�� �!�A; �:)�-W�k��4�BD7�� �ͣ��@"�2��L�%��n�7�2��s%(%��+a)OQ�L��$2��+�))�\�N���J���%D�|��j�j���M� ��NC\�J������C�ʿ;� ��A�&�Mn�2I�?���2)JI�IQ��LA��L'�fb�5C)�E���[31��3���A�5Ó��Zu�L����ٛ�vW31��j&F�a��0�nU(�B�
�ks�Bᖸ�w�V�Bh�[
��[
7K�����) }���Er� }�N�:P�$�R0(��?I���������1���T@t��.z�S]��`�s���2Bt�cO���=vc2i��!:e�7�'o�����*8�)���E�*:Y�M�����Up�cs0D'kC+D'���-�'����f�e�j�L�wq�K���t,וp7�d��M&���ԭ�"�Nגa]K�7�m�6����WDʷ]�(�W<�:��M��\ћ�Ѯ����I9O]c6�9{o��uYg�K��+��QбJ쥖�C%�������1�h��P��_慣8�A�3_�����v��!�0�|~t�/���D&�w�]�͏�d��d�w�]�Mߙve;?Ӂ�_ry��j�T����'��B��҇��I�Ҹ��uf�i�hn��'��7o��kOȟ������س���j"��_������փ��-��u�nb�$ڿ�Zk���      |      x������ � �      ~   �   x�U��n� �/3�@H�.�,��+jC� ]��5M��X�;�,�:t��E����`� m���VR��(���?�y ���<ӝ7�K~����k^ʅr䍒�\���$��h��%��C�X�ւFEо�lɭ)#�%��2��M��k�
Ӂ�.I
t�3ef~��w9���迃tI{y?���5a����o�T�{����kNt���������Y��*_�M�<"�{         �  x�͒Kn�0E��*ި��?�,9�G��:�$Z�c}�O {���6R����R]'2�̠\���K���j@��7�Pu�΀�d��]kU��d�{mu��f �H����_ �ȧ�F�~��Ymj���{+ϡ7ݽ�T�F:k�Vzi��V7:���I���7�t�-����
�O����黶���	^lQ���_"DEJgI��'�$ʸ�9&)f(�32'��	��p�O�KI��	ʇ���p�\qW��s�4$�X�S�F9�>���e�����_�(~����X����x��dm��Vb��
#ת�[D�x�|���
�j�L}�����f,{�+����W������ָ�f�o��v巫¸�8�<c�8X3��^Ys�υ8X�N&�?�oC      �   W   x�3�0��֋6]쾰��P/� �3�����J_?;?�2�4/��R/9?W?;1[7?)/�,�D�4�4��T7%_��R��D�+F��� H6�      �     x���[o�Dǟg?�(O�X{���:<EQ!@ؕ( �*���Q�F�
�P�4�@Ti��
/@��M��W#Ι��vv=�n�6��+��?�:	k���<c�0IˮC)Z���x]��j�NԿp�N���Ծ�SC�␪-�C�絛��җwWo\�M_��Y�N�U"9�7(.\�x������MX�[u�7X��<&�zBՎ�c�?��>W{T�]��k����g)��a���r@|��I���e�Z3���n�˔�#t�͵�;Ȭ�MG=��9 �g�=��o���B�9y�J���4hҐ�����">� ������BG�w�Wj�QO�ms	pD8� Y���L����xXO�帐�YG)���}z}�xQ*n0�U2��@�&�˰w�#�y[����V-4��U��2sf����~����.ӈ�D�6tѤ^��(�s|�s�����#��N�e���O���x�>�~��_�h@�O������S��ڋ���� �gB��U�f�ftXz�
�X�o�����[�2�"���}��ď���}C�-*:�$W|V� ���!�����=�CaP�"
��b"'ʒ��X#�(]��K�W=4`>�~�E��+7�g ;��ԑL>x��n�����Ҥ��8K�|���g^�ܸ�z�p>t��71�#?5���Y���P�3�T)�ԣk��Њ-�Þ*���OimB>.�@)����D�RcEM���%����P����	��gz�S��~.*�F����O�jD�R���&�%��=�M��7��s�����R�%$���yX$�������v^���HzA�1��z��e����h�/���Ĭ�D��T��\p�)^MS޺��B�{�+��3�6F	0J��1�>�U��j�n�(Z%楟K��Ac��n_�\E�g���ڧ���$��%Y햵���h�IIPTLw�9�׀ڲ?��a����C�����X�PQA^[K���V|,	O��Y�s��ֱ����§Hѷ�̛���IEu��[�zi��u�0@�������I��?�!��!Q3��9��9��d5m|��p��seB;�)U�P�C�e���\�Xü��"2k@9�A�FɂkLWpEd���e���aڂ+R��_�2(˚��"�$G�d�lm�e$;+�>G8G�
���Ҵ��F&׻�����LQ�Ӡ��x���C�g!�����L�*�&^#&�J�
��E+f��Ns|�{�.v��H"��|�&����֔0�r�ZC7n���N���Q2�fbb�s��Z<��!��|�`:/�z���I��ÊI��:�_����v���չf��s��	j��1��ck�ƭ�;��0�0�|>Cr�J��D��B~Q���/#���jyl1%,զNL���dp#0��V��ܡjq��B-�\ù��S����p�g�G�Q��x���02zZe�3[���|v�[���ObΤIl�qk��ǐKM޺ջ���㻟�����J��h4�W�8      �   n  x��VKr�F]cN1�5�p���.9E:�SV�,FN�I�]��MJ$�$�+�\!'�� @X�SZ`3���ׯ{&��7;�9�(�Ǵ���k��	]z��iӤ�ij�숖vHkZQB3��B�.q0�[B)-�%���4��ڎ��١=��=�u�U��{��x���g~qG�liG�����=d���.ඡ/9p�z8B1tM��[X]spJ�+��	%��5,o��y_3��;��$ɐ�B�F�9Nj��_-f�%�;��v(��%W�Q��ՎÙ��Vfrl�E���,�v�5D�$��L�C�3Dܔ�U�?���Ce2r$dLr��}F�w_q
��@�LP�;��j�✋K���i�����(qF{��X������}ddNj�t�aɠn4��`�����maﲭ�IW�圵�sP�Ǖ�
CzeD8�2�D�� *p���)�+�\9u��Ele�ǅt�L��K{Z!�4y+t�X?� ����� ��\������$�Ux"ܭ}!c���B<[��vU�� t���+n_%Qc��ר M�g��$����i�*�䒻��dd��Չ�"Y�L�/0^;�s�{���4+=�43�ʕ����T�o(�N�V��,d8)v��l��|�Z���״�"���{v��u�_w� 4-�=_3Av�6*4L���e���г!�=��EH_�y��ѽH(q#�e�$�hx�t�e*�������X`��_�g���c�����e�a��u���{��0�\5z�&���gA ��G{ì`'�_!ݵ��`Z4Wa�i�U��ڮ���=&�~����X��,J�G�䋩eG�H��U8h�� ��[Y�K\�*�<��A����+d��q�we�N��{H��� ���Ń>��/�w�@77��D�Ϥ�d�m�>�Ń�0����Ʌo-�ٚ�؋ѡZ9HY�����j�%P~�`]G��)�.L=��6����ࠧ"��^�Nע?����_}��}-c�Ov�F��'�'������{�D��s���I^ţp�8��HŲ�g� ��Ul����A��b�m��y�BcJ�t"*���1/�#E�-�$Y�{��8lZ�ϱ���	y�%�WF�~,����ԏm��hM*>      �   r  x�M�M��@���;�:0��:�
���*�VY *� _�¯�b���z��O5a��W�X�ܵ�";�;So�,7��Q�}��JF�!qE�J~0��#o*��M���6O�-��Q6/��a���ya�m�	��_K��s�*�#S�P�$	����hh"�9ꢸ��ӳUhf��n�$�����J�_��O�7��ۇ��+�r�TY�|?��q����ҝ�iA�n{�r�*�Xu ���?^�L�Q�g�Aeq�W���n���k�������6����Y��yI�_獮���Is��k��GƪY�?�g��A��9��ܠ��T��7�!G8V{�C�څ�>������%�҉�=?�����ԍ     