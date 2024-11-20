-- Create the database
CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

-- Create the skills table
CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    level INT NOT NULL
);

-- Create the projects table
CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

-- Create the messages table
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data for skills
INSERT INTO skills (name, level) VALUES 
('Java', 80),
('JavaScript', 70),
('HTML/CSS', 75),
('Python', 65),
('React', 60),
('Node.js', 55),
('SQL', 70),
('Git', 75);

-- Insert sample data for projects
INSERT INTO projects (title, description) VALUES 
('To-Do List Application', 'Created a simple, intuitive to-do list with the ability to add, edit, and remove tasks. Implemented localStorage to save and persist user data across browser sessions.'),
('Quiz System', 'Developed a quiz system allowing users to answer multiple-choice questions and receive instant feedback. Implemented managing question databases.'),
('Personal Portfolio Website', 'Designed and developed this responsive portfolio website using HTML, CSS, JavaScript, and PHP. Implemented features such as dark mode toggle and multi-language support.'),
('Java Internship Project', 'Completed a one-month Java internship during the 2nd semester. Developed a student grade calculator and a simple calculator, gaining hands-on experience in Java programming and software development.');