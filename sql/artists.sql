-- Artists table data
-- fields: artist_id, fname, lname, bio, img

CREATE TABLE Artists(
  artist_id INT NOT NULL AUTO_INCREMENT,
  fname VARCHAR(30) NOT NULL,
  lname VARCHAR(30) NOT NULL,
  bio VARCHAR(10000),
  img VARCHAR(100),
  PRIMARY KEY ( artist_id )
);

CREATE TABLE Rentals(
  rental_id VARCHAR(4) NOT NULL,
  artist_id INT NOT NULL,
  composer VARCHAR(100),
  title VARCHAR(100) NOT NULL,
  length VARCHAR(15), -- should call duration
  contents VARCHAR(100),
  img VARCHAR(100),
  PRIMARY KEY ( rental_id ),
  FOREIGN KEY (artist_id) 
    REFERENCES Artists(artist_id)
);

INSERT INTO Rentals (fname, lname, bio, img)
VALUES (value1,value2,value3,...);