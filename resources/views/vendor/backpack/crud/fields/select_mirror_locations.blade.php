<!-- select -->

<div @include('crud::inc.field_wrapper_attributes') >

    <label>{!! $field['label'] !!}</label>
    @include('crud::inc.field_translatable_icon')
    
    <?php $entity_model = $crud->model; ?>
    <select
        name="{{ $field['name'] }}"
        @include('crud::inc.field_attributes')
        >

        @if ($entity_model::isColumnNullable($field['name']))
            <option value="">-</option>
        @endif

            @if (isset($field['model']))
                @php 
                  if (isset($entry) && !is_null($entry)) { 
                    $filtered_entity_entries = \App\Models\LocationName::where('branch_office_id', $entry->id)
                      ->whereNotNull('branch_office_id')
                      ->get();
                  } else { 
                    $filtered_entity_entries = collect([]);
                  }
                  
                  if ( ! empty($field['sort_direction'])) {
                      $filtered_entity_entries = $field['sort_direction'] == 'desc'
                          ? $filtered_entity_entries->sortByDesc($field['attribute'])
                          : $filtered_entity_entries->sortBy($field['attribute']);
                  }
                @endphp

                @foreach ($filtered_entity_entries as $connected_entity_entry)
                    <option value="{{ $connected_entity_entry->getKey() }}"

                        @if ( ( old($field['name']) && old($field['name']) == $connected_entity_entry->getKey() ) || (!old($field['name']) && isset($field['value']) && $connected_entity_entry->getKey()==$field['value']))

                             selected
                        @endif
                    >{{ $connected_entity_entry->{$field['attribute']} }}</option>
                @endforeach
            @endif
    </select>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif

</div>
