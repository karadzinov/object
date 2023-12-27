<?php
namespace App;

use Carbon\Carbon;

trait Helper
{
    public function saveImage($files, $name)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT']. '/uploads/';

        $imageName = rand(1, 54300) .'-'. basename($files[$name]["name"]);
        $target_file = $target_dir . $imageName;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $errors = [];

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($files[$name]["tmp_name"]);
            if ($check == false) {
                $errors['file'] = "File is not an image.";
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $errors['file'] = "Sorry, file already exists.";
        }

        // Check file size
        if ($files[$name]["size"] > 500000) {

            $errors['file'] = "Sorry, your file is too large.";

        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $errors['file'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        // Check if $uploadOk is set to 0 by an error
        if (isset($errors['file'])) {
            return $errors;
        // if everything is ok, try to upload file
        } else {
            try {
                move_uploaded_file($files[$name]["tmp_name"], $target_file);
                return $imageName;
            } catch (\Exception $e) {
                return $errors['file'] = $e->getMessage();
            }
        }
    }

    public function getFullTime()
    {
        $dateTime = new Carbon();
        return $dateTime->format("Y-m-d h:i:s");
    }
}