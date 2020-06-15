<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Requests\CrudNewsStoreRequest as StoreRequest;
use App\Http\Requests\CrudNewsUpdateRequest as UpdateRequest;

use App\CrudColumns;
use App\CrudFields;

use App\Models\News;
use App\Models\Source; 
 
class NewsCrudController extends CrudController
{ 
    public function setUp()
    {    
        $this->crud->setModel(News::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . "/news");
        $this->crud->setEntityNameStrings('новость', 'новости');

        $this->crud->addFields([
            [
                'tab' => 'Основное',
                'label' => 'Название*',
                'name' => 'title',
                'type' => 'text',
            ],
            CrudFields::slug(),
            CrudFields::seo_title(), 
            CrudFields::seo_description(),
            [
                'tab' => 'Основное',
                'name' => 'content',
                'label' => 'Текст новости',
                'type' => 'tinymce',
                'attributes' => [
                    'rows' => 12
                ],
            ],
            [
                'tab' => 'Основное',
                'name' => 'teaser',
                'label' => 'Короткий текст новости',
                'type' => 'textarea',
                'attributes' => [
                    'rows' => 5
                ],

            ],
            [
                'tab' => 'Основное',
                'name' => 'teaser2',
                'label' => 'Короткий текст новости 2',
                'type' => 'textarea',
                'attributes' => [
                    'rows' => 5
                ],

            ],
            [
                'tab' => 'Основное',
                'label' => 'Изображение',
                'name' => 'card_image',
                'type' => 'image',
                'crop' => true,
                'upload' => true,
                'aspect_ratio' => 200/145,
                'disk' => 'public/uploads',
                'prefix' => 'public/uploads/',
            ], 
            CrudFields::created_at(),
            CrudFields::is_enabled()
        ]);

        $this->crud->addColumns([
            CrudColumns::id(),
            [ 'name' => 'is_enabled', 'label' => 'Вкл/Выкл', 'type' => 'checkbox' ],
            [ 'name' => 'title', 'label' => 'Заголовок' ],
            [ 
              'name' => 'slug', 
              'label' => 'Постоянная ссылка',
              'type' => 'model_function',
              'function_name' => 'getUrl'
            ]
        ]);
 
        $this->crud->addButtonFromView('line', 'openUrl', 'open-url');
 
        $this->crud->enableAjaxTable(); 
        $this->crud->enableExportButtons(); 
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
