<!-- browse server input -->
<?php
if (isset($entry) && $entry instanceof \App\Models\API\Car) {
    $field['value'] = $entry->images->filter(function (\App\Models\API\Image $image) {
        return is_null($image->parent_id);
    })->sortBy('index')->map(function (\App\Models\API\Image $image) {
        return [
            'id' => $image->getKey(),
            'path' => $image->getUrl(),
            'index' => $image->index
        ];
    })->values()->toArray();
    /*d($field['value']);ddd(json_encode($field['value']));*/
}

?>
<div @include('crud::inc.field_wrapper_attributes') >

    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
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


    <!-- START -->
    <div id="dropzone" class="upload fs-upload-element fs-upload fs-light"></div>
    <!-- END -->


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
        <link href="{{ asset('public/vendor/backpack/formstone/upload.css') }}" rel="stylesheet" type="text/css"/>
        <style>
            .fs-upload.fs-light .fs-upload-target {
                background: #fff;
                border: 3px dashed #607D8B;
                border-radius: 2px;
                color: #455A64;
                font-size: 14px;
                margin: 0;
                padding: 25px;
                text-align: center;
                -webkit-transition: background .15s linear, border .15s linear, color .15s linear, opacity .15s linear;
                transition: background .15s linear, border .15s linear, color .15s linear, opacity .15s linear
            }

            .fs-light.fs-upload-dropping .fs-upload-target, .fs-light.fs-upload-focus .fs-upload-target, .no-touchevents .fs-light:hover .fs-upload-target {
                background: #CFD8DC;
                border-color: #546E7A;
                color: #263238
            }

            .fs-light.fs-upload-disabled {
                opacity: .5
            }

            .fs-light.fs-upload-disabled .fs-upload-target, .fs-light.fs-upload-disabled.fs-upload-dropping .fs-upload-target, .fs-light.fs-upload-disabled.fs-upload-focus .fs-upload-target, .no-touchevents .fs-light.fs-upload-disabled.fs-upload-dropping:hover .fs-upload-target, .no-touchevents .fs-light.fs-upload-disabled:hover .fs-upload-target {
                background: #fff;
                border-color: #607D8B;
                color: #455A64
            }

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

            .browse-photos__item img {
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
    @endpush

    @push('crud_fields_scripts')
        <!-- include browse server js -->
        <script src="{{ asset('public/vendor/backpack/formstone/core.js') }}"></script>
        <script src="{{ asset('public/vendor/backpack/formstone/upload.js') }}"></script>
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
            stop: function (event, ui) {
                updateFromDom();
            },
        });
        function renderContainer() {
            $container.html('');
            var json = JSON.stringify(items);
            $input.val(json);
            _.forEach(items, function (imgObj, key) {
                $image = $($template.html());
                $image.attr('data-index', key);
                $image.data('data', imgObj);
                $image.find('img').attr('src', imgObj.path);
                $image.find('.js-close').click(function () {
                    var $this = $(this);
                    $.ajax({
                        type: "POST",
                        url: "/{{config('backpack.base.route_prefix', 'admin')}}/car/delete/image/",
                        data: {id: imgObj.id},
                        success: function () {
                            $this.closest('.browse-photos__item').remove();
                            updateFromDom();
                        }
                    });
                });
                $container.append($image);

            });

        }
        renderContainer();
        $("#dropzone").upload({
            action: "/{{config('backpack.base.route_prefix', 'admin')}}/car/upload/",
            label: "Перетащите файлы сюда либо нажмите",
            dataType: 'json',
            postData: {
                "name": $('[name="name"]').val(),
                index: 0
            }
        }).on('filecomplete', function (a, b, c) {
            items.push({
                path: c.url,
                id: c.id
            });

            renderContainer();
        });


    </script>
@endpush

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}