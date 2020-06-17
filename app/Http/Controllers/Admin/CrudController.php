<?php

namespace App\Http\Controllers\Admin;
 
abstract class CrudController extends \Backpack\CRUD\app\Http\Controllers\CrudController
{ 
  public function __construct()
  {  
    parent::__construct();
    
    $this->crud->setDefaultPageLength(100);
  }  
}
