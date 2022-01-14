<?php
$formData = [];
$formErrors = [];
$regex = [
    'name' => '/^([A-Z]{1}[a-zâäàéèùêëîïôöçñ]+){1}([\- ]{1}[A-Z]{1}[a-zâäàéèùêëîïôöçñ]+)?$/',

];



if (count($_POST) > 0) {
    

    
    if ($_FILES['formFileSm1']['error'] == 0) {
        $fileInfos = pathinfo($_FILES['formFileSm1']['name']);
        $formFileSm1Extension = strtolower($fileInfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif'
            
        ];
        if (array_key_exists($formFileSm1Extension, $authorizedMimeTypes) && mime_content_type($_FILES['formFileSm1']['tmp_name']) == $authorizedMimeTypes[$formFileSm1Extension]) {
            if (move_uploaded_file($_FILES['formFileSm1']['tmp_name'], 'uploads/' . $_FILES['formFileSm1']['name'])) {
                chmod('uploads/' . $_FILES['formFileSm1']['name'], 0644);
                $fichier = 'uploads/' . $_FILES['formFileSm1']['name'];
            } else {
                $formErrors['formFileSm1'] = 'Une erreur est survenue';
            }
        } else {
            $formErrors['formFileSm1'] = 'Le fichier n\'est pas au bon format';
        }
    } else {
        $formErrors['formFileSm1'] = 'Le fichier est obligatoire';
    }


    if (!empty($_POST['title'])) {
        if (preg_match($regex['name'], $_POST['title'])) {
            $title = strip_tags($_POST['title']);
        } else {
            $formErrors['title'] = 'Le titre est invalide. Il ne doit comporter que des lettres, des tirets, des espaces.';
        }
    } else {
        $formErrors['title'] = 'Votre titre est vide.';
    }

    if (!empty($_POST['title2'])) {
        if (preg_match($regex['name'], $_POST['title2'])) {
            $titles = strip_tags($_POST['title2']);
        } else {
            $formErrors['title2'] = 'Le titre est invalide. Il ne doit comporter que des lettres, des tirets, des espaces.';
        }
    } else {
        $formErrors['title2'] = 'Votre titre est vide.';
    }

    if ($_FILES['trailer']['error'] == 0) {
        $fileInfos = pathinfo($_FILES['trailer']['name']);
        $trailerExtension = strtolower($fileInfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif'
            
        ];
        if (array_key_exists($trailerExtension, $authorizedMimeTypes) && mime_content_type($_FILES['trailer']['tmp_name']) == $authorizedMimeTypes[$trailerExtension]) {
            if (move_uploaded_file($_FILES['trailer']['tmp_name'], 'uploads/' . $_FILES['trailer']['name'])) {
                chmod('uploads/' . $_FILES['trailer']['name'], 0644);
                $fichier = 'uploads/' . $_FILES['trailer']['name'];
            } else {
                $formErrors['trailer'] = 'Une erreur est survenue';
            }
        } else {
            $formErrors['trailer'] = 'Le fichier n\'est pas au bon format';
        }
    } else {
        $formErrors['trailer'] = 'Le fichier est obligatoire';
    }

    if (!empty($_POST['message'])) {
        if (preg_match($regex['message'], $_POST['message'])) {
            $user->name = strip_tags($_POST['message']);
        } else {
            $formErrors['message'] = 'Le nom d\'utilsateur est invalide. Il ne doit comporter que des lettre, des chiffres, des tirets, des espaces.';
        }
    } else {
        $formErrors['message'] = 'Votre message est vide.';
    }


}
var_dump($formErrors);