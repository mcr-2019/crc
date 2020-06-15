<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-12">
			<strong>Оценки</strong>
			<table>
				<tbody>
				@foreach($entry->answersSorted as $answer)
					<tr>
						<td align="right">{{ $answer->question->value }}: &nbsp;&nbsp;</td>
						<td>{{ $answer->value ?: '-' }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		@if( ! empty($entry->comment))
			<div class="col-md-12">
				<br>
				<strong>Комментарий</strong><br>
				{{ $entry->comment }}
			</div>
		@endif
	</div>
</div>
<div class="clearfix"></div>
