DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS articles;

CREATE TABLE users (
	id INT AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	last_connection DATETIME,
	PRIMARY KEY (id)
);

CREATE TABLE articles (
	id INT PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL,
	publish_date DATETIME NOT NULL DEFAULT NOW(),
	content TEXT NOT NULL,
	image_path VARCHAR(255) NOT NULL DEFAULT "images/default.jpg",
	user_id INT NOT NULL
	#FOREIGN KEY (user_id) REFERENCES user(id)
);

# Bonne pratique, ajouter les clés étrangères avec un ALTER
# après la création de toutes les autres tables
ALTER TABLE articles ADD FOREIGN KEY (user_id) REFERENCES users(id);