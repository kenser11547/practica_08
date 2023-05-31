create table cliente(
    cliente_id serial not null,
    cliente_nombre varchar(50) not null,
    cliente_nit varchar(20) not null,
    cliente_situacion smallint not null default 1,
    primary key (cliente_id)
)