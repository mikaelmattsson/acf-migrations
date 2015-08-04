<?php

namespace ACFMigrations;

class Hooks
{

    public static function init()
    {
        add_action('save_post', [__CLASS__, 'actionSavePost'], 10, 3);
    }

    public static function actionSavePost($postID, $post, $update)
    {
        if ($post->post_type == 'acf-field-group') {
            $fieldGroupKey = $post->post_name;
            $fieldGroup    = acf_get_field_group($fieldGroupKey);
            Export::saveField($fieldGroup);
            Migration::touch($fieldGroupKey);
        }
    }

}
