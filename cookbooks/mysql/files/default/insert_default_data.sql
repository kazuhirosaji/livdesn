INSERT INTO users (name)
    VALUES ('saji');
INSERT INTO users (name)
    VALUES ('emily');
INSERT INTO users (name)
    VALUES ('sam');
INSERT INTO users (name)
    VALUES ('jorge');
INSERT INTO themes (title, description)
	VALUES ('big living', 'big living room');
INSERT INTO maps (title,description,user_id,theme_id)
	VALUES ('my room','this is my big living room','1','1');
INSERT INTO maps (title,description,user_id,theme_id)
	VALUES ('sam room','sams living room','2','1');
INSERT INTO maps_users (map_id, user_id)
	VALUES ('1', '2');
INSERT INTO maps_users (map_id, user_id)
	VALUES ('1', '3');
INSERT INTO maps_users (map_id, user_id)
	VALUES ('1', '4');
INSERT INTO maps_users (map_id, user_id)
	VALUES ('2', '1');