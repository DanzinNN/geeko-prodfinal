<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupImages extends Command
{
    protected $signature = 'setup:images';
    protected $description = 'Setup default images for the application';

    public function handle()
    {
        // Cria os diretórios necessários
        $directories = [
            public_path('images'),
            public_path('images/produtos')
        ];

        foreach ($directories as $directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
                $this->info("Diretório criado: {$directory}");
            }
        }

        // Cria a imagem padrão se não existir
        $defaultImage = public_path('images/no-image.png');
        if (!file_exists($defaultImage)) {
            // Cria uma imagem em branco 200x200
            $image = imagecreatetruecolor(200, 200);
            $bgColor = imagecolorallocate($image, 240, 240, 240);
            $textColor = imagecolorallocate($image, 100, 100, 100);
            
            // Preenche o fundo
            imagefill($image, 0, 0, $bgColor);
            
            // Adiciona texto
            $text = 'Sem Imagem';
            $font = 5; // fonte padrão
            
            // Centraliza o texto
            $textBox = imagettfbbox(20, 0, $font, $text);
            $textWidth = abs($textBox[4] - $textBox[0]);
            $textHeight = abs($textBox[5] - $textBox[1]);
            $x = (200 - $textWidth) / 2;
            $y = (200 - $textHeight) / 2;
            
            imagestring($image, $font, $x, $y, $text, $textColor);
            
            // Salva a imagem
            imagepng($image, $defaultImage);
            imagedestroy($image);
            
            $this->info("Imagem padrão criada: {$defaultImage}");
        }

        $this->info('Configuração de imagens concluída!');
    }
} 