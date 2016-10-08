<?php
use Intervention\Image\ImageManager;

const FONT_FILE = '../public/BigNoodleTooOblique.ttf';
function createImage($manager, $img, $tmpDir, $x, $file, $top, $middle, $bottom, $width) {
    /**
     * @var ImageManager $manager
     */
    $image = $manager->make($img);
    $image->resize($width, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $normalFont = function ($font) {
        $font->file(FONT_FILE);
        $font->color('#ffffff');
        $font->size(100);
    };
    $playerFont = function ($font) use ($x) {
        $font->file(FONT_FILE);
        $font->color('#fff843');
        $font->size((100+($x/10)));
    };
    $startHeight = $image->getHeight() * 0.60;
    $startWidth = $image->getWidth() * 0.10;
    $image->text($top, $startWidth + $x, $startHeight, $normalFont);
    $image->text($middle, $startWidth + 50 + $x, $startHeight + 100, $playerFont);
    $image->text($bottom, $startWidth + 100 + $x, $startHeight + 200, $normalFont);
    $image->save($tmpDir . '/' . sprintf('%03d', $file) . '.jpg', 100);
}

function createIntroVideo($top, $middle, $bottom, $imageURL, $x, $y, $tmpDir) {
    $localImg = tempnam(sys_get_temp_dir(), 'img');
    file_put_contents($localImg, file_get_contents($imageURL));
    $file = 0;
    $manager = new ImageManager(['driver' => 'imagick']);
    for ($i = 0; $i <= 300; $i+=3) {
        createImage($manager, $localImg, $tmpDir, $i, $file, $top, $middle, $bottom, $x);
        $file++;
    }
    exec('cd ' . $tmpDir . ' && avconv -y -i %03d.jpg -r 60 -pix_fmt yuv420p -crf 25 -s ' . $x . 'x' . $y . ' -ar 22050 -b 2048k intro.mp4');
    exec('cd ' . $tmpDir . ' && avconv -ss 0 -i intro.mp4 -t 60 -vcodec libx264 -acodec aac -bsf:v h264_mp4toannexb -f mpegts -strict experimental -y file1.ts');
    exec('cd ' . $tmpDir . ' && avconv -ss 0 -i input -t 60 -vcodec libx264 -acodec aac -bsf:v h264_mp4toannexb -f mpegts -strict experimental -y file2.ts');
    exec('cd ' . $tmpDir . ' && cat file1.ts file2.ts | avconv -i - -c copy potg.mp4');
    exec('cd ' . $tmpDir . ' && avconv -i potg.mp4 -i ' . __DIR__ . '/../music.aac -shortest -map 0:0 -map 1:0 -vcodec copy -acodec copy potgAudio.mp4');
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=potg.mp4');
    readfile($tmpDir . '/potgAudio.mp4');
    exec('rm -rf ' . $tmpDir);
}
