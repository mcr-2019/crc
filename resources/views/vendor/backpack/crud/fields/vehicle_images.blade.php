<div @include('crud::inc.field_wrapper_attributes') >
    <div class="browse-photos" id="{{ $field['name'] }}-browse-photos-cointainer">
        @foreach($entry->data['images'] as $image_data)
            <div class="browse-photos__item">
                <img src="{{ $image_data['image'] }}" alt="">
            </div>
        @endforeach
    </div>
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
