<?php

require_once __DIR__.'/../src/Hooks.php';
require_once __DIR__.'/../src/Export.php';
require_once __DIR__.'/../src/Migration.php';

add_action('init', ['ACFMigrations\Hooks', 'init']);

