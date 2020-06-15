<?php
use Illuminate\Database\Eloquent\Model;

$connected_entity = new $field['model'];
$connected_entity_key_name = $connected_entity->getKeyName();
$tags = [];
$tagsComma = '';
if (isset($entry) && ($entry instanceof Model)) {
    $tags = $entry->{$field['entity']};

    $tags = $tags->map(function ($tag) use ($field) {
        return $tag->{$field['attribute']};
    })->toArray();
    $tagsComma = implode(';', $tags);
}

$tags = json_encode($tags);

?>

<!-- select2 from ajax multiple -->
<div @include('crud::inc.field_wrapper_attributes') >
    <label>{!! $field['label'] !!}</label>
    <input type="hidden" name="{{ $field['name'] }}" id="select2_tags_{{ $field['name'] }}"
           value="{{ $tagsComma }}"
            @include('crud::inc.field_attributes', ['default_class' =>  'form-control'])
    >

    {{-- HINT --}}
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
    <!-- include select2 css-->
    <link href="{{ asset('public/vendor/backpack/select2/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/vendor/backpack/select2/select2-bootstrap-dick.css') }}" rel="stylesheet" type="text/css"/>
    @endpush

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
    <!-- include select2 js-->
    <script src="{{ asset('public/vendor/backpack/select2/select2.js') }}"></script>
    <script src="{{ asset('public/vendor/backpack/select2/select2_locale_ru.js') }}"></script>
    @endpush

@endif

<!-- include field specific select2 js-->
@push('crud_fields_scripts')
<script>
    jQuery(document).ready(function ($) {
        // trigger select2 for each untriggered select2 box
        $("#select2_tags_{{ $field['name'] }}").each(function (i, obj) {
            if (!$(obj).data("select2")) {
                $(obj).select2({
                    tags: {!! $tags !!},
                    tokenSeparators: [";"],
                    separator: ';',
                    formatNoMatches: function() {
                        return '';
                    },
                    dropdownCssClass: 'select2-hidden'
                });

                $(obj).closest('form').on('keypress keydown keyup', function (e) {
                    if (e.which == 13) {
                        //alert(e.which);
                        e.preventDefault();
                        return false;
                    }
                });
            }
        });
    });
</script>
@endpush
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}