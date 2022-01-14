<?php
$formData = [];
$formErrors = [];
$regex = [
    'name' => '/^([A-Z]{1}[a-zâäàéèùêëîïôöçñ]+){1}([\- ]{1}[A-Z]{1}[a-zâäàéèùêëîïôöçñ]+)?$/',

];



if (count($_POST) > 0) {
    

    
    if ($_FILES['paper']['error'] == 0) {
        $fileInfos = pathinfo($_FILES['paper']['name']);
        $paperExtension = strtolower($fileInfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif'
            
        ];
        if (array_key_exists($paper, $authorizedMimeTypes) && mime_content_type($_FILES['paper']['tmp_name']) == $authorizedMimeTypes[$paper]) {
            if (move_uploaded_file($_FILES['paper']['tmp_name'], 'uploads/' . $_FILES['paper']['name'])) {
                chmod('uploads/' . $_FILES['paper']['name'], 0644);
                $paper->fichier = 'uploads/' . $_FILES['paper']['name'];
            } else {
                $formErrors['paper'] = 'Une erreur est survenue';
            }
        } else {
            $formErrors['paper'] = 'Le fichier n\'est pas au bon format';
        }
    } else {
        $formErrors['paper'] = 'Le fichier est obligatoire';
    }


    if (!empty($_POST['title'])) {
        if (preg_match($regex['name'], $_POST['title'])) {
            $user = strip_tags($_POST['title']);
        } else {
            $formErrors['title'] = 'Le titre est invalide. Il ne doit comporter que des lettres, des tirets, des espaces.';
        }
    } else {
        $formErrors['title'] = 'Votre titre est vide.';
    }

   

}
var_dump($formErrors);