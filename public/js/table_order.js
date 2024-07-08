// Le principe est de créer un tableau non visible pour travailler dessus
// et de remplacer les données du tableau visible par les donnéées retravaillées


// Sélectionner les boutons de tri
const sortByDateAscBtn = document.getElementById('sortByDateAscBtn');
const sortByDateDescBtn = document.getElementById('sortByDateDescBtn');
const sortByNameAscBtn = document.getElementById('sortByNameAscBtn');
const sortByNameDescBtn = document.getElementById('sortByNameDescBtn');

// Écouter les événements de clic sur les boutons de tri
sortByDateAscBtn.addEventListener('click', sortByDateAsc);
sortByDateDescBtn.addEventListener('click', sortByDateDesc);
sortByNameAscBtn.addEventListener('click', sortByNameAsc);
sortByNameDescBtn.addEventListener('click', sortByNameDesc);

// Fonction de tri par date croissante
function sortByDateAsc() {
    const tbody = document.querySelector('tbody'); // Sélectionner le tbody du tableau
    const rows = Array.from(tbody.querySelectorAll('tr')); // Sélectionner toutes les lignes du tbody

    const sortedRows = rows.sort((rowA, rowB) => {
        const dateA = new Date(rowA.cells[0].textContent.trim());
        const dateB = new Date(rowB.cells[0].textContent.trim());
        return dateA - dateB;
    });

    // Réinsérer les lignes triées dans le tableau
    tbody.innerHTML = ''; // Supprimer le contenu existant du tbody
    sortedRows.forEach(row => {
        tbody.appendChild(row);
    });
}

// Fonction de tri par date décroissante
function sortByDateDesc() {
    const tbody = document.querySelector('tbody'); // Sélectionner le tbody du tableau
    const rows = Array.from(tbody.querySelectorAll('tr')); // Sélectionner toutes les lignes du tbody

    const sortedRows = rows.sort((rowA, rowB) => {
        const dateA = new Date(rowA.cells[0].textContent.trim());
        const dateB = new Date(rowB.cells[0].textContent.trim());
        return dateB - dateA;
    });

    // Réinsérer les lignes triées dans le tableau
    tbody.innerHTML = ''; // Supprimer le contenu existant du tbody
    sortedRows.forEach(row => {
        tbody.appendChild(row);
    });
}

// Fonction de tri par nom d'animal croissant
function sortByNameAsc() {
    const tbody = document.querySelector('tbody'); // Sélectionner le tbody du tableau
    const rows = Array.from(tbody.querySelectorAll('tr')); // Sélectionner toutes les lignes du tbody

    const sortedRows = rows.sort((rowA, rowB) => {
        const nameA = rowA.cells[1].textContent.trim();
        const nameB = rowB.cells[1].textContent.trim();
        return nameA.localeCompare(nameB);
    });

    // Réinsérer les lignes triées dans le tableau
    tbody.innerHTML = ''; // Supprimer le contenu existant du tbody
    sortedRows.forEach(row => {
        tbody.appendChild(row);
    });
}

// Fonction de tri par nom d'animal décroissant
function sortByNameDesc() {
    const tbody = document.querySelector('tbody'); // Sélectionner le tbody du tableau
    const rows = Array.from(tbody.querySelectorAll('tr')); // Sélectionner toutes les lignes du tbody

    const sortedRows = rows.sort((rowA, rowB) => {
        const nameA = rowA.cells[1].textContent.trim();
        const nameB = rowB.cells[1].textContent.trim();
        return nameB.localeCompare(nameA);
    });

    // Réinsérer les lignes triées dans le tableau
    tbody.innerHTML = ''; // Supprimer le contenu existant du tbody
    sortedRows.forEach(row => {
        tbody.appendChild(row);
    });
}
