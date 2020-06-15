<div class="form-group col-md-12"
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
 