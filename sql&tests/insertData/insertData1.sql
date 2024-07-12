--1 insérer données dans table "roles":

INSERT INTO roles (role_id, role_name) VALUES ("1", "administrateur");
INSERT INTO roles (role_id, role_name) VALUES ("2", "employe");
INSERT INTO roles (role_id, role_name) VALUES ("3", "veterinaire");

--2 Insérer données dans table users: pour l'admin, methode detaillée cf.fichier CreateAdmin.sql. Pour les employés et vétérinaires, passer par l'appli.

-- 3 insérer données dans la table "homes":
INSERT INTO homes (home_name, home_description ) VALUES ("La Savane","
La savane est un ecosysteme unique et diversifie qui se caracterise par ses vastes plaines herbeuses parsemees d'arbres clairsemes, tels que les acacias et les baobabs. Ce paysage distinctif est le resultat d'une interaction complexe entre le climat, le sol et la vegetation, offrant un habitat ideal pour une grande variete de faune et de flore");
INSERT INTO homes (home_name, home_description ) VALUES ("La Jungle","La jungle abrite une incroyable diversite d'especes animales et vegetales. On y trouve des mammiferes, des oiseaux, des reptiles, des amphibiens, des poissons et d'innombrables insectes");
INSERT INTO homes (home_name, home_description ) VALUES ("Le Marais","Il offre un habitat crucial pour de nombreuses especes et joue un role important dans les cycles de l eau et des nutriments.");


-- 4 insérer données dans la table "animals":
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Georges", "Lion", "1");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Melman", "Girafe", "1");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("TopGun", "Rhinoceros", "1");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Arthur", "Gorille", "2");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Ernest", "Suricate", "2");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("John", "Chimpanzé", "2");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Miguel", "Gorille", "2");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Gilbert", "Lemurien", "2");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Po", "Panda", "2");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Sherkan", "Tigre", "2");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Roger", "Raton_laveur", "3");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Marcel", "Perroquet", "3");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Edwige", "Grue", "3");
INSERT INTO animals (animal_name, race, home_id  ) VALUES ("Robert", "Crocodile", "3");


-- 5 insérer données dans la table "services":
INSERT INTO services (service_name, service_description) VALUES ("Visite du zoo en petit train", "Ce petit train est concu pour offrir une experience de voyage agreable dans le zoo, avec des sieges confortables et des compartiments ouverts pour une meilleure vue en toute securite");
INSERT INTO services (service_name, service_description) VALUES ("Restauration", "Le zoo dispose d un nouveau restaurant panoramique qui satisfera vos papilles");
INSERT INTO services (service_name, service_description) VALUES ("Visite des habitats avec un guide", "Cette prestation totalement gratuite vous permettra d en savoir beaucoup plus sur les animaux et leur vie au zoo");

--6 insérer données dans la table "opening_hours":
INSERT INTO opening_hours (opening_day, opening_time,closing_time) VALUES ("lundi","09:00","17:00");
INSERT INTO opening_hours (opening_day, opening_time,closing_time) VALUES ("mardi","09:00","17:00");
INSERT INTO opening_hours (opening_day, opening_time,closing_time) VALUES ("mercredi","09:00","17:00");
INSERT INTO opening_hours (opening_day, opening_time,closing_time) VALUES ("jeudi","09:00","17:00");
INSERT INTO opening_hours (opening_day, opening_time,closing_time) VALUES ("vendredi","09:00","17:00");
INSERT INTO opening_hours (opening_day, opening_time,closing_time) VALUES ("samedi","09:00","17:00");
INSERT INTO opening_hours (opening_day, opening_time,closing_time) VALUES ("dimanche","09:00","17:00");

--7 insérer données dans table "home_pictures":

INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/SA_01.jpg", "1");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/SA_02.jpg", "1");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/JU_01.jpg", "2");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/JU_02.jpg", "2");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/MA_01.jpg", "3");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/MA_02.jpg", "3");

-- brouillon
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/VT_01.jpg", "4");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/VT_02.jpg", "4");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/FP_01.jpg", "5");
INSERT INTO home_pictures (home_picture_path, home_id  ) VALUES ("public/images/habitats/FP_02.jpg", "5");

--8 insérer données dans table "animal_pictures":
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/SA_Georges.jpg", "1");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/SA_Melman.jpg", "2");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/SA_TopGun.jpg", "3");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_Arthur.jpg", "4");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_Ernest.jpg", "5");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_John.jpg", "6");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_Miguel.jpg", "7");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_Gilbert.jpg", "8");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_Po.jpg", "9");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_Sherkan.jpg", "10");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/JU_Wladimir.jpg", "11");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/MA_Roger.jpg", "12");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/MA_Roger2.jpg", "12");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/MA_Marcel.jpg", "13");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/MA_Marcel2.jpg", "13");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/MA_Edwige.jpg", "14");
INSERT INTO animal_pictures (animal_picture_path, animal_id  ) VALUES ("public/images/animaux/MA_Robert.jpg", "15");