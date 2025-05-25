SELECT IF(g.grade BETWEEN 8 AND 10, s.name, 'low') AS name,
       g.grade,
       s.marks
FROM students s
         JOIN grade g ON s.marks BETWEEN g.min_mark AND g.max_mark
ORDER BY g.grade DESC,
         IF(g.grade BETWEEN 8 AND 10, s.name, NULL) ASC,
         IF(g.grade BETWEEN 1 AND 7, s.marks, NULL) ASC;



CREATE TABLE grade
(
    grade TINYINT NOT NULL,
    min_mark SMALLINT NOT NULL,
    max_mark SMALLINT NOT NULL,
    PRIMARY KEY (grade)
);

CREATE TABLE students
(
    id    INT          NOT NULL AUTO_INCREMENT,
    name  VARCHAR(100) NOT NULL,
    marks TINYINT      NOT NULL,
    PRIMARY KEY (id, marks)
)
    PARTITION BY RANGE (marks)
        (
        PARTITION p0 VALUES LESS THAN (70),
        PARTITION p1 VALUES LESS THAN (80),
        PARTITION p2 VALUES LESS THAN (MAXVALUE)
        );