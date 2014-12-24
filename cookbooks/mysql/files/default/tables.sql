CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) unique
);

CREATE TABLE themes (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    description TEXT DEFAULT NULL,
    map_id INT DEFAULT NULL
);

CREATE TABLE maps (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    description TEXT DEFAULT NULL,
    owner_id INT,
    theme_id INT DEFAULT NULL,
    imagename VARCHAR(50) DEFAULT NULL,
    count INT,
    follower INT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
