CREATE DATABASE ctrlplay;

CREATE TABLE users(
    id int auto_increment primary key,
    name varchar(300),
    email varchar(300),
    avatar_url varchar(300),
    username varchar(300),
    password varchar(300),
    biograph VARCHAR(500),
    gender VARCHAR(10)
);
CREATE TABLE posts(
    postID int auto_increment primary key,
    userID int,
    post_text varchar(300)
);