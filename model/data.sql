TRUNCATE TABLE users;
TRUNCATE TABLE articles;

INSERT INTO users VALUES (null, 'bthouv', '321654','2024-09-04 10:57:42');
INSERT INTO users (username, password, last_connection)
VALUES ('plaf', '123', NOW() );

INSERT INTO articles (title, publish_date, content, image_path, user_id) VALUES
('Bonjour', NOW(), 'Lorem ipsum', 'img/lion.jpg', 1),
('Coucou', '2013-02-06', 'Dolor sit amet', 'https://letsenhance.io/static/8f5e523ee6b2479e26ecc91b9c25261e/1015f/MainAfter.jpg', 2),
('Hola', '2017-01-13', 'Consectetur adipiscing elit', 'img/image.jpg', 2);