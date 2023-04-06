CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(250) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (email, password)
VALUES ('test@email.com', 'clothintime');
