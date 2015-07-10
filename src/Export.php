<?php

namespace ACFMigrations;

class Export
{

    public static function saveAll()
    {
        $fieldGroups = static::getFieldsForExport();

        foreach ($fieldGroups as $fieldGroup) {
            static::saveField($fieldGroup);
        }
    }

    public static function getFieldsForExport()
    {
        $fieldGroups = acf_get_field_groups();

        foreach ($fieldGroups as $i => $fieldGroup) {
            $fields                    = acf_get_fields($fieldGroup);
            $fieldGroups[$i]['fields'] = acf_prepare_fields_for_export($fields);
        }

        return $fieldGroups;
    }

    public static function saveField($fieldGroup)
    {
        $key      = acf_extract_var($fieldGroup, 'key');
        $fileName = 'acf-migration-'.$key.'.json';
        
        file_put_contents(static::getDir().'/'.$fileName, acf_json_encode([$fieldGroup]));
    }

    public static function getDir()
    {
        $dir = get_template_directory().'/acf-migrations';
        if (!is_dir($dir)) {
            mkdir($dir);
        }

        return $dir;
    }
}