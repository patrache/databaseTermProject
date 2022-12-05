USE db_project;

DROP TABLE if EXISTS Users;
DROP TABLE if EXISTS Agency;
DROP TABLE if EXISTS Star;
DROP TABLE if EXISTS Channel;
DROP TABLE if EXISTS Fan;
DROP TABLE if EXISTS Subscription_token_list;
DROP TABLE if EXISTS Subscription_token;
DROP TABLE if EXISTS Chat_room;
DROP TABLE if EXISTS Chatting;
DROP TABLE if EXISTS Live;
DROP TABLE if EXISTS Posts;
DROP TABLE if EXISTS Comments;

CREATE TABLE Users (
    id  int NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    nickname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    tel VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Agency (
    id int NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    business_no int NOT NULL, 
    tel VARCHAR(50) NOT NULL,
    ceo_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Star (
    user_id int,
    agency_id int,
    contents VARCHAR(255),
    authenticated BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (agency_id) REFERENCES Agency(id)
);

CREATE TABLE Channel (
    star_id int,
    channel_name VARCHAR(50) NOT NULL,
    secret BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (star_id, channel_name),
    Foreign Key (star_id) REFERENCES Star(user_id)
);

CREATE TABLE Fan (
    user_id int,
    star_id int,
    channel_name VARCHAR(50),
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, star_id),
    Foreign Key (user_id) REFERENCES Users(id),
    Foreign Key (star_id) REFERENCES Star(user_id)
);

CREATE TABLE Subscription_token_list (
    star_id int,
    channel_name VARCHAR(50),
    name VARCHAR(50) NOT NULL,
    origin_price int NOT NULL,
    total int NOT NULL,
    sold int NOT NULL,
    remaining int AS (total - sold),
    PRIMARY KEY (star_id, channel_name, name),
    Foreign Key (star_id, channel_name) REFERENCES Channel(star_id, channel_name)
);

CREATE TABLE Subscription_token(
    star_id int,
    channel_name VARCHAR(50),
    token_name VARCHAR(50),
    fan_id int,
    on_market BOOLEAN DEFAULT 0,
    price int NOT NULL,
    bought_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (star_id, channel_name, token_name, fan_id),
    Foreign Key (fan_id) REFERENCES Users(id),
    Foreign Key (star_id, channel_name, token_name) REFERENCES Subscription_token_list(star_id, channel_name, name)
);

CREATE TABLE Chat_room (
    id int NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    make_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE Chatting (
    user_id int,
    chat_room_id int,
    invited_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, chat_room_id),
    Foreign Key (user_id) REFERENCES Users(id),
    Foreign Key (chat_room_id) REFERENCES Chat_room(id)
);

CREATE TABLE Live (
    star_id int,
    channel_name VARCHAR(50),
    started_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    title VARCHAR(255),
    chat_room_id int,
    PRIMARY KEY (star_id, channel_name),
    Foreign Key (star_id, channel_name) REFERENCES Channel(star_id, channel_name),
    Foreign Key (chat_room_id) REFERENCES Chat_room(id)
);

CREATE TABLE Posts (
    star_id int,
    channel_name VARCHAR(50),
    write_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    title VARCHAR(50) NOT NULL,
    views int DEFAULT 0,
    contents MEDIUMTEXT,
    likes int DEFAULT 0,
    PRIMARY KEY (star_id, channel_name, write_at),
    Foreign Key (star_id, channel_name) REFERENCES Channel(star_id, channel_name)
);

CREATE TABLE Comments (
    star_id int,
    channel_name VARCHAR(50),
    post_write_at TIMESTAMP,
    writer int,
    write_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    contents TEXT NOT NULL,
    likes int DEFAULT 0,
    PRIMARY KEY (star_id, channel_name ,post_write_at, writer, write_at),
    Foreign Key (star_id, channel_name, post_write_at) REFERENCES Posts(star_id, channel_name, write_at),
    Foreign Key (writer) REFERENCES Users(id)
);