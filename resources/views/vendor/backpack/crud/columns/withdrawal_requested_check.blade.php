<?php 
  if (!!strip_tags($entry->{$column['name']}) && !$entry->partner_is_paid) {
    $icon = "fa-check-square-o";
  } else {
    $icon = "fa-square-o";
  }
?>

<td>
    <i class="fa {{ $icon }}"></i>
</td>
