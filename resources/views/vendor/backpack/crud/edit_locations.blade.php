@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    {{ trans('backpack::crud.edit') }} <span class="text-lowercase">{{ $crud->entity_name }}</span>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
	    <li class="active">{{ trans('backpack::crud.edit') }}</li>
	  </ol>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<!-- Default box -->
		@if ($crud->hasAccess('list'))
			<a href="{{ url($crud->route) }}"><i class="fa fa-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span class="text-lowercase">{{ $crud->entity_name_plural }}</span></a><br><br>
		@endif

		@include('crud::inc.grouped_errors')

		  {!! Form::open(array('url' => $crud->route.'/'.$entry->getKey(), 'method' => 'put', 'files'=>$crud->hasUploadFields('update', $entry->getKey()))) !!}
			 
		  <div class="box">
		    <div class="box-header with-border">
		    	@if ($crud->model->translationEnabled())
			    	<!-- Single button -->
					<div class="btn-group pull-right">
					  <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Language: {{ $crud->model->getAvailableLocales()[$crud->request->input('locale')?$crud->request->input('locale'):App::getLocale()] }} <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu">
					  	@foreach ($crud->model->getAvailableLocales() as $key => $locale)
						  	<li><a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a></li>
					  	@endforeach
					  </ul>
					</div>
					<h3 class="box-title" style="line-height: 30px;">{{ trans('backpack::crud.edit') }}</h3>
				@else
					<h3 class="box-title">{{ trans('backpack::crud.edit') }}</h3>
				@endif
		    </div>
		    <div class="box-body row" data-ng-app="locationNamesApp">
		      <!-- load the view from the application if it exists, otherwise load the one in the package -->
				 
		      @if(view()->exists('vendor.backpack.crud.form_content'))
		      	@include('vendor.backpack.crud.form_content', ['fields' => $fields, 'action' => 'edit'])
		      @else
		      	@include('crud::form_content', ['fields' => $fields, 'action' => 'edit'])
		      @endif
		    </div><!-- /.box-body -->

            <div class="box-footer">

                @include('crud::inc.form_save_buttons')

		    </div><!-- /.box-footer-->
		  </div><!-- /.box -->
			 
			  
		  {!! Form::close() !!}
			 
	</div>
</div>
@endsection

@php 
  $faqs = isset($entry) ? $entry->faqs : [];
  $reviews = isset($entry) ? $entry->reviews : [];
@endphp

@section('after_scripts') 
<script src="{{ url('js/angular-1.5.8.min.js') }}"></script> 
<script src="{{ url('js/jquery.mask.min.js') }}"></script>
<script src="{{ url('js/angular-ui-mask.min.js') }}"></script>
<script>
	(function () {

		var app = angular.module("locationNamesApp", ['ui.mask']);
		
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
			if (!$scope.faqs) {
				$scope.models = [];
			}
			if (!!$scope.faqs && $scope.faqs.length > 0) {
				$scope.faqs.forEach(f => {
					f.question = f.question.replace(/<br><br>/g, "\r\n");
					f.answer = f.answer.replace(/<br><br>/g, "\r\n");
				});
			}

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
		
		
		app.controller('ReviewsController', ['$scope', function ($scope) {
			 
			$scope.reviews = []; 
			$scope.newReviewOwner = '';
			$scope.newReviewText = '';
			$scope.newReviewRating = 0; 
			
			$scope.decodeEntities = function(encodedString) {
				var textArea = document.createElement('textarea');
				textArea.innerHTML = encodedString;
				return textArea.value;
			}
	
			var reviewsEncodedJson = '{{ json_encode($reviews) }}';  
			var reviewsDecodedJson = $scope.decodeEntities(reviewsEncodedJson);  
			$scope.reviews = JSON.parse(reviewsDecodedJson);   
			
			$scope.checkIfNewRatingIsValid = function()  { 
				if ($scope.newReviewRating > 5 || $scope.newReviewRating < 0) {
					$scope.newReviewRating = 0;
				}
			}
			$scope.checkIfRatingIsValid = function(review)  {
				if (review.rating > 5 || review.rating < 0) {
					review.rating = 0;
				}
			}
			$scope.addReview = function() {
				if ($scope.newReviewRating > 5) $scope.newReviewRating = 5;
				var newReview = {
					owner_name: $scope.newReviewOwner,
					text: $scope.newReviewText,
					rating: $scope.newReviewRating
				};
				
				$scope.reviews.push(newReview); 
				$scope.newReviewOwner = '';
				$scope.newReviewText = '';
				$scope.newReviewRating = 0;
			}
			$scope.deleteReview = function(item) { 
				var index = $scope.reviews.indexOf(item); 
				$scope.reviews.splice(index, 1);   
			}
		}]);
 
  })();
</script> 
@endsection
