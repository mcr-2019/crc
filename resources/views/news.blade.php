@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tbody>
				<tr>
					<td class="page-content">
						
						<div class="path">
							<div class="path">
								<a href="{{ url('/') }}" class="m">Главная страница</a>Новости
							</div>
						</div>

 						<h1>Новости</h1>
						
						<div class="news">
						
						@if (count($news) > 0)
						
							@foreach($news as $newsItem)
							
								<div class="news-item">
									@if (!is_null($newsItem->card_image)) 
										<a href="{{ route('news.item', [$newsItem->id]) }}/">
											<img src="{{ url('/public/uploads/') . '/' . $newsItem->card_image }}" />
										</a>
									@endif
										
									@if (!is_null($newsItem->created_at)) 
										<span class="news-date"> 
											{{ $newsItem->created_at->format('d') }}/{{ $newsItem->created_at->format('m') }}/{{ $newsItem->created_at->format('Y') }}
										</span>
									@endif
									
									<a class="news-title" href="{{ route('news.item', [$newsItem->id]) }}/">
										{{ $newsItem->title }}
									</a>
									
									<div>
										{{ $newsItem->teaser }}
									</div>
									<div class="clear">&nbsp;</div>
								</div>
							
							@endforeach
							
						@endif

					</td>
				</tr>
			</tbody>
		</table>

	</div>

@stop