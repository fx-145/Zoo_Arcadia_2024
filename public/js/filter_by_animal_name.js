document.addEventListener("DOMContentLoaded", function () {
    // Récupérer les éléments nécessaires avec getElementById
    const animalSelect = document.getElementById('animal_name');
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('reportTableBody');
    const rows = tableBody.getElementsByTagName('tr');

    // Définir la valeur par défaut pour l'input de recherche à partir de la sélection actuelle
    searchInput.value = animalSelect.value;

    // Fonction de filtrage
    function filterTable() {
        const filter = searchInput.value.toLowerCase();
        Array.from(rows).forEach(function (row) {
            const animalNameCell = row.getElementsByTagName('td')[2];
            if (animalNameCell) {
                const animalName = animalNameCell.textContent || animalNameCell.innerText;
                if (animalName.toLowerCase().indexOf(filter) > -1) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }

    // Appliquer le filtre, avec la valeur par défaut
    filterTable();

    // A chanque changement de nom d'animal, mettre à jour l'input de recherche
    animalSelect.addEventListener('change', function () {
        searchInput.value = animalSelect.value;
        filterTable();
    });

    // Ajouter un écouteur d'événement pour l'input de recherche
    searchInput.addEventListener('keyup', filterTable);
});