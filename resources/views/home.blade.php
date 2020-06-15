@extends('layout.base', ['id' => 'bodyId', 'page' => 'main'])

@section('content')

	<div class="page">
	            <div class="offers-anons clear-fix">
	            <div class="side left offers-car-without-driver">
	                <div class="left"><a class="offer-anons" href="/rent/?idnews=72"><span class="preview preview-main" style="display: block;"><span class="price-bar" style="display: block;">от 3900 р./сутки</span><img src="/resize/?idnews=244&amp;v=crimeacrv160849330&amp;ratio=1&amp;width=225&ratio=0" alt="1 Автопарк Crimea Rent-a-Car" class="image_big"/></span><span class="preview preview-additional" style="display: block;"><img src="/resize/?idnews=245&amp;v=crimeacrv160849330&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small left"/><img src="/resize/?idnews=246&amp;v=crimeacrv160849330&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small right"/></span></a><div class="offer-anons--title-bar a-alt"><a href="/rent/?idnews=72">Toyota RAV4</a></div></div><div class="right"><a class="offer-anons" href="/rent/?idnews=74"><span class="preview preview-main" style="display: block;"><span class="price-bar" style="display: block;">от 3000 р./сутки</span><img src="/resize/?idnews=257&amp;v=crimeacrv161287237&amp;ratio=1&amp;width=225&ratio=0" alt="1 Автопарк Crimea Rent-a-Car" class="image_big"/></span><span class="preview preview-additional" style="display: block;"><img src="/resize/?idnews=258&amp;v=crimeacrv161287237&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small left"/><img src="/resize/?idnews=259&amp;v=crimeacrv148194122&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small right"/></span></a><div class="offer-anons--title-bar a-alt"><a href="/rent/?idnews=74">Mitsubishi Outlander</a></div></div>            </div>
	            
	            <div class="side right">
	                <div class="left"><a class="offer-anons" href="/service/?idnews=464"><span class="preview preview-main" style="display: block;"><span class="price-bar" style="display: block;">от 1500 р./час</span><img src="/resize/?idnews=292&amp;v=crimeacrv161287094&amp;ratio=1&amp;width=225&ratio=0" alt="1 Автопарк Crimea Rent-a-Car" class="image_big"/></span><span class="preview preview-additional" style="display: block;"><img src="/resize/?idnews=294&amp;v=crimeacrv160849668&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small left"/><img src="/resize/?idnews=295&amp;v=crimeacrv160852876&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small right"/></span></a><div class="offer-anons--title-bar a-alt"><a href="/service/?idnews=464">Toyota Land Cruiser Prado</a></div></div><div class="right"><a class="offer-anons" href="/service/?idnews=68"><span class="preview preview-main" style="display: block;"><span class="price-bar" style="display: block;">от 1200 р./час</span><img src="/resize/?idnews=226&amp;v=crimeacrv148184156&amp;ratio=1&amp;width=225&ratio=0" alt="1 Автопарк Crimea Rent-a-Car" class="image_big"/></span><span class="preview preview-additional" style="display: block;"><img src="/resize/?idnews=228&amp;v=crimeacrv161040113&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small left"/><img src="/resize/?idnews=229&amp;v=crimeacrv161040113&amp;ratio=1&amp;width=112&ratio=0" alt="Автопарк Crimea Rent-a-Car" class="image_small right"/></span></a><div class="offer-anons--title-bar a-alt"><a href="/service/?idnews=68">Ford Galaxy</a></div></div>            </div>
	        </div>
					
					@if (count($news) > 0)
						@php
							$firstNewsItem = $news->first();
							$secondNewsItem = $news->get(2);
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