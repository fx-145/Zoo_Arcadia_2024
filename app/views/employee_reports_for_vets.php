
<?php
require_once 'app/controllers/EmployeeController.php';

$controller = new EmployeeController();
$result = $controller->getEmployeeReports();

?>

   <input type="text" id="searchInput" class="form-control search-input" placeholder="Rechercher par Nom de l'animal"> 
 
 
     <!--  affichage de tous les champs, croisées de 3 tables (récupère username et animal_name) -->
    <div id = "tableContainer">
     <table class="table mt-3">
       <thead>
         <tr>
           <th>Username de l'employé</th>
           <th>Date et heure de rapport</th>
           <th>Nom de l'animal</th>
           <th>Type de nourriture donné</th>
           <th>Poids de nourriture donné (g)</th>
         </tr>
       </thead>
       <tbody id="reportTableBody">
        <?php foreach ($result as $row): ?>
          <tr>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['employee_passage_date_time']; ?></td>
            <td><?php echo $row['animal_name']; ?></td>
            <td><?php echo $row['given_type_of_food']; ?></td>
            <td><?php echo $row['given_food_weight']; ?></td>
          </tr>
        <?php endforeach; ?>
       </tbody>
     </table>
     </div>
 
 
 
 