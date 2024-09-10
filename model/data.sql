TRUNCATE TABLE users;
TRUNCATE TABLE articles;

INSERT INTO users VALUES (null, 'bthouv', '321654','2024-09-04 10:57:42');
INSERT INTO users (username, password, last_connection)
VALUES ('plaf', '123', NOW() );

INSERT INTO articles (title, publish_date, content, image_path, user_id) VALUES
('Bonjour', NOW(), 'Lorem ipsum', null, 1),
('Coucou', '2013-02-06', 'Dolor sit amet', 'vacances.jpg', 2),
('Hola', '2017-01-13', 'Consectetur adipiscing elit', 'pouet.jpg', 2);