@extends('layout.base', ['page' => 'child', 'removeJquery' => true])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tbody>
				<tr> 
				 
					<td class="page-content">
						
						<div class="cars-list cars-with-driver-list">
							
							<div class="container" data-v-00b7a9cf="">
								
		           	<div class="path">
									<div class="path">
										<a href="{{ url('/') }}" class="m">Главная страница</a>
										<a href="{{ url('/service') }}/">Аренда авто с водителем в Крыму</a>
										<span class="selected s">{{ $car->name }}</span>
									</div>
								</div>
									
								<h1 data-v-00b7a9cf="">
									{{ $car->name }} с водителем
								</h1>
							
								<div data-v-00b7a9cf="">
							  
									<div data-v-00b7a9cf="" class="row">
										
										<div data-v-00b7a9cf="" class="col-sm-12 col-md-12 col-lg-6">
											
											<div data-v-00b7a9cf="" class="slider-wrapper">
									 
												<div data-v-1c1d8cd8="" data-v-00b7a9cf="">
													
													<div data-v-1c1d8cd8="" id="carouselControls" class="carousel slide" data-ride="carousel">
																
														<ol class="carousel-indicators">

															@foreach($car->images as $index => $image) 
																<li data-target="#carouselControls" data-slide-to="{{ $index }}"
																	@if ($index == 0)
																	class="active"
																	@endif
																></li> 
															@endforeach

														</ol>

														<div class="carousel-inner">
															
															@foreach($car->images as $index => $image)

																<div class="carousel-item 
																	@if ($index == 0)
																	active
																	@endif
																">
																	<img class="d-block w-100" src="{{ url('/').'/'.$image->path }}" alt="{{ $car->name }}" />
																</div>

															@endforeach 

														</div>
														<a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
															<span class="carousel-control-prev-icon" aria-hidden="true"></span>
															<span class="sr-only">Previous</span>
														</a>
														<a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
															<span class="carousel-control-next-icon" aria-hidden="true"></span>
															<span class="sr-only">Next</span>
														</a>
													</div>
													
												</div>
												
											</div>
										</div>
												
										<div data-v-00b7a9cf="" class="col-sm-12 col-md-12 col-lg-6">
											<div data-v-00b7a9cf="" class="information">
												
												<h3 data-v-00b7a9cf="">Стоимость</h3>
												
												<div data-v-00b7a9cf="" class="prices my-3">
													<div data-v-00b7a9cf="">
														<h6 data-v-00b7a9cf="">
															Аренда автомобиля с водителем: от {{ $car->min_cost }}₽ в час без ограничения по пробегу
														</h6>
													</div>
												</div>
												
												<div data-v-00b7a9cf="" class="py-2"><h3 data-v-00b7a9cf="">Трансфер</h3><div data-v-00b7a9cf="" class="prices my-3"><div data-v-00b7a9cf="" class="d-flex justify-content-between align-items-center"><h6 data-v-00b7a9cf="" class="m-0 text-uppercase">Населенный пункт</h6><h6 data-v-00b7a9cf="" class="m-0 text-uppercase">Стоимость</h6></div><hr data-v-00b7a9cf=""><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Международный Аэропорт Симферополь</p><p data-v-00b7a9cf="" class="r">Бесплатно</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">ЖД Вокзал Симферополь</p><p data-v-00b7a9cf="" class="r">Бесплатно</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Симферополь</p><p data-v-00b7a9cf="" class="r">1000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Саки</p><p data-v-00b7a9cf="" class="r">1500₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Бахчисарай</p><p data-v-00b7a9cf="" class="r">1500₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Севастополь</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Ялта</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Евпатория</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Алушта</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Судак</p><p data-v-00b7a9cf="" class="r">3000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Коктебель</p><p data-v-00b7a9cf="" class="r">3000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Феодосия</p><p data-v-00b7a9cf="" class="r">3000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Джанкой</p><p data-v-00b7a9cf="" class="r">5000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Черноморское</p><p data-v-00b7a9cf="" class="r">5000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Керчь</p><p data-v-00b7a9cf="" class="r">6000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Армянск</p><p data-v-00b7a9cf="" class="r">6000₽</p></div></div></div>
												
												<div data-v-00b7a9cf="" class="mt-2"><div data-v-00b7a9cf=""><p>Минимальное время привлечения транспортного средства к оказанию транспортных услуг составляет 3 (три) часа. В нашем автопарке несколько подобных автомобилей.</p><p>Если Вы планируете взять автомобиль Toyota Camry new в прокат без водителя, пожалуйста, пожалуйста, перейдите по <a href="{{ url('/') . '/rent/'}}">ссылке.</a></p></div></div>
												
												<div data-v-00b7a9cf="" class="py-2"><h3 data-v-00b7a9cf="" class="m-0">Водители</h3><div data-v-00b7a9cf=""><p>Наши водители профессионалы высокого класса, которым доверяют обслуживание первых лиц государства. Они сделают Вашу поездку комфортной, приятной и абсолютно безопасной. С ними вы можете ознакомится в разделе водители</p></div></div>
												
												<div data-v-00b7a9cf="" class="py-2">
													
													<h3 data-v-00b7a9cf="" class="m-0">Характеристики</h3>
													
													<div data-v-00b7a9cf="" class="py-1">
														
														<div data-v-00b7a9cf="" class="row features-list-icos">
															
															<div data-v-00b7a9cf="" class="features-list-block col-sm-12 col-md-6 col-lg-4">
																<span data-v-00b7a9cf="" class="pass">{{ $car->seat_count }} пассажира</span>
															</div>
															<div data-v-00b7a9cf="" class="features-list-block col-sm-12 col-md-6 col-lg-4">
																<span data-v-00b7a9cf="" class="dors">{{ $car->doors_count }} двери</span>
															</div>
															@if (!!$car->has_climate_control)
																<div data-v-00b7a9cf="" class="features-list-block col-sm-12 col-md-6 col-lg-4">
																	<span data-v-00b7a9cf="" class="temp">Климат-контроль</span>
																</div>
															@endif
															<div data-v-00b7a9cf="" class="features-list-block col-sm-12 col-md-6 col-lg-4">
																<span data-v-00b7a9cf="" class="benz">{{ $car->avg_fuel_consumption }}л/100км</span>
															</div>
															<div data-v-00b7a9cf="" class="features-list-block col-sm-12 col-md-6 col-lg-4">
																<span data-v-00b7a9cf="" class="gear">
																	@if ($car->transmission_name == 'AT')
																		АКПП
																	@else
																		МКПП
																	@endif
																</span>
															</div>
															
														</div>
													</div>
												
													<div data-v-00b7a9cf=""></div>
												</div>
											</div>
										</div>
												
								</div>
								
							</div>
						</div>

				 	</div>
				 
				 </td>
				 
				</tr>
			</tbody>
		</table>

	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@stop