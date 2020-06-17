<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Image;

use Illuminate\Http\Request;
use App\Http\Requests\CrudCarStoreRequest as StoreRequest;
use App\Http\Requests\CrudCarUpdateRequest as UpdateRequest;

use App\CrudColumns;
use App\CrudFields;

use Carbon\Carbon;
use Illuminate\Support\Str;
 
class CarsWithDriverCrudController extends CrudController
{ 
    public function setUp()
    {    
        $this->crud->setModel(Car::class);
        $this->crud->addClause('where', 'with_driver', true);
        
        $this->crud->setRoute(config('backpack.base.route_prefix') . "/cars_with_driver");
        $this->crud->setEntityNameStrings('машина с водителем', 'машины с водителем');

        $this->crud->addColumns([
          [
            'label' => 'Название',
            'name' => 'name',
          ],
          [
            'label' => 'Год выпуска',
            'type' => 'number',
            'name' => 'year',
          ],
          [
            'label' => 'Объем (л)', 
            'name' => 'engine_volume',
          ],
          [
            'label' => 'Привод', 
            'name' => 'drive_type_id',
            'type' => 'closure',
            'function' => function (Car $car) {
              switch ($car->drive_type_id) {
                case 1:
                  return 'Передний';
                case 2:
                  return 'Задний';
                case 3:
                  return 'Полный';
                default:
                  return '-';
              } 
            }
          ],
          [
            'label' => 'Тип двигателя (топливо)', 
            'name' => 'fuel_type_id',
            'type' => 'closure',
            'function' => function (Car $car) {
              switch ($car->fuel_type_id) {
                case 1:
                  return 'Diesel';
                case 2:
                  return 'АИ-98';
                case 3:
                  return 'АИ-95';
                default:
                  return '-';
              } 
            }
          ],
          [
              'label' => 'Кол-во мест', 
              'type' => 'number',
              'name' => 'seat_count',
          ]
        ]);
         
        $this->crud->addFields([
          [
            'tab' => 'Основное',
            'name' => 'name',
            'label' => 'Название *',
            'type' => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3',
            ],
          ],
          [
              'tab' => 'Основное',
              'name' => 'year',
              'label' => 'Год выпуска *',
              'type' => 'number',
              'attributes' => [
                  'maxlength' => 4,
              ],
              'default' => Carbon::now()->year,
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Объем двигателя *',
              'name' => 'engine_volume',
              'type' => 'text',
              'attributes' => [
                  'class' => 'form-control js-mask',
                  'data-mask' => '9.9',
              ],
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Класс *',
              'name' => 'class_id',
              'type' => 'select_from_array',
              'options' => [
                  '1' => 'Комфорт',
                  '2' => 'Бизнес',
                  '3' => 'Представительский'
              ],
              'attribute' => 'name',
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Кузов *',
              'name' => 'body_type_id',
              'type' => 'select_from_array',
              'options' => [
                  '1' => 'Седан',
                  '2' => 'Внедорожник',
                  '3' => 'Минивэн'
              ],
              'attribute' => 'name',
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Привод *',
              'name' => 'drive_type_id',
              'type' => 'select_from_array',
              'options' => [
                  '1' => 'Передний',
                  '2' => 'Задний',
                  '3' => 'Полный'
              ],
              'attribute' => 'name',
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Тип двигателя (топливо) *',
              'name' => 'fuel_type_id',
              'type' => 'select_from_array',
              'options' => [
                '1' => 'Diesel',
                '2' => 'АИ-98',
                '3' => 'АИ-95'
              ],
               
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Есть климат-контроль',
              'name' => 'has_climate_control',
              'type' => 'select_from_array',
              'options' => [
                '0' => 'Нет',
                '1' => 'Да'
              ],
               
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Трансмиссия *',
              'name' => 'transmission_name',
              'type' => 'select_from_array',
              'options' => [
                'AT' => 'АКПП',
                'MT' => 'МКПП'
              ],
               
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],
          [
              'tab' => 'Основное',
              'label' => 'Количество мест *',
              'name' => 'seat_count',
              'type' => 'number',
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ], 
          [
              'tab' => 'Основное',
              'label' => 'Количество дверей *',
              'name' => 'doors_count',
              'type' => 'number',
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],  
          [
              'tab' => 'Основное',
              'label' => 'Средний расход топлива (л) *',
              'name' => 'avg_fuel_consumption',
              'type' => 'number',
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],  
          [
              'tab' => 'Основное',
              'label' => 'Мин. стоимость *',
              'name' => 'min_cost',
              'type' => 'number',
              'wrapperAttributes' => [
                  'class' => 'form-group col-md-4',
              ],
              'attributes' => [
                  'class' => 'form-control bs-select',
              ],
          ],  
          [
              'tab' => 'Основное',
              'name' => 'images',
              'label' => 'Фотки',
              'type' => 'dropzone',
              'url' => '/car',
          ]
        ]);
          
