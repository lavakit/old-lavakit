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
     * @copyright 2019 LUCY VN
     * @author Pencii Team <hoatq@lucy.ne.jp>
     */
    function getViewFieldSetting(array $settingInfo)
    {
        $type = getNameViewFieldSetting($settingInfo);
        $view = "setting::admins.fields.$type.{$settingInfo['view']}";
        
        return Str::contains($settingInfo['view'], '::') ? $settingInfo['view'] : $view;
    }
}
