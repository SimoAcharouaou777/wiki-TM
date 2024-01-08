
CREATE DATABASE wiki ;


CREATE TABLE roles (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50)
);

CREATE TABLE users (
    id int PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR (255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    role_id int,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE categories (
     id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

CREATE TABLE wikies (
    id int PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    content VARCHAR(255),
    author VARCHAR(255),
    archived TINYINT(1) NOT NULL,
    user_id int,
    category_id int , 
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE ,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);



CREATE TABLE tags (
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);

CREATE TABLE tag_wiki (
    wiki_id int,
    tag_id int,
    FOREIGN KEY (wiki_id) REFERENCES wikies(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE ON UPDATE CASCADE
);

