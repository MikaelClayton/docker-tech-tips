CREATE TABLE todo (
    id varchar(10) NOT NULL,
    title varchar(50),
    description TEXT,
    done BOOLEAN,
    PRIMARY KEY (id)
);

INSERT INTO todo (id, title, description, done) VALUES ('1', 'Learn Docker', 'Learn how to use Docker', false);
INSERT INTO todo (id, title, description, done) VALUES ('2', 'Learn Docker Compose', 'Learn how to use Docker Compose', false);
INSERT INTO todo (id, title, description, done) VALUES ('3', 'Learn Kubernetes', 'Learn how to use Kubernetes', false);
