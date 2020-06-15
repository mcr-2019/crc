@if (isset($entry))
  <div @include('crud::inc.field_wrapper_attributes') >

      <label>{!! $field['label'] !!}</label>
      @include('crud::inc.field_translatable_icon')

      <div class="array-container form-group">

          <table class="table table-bordered table-striped m-b-0">

              <thead>
                  <tr>
                      <th>Показывается</th>
                      <th>Название</th>
                      <th></th>
                  </tr>
              </thead>

              <tbody class="table-striped">
                  @foreach($entry->{$field['name']} as $location)
                      <tr class="array-row">
                          @include('backpack::crud.columns.check', ['entry' => $location, 'column' => ['name' => 'is_moderated']])
                          <td>{{ $location->name }}</td>
                          <td>
                              @include('backpack::crud.buttons.update', ['crud' => $field['crud'], 'entry' => $location])
                          </td>
                      </tr>
                  @endforeach

              </tbody>

          </table>

      </div>

      {{-- HINT --}}
      @if (isset($field['hint']))
          <p class="help-block">{!! $field['hint'] !!}</p>
      @endif
  </div>
@endif
