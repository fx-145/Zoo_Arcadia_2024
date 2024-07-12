CREATE TABLE `users` (
  `user_id` CHAR(36) PRIMARY KEY,
  `user_name` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(60) NOT NULL
);

CREATE TABLE `roles` (
  `role_id` INTEGER PRIMARY KEY AUTO_INCREMENT,
  `role_name` VARCHAR(100)
);

CREATE TABLE `user_roles` (
  `user_id` CHAR(36),
  `role_id` INTEGER,
  PRIMARY KEY(`user_id`, `role_id`),
  CONSTRAINT fk_user_id FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT fk_user_role FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
);

CREATE TABLE `homes` (
  `home_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `home_name` VARCHAR(255) NOT NULL,
  `home_description` VARCHAR(2000) NOT NULL
);

CREATE TABLE `animals` (
  `animal_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `animal_name` VARCHAR(255) NOT NULL,
  `race` VARCHAR(255) NOT NULL,
  `home_id` INTEGER NOT NULL,
   CONSTRAINT fk_animals FOREIGN KEY (`home_id`) REFERENCES `homes` (`home_id`) ON DELETE CASCADE
);

CREATE TABLE `visitor_opinions` (
  `opinion_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `pseudo` VARCHAR(255) NOT NULL,
  `opinion` TEXT NOT NULL,
  `status` ENUM('pending', 'ok', 'ko') DEFAULT 'pending'
);

CREATE TABLE `services` (
  `service_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `service_name` VARCHAR(255) NOT NULL,
  `service_description` VARCHAR(255)
);

CREATE TABLE `vet_passages` (
  `vet_passage_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `type_of_food_proposal` VARCHAR(255) NOT NULL,
  `food_weight_proposal` FLOAT NOT NULL,
  `vet_passage_date` DATE NOT NULL,
  `animal_condition` VARCHAR(255) NOT NULL,
  `animal_condition_detail` VARCHAR(255),
  `home_condition` VARCHAR(255),
  `animal_id` INTEGER NOT NULL,
  `user_id` CHAR(36) NOT NULL,
  `home_id` INTEGER NOT NULL,
  CONSTRAINT fk_vet_passage_one FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT fk_vet_passage_two FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE,
  CONSTRAINT fk_vet_passage_three FOREIGN KEY (`home_id`) REFERENCES `homes` (`home_id`) ON DELETE CASCADE
  
);

CREATE TABLE `employee_passages` (
  `employee_passage_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `given_type_of_food` VARCHAR(255) NOT NULL,
  `given_food_weight` DECIMAL(6,2) NOT NULL,
  `employee_passage_date_time` DATETIME NOT NULL,
  `user_id` CHAR(36) NOT NULL,
  `animal_id` INTEGER NOT NULL,
  CONSTRAINT fk_emp_passage_one FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT fk_emp_passage_two FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE 
);

CREATE TABLE `animal_pictures` (
  `animal_picture_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `animal_picture_path` VARCHAR(255),
  `animal_id` INTEGER NOT NULL,
  CONSTRAINT fk_animalpicture FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON DELETE CASCADE
);

CREATE TABLE `home_pictures` (
  `home_picture_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `home_picture_path` VARCHAR(255) UNIQUE,
  `home_id` INTEGER NOT NULL,
  CONSTRAINT fk_homepicture FOREIGN KEY (`home_id`) REFERENCES `homes` (`home_id`) ON DELETE CASCADE
  
);

CREATE TABLE `opening_hours` (
  `id` INTEGER AUTO_INCREMENT PRIMARY KEY,
  `opening_day` VARCHAR(20),
  `opening_time` TIME,
  `closing_time` TIME
);










