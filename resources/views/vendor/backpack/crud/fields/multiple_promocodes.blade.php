@php 
  $relatedModels = isset($entry) ? $entry->{$field['entity']} : [];
@endphp

<div data-ng-app="modelApp">
  <div class="form-group col-md-12"
        ng-controller="PromocodeController"
  >
    
    <label>{!! $field['label'] !!}</label>
    
    <div class="panel panel-default" style="margin-top:10px;">
        <div class="panel-heading">
            Добавить:
        </div>

        <div class="panel-body"> 
           
          <div class="form-group">

              <div class="col-sm-6">
                <label for="new_promocode" class="control-label">Название</label>
                <input type="text"
                        id="new_promocode"
                        ng-model="newTitle"
                        class="form-control"
                />
              </div> 
              <div class="col-sm-12" style="margin-top:10px;">
                <div ng-click="addModel()" class="btn btn-default">
                  <i class="fa fa-btn fa-plus"></i> Добавить
                </div>
              </div>
              
          </div>
    
        </div>
    </div>
   
    <div class="panel panel-success" style="margin-top:20px;">
        <div class="panel-heading">
          Список
        </div>

        <div class="panel-body">
          
          <table class="table table-striped task-table"
                  ng-show="!!models.length"
          >
            <thead>
                <th>Название</th>
                <th>&nbsp;</th>
            </thead>
            <tbody> 
              <tr ng-repeat="model in models">
                  <td class="table-text">
                    <div> 
                      <input type="hidden" name="promocodeIds[@{{ $index }}]" value="@{{ model.id }}" />
                      <input type="text"
                              ng-model="model.title"
                              class="form-control"
                              name="promocodeTitles[@{{ $index }}]"
                      />
                    </div>
                  </td>
                  <td>
                    <div class="btn btn-danger"
                          ng-click="deleteModel(model)"
                    >
                      <i class="fa fa-btn fa-trash"></i> Удалить
                    </div>
                  </td>
              </tr> 
            </tbody>
          </table>
          
          <input type="hidden" name="model_names['promocode']" value="{{ $field['model'] }}" />
          <input type="hidden" name="entity_name['promocode'] }}]" value="{{ $field['entity'] }}" />
          
        </div>
    </div> 
          
  </div>


@push('crud_fields_scripts') 
  <script>
    (function () {
      var promocodeApp = angular.module('PromocodeApp', []);
      
      promocodeApp.controller('PromocodeController', ['$scope', function ($scope) {
        
        $scope.models = [];
        $scope.newTitle = '';
        
        $scope.decodeEntities = function(encodedString) {
          var textArea = document.createElement('textarea');
          textArea.innerHTML = encodedString;
          return textArea.value;
        }
    
        var modelsEncodedJson = "{{ str_replace('&quot;', '&apos;', json_encode($relatedModels, JSON_UNESCAPED_UNICODE)) }}";
        modelsEncodedJson = modelsEncodedJson.replace(/(?:\r\n|\r|\n)/g, '<br><br>');
        var modelsDecodedJson = $scope.decodeEntities(modelsEncodedJson);  
        
        $scope.models = JSON.parse(modelsDecodedJson);
        
        if (!$scope.models) {
          $scope.models = [];
        }
        if (!!$scope.models && $scope.models.length > 0) { 
          $scope.models.forEach(m => { 
            m.title = m.title.replace(/<br><br>/g, "\r\n");
          });
        }
         
        $scope.addModel = function() {
          var newModel = {
            title: $scope.newTitle
          };
          
          $scope.models.push(newModel);
          $scope.newTitle = '';
        }
        $scope.deleteModel = function(item) { 
          var index = $scope.models.indexOf(item); 
          $scope.models.splice(index, 1);  
        }
      }]);

    })(); 
  </script>
@endpush 