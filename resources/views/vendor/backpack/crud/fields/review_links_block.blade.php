@php
  $review_links = isset($entry) ? $entry->{$field['entity']} : [];
@endphp

<div class="form-group col-md-12"
      data-ng-app="ReviewLinksApp"
      ng-controller="ReviewLinksController"
>
  
  <label>{!! $field['label'] !!}</label>
  
  <div class="panel panel-default" style="margin-top:10px;">
      <div class="panel-heading">
        Добавить ссылку
      </div>

      <div class="panel-body"> 
         
        <div class="form-group">

            <div class="col-sm-4">
              <label for="new_review_title" class="control-label">Название</label>
              <input type="text" id="new_review_title" ng-model="newReviewLinkTitle" class="form-control" />
            </div>
            <div class="col-sm-4">
              <label for="new_review_link" class="control-label">Ссылка</label>
              <input type="text" id="new_review_link" ng-model="newReviewLinkUrl" class="form-control" />
            </div> 
            <div class="col-sm-12" style="margin-top:10px;">
              <div ng-click="addReviewLink()" class="btn btn-default">
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
                ng-show="!!reviewLinks.length"
        >
          <thead>
              <th>Название</th>
              <th>Ссылка</th>
              <th>&nbsp;</th>
          </thead>
          <tbody> 
            <tr ng-repeat="reviewLink in reviewLinks">
                <td class="table-text">
                  <div> 
                    <input type="hidden" name="reviewLinkIds[@{{ $index }}]" value="@{{ reviewLink.id }}" /> 
                    <input type="text" name="reviewLinkTitles[@{{ $index }}]" ng-model="reviewLink.title" class="form-control" /> 
                  </div>
                </td>
                <td class="table-text">
                  <div> 
                    <input type="text" name="reviewLinkUrls[@{{ $index }}]" ng-model="reviewLink.url" class="form-control" />
                  </div>
                </td> 
                <td>
                  <div class="btn btn-danger"
                        ng-click="deleteReviewLink(reviewLink)"
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
  <script src="{{ url('js/jquery.mask.min.js') }}"></script>
  <script src="{{ url('js/angular-ui-mask.min.js') }}"></script>
  <script>
    (function () {
      var app = angular.module('ReviewLinksApp', ['ui.mask']);
      
      app.controller('ReviewLinksController', ['$scope', function ($scope) {
         
        $scope.reviewLinks = []; 
        $scope.newReviewLinkTitle = '';
        $scope.newReviewLinkUrl = '';
        
        $scope.decodeEntities = function(encodedString) {
          var textArea = document.createElement('textarea');
          textArea.innerHTML = encodedString;
          return textArea.value;
        }
    
        var reviewsEncodedJson = '{{ json_encode($review_links) }}';  
        var reviewsDecodedJson = $scope.decodeEntities(reviewsEncodedJson);  
        $scope.reviewLinks = JSON.parse(reviewsDecodedJson);   
          
        $scope.addReviewLink = function() {
          var newReviewLink = {
            title: $scope.newReviewLinkTitle,
            url: $scope.newReviewLinkUrl
          };
          
          $scope.reviewLinks.push(newReviewLink); 
          $scope.newReviewLinkTitle = '';
          $scope.newReviewLinkUrl = '';
        }
        $scope.deleteReviewLink = function(item) { 
          var index = $scope.reviewLinks.indexOf(item); 
          $scope.reviewLinks.splice(index, 1);   
        }
      }]);

    })(); 
  </script>
@endpush 