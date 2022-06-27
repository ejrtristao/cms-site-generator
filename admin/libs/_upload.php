<?php

class Upload
{

    public function LoadFile($path, $file)
    {

            $finalName = $file['name'];


        if (@move_uploaded_file($file['tmp_name'], $path . "/" . $finalName)) {
            return $finalName;
        }
    }
}
