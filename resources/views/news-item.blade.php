@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tbody>
				<tr>
					<td class="page-content">
						
						<div class="path">
							<div class="path">
								<a href="{{ url('/') }}" class="m">Главная страница</a>
								<a href="{{ url('/news') }}/">Новости</a>
								<span class="selected s">{{ $newsItem->title }}</span>
							</div>
						</div>
						
						<h1>Весенние каникулы с детьми в Крыму</h1>
						
						<div class="news-full">
							
							@if (!is_null($newsItem->card_image)) 
								<img class="news-main-image" src="{{ url('/public/uploads/') . '/' . $newsItem->card_image }}" />
							@endif
							
							@if (!is_null($newsItem->created_at))
								<span class="news-date">
									{{ $newsItem->created_at->format('d') }}/{{ $newsItem->created_at->format('m') }}/{{ $newsItem->created_at->format('Y') }}
								</span>
							@endif
							
							{!! $newsItem->content !!}
							
							<div class="clear">&nbsp;</div>
						
						</div>                

					</td>
				</tr>
			</tbody>
		</table>

	</div>

@stop