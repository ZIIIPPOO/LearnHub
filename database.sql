CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    course_level ENUM('Débutant', 'Intermédiaire', 'Avancé') NOT NULL, 
    created_at DATE
);

CREATE TABLE sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
	title VARCHAR(50) NOT NULL,
    content TEXT, 
    position INT,
	created_at DATE,
	FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
	CONSTRAINT course_position UNIQUE(course_id, position)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,

    UNIQUE KEY unique_enrollment (user_id, course_id)
);

INSERT INTO courses (title, description, course_level, created_at) VALUES
('Introduction au Python', 'Apprenez les bases de la programmation Python', 'Débutant', '2024-01-15'),
('JavaScript Avancé', 'Maîtrisez les concepts avancés de JavaScript', 'Avancé', '2024-02-20'),
('HTML & CSS', 'Créez vos premiers sites web', 'Débutant', '2024-03-10'),
('Base de données SQL', 'Apprenez à gérer des bases de données', 'Intermédiaire', '2024-04-05');

-- Insert sections
INSERT INTO sections (course_id, title, content, position, created_at) VALUES
-- Course 1: Python
(1, 'Les Fondamentaux', 'Introduction aux concepts de base de Python', 1, '2024-01-16'),
(1, 'Structures de Données', 'Listes, tuples, dictionnaires et sets', 2, '2024-01-17'),
(1, 'Programmation Orientée Objet', 'Classes, objets et héritage', 3, '2024-01-18'),
(1, 'Gestion des Fichiers', 'Lecture et écriture de fichiers', 4, '2024-01-19'),

-- Course 2: JavaScript
(2, 'JavaScript Moderne', 'ES6+ features et syntaxe moderne', 1, '2024-02-21'),
(2, 'Asynchrone', 'Promises, async/await et gestion de erreurs', 2, '2024-02-22'),
(2, 'Design Patterns', 'Patterns courants en JavaScript', 3, '2024-02-23'),

-- Course 3: HTML & CSS
(3, 'HTML Sémantique', 'Structurer correctement vos pages', 1, '2024-03-11'),
(3, 'CSS Styling', 'Styliser vos éléments', 2, '2024-03-12'),
(3, 'Responsive Design', 'Créer des sites adaptatifs', 3, '2024-03-13'),
(3, 'Animations CSS', 'Ajouter du mouvement à vos pages', 4, '2024-03-14'),

-- Course 4: SQL
(4, 'Introduction SQL', 'SELECT, INSERT, UPDATE, DELETE', 1, '2024-04-06'),
(4, 'Jointures', 'INNER, LEFT, RIGHT JOIN', 2, '2024-04-07'),
(4, 'Optimisation', 'Index et performances', 3, '2024-04-08');


-- SELECT * 
-- FROM courses
-- JOIN sections
-- ON sections.course_id = courses.id
