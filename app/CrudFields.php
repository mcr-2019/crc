<?php
/**
 * Created by PhpStorm.
 * User: errogaht
 * Date: 13.04.2017
 * Time: 18:42
 */

namespace App;


class CrudFields
{
    public static function seo_description(array $params = [])
    {
        return array_merge([
            'tab' => 'SEO',
            'name' => 'seo_description',
            'label' => 'SEO Description',
            'type' => 'text'
        ], $params);
    }

    public static function seo_title(array $params = [])
    {
        return array_merge([
            'tab' => 'SEO',
            'name' => 'seo_title',
            'label' => 'SEO Title',
            'type' => 'text'
        ], $params);
    }

    public static function seo_keywords(array $params = [])
    {
        return array_merge([
            'tab' => 'SEO',
            'name' => 'seo_keywords',
            'label' => 'SEO Keywords',
            'type' => 'text'
        ], $params);
    }

    public static function is_enabled(array $params = [])
    {
        return array_merge([
            'tab' => 'Основное',
            'name' => 'is_enabled',
            'label' => 'Вкл/Выкл',
            'type' => 'checkbox',
            'default' => true
        ], $params);
    }

    public static function slug(array $params = [])
    {
        return array_merge([
            'tab' => 'Основное',
            'name' => 'slug',
            'label' => 'Slug',
            'type' => 'text',
            'hint' => 'Постоянная ссылка, уникальный индентификатор. Например http://site.com/news/slug slug - в этом случае это постоянная ссылка. Можно оставить пустым, тогда будет создана автоматически из названия/заголовка'
        ], $params);
    }

    public static function priority(array $params = [])
    {
        return array_merge([
            'tab' => 'Основное',
            'name' => 'priority',
            'label' => 'Приоритет',
            'type' => 'number',
            'hint' => 'Приоритет этого элемента при выводе в общем списке. Чем выше число тем выше в списке будет данный элемент. Только положительное число.',
            'default' => 0
        ], $params);
    }

    public static function created_at(array $params = [])
    {
        return array_merge([
            'tab' => 'Основное',
            'name' => 'created_at',
            'label' => 'Дата создания',
            'type' => 'datetime_picker',
            'datetime_picker_options' => [
                'format' => 'DD.MM.YYYY HH:mm',
                'language' => 'ru'
            ]
        ], $params);
    }

    public static function updated_at(array $params = [])
    {
        return array_merge([
            'tab' => 'Основное',
            'name' => 'updated_at',
            'label' => 'Последнее обновление: дата',
            'type' => 'text', 
            'attributes' => ['disabled' => 'disabled']
        ], $params);
    }

}