CREATE DATABASE livingnatural;

CREATE USER livingnatural_admin@localhost IDENTIFIED BY 'livingnatural';

GRANT ALL PRIVILEGES ON livingnatural.* TO livingnatural_admin@localhost;

FLUSH PRIVILEGES;