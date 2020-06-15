@php 
  $refs = isset($entry) ? $entry->refs : [];
  $promocodes = isset($entry) ? $entry->promocodes : [];
@endphp

<div data-ng-app="ModelApp">
  
  <div class="form-group col-md-12"
        ng-controller="ModelController"
  >
    
    <label>Refs:</label>
    
    <div class="panel panel-default" style="margin-top:10px;">
        <div class="panel-heading">
            Добавить:
        </div>

        <div class="panel-body"> 
           
          <div class="form-group">

              <div class="col-sm-6">
                <label for="new_ref_title" class="control-label">Название</label>
                <input type="text"
                        id="new_ref_title"
                        ng-model="newTitles['refs']"
                        class="form-control"
                />
              </div> 
              <div class="col-sm-12" style="margin-top:10px;">
                <div ng-click="addModel('refs')" class="btn btn-default">
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
                  ng-show="!!refs.length"
          >
            <thead>
                <th>Название</th>
                <th>&nbsp;</th>
            </thead>
            <tbody> 
              <tr ng-repeat="ref in refs">
                  <td class="table-text">
                    <div> 
                      <input type="hidden" name="refIds[@{{ $index }}]" value="@{{ ref.id }}" />
                      <input type="text"
                              ng-model="ref.title"
                              class="form-control"
                              name="refTitles[@{{ $index }}]"
                      />
                    </div>
                  </td>
                  <td>
                    <div class="btn btn-danger"
                          ng-click="deleteModel('refs', ref)"
                    >
                      <i class="fa fa-btn fa-trash"></i> Удалить
                    </div>
                  </td>
              </tr> 
            </tbody>
          </table>
          
        </div>
    </div> 
    
    <label>Промокоды:</label>
    
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
                        ng-model="newTitles['promocodes']"
                        class="form-control"
                />
              </div> 
              <div class="col-sm-12" style="margin-top:10px;">
                <div ng-click="addModel('promocodes')" class="btn btn-default">
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
                  ng-show="!!promocodes.length"
          >
            <thead>
                <th>Название</th>
                <th>&nbsp;</th>
            </thead>
            <tbody> 
              <tr ng-repeat="promocode in promocodes">
                  <td class="table-text">
                    <div> 
                      <input type="hidden" name="promocodeIds[@{{ $index }}]" value="@{{ promocode.id }}" />
                      <input type="text"
                              ng-model="promocode.title"
                              class="form-control"
                              name="promocodeTitles[@{{ $index }}]"
                      />
                    </div>
                  </td>
                  <td>
                    <div class="btn btn-danger"
                          ng-click="deleteModel('promocodes', promocode)"
                    >
                      <i class="fa fa-btn fa-trash"></i> Удалить
                    </div>
                  </td>
              </tr> 
            </tbody>
          </table>
          
        </div>
    </div> 
          
  </div>
  
</div>

@push('crud_fields_scripts') 
  <script src="{{ url('js/angular-1.5.8.min.js') }}"></script>
  <script>
    (function () {
      var refApp = angular.module('ModelApp', []);
      
      refApp.controller('ModelController', ['$scope', function ($scope) {
         
        $scope.refs = [];
        $scope.promocodes = [];
        $scope.newTitles = {
          'refs': '',
          'promocodes': ''
        };
        
        $scope.decodeEntities = function(encodedJson) {
          
          encodedJson = encodedJson.replace(/(?:\r\n|\r|\n)/g, '<br><br>');
          
          var textArea = document.createElement('textarea');
          textArea.innerHTML = encodedJson;
          return JSON.parse(textArea.value);
        }
        $scope.getModels = function(models) {
          if (!models) {
            models = [];
          } 
          if (!!models && models.length > 0) { 
            models.forEach(m => { 
              m.title = m.title.replace(/<br><br>/g, "\r\n");
            });
          }
          
          return models;
        }
    
        var refsEncodedJson = "{{ str_replace('&quot;', '&apos;', json_encode($refs, JSON_UNESCAPED_UNICODE)) }}";
        $scope.refs = $scope.decodeEntities(refsEncodedJson);  
    
        var promocodesEncodedJson = "{{ str_replace('&quot;', '&apos;', json_encode($promocodes, JSON_UNESCAPED_UNICODE)) }}";
        $scope.promocodes = $scope.decodeEntities(promocodesEncodedJson);   
        
        $scope.refs = $scope.getModels($scope.refs);
        $scope.promocodes = $scope.getModels($scope.promocodes);
         
        $scope.addModel = function(type) {
          var newModel = {
            title: $scope.newTitles[type]
          };
          
          $scope[type].push(newModel);
          $scope.newTitles[type] = '';
        }
        $scope.deleteModel = function(type, item) { 
          var index = $scope[type].indexOf(item); 
          $scope[type].splice(index, 1);  
        }
      }]);

    })(); 
  </script>
@endpush 