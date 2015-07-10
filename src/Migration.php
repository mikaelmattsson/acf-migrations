<?php namespace ACFMigrations;

class Migration
{

    public $optionKey = 'acf-migrations';

    public static function touch($fieldGroupKey)
    {
        $migrations                 = get_option(static::$optionKey, []);
        $migrations[$fieldGroupKey] = time();
        update_option(static::$optionKey, $migrations);
    }
}
