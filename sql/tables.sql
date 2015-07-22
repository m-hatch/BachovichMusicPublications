-- Bachovich Music Publications
-- DB create table statements

CREATE TABLE Artists(
  artist_id INT NOT NULL AUTO_INCREMENT,
  fname VARCHAR(30),
  lname VARCHAR(50) NOT NULL,
  bio TEXT,
  img VARCHAR(100),
  PRIMARY KEY ( artist_id )
);

CREATE TABLE Rentals(
  rental_id VARCHAR(4) NOT NULL,
  artist_id INT NOT NULL,
  composer VARCHAR(100),
  title VARCHAR(100) NOT NULL,
  duration VARCHAR(15),
  contents VARCHAR(100),
  img VARCHAR(100),
  PRIMARY KEY ( rental_id ),
  FOREIGN KEY (artist_id) 
    REFERENCES Artists(artist_id)
);

CREATE TABLE Medias(
  media_id VARCHAR(4) NOT NULL,
  artist_id INT NOT NULL,
  type VARCHAR(10),
  title VARCHAR(100) NOT NULL,
  description TEXT,
  price DECIMAL(8,2) NOT NULL,
  img VARCHAR(100),
  shipping DECIMAL(6,2),
  PRIMARY KEY ( media_id ),
  FOREIGN KEY (artist_id) 
    REFERENCES Artists(artist_id)
);

CREATE TABLE SheetMusic(
  music_id VARCHAR(4) NOT NULL,
  artist_id INT NOT NULL,
  composer VARCHAR(100),
  type VARCHAR(40),
  sub_type1 VARCHAR(40),
  sub_type2 VARCHAR(40),
  title VARCHAR(100) NOT NULL,
  duration VARCHAR(15),
  contents VARCHAR(150),
  description TEXT,
  price DECIMAL(8,2) NOT NULL,
  img VARCHAR(100),
  shipping DECIMAL(6,2),
  PRIMARY KEY ( music_id ),
  FOREIGN KEY (artist_id) 
    REFERENCES Artists(artist_id)
);
