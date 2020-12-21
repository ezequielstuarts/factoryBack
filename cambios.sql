CREATE DATABASE api_rest_laravel
USE api_rest_laravel

CREATE TABLE users{
    id int auto_increment not null,
    name VARCHAR(255),
    surname VARCHAR(50),
    role VARCHAR(20),
    email VARCHAR(255),
    password VARCHAR(255),
    description text,
    image varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    remember_token VARCHAR(255),
    CONSTRAINT pk_users PRIMARY KEY(id)
}

CREATE TABLE categories{
    id int auto_increment not null,
    name VARCHAR(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    CONSTRAINT pk_categories PRIMARY KEY(id)
}

CREATE TABLE posts(){
    id int auto_increment not null,
    user_id  int not null,
    category_id int(255) not null,
    title varchar(255) not null,
    content text not null,
    image varchar(255),
    created_at datetime DEFAULT NULL,
    updated_at datetime DEFAULT NULL,
    CONSTRAINT pk_posts PRIMARY KEY(id),
    CONSTRAINT fk_post_user FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_post_categories FOREIGN KEY(category_id) REFERENCES categories(id)
}