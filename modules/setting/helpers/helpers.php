<?php

Use Illuminate\Support\Arr;
Use Illuminate\Support\Str;

if (!function_exists('getNameViewFieldSetting')) {
    /**
     * @param array $settingInfo
     * @return string
     */
    function getNameViewFieldSetting(array $settingInfo)
    {
        return Arr::get($settingInfo, 'translatable', 'false') ? 'translations' : 'originals';
    }
}

if (!function_exists('getViewFieldSetting')) {
    /**
     * @param array $settingInfo
     * @return mixed|string
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function getViewFieldSetting(array $settingInfo)
    {
        $type = getNameViewFieldSetting($settingInfo);
        $view = "setting::admins.fields.$type.{$settingInfo['view']}";

        return Str::contains($settingInfo['view'], '::') ? $settingInfo['view'] : $view;
    }
}

if (!function_exists('valueDbSetting')) {
    /**
     * @param $dbSetting
     * @param $locale
     * @return mixed
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    function valueDbSetting($dbSetting, $locale)
    {
        if (!$dbSetting instanceof \Lavakit\Setting\Models\Setting) {
            return;
        }

        /** @var $dbSetting \Dimsav\Translatable\Translatable */
        return $dbSetting->hasTranslation($locale) ? $dbSetting->translate($locale)->value : '';
    }
}
