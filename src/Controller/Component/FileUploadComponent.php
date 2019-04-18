<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;

class FileUploadComponent extends Component
{
    public function fileUpload($image, $folder_name, $avatar_image = 'avatar-1.jpg') {
        $ret_array = [];
        $addmited_file_size = 2000000;
        $valid_ext = true;
        $target_path = IMG . DS . $folder_name;
        $file_size = fileSize($image["tmp_name"]);
        if (!$file_size) {
            $file_size = 1;
        }
        if (!file_exists($target_path)) {
            mkdir($target_path, 0755, true);
        }
        if (isset($image['name']) && !empty($image['name'])) {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $valid_ext = $ext == 'jpg' || $ext == 'png';
            $file_name = Text::uuid() . '.' . $ext;
            move_uploaded_file($image["tmp_name"], $target_path . DS . $file_name);
        } else {
            $file_name = $avatar_image;
        }
        if ($addmited_file_size < $file_size || $file_size == false) {
            $ret_array  = ['status' => 'ERROR', 'msg' => __('The picture of the employee has to be smaller than 2MB. Please, try again.')];
        } else {
            $ret_array = ['status' => 'OK', 'file_name' => $file_name];
        }
        return $ret_array;
    }

    
}

