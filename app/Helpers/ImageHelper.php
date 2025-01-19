<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class ImageHelper
{
    public static function saveImage($image, $path = 'produtos')
    {
        try {
            // Define o caminho para a pasta de imagens dentro de public
            $directory = public_path('images/' . $path);
            
            // Cria o diretório se não existir
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $fileName = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $fullPath = 'images/' . $path . '/' . $fileName;
            
            // Move a imagem para a pasta public/images/produtos
            $image->move(public_path('images/' . $path), $fileName);
            
            return $fullPath;
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function getImageUrl($path)
    {
        $defaultImage = 'images/no-image.png';
        
        // Verifica se a imagem padrão existe, se não, cria
        if (!file_exists(public_path($defaultImage))) {
            self::createDefaultImage();
        }

        if (!$path || !file_exists(public_path($path))) {
            return asset($defaultImage);
        }
        return asset($path);
    }

    public static function deleteImage($path)
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }

    private static function createDefaultImage()
    {
        $directory = public_path('images');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        $defaultImage = public_path('images/no-image.png');
        
        // Cria uma imagem em branco 200x200
        $image = imagecreatetruecolor(200, 200);
        $bgColor = imagecolorallocate($image, 240, 240, 240);
        $textColor = imagecolorallocate($image, 100, 100, 100);
        
        imagefill($image, 0, 0, $bgColor);
        
        // Adiciona texto
        $text = 'Sem Imagem';
        $font = 5;
        
        // Centraliza o texto
        $x = (200 - (strlen($text) * imagefontwidth($font))) / 2;
        $y = (200 - imagefontheight($font)) / 2;
        
        imagestring($image, $font, $x, $y, $text, $textColor);
        
        imagepng($image, $defaultImage);
        imagedestroy($image);
    }
} 