create schema if not exists app;
comment on schema app is 'Alternate schema';

create table if not exists app.poem
(
  id   serial
    constraint poem_pk primary key,
  line varchar(128) not null,
  tsv  tsvector generated always as (to_tsvector('russian', line)) stored
);

comment on table app.poem is 'Стихотворение';
comment on column app.poem.id is 'Идентификатор';
comment on constraint poem_pk on app.poem is 'Первичный ключ';
comment on column app.poem.line is ' Строка стихотворения';
comment on column app.poem.tsv is 'Текстовый поиск';

create index if not exists poem_line_index on app.poem (line);
comment on index app.poem_line_index is 'Равенство и ранжирование данных';

create index if not exists poem_tsv_index on app.poem using gin (tsv);
comment on index app.poem_tsv_index is 'Ускорение полнотекстового поиска';

insert into app.poem (line)
values ('О сколько нам открытий чудных'),
       ('Готовят просвещенья дух'),
       ('И Опыт, сын ошибок трудных,'),
       ('И Гений, парадоксов друг,'),
       ('И Случай, бог изобретатель.')
on conflict do nothing
;

-- drop table if exists app.poem cascade;
