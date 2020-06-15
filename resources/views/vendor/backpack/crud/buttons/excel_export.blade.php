@if ($crud->hasAccess('create'))

	@if (	!!Auth::user() )
	
		 @if (session('importSuccessMessage'))
			<div class="alert alert-success" style="margin-top:30px;">
					{{ session('importSuccessMessage') }}
			</div>
		 @endif
		 @if ($errors->any()) 
			<div class="alert alert-danger" style="margin-top:30px;">
				 <b>Импорт не был произведен. В файле найдены следующие ошибки:</b>
				 @foreach ($errors->all() as $error)
					 <br>{{ $error }}
				 @endforeach
			</div> 
		 @endif
 
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-target="#exportPages" data-toggle="tab">Экспорт</a>
			</li>
			<li>
				<a data-target="#importPages" data-toggle="tab">Импорт</a>
			</li>
		</ul>
		 
		<div class="tab-content">
			<div class="tab-pane active" id="exportPages"> 
	 
				<div style="margin-top:10px;">
					<button id="exportFormSubmit" 
									class="btn btn-success ladda-button"
									data-style="zoom-in"
					>
						<i class="fa fa-upload"></i> Экпорт</span>
					</button>
				</div> 
			</div>
			<div class="tab-pane" id="importPages"> 
				  
				<div style="margin-top:20px;">
					<b>Импорт Excel-файла:</b>
					<br>(Доступные форматы: .xls, .xlsx)
					
					<form enctype="multipart/form-data"
								method="post"
								action="/admin-panel/import_pages"
					>
						{{ csrf_field() }}
						<div style="margin-top:10px;"> 
				      <input type="file"
				             class="import_file_input"
				             id="uploadPageData" 
				             accept=".xls, .xlsx"
										 name="uploadedPageFile" 
				      />
				      <label for="uploadPageData"
										style="display:inline-block;margin-right:10px;"
							>
								<a class="btn btn-success ladda-button"
										data-style="zoom-in"
								>
									<span class="ladda-label"><i class="fa fa-plus"></i> Выбрать файл</span>
								</a>
				      </label> 
							<div id="inputFileName"
										style="display:inline-block;"
							>
							</div> 
						</div>		
						<div style="margin-top:10px;">
						    <button id="importFileSelect" 
												class="btn btn-primary ladda-button disabled"
												data-style="zoom-in"
								>
									<i class="fa fa-upload"></i> Импорт</span>
								</button>
						</div>
					</form>
				</div>  
				
			</div>
		</div>
		 
		<style>
			.nav-tabs {
				margin-top:20px;
			}
			.nav-tabs>li {
				cursor: pointer;
			}
			input[type="file"].import_file_input {
				display:none;
			}
		</style>
		
		@push('crud_list_scripts')
			<script>
				jQuery(document).ready(function($) {
					 
					jQuery('#exportFormSubmit').on('click', function(event){ 
						
						event.preventDefault();
						
						var button = jQuery(this);
						if (!button.hasClass('disabled')) {
							
							button.addClass('disabled');
							
							var icon = jQuery(this).find('i.fa');
							icon.removeClass('fa-upload');
							icon.addClass('fa-spinner fa-spin');
							
							jQuery.get( "{{ url('api/v1/export_pages') }}", function( data ) {
								
								var link = jQuery("<a>");
								link.attr("href", data);
								jQuery("body").append(link);
								link.attr("download", "export.xlsx");
								link[0].click();
								link.remove();
								
								button.removeClass('disabled');
								 
								icon.removeClass('fa-spinner fa-spin');
								icon.addClass('fa-upload');
								
							});
						}
					});
					 
					jQuery('#uploadPageData').on('change', function(event){ 

						if (event.target.files && event.target.files.length > 0) {
						 
						 var reader = new FileReader();
						 inputFile = event.target.files[0];

						 reader.onload = function(e) {
							 jQuery('#inputFileName').html(inputFile.name);
						 };
						 reader.onerror = function(e) {
							 jQuery('#inputFileName').html('Ошибка загрузки файла.');
						 };
						 reader.readAsDataURL(inputFile);
						 
						 if (!!inputFile) {
							 jQuery('#importFileSelect').removeClass('disabled');
						 }
						}	
					});
				 
				});
			</script> 
		@endpush
		
	@endif
@else
		-
@endif