-- TODO: Put ALL SQL in between `BEGIN TRANSACTION` and `COMMIT`
BEGIN TRANSACTION;

-- TODO: create tables

-- CREATE TABLE `examples` (
-- 	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
-- 	`name`	TEXT NOT NULL
-- );


-- TODO: initial seed data

-- INSERT INTO `examples` (id,name) VALUES (1, 'example-1');
-- INSERT INTO `examples` (id,name) VALUES (2, 'example-2');

-- IMPORTANT! If you change this file, you will need to manually
-- delete site.sqlite in order to regenerate the database from this file!

CREATE TABLE image_tags(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	image_id INTEGER NOT NULL,
	tag_id INTEGER NOT NULL
);

CREATE TABLE images(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	file_name TEXT NOT NULL,
	file_ext TEXT NOT NULL

);
CREATE TABLE tags(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	tag TEXT NOT NULL UNIQUE
);

-- -- documents seed data

INSERT INTO tags (id, tag) VALUES (101, 'Entertainment');
INSERT INTO tags (id, tag) VALUES (102, 'Friends');
INSERT INTO tags (id, tag) VALUES (103, 'Shop');
INSERT INTO tags (id, tag) VALUES (104, 'Food');
INSERT INTO tags (id, tag) VALUES (105, 'Nature');

INSERT INTO images (id, file_name, file_ext) VALUES (1, '1.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (2, '2.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (3, '3.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (4, '4.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (5, '5.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (6, '6.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (7, '7.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (8, '8.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (9, '9.jpg', 'jpg');
INSERT INTO images (id, file_name, file_ext) VALUES (10, '10.jpg', 'jpg');

INSERT INTO image_tags (id, image_id, tag_id) VALUES (1,  1, 102);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (2,  2, 102);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (3,  3, 102);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (4,  4, 104);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (5,  5, 102);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (6,  6, 101);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (7,  7, 103);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (8,  8, 103);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (9,  9, 104);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (10,  10, 105);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (11,  1, 101);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (12,  1, 104);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (13,  2, 104);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (14,  5, 104);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (15,  5, 103);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (16,  2, 103);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (17,  4, 102);
INSERT INTO image_tags (id, image_id, tag_id) VALUES (18,  3, 104);


COMMIT;
