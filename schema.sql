CREATE TABLE expenses (
id INT auto_increment primary key,
amount INT NOT NULL,
category VARCHAR(50) NOT NULL,
note VARCHAR(150),
created_at DATETIME DEFAULT CURRENT_TIMESTAMP