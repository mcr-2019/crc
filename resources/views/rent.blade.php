@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tbody>
				<tr> 
				 
					<td class="page-content">
           	<div class="path">
							<div class="path">
								<a href="{{ url('/') }}" class="m">Главная страница</a>Аренда авто с водителем в Крыму
							</div>
						</div>
						
						<div class="cars-list cars-with-driver-list">
																											 
							<h1>Аренда авто с водителем в Крыму</h1>

							@if (count($cars) > 0)

								@foreach($cars as $index => $car)
									<div class="car-item
										@if (($index + 1)%2 == 0)
											second-car-item
										@endif
									">
										<table>
											<tbody>
												<tr>
													<td class="c1">
														<div class="car-images">
															<a class="offer-anons" href="{{ url('/rent').'/'.$car->id }}">
																<div class="preview preview-main">
																	<div class="price-bar">от 2500 р./час</div>
																	<img src="{{ $car->images->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_big" />
																</div>
																<div class="preview preview-additional">
																	@if (!is_null($car->images()->skip(1)->first()))
																		<img src="{{ $car->images()->skip(1)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
																	@endif
																	@if (!is_null($car->images()->skip(2)->first()))
																		<img src="{{ $car->images()->skip(2)->first()->path }}" alt="Автопарк Crimea Rent-a-Car" class="image_small left" />
																	@endif
																</div>
															</a>
														</div>
													</td>
													<td class="c2">
														<div class="car-description">
															<a href="{{ url('/rent').'/'.$car->id }}">
																{{ $car->name }}
															</a>
															<div><span>Класс:</span>{{ $car->class->title }}</div>
															<div><span>Количество мест:</span>{{ $car->seat_count }}</div>
															<div><span>Тип топлива:</span>{{ $car->fuel_type->title }}</div>
															<div><span>Средний расход:</span>{{ $car->avg_fuel_consumption }}&nbsp;л.</div>
															<div><span>Объём двигателя:</span>{{ $car->engine_volume }}&nbsp;см<sup>3</sup></div>
															<div><span>Год выпуска:</span>{{ $car->year }}</div>
															<div><span>Привод:</span>{{ $car->drive_type->title }}</div>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								@endforeach
								 
							@endif
							
							<div class="clear">&nbsp;</div>
							
							<p style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium;">Любите управлять автомобилем самостоятельно и не хотите от кого-то зависеть? Тогда <em>прокат&nbsp;авто в Крыму</em> без водителя от автопроката «Crimea Rent-a-Car» подойдет вам как нельзя кстати. Машина с водителем – это хорошо. Но чтобы пользоваться арендованным автомобилем на сто процентов свободно, многие предпочитают не тратить лишних денег и водят сами.</p>
							<p style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium;">И это вполне разумное решение. Все, что от вас требуется – обратиться к нам в удобное время. Мы предоставляем возможность арендовать авто любой марки на любое время, пока вы пребываете в Крыму или если собрались в путешествие на автомобиле.&nbsp;<strong>Прокат авто в Крыму&nbsp;</strong>без водителя&nbsp;от «Crimea Rent-a-Car» - это удобно, недорого и всегда разумно. Если вы приехали в Крым отдыхать или по работе, то есть ли смысл ехать на собственном автомобиле, когда можно просто взять машину в прокате и пользоваться ею в свое удовольствие? Это гораздо удобнее и экономичнее.</p>
							<p style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium;">Наша компания обладает огромным опытом автопроката. К нам обращались тысячи раз. Путешественники, бизнесмены, звезды эстрады, кино, политики и многие другие. И каждому мы готовы гарантировать высококлассный сервис по доступной цене.</p>
							<h5 style="font-family: 'Times New Roman';font-size: medium;">Прокат авто в Крыму без водителя – это возможность пользоваться автомобилем в любое время, в любом месте.</h5>
							<p style="font-family: 'Times New Roman';font-size: medium;">Фактически вы ни к чему не привязаны. И это самое главное. Это свобода!</p>
							<p style="color: rgb(0, 0, 0); font-family: 'Times New Roman'; font-size: medium;">Если вы приехали в Крым, не хотите переплачивать за услуги такси или же пользоваться некомфортабельным общественным транспортом, тогда прокат авто в Крыму&nbsp;без водителя станет для вас оптимальным вариантом. Ждем вас и всегда готовы предложить что-то особенное.</p>
							
						 <p>&nbsp;</p>
						 <div>&nbsp;</div>
						 
					 </div>
				 
				 </td>
				 
				</tr>
			</tbody>
		</table>

	</div>

@stop