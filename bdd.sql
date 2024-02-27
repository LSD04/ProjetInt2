create table admins
(
    id         bigint unsigned auto_increment
        primary key,
    nom        varchar(255) not null,
    prenom     varchar(255) not null,
    matricule  varchar(255) not null,
    email      varchar(255) not null,
    password   varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint admins_email_unique
        unique (email),
    constraint admins_matricule_unique
        unique (matricule)
)
    collate = utf8mb4_unicode_ci;

create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                        not null,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table locals
(
    id         bigint unsigned auto_increment
        primary key,
    nom        varchar(255) not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    constraint locals_nom_unique
        unique (nom)
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

create table password_reset_tokens
(
    email      varchar(255) not null
        primary key,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    expires_at     timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table users
(
    id             bigint unsigned auto_increment
        primary key,
    nom            varchar(255)         not null,
    prenom         varchar(255)         not null,
    adresse_email  varchar(255)         not null,
    matricule      varchar(255)         not null,
    a_acces        tinyint(1) default 0 not null,
    password       varchar(255)         not null,
    remember_token varchar(100)         null,
    created_at     timestamp            null,
    updated_at     timestamp            null,
    constraint users_adresse_email_unique
        unique (adresse_email),
    constraint users_matricule_unique
        unique (matricule)
)
    collate = utf8mb4_unicode_ci;

create table entree_sortie
(
    id                   bigint unsigned auto_increment
        primary key,
    user_id              bigint unsigned not null,
    local_id             bigint unsigned not null,
    date_et_heure_entree datetime        not null,
    date_et_heure_sortie datetime        null,
    jour_de_la_semaine   varchar(255)    not null,
    statut               varchar(255)    not null,
    created_at           timestamp       null,
    updated_at           timestamp       null,
    constraint entree_sortie_local_id_foreign
        foreign key (local_id) references locals (id),
    constraint entree_sortie_user_id_foreign
        foreign key (user_id) references users (id)
)
    collate = utf8mb4_unicode_ci;

create table utilisateurs
(
    id            bigint unsigned auto_increment
        primary key,
    nom           varchar(255)         not null,
    prenom        varchar(255)         not null,
    adresse_email varchar(255)         not null,
    matricule     varchar(255)         not null,
    a_acces       tinyint(1) default 0 not null,
    created_at    timestamp            null,
    updated_at    timestamp            null,
    password      varchar(255)         not null,
    constraint utilisateurs_adresse_email_unique
        unique (adresse_email),
    constraint utilisateurs_matricule_unique
        unique (matricule)
)
    collate = utf8mb4_unicode_ci;

create table demandes_inscription
(
    id             bigint unsigned auto_increment
        primary key,
    nom            varchar(255)    not null,
    prenom         varchar(255)    not null,
    adresse_email  varchar(255)    not null,
    date_demande   timestamp       not null,
    local_id       bigint unsigned not null,
    statutDemande  varchar(255)    not null,
    utilisateur_id bigint unsigned null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint demandes_inscription_adresse_email_unique
        unique (adresse_email),
    constraint demandes_inscription_local_id_foreign
        foreign key (local_id) references locals (id),
    constraint demandes_inscription_utilisateur_id_foreign
        foreign key (utilisateur_id) references utilisateurs (id)
)
    collate = utf8mb4_unicode_ci;

