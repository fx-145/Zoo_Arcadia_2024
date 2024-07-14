// Sélectionner les éléments de filtre
const dateFilterSelect = document.querySelector('th[col-index="1"] select.table-filter');
const animalFilterSelect = document.querySelector('th[col-index="2"] select.table-filter');

// Sélectionner les lignes de tableau
const tableRows = document.querySelectorAll('tbody tr');

// Fonction pour remplir les options de filtre en fonction des données existantes dans le tableau
function fillFilterOptions() {
    // Récupérer les dates et les noms d'animaux uniques
    const uniqueDates = Array.from(new Set(Array.from(tableRows, row => row.cells[0].textContent.trim())));
    const uniqueAnimalNames = Array.from(new Set(Array.from(tableRows, row => row.cells[1].textContent.trim())));

    // Réinitialiser les options des filtres
    dateFilterSelect.innerHTML = '<option value="all">Tous</option>';
    animalFilterSelect.innerHTML = '<option value="all">Tous</option>';

    // Ajouter les options des filtres
    uniqueDates.forEach(date => {
        const option = document.createElement('option');
        option.value = date;
        option.textContent = date;
        dateFilterSelect.appendChild(option);
    });

    uniqueAnimalNames.forEach(animal => {
        const option = document.createElement('option');
        option.value = animal;
        option.textContent = animal;
        animalFilterSelect.appendChild(option);
    });
}

// Remplir les options des filtres au chargement de la page
fillFilterOptions();

// Écouter les événements de changement sur les filtres
dateFilterSelect.addEventListener('change', updateAnimalFilterOptions);
animalFilterSelect.addEventListener('change', updateDateFilterOptions);

// Fonction pour mettre à jour les options du filtre d'animal en fonction de la date sélectionnée
function updateAnimalFilterOptions() {
    const selectedDate = dateFilterSelect.value;

    // Récupérer les noms d'animaux uniques pour la date sélectionnée
    const filteredAnimalNames = Array.from(new Set(Array.from(tableRows, row => {
        const date = row.cells[0].textContent.trim();
        const animalName = row.cells[1].textContent.trim();
        return (selectedDate === 'all' || date === selectedDate) ? animalName : null;
    }))).filter(name => name !== null);

    // Réinitialiser et remplir les options du filtre d'animal
    animalFilterSelect.innerHTML = '<option value="all">Tous</option>';
    filteredAnimalNames.forEach(name => {
        const option = document.createElement('option');
        option.value = name;
        option.textContent = name;
        animalFilterSelect.appendChild(option);
    });

    // Appliquer le filtre de tableau après avoir mis à jour les options du filtre d'animal
    filterTable();
}

// Fonction pour mettre à jour les options du filtre de date en fonction de l'animal sélectionné
function updateDateFilterOptions() {
    const selectedAnimal = animalFilterSelect.value;

    // Récupérer les dates uniques pour l'animal sélectionné
    const filteredDates = Array.from(new Set(Array.from(tableRows, row => {
        const animalName = row.cells[1].textContent.trim();
        const date = row.cells[0].textContent.trim();
        return (selectedAnimal === 'all' || animalName === selectedAnimal) ? date : null;
    }))).filter(date => date !== null);

    // Réinitialiser et remplir les options du filtre de date
    dateFilterSelect.innerHTML = '<option value="all">Tous</option>';
    filteredDates.forEach(date => {
        const option = document.createElement('option');
        option.value = date;
        option.textContent = date;
        dateFilterSelect.appendChild(option);
    });

    // Appliquer le filtre de tableau après avoir mis à jour les options du filtre de date
    filterTable();
}

// Fonction pour filtrer les lignes de tableau
function filterTable() {
    const selectedDate = dateFilterSelect.value;
    const selectedAnimal = animalFilterSelect.value;

    tableRows.forEach(row => {
        const date = row.cells[0].textContent.trim();
        const animalName = row.cells[1].textContent.trim();
        const dateMatch = selectedDate === 'all' || date === selectedDate;
        const animalMatch = selectedAnimal === 'all' || animalName === selectedAnimal;

        if (dateMatch && animalMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}