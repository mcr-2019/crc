<?php
/**
 * Created by PhpStorm.
 * User: errogaht
 * Date: 13.04.2017
 * Time: 18:42
 */

namespace App;


class CrudColumns
{

    public static function priority(array $params = [])
    {
        return array_merge([
            'name' => 'priority',
            'label' => 'Приоритет (сортировка)',
            'type' => 'text',
        ], $params);
    }

    public static function id(array $params = [])
    {
        return array_merge([
            'label' => 'id',
            'type' => 'text',
            'name' => 'id',
        ], $params);
    }

    public static function slug(array $params = [])
    {
        return array_merge([
            'label' => 'Постоянная ссылка',
            'type' => 'text',
            'name' => 'slug',
        ], $params);
    }

}