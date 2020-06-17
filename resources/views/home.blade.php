@extends('layout.base', ['id' => 'bodyId', 'page' => 'main'])

@section('content')

	<div class="page">
    <div class="offers-anons clear-fix">
			@php
				$firstCarWithoutDriver = $carsWithoutDriver->first();
				$secondCarWithoutDriver = $carsWithoutDriver->get(1);
				$firstCarWithDriver = $carsWithDriver->first();
				$secondCarWithDriver = $carsWithDriver->get(1);
			@endphp
			@if (count($carsWithoutDriver) > 0)
	      <div class="side left offers-car-without-driver">
	        <div class="left">
						<a class="offer-anons" href="{{ url('/service').'/'.$firstCarWithoutDriver->id }}">
							<div class="preview preview-main">
								<div class="price-bar">от 2500 р./час</div>
								<img src="{{ $firstCarWithoutDriver->images->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_big" />
							</div>
							<div class="preview preview-additional">
								@if (!is_null($firstCarWithoutDriver->images()->skip(1)->first()))
									<img src="{{ $firstCarWithoutDriver->images()->skip(1)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
								@endif
								@if (!is_null($firstCarWithoutDriver->images()->skip(2)->first()))
									<img src="{{ $firstCarWithoutDriver->images()->skip(2)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
								@endif
							</div>
						</a>
						<div class="offer-anons--title-bar a-alt">
							<a href="{{ url('/service').'/'.$firstCarWithoutDriver->id }}">{{ $firstCarWithoutDriver->name }}</a>
						</div>
					</div>
					@if (!is_null($secondCarWithoutDriver))
						<div class="right">
							<a class="offer-anons" href="{{ url('/service').'/'.$secondCarWithoutDriver->id }}">
								<div class="preview preview-main">
									<div class="price-bar">от 2500 р./час</div>
									<img src="{{ $secondCarWithoutDriver->images->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_big" />
								</div>
								<div class="preview preview-additional">
									@if (!is_null($secondCarWithoutDriver->images()->skip(1)->first()))
										<img src="{{ $secondCarWithoutDriver->images()->skip(1)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
									@endif
									@if (!is_null($secondCarWithoutDriver->images()->skip(2)->first()))
										<img src="{{ $secondCarWithoutDriver->images()->skip(2)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
									@endif
								</div>
							</a>
							<div class="offer-anons--title-bar a-alt">
								<a href="{{ url('/service').'/'.$secondCarWithoutDriver->id }}">{{ $secondCarWithoutDriver->name }}</a>
							</div>
						</div>
					@endif
				</div>
			@endif
			
			@if (count($carsWithDriver) > 0)
			
		    <div class="side right">
	        <div class="left">
						<a class="offer-anons" href="{{ url('/service').'/'.$firstCarWithDriver->id }}">
							<div class="preview preview-main">
								<div class="price-bar">от 2500 р./час</div>
								<img src="{{ $firstCarWithDriver->images->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_big" />
							</div>
							<div class="preview preview-additional">
								@if (!is_null($firstCarWithDriver->images()->skip(1)->first()))
									<img src="{{ $firstCarWithDriver->images()->skip(1)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
								@endif
								@if (!is_null($firstCarWithDriver->images()->skip(2)->first()))
									<img src="{{ $firstCarWithDriver->images()->skip(2)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
								@endif
							</div>
						</a>
						<div class="offer-anons--title-bar a-alt">
							<a href="{{ url('/service').'/'.$firstCarWithDriver->id }}">{{ $firstCarWithDriver->name }}</a>
						</div>
					</div>
					@if (!is_null($secondCarWithDriver))
						<div class="right">
							<a class="offer-anons" href="{{ url('/service').'/'.$secondCarWithDriver->id }}">
								<div class="preview preview-main">
									<div class="price-bar">от 2500 р./час</div>
									<img src="{{ $secondCarWithDriver->images->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_big" />
								</div>
								<div class="preview preview-additional">
									@if (!is_null($secondCarWithDriver->images()->skip(1)->first()))
										<img src="{{ $secondCarWithDriver->images()->skip(1)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
									@endif
									@if (!is_null($secondCarWithDriver->images()->skip(2)->first()))
										<img src="{{ $secondCarWithDriver->images()->skip(2)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
									@endif
								</div>
							</a>
							<div class="offer-anons--title-bar a-alt">
								<a href="{{ url('/service').'/'.$secondCarWithoutDriver->id }}">{{ $secondCarWithoutDriver->name }}</a>
							</div>
						</div>
					@endif
				</div>
				
			@endif
		</div>

		@if (count($news) > 0)
			@php
				$firstNewsItem = $news->first();
				$secondNewsItem = $news->get(1);
			@endphp
		  <div class="news-anons-wrap"> 
				<div class="news-anons left">
					@if (!is_null($firstNewsItem->created_at))
						<span class="news-date">
							{{ $firstNewsItem->created_at->format('d') }}/{{ $firstNewsItem->created_at->format('m') }}/{{ $firstNewsItem->created_at->format('Y') }}
						</span>
					@endif
					<a class="news-title" href="{{ route('news.item', [ $firstNewsItem->id]) }}/">
						{{ $firstNewsItem->title }}
					</a>
					<div>
						{{ $firstNewsItem->teaser }}
					</div>
				</div>
				@if (!is_null($secondNewsItem))
					<div class="news-anons right">
						@if (!is_null($secondNewsItem->created_at))
							<span class="news-date">
								{{ $secondNewsItem->created_at->format('d') }}/{{ $secondNewsItem->created_at->format('m') }}/{{ $secondNewsItem->created_at->format('Y') }}
							</span>
						@endif
						<a class="news-title" href="{{ route('news.item', [ $secondNewsItem->id]) }}/">
							{{ $secondNewsItem->title }}
						</a>
						<div>
							{{ $secondNewsItem->teaser }}
						</div>
					</div>
				@endif
				<div class="clear">&nbsp;</div>
				<a class="all-news" href="{{ url('/news') }}/">Все новости</a>
			</div>
		@endif
						
		<h1 style="margin: 0px 0px 13px; padding: 0px; border: 0px; font-family: open_sanssemibold, Arial; font-size: 23px; font-weight: inherit; font-stretch: inherit; line-height: 36px; vertical-align: baseline; color: rgb(0, 0, 0); text-align: center;">Нужна аренда авто в Крыму? Добро пожаловать в &laquo;Crimea Rent-a-Car&raquo;!</h1>
		<p style="margin: 0px 0px 28px; padding: 0px; border: 0px; font-family: open_sansregular, Arial; font-size: 14px; font-stretch: inherit; line-height: 22px; vertical-align: baseline; color: rgb(0, 0, 0);">Вы приехали в Крым отдохнуть? Или же посетили наш прекрасный полуостров по работе? Не хотите все время пребывания провести в длительных поездках в неудобном и медленном общественном транспорте? Тогда&nbsp;<strong><span style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">аренда авто в Крыму</span></strong>&nbsp;&laquo;Crimea Rent-a-Car&raquo; - это именно то, что вам нужно.</p>
		<p style="margin: 0px 0px 28px; padding: 0px; border: 0px; font-family: open_sansregular, Arial; font-size: 14px; font-stretch: inherit; line-height: 22px; vertical-align: baseline; color: rgb(0, 0, 0);">Высококлассный сервис, комплексное обслуживание, современные стильные автомобили на любой вкус и просто удобный прокат авто в Крыму &ndash; все это вы в любой момент можете получить, если обратитесь к нам. И мы действительно предоставляем сервис европейского уровня.</p>
		<p style="margin: 0px 0px 28px; padding: 0px; border: 0px; font-family: open_sansregular, Arial; font-size: 14px; font-stretch: inherit; line-height: 22px; vertical-align: baseline; color: rgb(0, 0, 0);">Все это не пустые слова! За время своей деятельности наша компания была задействована в проведении свыше сотни различных мероприятий. Нашими услугами пользовались певцы, актеры, политики, массовые деятели, транспортные компании и, конечно же, тысячи простых гостей и жителей Крыма.</p>
		<h6 style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-family: open_sanssemibold, Arial; font-size: inherit; font-weight: inherit; font-stretch: inherit; line-height: 22px; vertical-align: baseline; color: rgb(0, 0, 0);">Своей работой мы доказываем, что&nbsp;аренда авто в Крыму&nbsp;может быть удобной, недорогой и на 1оо% качественной.</h6>
		<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-family: open_sansregular, Arial; font-size: 14px; font-stretch: inherit; line-height: 22px; vertical-align: baseline; color: rgb(0, 0, 0);">Преимущества работы с нами:</p>
		<ul style="margin: 0px 0px 19px 34px; padding-right: 0px; padding-left: 0px; border: 0px; font-family: open_sansregular, Arial; font-size: 14px; font-stretch: inherit; line-height: 22px; vertical-align: baseline; list-style: none; color: rgb(0, 0, 0);">
			<li style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; list-style-type: disc;"><span style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">Удобство аренды</span>. Не придется долго ждать, пока машину подготовят. С вашей стороны требуется только предоставить водительское удостоверение. Далее выбранная машина в вашем распоряжении.</li>
			<li style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; list-style-type: disc;"><span style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">Индивидуальный подход</span>. Мы можем помочь выбрать наиболее подходящую для вас машину из нашего автопарка: ручная или автоматическая коробка передач, мощность, габариты, объем двигателя, марка и т.д.</li>
			<li style="margin: 0px 0px 2px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; list-style-type: disc;"><span style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">Разумные цены</span>. Мы никогда не ставим сверхвысоких цен, делая аренду доступной для всех, кому она необходима.</li>
		</ul>
		<p style="margin: 0px 0px 28px; padding: 0px; border: 0px; font-family: open_sansregular, Arial; font-size: 14px; font-stretch: inherit; line-height: 22px; vertical-align: baseline; color: rgb(0, 0, 0);">Мы считаем, что&nbsp;<em><span style="font-family: open_sanssemibold, Arial;">прокат авто в Крыму</span></em>&nbsp;всегда должен оставаться доступным и быть максимально удобным для наших клиентов. И специалисты компании &laquo;Crimea Rent-a-Car&raquo; сделали для этого все необходимое.</p>
		<p style="margin: 0px 0px 28px; padding: 0px; border: 0px; font-family: open_sansregular, Arial; font-size: 14px; font-stretch: inherit; line-height: 22px; vertical-align: baseline; color: rgb(0, 0, 0);">Комфорт, удобство, надежность &ndash; все эти характеристики идеально описывают автомобили, которые мы предлагаем. Хотите сделать свое пребывание в Крыму идеальным, потратив при этом действительно немного денег, но воспользовавшись услугами европейского класса? Тогда <em>аренда авто в Крыму</em> &laquo;Crimea Rent-a-Car&raquo; приветствует вас! Здесь вы найдете идеальную машину для себя. Не жертвуйте своим комфортом! Выбирайте только лучший прокат авто в Крыму!</p>

	</div>
 
@stop