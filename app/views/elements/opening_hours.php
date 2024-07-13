<?php
require_once 'app/controllers/OpeningTimeController.php';

$controller = new OpeningTimeController();
$result = $controller->getOpeningHours();
?>
<!--  affichage des horaires du zoo -->
  
<div class="card_body text-center">
    <h5>Les horaires d'ouverture du Zoo</h5>
    <div class="table-responsive">
    <table class="table">
        <thead class="thead-dark text-center">
            <tr>
                <th>Jour</th>
                <th>Ouverture</th>
                <th>Fermeture</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['opening_day']; ?></td>
                    <td><?php echo substr($row['opening_time'], 0, 5); ?></td>
                    <td><?php echo substr($row['closing_time'], 0, 5); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>