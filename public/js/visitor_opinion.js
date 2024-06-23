
//on utilise du javascript pour la soumission du formulaire afin de ne pas quitter la page: direction vers la page Opinioncontroller pour l'execution 
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('visitorForm').addEventListener('submit', function(event) {
        

        const formData = new FormData(this);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'app/controllers/OpinionController.php', true);
        xhr.setRequestHeader('Accept', 'application/json');

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                const response = JSON.parse(xhr.responseText);
                document.getElementById('message').innerText = response.message;
            } else {
                document.getElementById('message').innerText = 'An error occurred: ' + xhr.statusText;
            }
        };

        xhr.onerror = function() {
            document.getElementById('message').innerText = 'An error occurred during the request.';
        };

        xhr.send(formData);
    });
});

