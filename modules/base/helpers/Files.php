<?php

if (!function_exists('getFileDataJson')) {
    /**
     * @param $file
     * @param $convert_to_array
     * @return bool|mixed
     */
    function getFileDataJson($file, $convert_to_array = true)
    {
        $file = File::get($file);
        if (!empty($file)) {
            if ($convert_to_array) {
                return json_decode($file, true);
            } else {
                return $file;
            }
        }
        return false;
    }
}

if (!function_exists('saveFileDataJson')) {
    /**
     * @param $path
     * @param $data
     * @param $json
     * @return bool|mixed
     */
    function saveFileDataJson($path, $data, $json = true)
    {
        try {
            if ($json) {
                $data = jsonEncode($data);
            }
            File::put($path, $data);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}

if (!function_exists('jsonEncode')) {
    /**
     * @param $data
     * @return string
     */
    function jsonEncode($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}