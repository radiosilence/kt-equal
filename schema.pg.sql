create table articles (
    id serial primary key,
    title varchar,
    body text,
    author varchar,
    "date" varchar,
    publisher varchar,
    date_added timestamp with time zone
);
    

create table pages (
    id serial primary key,
    section integer references sections(id),
    title varchar,
    url varchar,
    content text,
    last_modified timestamp with time zone,
    "order" integer,
    is_markdown integer
);

create table sections (
    id serial primary key,
    title varchar,
    name varchar,
    image varchar,
    introduction text,
    "order" integer
);
