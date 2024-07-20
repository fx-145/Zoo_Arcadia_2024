-- 4. Etape 4: Ouvir le terminal, insérer données dans table "users": on intègre le user_id avec UUID: 
-- ainsi, on sécurise l'id utilisateur et on le rend unique. 
-- On copie le mot de passe affiché à l'écran lors de l'étape précédente (étape 3), et on le reporte dans "VALUES" ci-dessous:
--insérer données dans table "users" via le shell de Xampp:
INSERT INTO users (user_id, user_name, password) VALUES (UUID(), "joe1@mail.fr", "$2y$10$xP.YtKH.U7c.hfSHT/wUB.ae4zBHseNKt0Ub0LpjQtGh6YeBhp9/2");

--5. Etape 5: Remplir la table user_roles avec l'UUID et attribuer à admin l'id qui correpond au rôle administrateur (1).
-- récupérer l'UUID généré à l'étape précédente dans la table users via phpmyadmin, le copier ci-dessous dans "values":
--insérer données dans table "userroles" via le shell de Xampp:

INSERT INTO user_roles (user_id, role_id) VALUES ("b3157b6a-46c7-11ef-89e2-0242ac140002", "1");