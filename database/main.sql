CREATE TABLE users(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(250),
    img VARCHAR(50),
    email VARCHAR(250),
    password VARCHAR(250)
);

CREATE TABLE posts(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    img VARCHAR(50),
    title VARCHAR(250),
    content TEXT,
    seo_url VARCHAR(100),
    status BOOLEAN,
    doc TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dom TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    creator INT(5)
);




-- insert dummy user
INSERT INTO users(name, email, password)
VALUES('AM Masum', 'user@user.com', '123456');