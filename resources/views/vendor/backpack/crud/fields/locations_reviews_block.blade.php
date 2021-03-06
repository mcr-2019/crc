<div class="form-group col-md-12"
      ng-controller="ReviewsController"
>
  
  <label>{!! $field['label'] !!}</label>
  
  <div class="panel panel-default" style="margin-top:10px;">
      <div class="panel-heading">
          Добавить отзыв
      </div>

      <div class="panel-body"> 
         
        <div class="form-group">

            <div class="col-sm-4">
              <label for="new_review_owner" class="control-label">Клиент</label>
              <input type="text" id="new_review_owner" ng-model="newReviewOwner" class="form-control" />
            </div>
            <div class="col-sm-4">
              <label for="new_review_text" class="control-label">Текст</label>
              <textarea id="new_review_text" ng-model="newReviewText" class="form-control"></textarea>
            </div> 
            <div class="col-sm-4">
              <label for="new_review_rating" class="control-label">Рейтинг</label>
              <input id="new_review_rating"
                      type="text"
                      ng-model="newReviewRating"
                      ng-change="checkIfNewRatingIsValid"
                      class="form-control js-mask"
                      data-mask="9.9"
              />
            </div> 
            <div class="col-sm-12" style="margin-top:10px;">
              <div ng-click="addReview()" class="btn btn-default">
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
                ng-show="!!reviews.length"
        >
          <thead>
              <th>Клиент</th>
              <th>Текст</th>
              <th>Рейтинг</th>
              <th>&nbsp;</th>
          </thead>
          <tbody> 
            <tr ng-repeat="review in reviews">
                <td class="table-text">
                  <div> 
                    <input type="hidden" name="reviewIds[@{{ $index }}]" value="@{{ review.id }}" /> 
                    <input type="text" name="reviewOwners[@{{ $index }}]" ng-model="review.owner_name" class="form-control" /> 
                  </div>
                </td>
                <td class="table-text">
                  <div> 
                    <textarea name="reviewTexts[@{{ $index }}]" rows="5" class="form-control">@{{ review.text }}</textarea> 
                  </div>
                </td> 
                <td class="table-text">
                  <div> 
                    <input type="text"
                          name="reviewRatings[@{{ $index }}]"
                          ng-model="review.rating"
                          ng-change="checkIfRatingIsValid(review)"
                          class="form-control js-mask" 
                          data-mask="9.9" 
                    /> 
                  </div>
                </td> 
                <td>
                  <div class="btn btn-danger"
                        ng-click="deleteReview(review)"
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
 