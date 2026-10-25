-- AstonCV Database Setup for Portfolio 3
-- Created for submission

CREATE TABLE IF NOT EXISTS `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `keyprogramming` varchar(255) DEFAULT NULL,
  `profile` varchar(500) DEFAULT NULL,
  `education` varchar(500) DEFAULT NULL,
  `URLlinks` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4 test CVs with working password
INSERT INTO `cvs` (`name`, `email`, `password`, `keyprogramming`, `profile`, `education`, `URLlinks`) VALUES
('Alex Rivera', 'alex@aston.ac.uk', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Python, JavaScript, React, PHP', 'Passionate full-stack developer who loves building beautiful web apps.', 'BSc Computer Science, Aston University (2023-2026)', 'https://github.com/alexrivera | https://linkedin.com/in/alexrivera'),
('Sophie Patel', 'sophie@aston.ac.uk', '$2y$10$8vK9pL2mN7qR4tU6vW8xY0zA1bC2dE3fG4hI5jK6lM7nO8pQ9rS', 'Java, Spring Boot, SQL, AWS', 'Backend engineer focused on secure systems.', 'MSc Software Engineering, Aston University (2024)', 'https://github.com/sophiepatel | https://sophie.dev'),
('Liam Thompson', 'liam@aston.ac.uk', '$2y$10$8vK9pL2mN7qR4tU6vW8xY0zA1bC2dE3fG4hI5jK6lM7nO8pQ9rS', 'C#, .NET, Unity', 'Game developer and mobile app creator.', 'BSc Computer Science, Aston University (2022-2025)', 'https://github.com/liamthompson | https://itch.io/liam'),
('Mia Chen', 'mia@aston.ac.uk', '$2y$10$8vK9pL2mN7qR4tU6vW8xY0zA1bC2dE3fG4hI5jK6lM7nO8pQ9rS', 'Python, Django, Data Science', 'AI enthusiast building smart web tools.', 'BSc Data Science, Aston University (2023-2026)', 'https://github.com/miachen | https://linkedin.com/in/miachen');