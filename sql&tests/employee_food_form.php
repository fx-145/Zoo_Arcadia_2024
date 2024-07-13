<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire alimentation</title>
</head>
<body>
<div class="container-fluid py-5 main-content">
        <h1>Relevé de passage Employé</h1>
        <form method="post">
            <!-- Sélectionner l'animal par son nom -->
            <div class="form-group col-md-2">
                <label for="animal_name">Sélectionnez un animal :</label>
                <select class="form-control" name="animal_name" id="animal_name" required>
                    <?php
                    // Vérifier si $data est définie et non vide
                    if (isset($data) && !empty($data)) {
                        // Parcourir $data et créer une option pour chaque donnée
                        foreach ($data as $row): ?>
                            <option value="<?= $row['animal_name'] ?>"><?= $row['animal_name'] ?></option>
                        <?php endforeach; 
                    } else {
                        echo "<option value=''>Aucune donnée disponible</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Type de nourriture donnée -->
            <div class="form-group col-md-2">
                <label for="type_of_food_given">Type de nourriture donnée :</label>
                <input type="text" class="form-control" id="type_of_food_given" name="type_of_food_given" required>
            </div>

            <!-- Quantité de nourriture donnée (avec virgule) -->
            <div class="form-group col-md-2">
                <label for="qty_of_food_given">Quantité de nourriture donnée (grammes) (chiffre à virgule) :</label>
                <input type="number" step="0.01" class="form-control" id="qty_of_food_given" name="qty_of_food_given" pattern="[0-9]+([,\.][0-9]+)?" title="Entrez un nombre entier ou décimal valide" required>
            </div>

            <!-- Date et heure de saisie des données -->
            <div class="form-group col-md-2">
                <label for="date_time">Date et heure de saisie :</label>
                <input type="datetime-local" class="form-control" id="date_time" name="date_time" required>
            </div>
            <br>
            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>
</html>



