<?php
require_once 'app/controllers/PictureController.php';
require_once 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 4));
$dotenv->load();
class AnimalPictureHandler
{
    private $controller;
    public function __construct()
    {
        $this->controller = new PictureController();
    }

    public function handleAddAnimalPicture()
    {

        try {// Configuration des paramètres de téléchargement

            $max_file_size = 2 * 1024 * 1024; // 2MB

            // récupération de l'info de taille de l'image
            $file_size = $_FILES['picture']['size'];

            $animal_picture_name = htmlspecialchars($_POST['animal_picture_name']);
            //transformer le nom de la photo sans espace et sans caractères spéciaux:
            // sans caractères spéciaux:
            $animal_picture_name_scs = preg_replace('/[^A-Za-z0-9]/', ' ', $animal_picture_name);
            // sans espace
            $animal_picture_name_se = str_replace(' ', '', $animal_picture_name_scs);
            // on reprend notre variable modifiée
            $animal_picture_name = $animal_picture_name_se;

            // Vérifier l'intégrité de $animal_picture_name
            if (!preg_match('/^[a-zA-Z0-9_-]+$/', $animal_picture_name)) {
                echo "Le nom de l'image contient des caractères non valides. Utilisez uniquement des lettres, chiffres, tirets et underscores.";
                return;
            }
            // Vérification de la taille du fichier
            if ($file_size > $max_file_size) {
                die("Erreur: La taille du fichier est trop grande.");
            }
            //chemin de stockage stocké dans le fichier .env
            $animalPicsDirectory = $_ENV['PIC_PATH_ANIMAL'];

            //pour supprimer toutes les balises HTML et PHP du nom du fichier téléchargé :strip_tags
            $picture = strip_tags($_FILES['picture']['name']);
            $imageExtension = pathinfo($picture, PATHINFO_EXTENSION);
            $valid_extension = array("jpg", "jpeg", "png", "gif");

            // Vérification de l'extension du fichier
            if (!in_array(strtolower($imageExtension), $valid_extension)) {
                echo "Extension de fichier non valide. Veuillez télécharger un fichier jpg, jpeg, png ou gif.";
                return;
            }

            /// Générer un identifiant unique, greffé au nom de l'animal dans le but d'éviter les doublons et les conflits qui vont avec
            $uniqueID = uniqid($animal_picture_name . "_", true);

            // Renommer le fichier avec l'ID unique et conserver l'extension originale
            $newFileName = $uniqueID . '.' . $imageExtension;
            $destination = $animalPicsDirectory . $newFileName;
            $animal_picture_path = $destination;


            // Déplacement du fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $destination)) {
                echo "Le fichier a été téléchargé avec succès.";
                //on intègre le nom de l'image dans la base de données et on le rattache à l'animal
                $animal_id = $_POST['animal_id'];
                $animal_picture_path = $destination;

                $this->controller->addAnimalPictures($animal_id, $animal_picture_path);

                header("Location: /crud_animals");
                exit(); // Afin que le script se termine
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la vérification des données : " . $e->getMessage();
        }
    }


    public function handleDeleteAnimalPicture()
    {
        //supprimer la photo du répertoire "images/animals"
        $file_path = $_POST['animal_picture_path'];
        var_dump($file_path);


        // Vérifier si le fichier existe avant de tenter de le supprimer
        if (file_exists($file_path)) {
            //Tentative de suppression du fichier
            if (unlink($file_path)) {
                //echo "Le fichier a été supprimé avec succès.";
            } else {
                echo "Une erreur s'est produite lors de la tentative de suppression du fichier.";
            }
        } else {
            echo "Le fichier n'existe pas.";
        }



        // 2 supprimer l'enregistrement de la photo de l'animal
        $animal_picture_id = $_POST['animal_picture_id'];
        $this->controller->deleteAnimalPicture($animal_picture_id);
        header("Location: crud_animals");
        exit(); //arrêt du script

    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formHandlerA = new AnimalPictureHandler();


    //Animaux
    if (isset($_POST['submit_add_animal_picture'])) {

        $formHandlerA->handleAddAnimalPicture();
    }

    if (isset($_POST['submit_delete_animal_picture'])) {

        $formHandlerA->handleDeleteAnimalPicture();
    }


}