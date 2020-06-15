@php 
  $faqs = isset($entry) ? $entry->{$field['entity']} : [];
@endphp

<div class="form-group col-md-12"
      data-ng-app="BranchOfficeApp"
      ng-controller="BranchOfficeController"
>
  
  <label>{!! $field['label'] !!}</label>
  
  <div class="panel panel-default" style="margin-top:10px;">
      <div class="panel-heading">
          Добавить вопрос/ответ
      </div>

      <div class="panel-body"> 
         
        <div class="form-group">

            <div class="col-sm-6">
              <label for="new_faq_question" class="control-label">Вопрос</label>
              <textarea id="new_faq_question" ng-model="newFaqQuestion" rows="5" class="form-control"></textarea>
            </div>
            <div class="col-sm-6">
              <label for="new_faq_answer" class="control-label">Ответ</label>
              <textarea id="new_faq_answer" ng-model="newFaqAnswer" rows="5" class="form-control"></textarea>
            </div> 
            <div class="col-sm-12" style="margin-top:10px;">
              <div ng-click="addFaq()" class="btn btn-default">
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
                ng-show="!!faqs.length"
        >
          <thead>
              <th>Вопрос</th>
              <th>Ответ</th>
              <th>&nbsp;</th>
          </thead>
          <tbody> 
            <tr ng-repeat="faq in faqs">
                <td class="table-text">
                  <div> 
                    <input type="hidden" name="faqIds[@{{ $index }}]" value="@{{ faq.id }}" /> 
                    <textarea name="faqQuestions[@{{ $index }}]" rows="5" class="form-control">@{{ faq.question }}</textarea> 
                  </div>
                </td>
                <td class="table-text">
                  <div> 
                    <textarea name="faqAnswers[@{{ $index }}]" rows="5" class="form-control">@{{ faq.answer }}</textarea> 
                  </div>
                </td> 
                <td>
                  <div class="btn btn-danger"
                        ng-click="deleteFaq(faq)"
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

@php
 
@endphp
@push('crud_fields_scripts') 
  <script src="{{ url('js/angular-1.5.8.min.js') }}"></script>
  <script>
    (function () {
      var app = angular.module('BranchOfficeApp', []);
      
      app.controller('BranchOfficeController', ['$scope', function ($scope) {
         
        $scope.faqs = [];
        $scope.newFaqQuestion = '';
        $scope.newFaqAnswer = '';
        
        $scope.decodeEntities = function(encodedString) {
          var textArea = document.createElement('textarea');
          textArea.innerHTML = encodedString;
          return textArea.value;
        }
    
        var faqsEncodedJson = "{{ str_replace('&quot;', '&apos;', json_encode($faqs, JSON_UNESCAPED_UNICODE)) }}";
        faqsEncodedJson = faqsEncodedJson.replace(/(?:\r\n|\r|\n)/g, '<br><br>');
        var faqsDecodedJson = $scope.decodeEntities(faqsEncodedJson);  
        
        $scope.faqs = JSON.parse(faqsDecodedJson);  
        $scope.faqs.forEach(f => { 
          f.question = f.question.replace(/<br><br>/g, "\r\n");
          f.answer = f.answer.replace(/<br><br>/g, "\r\n");
        });
         
        $scope.addFaq = function() {
          var newFaq = {
            question: $scope.newFaqQuestion,
            answer: $scope.newFaqAnswer
          };
          
          $scope.faqs.push(newFaq);
          $scope.newFaqQuestion = '';
          $scope.newFaqAnswer = '';
        }
        $scope.deleteFaq = function(item) { 
          var index = $scope.faqs.indexOf(item); 
          $scope.faqs.splice(index, 1);  
        }
      }]);

    })(); 
  </script>
@endpush 