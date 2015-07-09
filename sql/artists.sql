-- Artists table data
-- fields: artist_id, fname, lname, bio, img

CREATE TABLE Artists(
   artist_id INT NOT NULL AUTO_INCREMENT,
   fname VARCHAR(30) NOT NULL,
   lname VARCHAR(30) NOT NULL,
   bio VARCHAR(6000),
   img VARCHAR(100),
   PRIMARY KEY ( artist_id )
);