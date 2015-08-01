-- Bachovich Music Publications

-- DB create table statements
CREATE TABLE Artists(
  artist_id INT NOT NULL AUTO_INCREMENT,
  fname VARCHAR(30),
  lname VARCHAR(50) NOT NULL,
  bio TEXT,
  img VARCHAR(100),
  PRIMARY KEY (artist_id)
);

CREATE TABLE Rentals(
  rental_id VARCHAR(4) NOT NULL,
  artist_id INT NOT NULL,
  composer VARCHAR(100),
  title VARCHAR(100) NOT NULL,
  duration VARCHAR(15),
  contents VARCHAR(100),
  img VARCHAR(100),
  PRIMARY KEY (rental_id),
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
  PRIMARY KEY (media_id),
  FOREIGN KEY (artist_id) 
    REFERENCES Artists(artist_id)
);

CREATE TABLE SheetMusics(
  music_id VARCHAR(4) NOT NULL,
  artist_id INT NOT NULL,
  composer VARCHAR(100),
  type VARCHAR(40),
  sub_type1 VARCHAR(40),
  sub_type2 VARCHAR(40),
  title VARCHAR(150) NOT NULL,
  duration VARCHAR(15),
  contents VARCHAR(150),
  description TEXT,
  price DECIMAL(8,2) NOT NULL,
  img VARCHAR(100),
  shipping DECIMAL(6,2),
  PRIMARY KEY (music_id),
  FOREIGN KEY (artist_id) 
    REFERENCES Artists(artist_id)
);

CREATE TABLE Features(
  feat_id INT NOT NULL AUTO_INCREMENT,
  composition VARCHAR(4) NOT NULL,
  book VARCHAR(4) NOT NULL,
  media VARCHAR(4) NOT NULL,
  artist INT NOT NULL,
  PRIMARY KEY (feat_id),
  FOREIGN KEY (composition) 
    REFERENCES SheetMusics(music_id),
  FOREIGN KEY (book) 
    REFERENCES SheetMusics(music_id),
  FOREIGN KEY (media) 
    REFERENCES Medias(media_id),
  FOREIGN KEY (artist) 
    REFERENCES Artists(artist_id)
);

CREATE TABLE AudiosVideos(
  av_id INT NOT NULL AUTO_INCREMENT,
  music_id VARCHAR(4),
  media_id VARCHAR(4),
  type VARCHAR(5),
  track INT,
  audio_description VARCHAR(250),
  audio_title VARCHAR(150),
  audio_file VARCHAR(150),
  video_description VARCHAR(250),
  video_embed VARCHAR(150),
  PRIMARY KEY (av_id),
  FOREIGN KEY (music_id) 
    REFERENCES SheetMusics(music_id),
  FOREIGN KEY (media_id) 
    REFERENCES Medias(media_id)
);