        $this->crud->enableAjaxTable(); 
        $this->crud->enableExportButtons(); 
    }

    public function store(StoreRequest $request)
    {
      $this->crud->hasAccessOrFail('create');
  
      // fallback to global request instance
      if (is_null($request)) {
          $request = \Request::instance();
      }
  
      // replace empty values with NULL, so that it will work with MySQL strict mode on
      foreach ($request->input() as $key => $value) {
          if (empty($value) && $value !== '0') {
              $request->request->set($key, null);
          }
      }
       
      $request->request->set('with_driver', true);
  
      $item = $this->crud->create($request->except(['save_action', '_token', '_method']));
  
      $this->data['entry'] = $this->crud->entry = $item;
  
      // show a success message
      \Alert::success(trans('backpack::crud.insert_success'))->flash();
  
      // save the redirect choice for next time
      $this->setSaveAction();
  
      return $this->performSaveAction($item->getKey());  
    }

    public function update(UpdateRequest $request)
    {
      $redirect_location = parent::updateCrud(); 
      return $redirect_location;
    }
     
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'image',
            'name' => 'max:255',
        ]);

        $directory = 'uploads/cars';

        $filename = md5(bcrypt(Str::random(100)));

        $file = $request->file('file');
        $ext = $file->extension();
        $path = $directory.'/'.$filename.'.'.$ext;

        $request->file->storeAs($directory, $filename.'.'.$ext, 'public');

        $imageLibrary = \Image::make(public_path($path));

        if (file_exists($path)) {
          unlink($path);
        }
        if (round($imageLibrary->getHeight()*800/$imageLibrary->getWidth()) >= 450) {
            // Предстоит crop по вертикали
            $imageLibrary->resize(800, round($imageLibrary->getHeight()*800/$imageLibrary->getWidth()));
        }
        else {
            // Предстоит crop по горизонтали
            $imageLibrary->resize(round($imageLibrary->getWidth()*450/$imageLibrary->getHeight()), 450);
        }

        // Берется центральная часть
        $imageLibrary->crop(800,450, round(($imageLibrary->getWidth()-800)/2), round(($imageLibrary->getHeight()-450)/2));
        $imageLibrary->encode('png');
        
        $fullPath = public_path($directory.'/'.$filename.'.png');
        $imageLibrary->save($fullPath); 
        $oldmask = umask(0); 
        chmod($fullPath, 0775);
        umask($oldmask); 

        $image = new Image();
        $image->fill([
            'original_file_name' => $file->getClientOriginalName(),
            'file_name'          => $filename.'.png',
            'path'               => 'public/'.$directory.'/'.$filename.'.png',
            'size'               => $file->getClientSize(),
            'index'              => $request->get('index'),
        ]);
        $image->save();

        return response()->json([
            'url' => $image->getUrl(),
            'id' => $image->getKey(),
        ]);
    }
    
    public function deleteImage(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:images,id'
        ]);

        $image = Image::find($request->get('id'));
        $image->thumbnails->each(function (Image $thumbnail) {
            $thumbnail->deleteFile();
            $thumbnail->delete();
        });
        $image->deleteFile();
        $image->delete();
    }
}
