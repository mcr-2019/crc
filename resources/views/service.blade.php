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
															<a class="offer-anons" href="{{ url('/service').'/'.$car->id }}">
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
															<a href="{{ url('/service').'/'.$car->id }}">
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
							
							<p>Автомобиль с водителем – это максимум комфорта для современного человека, умеющего ценить удобство и свободу движения. Компания «Crimea Rent-a-Car» предлагает вам автопрокат в Крыму с личным водителем по доступной цене. Это не только удобно, но еще и станет признаком вашего статуса.&nbsp;</p>
							<p>Просто арендуйте у нас машину, и мы предоставим вам опытного водителя без вредных привычек, готового в любое время довезти вас до нужного места или забрать после встречи, совещания или отдыха. В любое время! Каждый из наших водителей – это надежный и ответственный человек. Мы умеем держать марку. Именно поэтому услугами проката «Crimea Rent-a-Car» неоднократно пользовались не только простые гости и жители полуострова, но даже известные политики и деятели культуры. И сервис всегда на высшем уровне.&nbsp;</p>
							<p>Если вы волнуетесь, что <strong>аренда авто с водителем в Крыму</strong> обойдется дорого, то спешим вас успокоить. Цены всегда остаются доступными. К тому же, для постоянных клиентов мы готовы предложить приятные скидки.&nbsp;</p>
							<p>В прокате «Crimea Rent-a-Car» вашему вниманию представлен большой автопарк, среди которого вы с легкостью выберете автомобиль для себя. Вместе с «Crimea Rent-a-Car» вы получаете максимум комфорта и приятных эмоций. Забудьте о неудобном общественном транспорте и непозволительно дорогих такси. Теперь можно потратить минимум, но получить при этом еще больше свободы.</p>
							
							<h5 style="font-family: 'Times New Roman';font-size: medium;">
								<a href="{{ url ('/service') }}"><em>Аренда авто с водителем в Крыму</em></a> – это именно то, что вам нужно! Цените собственный комфорт. А все остальное предоставьте нам.&nbsp;
							</h5>
							
						 <p>&nbsp;</p>
						 <div>&nbsp;</div>
						 
					 </div>
				 
				 </td>
				 
				</tr>
			</tbody>
		</table>

	</div>

@stop