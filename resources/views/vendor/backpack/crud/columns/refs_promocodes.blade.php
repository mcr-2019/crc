{{-- regular object attribute --}}
@php
  $entities = json_decode($entry->{$column['entity']}, true)
@endphp
<td>
  @if (isset($entities) && count($entities) > 0)
    Комиссия:
    @if ($column['entity'] == 'refs')
      {{ $entry->partner_ref_fee ? : 0 }}%
    @endif
    @if ($column['entity'] == 'promocodes')
      {{ $entry->partner_promocode_fee ? : 0 }}%
    @endif
    <ul style="padding-left: 20px;">
      @foreach ($entities as $entity)
        @if (array_key_exists('title', $entity))
          <li>{{ $entity['title'] }}</li>
        @endif
      @endforeach
    </ul>
  @endif
</td>
