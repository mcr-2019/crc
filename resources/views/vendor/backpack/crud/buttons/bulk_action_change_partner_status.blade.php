@if ($crud->hasAccess('create'))

	<div style="margin-top:20px;">
		<form id="bulkActionForm" action="{{ url('bulk_action_route') }}/" method="post">
			{{ csrf_field() }}
			<div><b>Массовые действия:</b></div>
			<div style="margin-top:5px;">
			  <input id="selectAllForBulkActions"
							type="checkbox" 
			  />
				<label for="selectAllForBulkActions" style="cursor:pointer;">Выбрать все</label>
			</div>
			<div style="margin-top:5px;">
				<select name="action" id="bulkActionSelect">
					<option value="-1" disabled selected>Выбрать действие</option> 
					<option value="yes">Поставить заказам статус "Выплачено партнеру"</option>
					<option value="no">Поставить заказам статус "Не выплачено партнеру"</option>
				</select>
				<input name="crudRoute" type="hidden" value="{{ $crud->route }}" />
				<input name="entityName" type="hidden" value="{{ get_class($crud->model) }}" />
				<input name="actionName" type="hidden" value="changePartnerStatus" />
				<input id="bulkActionIds" name="bulkActionIds" type="hidden" value="" />
				<button id="bulkActionButton" 
								class="btn btn-warning ladda-button disabled" 
								data-style="zoom-in"
								type="submit"
				>
					Применить
				</button>
			</div>
		</form>
	</div> 
	
	@push('crud_list_scripts')
	  <script>
			jQuery( document ).ready(function() {
				
				var bulkActionIds = [];
				var bulkAction = '';
				let timerId = setTimeout(function checkIfOrdersAreLoaded() {
					 
	 				if (!jQuery('.bulk_action_checkbox').length) {
				  	timerId = setTimeout(checkIfOrdersAreLoaded, 1000);
					} else {
				  	timerId = setTimeout(checkIfOrdersAreLoaded, 1000);
						init();
					}
				 
				}, 1000);

 				function init() {
					
					jQuery('#bulkActionSelect').on('change', function(event){
						bulkAction = jQuery(this).val();
						if (bulkActionIds.length > 0 && !!bulkAction) {
							jQuery('#bulkActionButton').removeClass('disabled');
						} else {
							jQuery('#bulkActionButton').addClass('disabled'); 
						}
					});
					jQuery('#selectAllForBulkActions').click(function(){  
						var selectAll = jQuery(this).is(":checked");
						 
						jQuery('.bulk_action_checkbox').each(function( index ) {  
							if (selectAll !== jQuery(this).is(":checked")) { 
								jQuery(this).trigger('click');
							}
						});
					});
					 
					jQuery('.bulk_action_checkbox').click(function(){
						var id = jQuery(this).data('id');
 
						if (jQuery(this).is(":checked")) {
							if (!bulkActionIds.includes(id)) {
								bulkActionIds.push(id);
							}
						} else {
							for( var i = 0; i < bulkActionIds.length; i++){ 
							   if ( bulkActionIds[i] === id) {
							     bulkActionIds.splice(i, 1); 
							   }
							}
						}

						jQuery('#bulkActionIds').val(JSON.stringify(bulkActionIds)); 
						if (bulkActionIds.length > 0) {
							if (!!bulkAction) {
								jQuery('#bulkActionButton').removeClass('disabled');
							} else {
								jQuery('#bulkActionButton').addClass('disabled'); 
							}
							jQuery('#selectAllForBulkActions').prop("checked", true);
						} else {
							jQuery('#bulkActionButton').addClass('disabled'); 
							jQuery('#selectAllForBulkActions').prop("checked", false);
						}
					});
					jQuery('#bulkActionButton').click(function(event){ 
						event.preventDefault();
						if (!jQuery(this).hasClass('disabled')) { 
	            swal({
	                icon: 'warning',
	                title: 'Подтверждение действия',
	                text: 'Вы действительно хотите изменить выделенные элементы?',
	                buttons: {
	                    ok: 'Да',
	                    cancel: 'Нет'
	                }
	            }).then(function (value) {
	                if (value === 'ok') {
	                  jQuery('#bulkActionForm').trigger('submit');
	                }
	            });
						}
					});
				}

			});
		</script> 
	@endpush
	 
@endif