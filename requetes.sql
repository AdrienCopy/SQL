-- Requête 1:
SELECT * FROM students;

-- Requête 2:
SELECT prenom FROM students;

-- Requête 3:
SELECT * FROM students
INNER JOIN school
ON school.idschool = students.school;

-- Requête 4:
SELECT * FROM students
WHERE genre = "F";

-- Requête 5:
SELECT * FROM students
WHERE genre = "M";

-- Requête 6:
SELECT * FROM students
INNER JOIN school ON school.idschool = students.school
WHERE students.school = (
    SELECT school
    FROM students
    WHERE nom = 'Ere' AND prenom = 'Molly'
);

-- Requête 7:
SELECT prenom FROM students
ORDER BY prenom DESC;

-- Requête 8:
SELECT prenom FROM students
ORDER BY prenom DESC
LIMIT 2 OFFSET 0;

-- Requête 9:
INSERT INTO students (nom, prenom, datenaissance, genre, school)
VALUES
('Dalor', 'Ginette', '1930-01-01', 'F', '1');

-- Requête 10:
UPDATE students
SET prenom = 'Omer',
    genre = 'M'
WHERE idStudent = 31;

-- Requête 11:
DELETE FROM students
WHERE idStudent = 3;

-- Requête 12:
UPDATE school
SET school = 'Liege'
WHERE idschool = 1;

-- Requête 13:
UPDATE school
SET school = 'Bruxelles'
WHERE idschool = 1;

