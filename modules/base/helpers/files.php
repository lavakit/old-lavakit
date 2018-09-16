<?php

if (!function_exists('getFileData')) {
    /**
     * Get file data
     *
     * @param $file
     * @param bool $convertToArray
     * @return bool|mixed|string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function getFileData($file, $convertToArray = true)
    {
        $file = File::get($file);
        if (!empty($file)) {
            if ($convertToArray) {
                return json_decode($file, true);
            } else {
                return $file;
            }
        }
        return false;
    }
}

if (!function_exists('storeFileData')) {
    /**
     * Store a data
     *
     * @param $path
     * @param $data
     * @param bool $json
     * @return bool
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function storeFileData($path, $data, $json = true)
    {
        try {
            if ($json) {
                $data = encodePretty($data);
            }

            File::put($path, $data);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}

if (!function_exists('encodePretty')) {
    /**
     * @param $data
     * @return string
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function encodePretty($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}
