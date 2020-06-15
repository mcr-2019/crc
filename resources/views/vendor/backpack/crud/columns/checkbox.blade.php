<td class="text-center">
    <input type="checkbox" data-multiupdate="true" name="{{ $column['name'] }}[{{ $entry->getKey() }}]" value="1" @if($entry->{$column['name']}) checked="checked" @endif class="icheck">
</td>
