# Show-Update-Score

## 
SQL

CREATE TABLE users (
    id varchar(255) NOT NULL PRIMARY KEY,
    ids varchar(255) NOT NULL,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    w1 varchar(255) NOT NULL,
    w2 varchar(255) NOT NULL,
    w3 varchar(255) NOT NULL,
    w4 varchar(255) NOT NULL,
    w5 varchar(255) NOT NULL,
    w6 varchar(255) NOT NULL,
    w7 varchar(255) NOT NULL,
    w8 varchar(255) NOT NULL,
    w9 varchar(255) NOT NULL,
    w10 varchar(255) NOT NULL,
    midterm varchar(255) NOT NULL,
    final varchar(255) NOT NULL,
    gender varchar(255) NOT NULL,
    bithday varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    urole varchar(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
