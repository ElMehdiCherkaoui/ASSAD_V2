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

INSERT INTO Habitats (habitatsName, typeClimat, descriptionHab, zoo_zone) VALUES
('Savannah', 'Hot', 'Wide grasslands with scattered trees, home to lions, elephants, and zebras.', 'Zone A'),
('Rainforest', 'Humid', 'Dense tropical forest with high biodiversity.', 'Zone B'),
('Desert', 'Dry', 'Arid habitat with sand dunes and sparse vegetation.', 'Zone C');


INSERT INTO Animal (animalName, espèce, alimentation, Image, paysOrigine, descriptionCourte, Habitat_ID) VALUES
('Atlas Lion', 'Panthera leo leo', 'Carnivore', 'https://backoffice.maroc-hebdo.com/uploads/lion_atlas_1750942923_97e4eb7d20.jpeg', 'Morocco', 'Majestic lion native to North Africa.', 1),
('African Elephant', 'Loxodonta africana', 'Herbivore', 'https://cdn.britannica.com/72/272-050-E1965E27/African-elephant-Kenya.jpg', 'Kenya', 'Largest land animal on Earth.', 1),
('Zebra', 'Equus quagga', 'Herbivore', 'https://b2386983.smushcdn.com/2386983/wp-content/uploads/2024/04/Plains-Zebra-body.jpg?lossy=0&strip=1&webp=1', 'South Africa', 'Striped herbivore of the African savannah.', 1),
('Gorilla', 'Gorilla beringei', 'Herbivore', 'https://upload.wikimedia.org/wikipedia/commons/b/bb/Gorille_des_plaines_de_l%27ouest_%C3%A0_l%27Espace_Zoologique.jpg', 'Congo', 'Powerful primate living in tropical forests.', 2),
('Camel', 'Camelus dromedarius', 'Herbivore', 'https://upload.wikimedia.org/wikipedia/commons/4/43/07._Camel_Profile%2C_near_Silverton%2C_NSW%2C_07.07.2007.jpg', 'Egypt', 'Adapted to desert life, can go long without water.', 3);

INSERT INTO users (userName, userEmail, userRole, password_hash, userStatus) VALUES
('John Doe', 'john.doe@example.com', 'Guide', '$2y$10$ayIkETGQC7rrtWwC8PEZ3u0W.q31yIn3FTiPu99tBpKtZ2i0Nrvuu', 'Active'),
('Jane Smith', 'jane.smith@example.com', 'Guide', '$2y$10$ayIkETGQC7rrtWwC8PEZ3u0W.q31yIn3FTiPu99tBpKtZ2i0Nrvuu', 'Active');

-- Guided Tours
INSERT INTO visitesGuidees (title, date_time, languages, max_capacity, duree, price, statut, user_guide_id) VALUES
('Atlas Lion Virtual Tour', '2025-12-20 10:00:00', 'English', 15, 2, 15, 'Open', 1),
('African Elephant Experience', '2025-12-22 14:00:00', 'French', 10, 1, 12, 'Open', 1),
('Zebra Habitat Tour', '2025-12-25 11:00:00', 'English', 12, 1, 10, 'Open', 2);

-- Visit Steps
INSERT INTO etapesvisite (step_title, step_description, step_order, guid_tour_id) VALUES
('Introduction', 'Briefing about the animal and safety instructions.', 1, 1),
('Lion Observation', 'Observe the lions and learn about their behavior.', 2, 1),
('Feeding Time', 'Watch and learn about how lions are fed.', 3, 1),
('Elephant Introduction', 'Learn interesting facts about elephants.', 1, 2),
('Elephant Feeding', 'Observe elephant feeding routines.', 2, 2),
('Zebra Observation', 'Guided tour to see the zebras.', 1, 3);

-- User Comments
INSERT INTO userComments (tours_id_comment_fk, user_id_comment_fk, rating, text_desc) VALUES
(1, 1, 5, 'Amazing virtual tour! Learned a lot about lions.'),
(2, 2, 4, 'Elephant experience was fun and educational.'),
(3, 1, 5, 'Loved the zebra tour, very interactive.');

-- User Reservations
INSERT INTO userReservations (tour_id_reservation_fk, user_id_reservation_fk, number_of_people, reservation_date) VALUES
(1, 1, 2, '2025-12-15 09:30:00'),
(2, 2, 1, '2025-12-16 10:00:00'),
(3, 1, 3, '2025-12-17 11:15:00');

select * from users;

SELECT * FROM userreservations;

INSERT into
    users (
        userName,
        userEmail,
        userRole,
        password_hash
    )
VALUES (
        "Admin",
        "cherkaouim451@gmail.com",
        "Admin",
        "$2y$10$0u9dQw8gOQUNgbX/2JbByesGwU27iKUUJK/ieNEQ2J16VFIeppxVW"
    )

CREATE TABLE users (
    Users_id INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(100) NOT NULL,
    userEmail VARCHAR(100) NOT NULL UNIQUE,
    userRole VARCHAR(50),
    password_hash VARCHAR(255) NOT NULL,
    userStatus VARCHAR(20)
);