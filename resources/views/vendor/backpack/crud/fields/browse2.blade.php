<!-- browse server input -->

<div @include('crud::inc.field_wrapper_attributes') >

    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')

	<style>
		.browse-photos {

		}
		.browse-photos__item {
			width: 160px;
			height: 160px;
			display: inline-block;
			overflow: hidden;
			margin-right: 5px;
			margin-bottom: 5px;
			position: relative;

		}
		.browse-photos__item:last-child {
			margin-right: 0;
		}
		.browse-photos__item img{
			width: 100%;
			height: auto;
		}


		.browse-photos__close {
			position: absolute;
			right: 0px;
			font-size: 22px;
			line-height: 17px;
			cursor: pointer;
			background-color: #fff;
			padding: 2px;
		}
	</style>

	<script type="text/html" id="{{ $field['name'] }}-browse-photos-item-template">
		<div class="browse-photos__item">
			<i class="fa fa-times browse-photos__close js-close" title="Убрать"></i>
			<img src="" alt="">
		</div>
	</script>
	<div class="browse-photos" id="{{ $field['name'] }}-browse-photos-cointainer"></div>
	<input
		type="hidden"
		id="{{ $field['name'] }}-filemanager"
		name="{{ $field['name'] }}"
        value="{{ isset($field['value']) ? json_encode($field['value']) : '[]' }}"
	>

	<div class="btn-group" role="group" aria-label="..." style="margin-top: 3px;">
	  <button type="button" data-inputid="{{ $field['name'] }}-filemanager" class="btn btn-default popup_selector">
		<i class="fa fa-cloud-upload"></i> {{ trans('backpack::crud.browse_uploads') }}</button>
		<button type="button" data-inputid="{{ $field['name'] }}-filemanager" class="btn btn-default clear_elfinder_picker">
		<i class="fa fa-eraser"></i> {{ trans('backpack::crud.clear') }}</button>
	</div>

	@if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif

</div>

{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))

	{{-- FIELD CSS - will be loaded in the after_styles section --}}
	@push('crud_fields_styles')
		<!-- include browse server css -->
		<link href="{{ asset('public/vendor/backpack/colorbox/example2/colorbox.css') }}" rel="stylesheet" type="text/css" />
		<style>
			#cboxContent, #cboxLoadedContent, .cboxIframe {
				background: transparent;
			}
		</style>
	@endpush

	@push('crud_fields_scripts')
		<!-- include browse server js -->
		<script src="{{ asset('public/vendor/backpack/colorbox/jquery.colorbox-min.js') }}"></script>
		<script src="{{ asset('public/vendor/backpack/lodash/lodash.min.js') }}"></script>
		<script src="{{ asset('public/vendor/adminlte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
	@endpush

@endif

{{-- FIELD JS - will be loaded in the after_scripts section --}}
@push('crud_fields_scripts')
	<script>
        var $container = $("#{{ $field['name'] }}-browse-photos-cointainer"),
            $template = $("#{{ $field['name'] }}-browse-photos-item-template"),
			$input = $('#{{ $field['name'] }}-filemanager'),
            items = $input.val().length ? JSON.parse($input.val()) : []
        ;

        function updateFromDom() {
            items = [];
            $container.find('.browse-photos__item').each(function (index, item) {
                items.push($(item).data('data'))
            });
            $input.val(JSON.stringify(items));
		}
        $container.sortable({
            stop: function( event, ui ) {
                updateFromDom();
            },
		});
        function renderContainer() {
            $container.html('');
            var json = JSON.stringify(items);
            console.log(json);
            $input.val(json);
            _.forEach(items, function(imgObj, key) {
                $image = $($template.html());
                $image.attr('data-index', key);
                $image.data('data', imgObj);
                $image.find('img').attr('src', imgObj.path);
                $image.find('.js-close').click(function() {
                    $(this).closest('.browse-photos__item').remove();
                    updateFromDom();
				});
                $container.append($image);

            });

        }
        renderContainer();
        function processSelectedFile(filePath, requestingField) {
            items.push({
                path: filePath.startsWith('/') ? filePath : '/' + filePath
            });

            renderContainer();
        }
        $(document).on('click','.popup_selector[data-inputid={{ $field['name'] }}-filemanager]',function (event) {
            event.preventDefault();

            // trigger the reveal modal with elfinder inside
            var triggerUrl = "{{ url(config('elfinder.route.prefix').'/popup/'.$field['name']."-filemanager") }}";
            $.colorbox({
                href: triggerUrl,
                fastIframe: true,
                transition: 'none',
                iframe: true,
                width: '80%',
                height: '80%'
            });
        });

        // function to update the file selected by elfinder





        $(document).on('click','.clear_elfinder_picker[data-inputid={{ $field['name'] }}-filemanager]',function (event) {
            event.preventDefault();
            var updateID = $(this).attr('data-inputid'); // Btn id clicked
            items = [];
            renderContainer();
            $("#"+updateID).val("");
        });

	</script>
@endpush

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}