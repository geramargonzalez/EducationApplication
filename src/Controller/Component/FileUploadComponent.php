<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;

class FileUploadComponent extends Component
{

    public function fileUpload($image, $folder_name, $avatar_image = 'avatar-1.jpg') {
        if (empty($image) && $image['error'] != 0) {
            return [
                'status' => 500,
                'msg' => __('Error')
            ];
        } else {
            $addmited_file_size = 10000000; // 10MB
            $target_path = IMG . DS . $folder_name;
            $file_size = fileSize($image['tmp_name']);
            if ($file_size == false || $addmited_file_size < $file_size) {
                return [
                    'status' => 500,
                    'msg' => __('The picture has to be smaller than 10MB. Please, try again.')
                ];
            }
            if (!file_exists($target_path)) {
                mkdir($target_path, 0755, true);
            }
            if (isset($image['name']) && !empty($image['name'])) {
                $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    $file_name = Text::uuid() . '.' . $ext;
                    move_uploaded_file($image['tmp_name'], $target_path . DS . $file_name);
                } else {
                    return [
                        'status' => 500,
                        'msg' => __('Invalid file extension. Please, try again.')
                    ];
                }
            } else {
                $file_name = $avatar_image;
            }
            return [
                'status' => 200,
                'file_name' => $file_name
            ];
        }
    }
    
}

