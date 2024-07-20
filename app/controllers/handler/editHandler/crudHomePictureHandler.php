<?php
require_once 'app/controllers/PictureController.php';
require_once 'vendor/autoload.php';
//use Dotenv\Dotenv;

//$dotenv = Dotenv::createImmutable(dirname(__DIR__, 4));
//$dotenv->load();
class HomePictureHandler
{

    private $controller;
    public function __construct()
    {
        $this->controller = new PictureController();
    }

    public function handleAddHomePicture()
    {

        try {// Configuration des paramètres de téléchargement

            $max_file_size = 2 * 1024 * 1024; // 2MB

            // récupération de l'info de taille de l'image
            $file_size = $_FILES['picture']['size'];

            $home_picture_name = htmlspecialchars($_POST['home_picture_name']);
            //transformer le nom de la photo sans espace et sans caractères spéciaux:
            // sans caractères spéciaux:
            $home_picture_name_scs = preg_replace('/[^A-Za-z0-9]/', ' ', $home_picture_name);
            // sans espace
            $home_picture_name_se = str_replace(' ', '', $home_picture_name_scs);
            // on reprend notre variable modifiée
            $home_picture_name = $home_picture_name_se;

            // Vérifier l'intégrité de $home_picture_name
            if (!preg_match('/^[a-zA-Z0-9_-]+$/', $home_picture_name)) {
                echo "Le nom de l'image contient des caractères non valides. Utilisez uniquement des lettres, chiffres, tirets et underscores.";
                return;
            }
            // Vérification de la taille du fichier
            if ($file_size > $max_file_size) {
                die("Erreur: La taille du fichier est trop grande.");
            }

            $homePicsDirectory = $_ENV['PIC_PATH_HOME'];

            //pour supprimer toutes les balises HTML et PHP du nom du fichier téléchargé :strip_tags
            $picture = strip_tags($_FILES['picture']['name']);
            $imageExtension = pathinfo($picture, PATHINFO_EXTENSION);
            $valid_extension = array("jpg", "jpeg", "png", "gif");

            // Vérification de l'extension du fichier
            if (!in_array(strtolower($imageExtension), $valid_extension)) {
                echo "Extension de fichier non valide. Veuillez télécharger un fichier jpg, jpeg, png ou gif.";
                return;
            }

            /// Générer un identifiant unique, greffé au nom de l'home
            $uniqueID = uniqid($home_picture_name . "_", true);

            // Renommer le fichier avec l'ID unique et conserver l'extension originale
            $newFileName = $uniqueID . '.' . $imageExtension;
            $destination = $homePicsDirectory . $newFileName;
            $home_picture_path = $destination;


            // Déplacement du fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $destination)) {
                echo "Le fichier a été téléchargé avec succès.";
                //on inègre le nom de l'image dans la base de données et on le rattache à l'home
                $home_id = $_POST['home_id'];
                $home_picture_path = $destination;

                $this->controller->addhomePictures($home_id, $home_picture_path);

            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }


            //echo "Photo d'habitat enregistré";
        } catch (PDOException $e) {
            echo "Erreur lors de la vérification des données : " . $e->getMessage();
        }
    }





    public function handleDeleteHomePicture()
    {
        //supprimer la photo du répertoire "images/homes"
        $file_path = $_POST['home_picture_path'];
        var_dump($file_path);




        //1 Vérifier si le fichier existe avant de tenter de le supprimer
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



        // 2 supprimer l'enregistrement de la photo de l'home
        $home_picture_id = $_POST['home_picture_id'];
        $this->controller->deleteHomePicture($home_picture_id);
        header("Location: crud_homes");
        exit(); //arrêt du script

    }
}
// Vérification du token CSRF
require 'app/controllers/handler/security_receiver.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formHandlerH = new HomePictureHandler();


    //Habitat
    if (isset($_POST['submit_add_home_picture'])) {

        $formHandlerH->handleAddHomePicture();
    }

    if (isset($_POST['submit_delete_home_picture'])) {

        $formHandlerH->handleDeleteHomePicture();
    }


}