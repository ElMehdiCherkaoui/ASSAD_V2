-- Active: 1765134969045@@localhost@3306@assad

USE assad;

CREATE TABLE Habitats (
    Hab_id INT AUTO_INCREMENT PRIMARY KEY,
    habitatsName VARCHAR(100) NOT NULL,
    typeClimat VARCHAR(20) NOT NULL,
    descriptionHab TEXT,
    zoo_zone VARCHAR(255)
);

CREATE TABLE Animal (
    Ani_id INT AUTO_INCREMENT PRIMARY KEY,
    animalName VARCHAR(100) NOT NULL,
    espèce VARCHAR(20) NOT NULL,
    alimentation VARCHAR(50) NOT NULL,
    Image VARCHAR(255),
    paysOrigine VARCHAR(50),
    descriptionCourte VARCHAR(100),
    Habitat_ID INT,
    FOREIGN KEY (Habitat_ID) REFERENCES Habitats (Hab_id)
);

CREATE TABLE users (
    Users_id INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(100) NOT NULL,
    userEmail VARCHAR(100) NOT NULL UNIQUE,
    userRole VARCHAR(50),
    password_hash VARCHAR(255) NOT NULL,
    userStatus VARCHAR(20)
);

CREATE TABLE visitesGuidees (
    guided_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    date_time DATETIME,
    languages VARCHAR(50) NOT NULL,
    max_capacity INT NOT NULL,
    duree INT,
    price INT NOT NULL,
    statut VARCHAR(50) NOT NULL,
    user_guide_id INT,
    FOREIGN KEY (user_guide_id) REFERENCES users (Users_id)
);

CREATE TABLE etapesvisite (
    step_id INT AUTO_INCREMENT PRIMARY KEY,
    step_title VARCHAR(100) NOT NULL,
    step_description TEXT,
    step_order INT,
    guid_tour_id INT,
    FOREIGN KEY (guid_tour_id) REFERENCES visitesGuidees (guided_id)
);

CREATE TABLE userComments (
    comments_id INT AUTO_INCREMENT PRIMARY KEY,
    tours_id_comment_fk INT,
    user_id_comment_fk INT,
    rating INT,
    text_desc TEXT,
    date_commentaire DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (user_id_comment_fk) REFERENCES users (Users_id),
    FOREIGN KEY (tours_id_comment_fk) REFERENCES visitesGuidees (guided_id)
);

CREATE TABLE userReservations (
    reservation_id INT AUTO_INCREMENT PRIMARY KEY,
    tour_id_reservation_fk INT,
    user_id_reservation_fk INT,
    number_of_people INT,
    reservation_date DATETIME,
    FOREIGN KEY (tour_id_reservation_fk) REFERENCES visitesGuidees (guided_id),
    FOREIGN KEY (user_id_reservation_fk) REFERENCES users (Users_id)
);

INSERT INTO
    etapesvisite (
        step_title,
        step_description,
        step_order,
        guid_tour_id
    )
VALUES (
        'Zone Mammifères Asiatiques',
        'Découverte des mammifères d’Asie',
        5,
        4
    ),
    (
        'Zone Oiseaux Exotiques',
        'Observation des oiseaux rares',
        2,
        4
    ),
    (
        'Zone Singes',
        'Interaction et observation des singes',
        3,
        1
    ),
    (
        'Zone Crocodiles et Hippopotames',
        'Zone aquatique avec crocodiles et hippopotames',
        4,
        4
    );

select * from users;

SELECT * FROM userComments;


SELECT paysOrigine AS country, COUNT(*) AS total FROM Animal GROUP BY paysOrigine;