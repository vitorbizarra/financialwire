<?php

use Illuminate\Support\Facades\File;

if (!function_exists('get_avaliable_icons')) {
    function get_avaliable_icons(bool $icons = false)
    {
        $mediaPath = public_path('vendor/blade-bootstrap-icons');

        $filesInFolder = File::allFiles($mediaPath);

        $allIcons = [];

        foreach ($filesInFolder as $file) {
            $iconName = str($file->getBaseName())->remove('.svg');

            $option = "bi-{$iconName}";

            $allIcons[$option] = ' ';

            if ($icons) {
                $allIcons[$option] = $option;
            }
        }

        return $allIcons;
    }
}