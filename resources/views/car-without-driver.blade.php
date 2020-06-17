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
										<a href="{{ url('/rent') }}/">Аренда авто без водителя в Крыму</a>
										<span class="selected s">{{ $car->name }}</span>
									</div>
								</div>
									 
								<div class="row" data-v-00b7a9cf=""><div mc="6" class="col-sm-12 col-lg-3" data-v-00b7a9cf=""><div data-v-00b7a9cf="" class="slider-wrapper">
									
									<div data-v-7861b05c="" data-v-00b7a9cf="">
										
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
								
								
								</div></div><div mc="6" class="col-sm-12 col-lg-9" data-v-00b7a9cf=""><h1 data-v-00b7a9cf="">KIA Rio X-Line Comfort White</h1><div class="row" data-v-00b7a9cf=""><div mc="12" class="col-sm-12 col-lg-7 order-sm-2 order-md-1 order-lg-1 order-xl-1 order-2" data-v-00b7a9cf=""><div data-v-00b7a9cf="" class="py-3 d-block d-sm-none d-md-none d-lg-none">
									
									<div data-v-00b7a9cf="" class="features-list-icos features-small"><div data-v-00b7a9cf="" class="features-list-block"><span data-v-00b7a9cf="" class="bag">3 сумки, 2 чемодана</span></div><div data-v-00b7a9cf="" class="features-list-block"><span data-v-00b7a9cf="" class="pass">4 пассажира</span></div><div data-v-00b7a9cf="" class="features-list-block"><span data-v-00b7a9cf="" class="dors">5 дверей</span></div><div data-v-00b7a9cf="" class="features-list-block"><span data-v-00b7a9cf="" class="temp">Кондиционер</span></div><div data-v-00b7a9cf="" class="features-list-block"><span data-v-00b7a9cf="" class="benz">8л/100км</span></div><div data-v-00b7a9cf="" class="features-list-block"><span data-v-00b7a9cf="" class="gear">АКПП</span></div></div></div><div data-v-00b7a9cf="" class="py-3 d-none d-sm-block d-md-block d-lg-block">
										
										
										<div data-v-00b7a9cf="" class="row features-list-icos">
											
											<div data-v-00b7a9cf="" class="features-list-block col-sm-6 col-md-4 col-lg-4">
												<span data-v-00b7a9cf="" class="pass">{{ $car->seat_count }} пассажира</span>
											</div>
											<div data-v-00b7a9cf="" class="features-list-block col-sm-6 col-md-4 col-lg-4">
												<span data-v-00b7a9cf="" class="dors">{{ $car->doors_count }} двери</span>
											</div>
											@if (!!$car->has_climate_control)
												<div data-v-00b7a9cf="" class="features-list-block col-sm-6 col-md-4 col-lg-4">
													<span data-v-00b7a9cf="" class="temp">Климат-контроль</span>
												</div>
											@endif
											<div data-v-00b7a9cf="" class="features-list-block col-sm-6 col-md-4 col-lg-4">
												<span data-v-00b7a9cf="" class="benz">{{ $car->avg_fuel_consumption }}л/100км</span>
											</div>
											<div data-v-00b7a9cf="" class="features-list-block col-sm-6 col-md-4 col-lg-4">
												<span data-v-00b7a9cf="" class="gear">
													@if ($car->transmission_name == 'AT')
														АКПП
													@else
														МКПП
													@endif
												</span>
											</div>
										
										</div>
									
									</div></div><div mc="12" class="col-sm-12 col-lg-5 order-sm-1 order-md-2 order-lg-2 order-xl-2 order-1" data-v-00b7a9cf=""><div data-v-00b7a9cf="" class="b-wrapper slim"><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">1 сутки</p><p data-v-00b7a9cf="" class="r">2415₽/сутки</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">от 3 до 6 суток</p><p data-v-00b7a9cf="" class="r">2053₽/сутки</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">от 7 суток</p><p data-v-00b7a9cf="" class="r">1811₽/сутки</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Залог</p><p data-v-00b7a9cf="" class="r">5000₽</p></div></div></div></div>
												 
								
							</div>
							</div>
							 
							<div class="b-wrapper blockquote-info" data-v-00b7a9cf="">
								<div class="rate" data-v-00b7a9cf="">
									
									<div data-v-00b7a9cf="" class="rate-item" data-toggle="modal" data-target="#rentConditions">
										<span data-v-00b7a9cf="" class="about" role="button" tabindex="0">Условия аренды</span>
									</div>
									<div data-v-00b7a9cf="" class="rate-item" data-toggle="modal" data-target="#fuelConditions">
										<span data-v-00b7a9cf="" class="gas" role="button" tabindex="0">Полный/Полный</span>
									</div>
									<div data-v-00b7a9cf="" class="rate-item" data-toggle="modal" data-target="#airportConditions">
										<span data-v-00b7a9cf="" class="aitport" role="button" tabindex="0">Встреча в аэропорту</span>
									</div>
									
								</div>
							</div>
							  
							<div data-v-00b7a9cf="" class="row"><div data-v-00b7a9cf="" class="col-sm-12 col-md-6 col-lg-6"><div data-v-00b7a9cf="" class="b-wrapper transpar"><h3 data-v-00b7a9cf="">Об автомобиле</h3><div data-v-00b7a9cf="" class="mb-2"><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Пробег</p><p data-v-00b7a9cf="" class="r">5815км</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Безопасность</p><p data-v-00b7a9cf="" class="r"><span data-v-00b7a9cf="" class="stars" role="button" tabindex="0"><span data-v-00b7a9cf="" class="star-f"></span><span data-v-00b7a9cf="" class="star-f"></span><span data-v-00b7a9cf="" class="star-f"></span><span data-v-00b7a9cf="" class="star-o"></span><span data-v-00b7a9cf="" class="star-o"></span></span></p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Комфорт</p><p data-v-00b7a9cf="" class="r"><span data-v-00b7a9cf="" class="stars" role="button" tabindex="0"><span data-v-00b7a9cf="" class="star-f"></span><span data-v-00b7a9cf="" class="star-f"></span><span data-v-00b7a9cf="" class="star-f"></span><span data-v-00b7a9cf="" class="star-f"></span><span data-v-00b7a9cf="" class="star-o"></span></span></p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Вместительность</p><p data-v-00b7a9cf="" class="r">4 Человека</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Двигатель</p><p data-v-00b7a9cf="" class="r">1.6л</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Мощность двигателя</p><p data-v-00b7a9cf="" class="r">123лс</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Привод</p><p data-v-00b7a9cf="" class="r">Передний</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Объем бака</p><p data-v-00b7a9cf="" class="r">50л</p></div><!----><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Тонировка</p><p data-v-00b7a9cf="" class="r">Да</p></div></div><div data-v-00b7a9cf=""><div data-v-00b7a9cf="" class="py-2"><h3 data-v-00b7a9cf="">Условия аренды</h3><div data-v-00b7a9cf=""><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Возраст</p><p data-v-00b7a9cf="" class="r">от 22 годa</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Стаж</p><p data-v-00b7a9cf="" class="r">не менее 3 годa</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Залог</p><p data-v-00b7a9cf="" class="r">5000 рублей</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Пробег</p><p data-v-00b7a9cf="" class="r">без ограничений</p></div></div><div data-v-00b7a9cf=""></div></div><div data-v-00b7a9cf="" class="py-2"><h3 data-v-00b7a9cf="">Необходимые документы</h3><div data-v-00b7a9cf=""><p><strong>Для граждан РФ: </strong>Паспорт РФ, действующая прописка, Водительское удостоверение</p><p><strong>Для иностранных граждан: </strong>Заграничный паспорт, Водительское удостоверение международного образца</p></div></div></div></div><!----></div><div data-v-00b7a9cf="" class="col-sm-12 col-md-6 col-lg-6">
								
								
						 <div data-v-00b7a9cf="" class="py-2"><h3 data-v-00b7a9cf="">Подача&nbsp;/&nbsp;Прием автомобилей</h3><div data-v-00b7a9cf="" class="points"><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Международный Аэропорт Симферополь</p><p data-v-00b7a9cf="" class="r">Бесплатно</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">ЖД Вокзал Симферополь</p><p data-v-00b7a9cf="" class="r">Бесплатно</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Симферополь</p><p data-v-00b7a9cf="" class="r">1000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Саки</p><p data-v-00b7a9cf="" class="r">1500₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Бахчисарай</p><p data-v-00b7a9cf="" class="r">1500₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Севастополь</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Ялта</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Евпатория</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Алушта</p><p data-v-00b7a9cf="" class="r">2000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Судак</p><p data-v-00b7a9cf="" class="r">3000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Коктебель</p><p data-v-00b7a9cf="" class="r">3000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Феодосия</p><p data-v-00b7a9cf="" class="r">3000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Джанкой</p><p data-v-00b7a9cf="" class="r">5000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Черноморское</p><p data-v-00b7a9cf="" class="r">5000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Керчь</p><p data-v-00b7a9cf="" class="r">6000₽</p></div><div data-v-00b7a9cf="" class="item-info"><p data-v-00b7a9cf="" class="l">Армянск</p><p data-v-00b7a9cf="" class="r">6000₽</p></div></div></div></div></div>
							 
							
							<div data-v-00b7a9cf="" class="b-wrapper gr"><p data-v-00b7a9cf="" class="header">Дополнительно вы можете заказать:</p><div data-v-00b7a9cf="" class="rate gr"><div data-v-00b7a9cf="" class="rate-item" role="button" tabindex="0"><span data-v-00b7a9cf="" class="okyes">Мойка автомобиля</span></div><div data-v-00b7a9cf="" class="rate-item" role="button" tabindex="0"><span data-v-00b7a9cf="" class="okyes">Дополнительный водитель</span></div><div data-v-00b7a9cf="" class="rate-item" role="button" tabindex="0"><span data-v-00b7a9cf="" class="okyes">Дозаправка (полный бак)</span></div><div data-v-00b7a9cf="" class="rate-item" role="button" tabindex="0"><span data-v-00b7a9cf="" class="okyes">Аренда в одну сторону</span></div><div data-v-00b7a9cf="" class="rate-item" role="button" tabindex="0"><span data-v-00b7a9cf="" class="okyes">Возврат автомобиля в нерабочее время</span></div><div data-v-00b7a9cf="" class="rate-item" role="button" tabindex="0"><span data-v-00b7a9cf="" class="okyes">Доставка автомобиля</span></div></div><!----><!----><!----><!----><!----><!----></div>
							
							
						</div>

				 	</div>
				 
				 </td>
				 
				</tr>
			</tbody>
		</table>

	</div>
	
	<div id="rentConditions" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rentConditionsModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				
				<div class="modal-body">
					
					<div data-v-0752a37c="" class="py-4">
						<div data-v-0752a37c="" role="tablist">
							
							<div id="accordion">
							  <div class="card">
							    <div class="card-header" id="headingOne">
							      <h5 class="mb-0">
							        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							          ВОЗРАСТ ВОДИТЕЛЯ И ТРЕБОВАНИЯ К ВОДИТЕЛЬСКОМУ УДОСТОВЕРЕНИЮ
							        </button>
							      </h5>
							    </div> 
							    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							      <div class="card-body">
							        <p data-v-0752a37c="">Минимальный возраст: от 22 годa.</p><p data-v-0752a37c="">Максимальный возраст водителя: 75 лет.</p><p data-v-0752a37c="">Минимальный стаж вождения: не менее 3 годa.</p><p data-v-0752a37c="">При получении автомобиля, основной водитель, а также дополнительные водители, должны предъявить водительское удостоверение на свое имя.</p><p data-v-0752a37c="">Также необходимо предъявить паспорт, в некоторых случаях необходимо предъявить авиабилеты.</p>
							      </div>
							    </div>
							  </div>
							  <div class="card">
							    <div class="card-header" id="headingTwo">
							      <h5 class="mb-0">
							        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							          ТОПЛИВНАЯ ПОЛИТИКА
							        </button>
							      </h5>
							    </div>
							    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							      <div class="card-body">
							        <p data-v-0752a37c="">Автомобиль необходимо вернуть с тем же количеством топлива, что и при получении, во избежание дополнительной платы за нехватку топлива.</p>
							      </div>
							    </div>
							  </div>
								<div class="card">
									<div class="card-header" id="headingThree">
									 <h5 class="mb-0">
										 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											ПРЕДАВТОРИЗАЦИЯ КРЕДИТНОЙ КАРТЫ ГЛАВНОГО ВОДИТЕЛЯ
										 </button>
									 </h5>
									</div>
									<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									 <div class="card-body">
										<p data-v-0752a37c="">При получении автомобиля вы оставляете депозит для покрытия стоимости страховки с франшизой. Обычно депозит (минимум: франшиза+топливо+НДС) блокируется на международной кредитной карте на имя главного водителя.</p><p data-v-0752a37c=""><b data-v-0752a37c="">Мы принимаем все виды кредитных карт (American Express, Master Card, Visa) и дебетовые карты.</b></p><p data-v-0752a37c=""><b data-v-0752a37c="">Сумма разблокируется полностью в течении 30 календарных дней при условии, что автомобиль возвращен в том же состоянии, в котором был получен.</b></p>
									 </div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="heading_4">
									 <h5 class="mb-0">
										 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
											ОТМЕНА БРОНИРОВАНИЯ
										 </button>
									 </h5>
									</div>
									<div id="collapse_4" class="collapse" aria-labelledby="heading_4" data-parent="#accordion">
									 <div class="card-body">
										
										 <p data-v-0752a37c="">Отмена бронирования с полной и частичной предоплатой</p><ul data-v-0752a37c=""><li data-v-0752a37c="">Если вы отменяете бронирование не позднее чем за 48 часов до начала аренды, вам будут возвращены денежные средства.</li><li data-v-0752a37c="">Если вы отменяете бронирование менее чем за 48 часов до начала аренды, вам будут возвращены денежные средства, в случае приобретения дополнительной услуги “Защита бронирования”.</li><li data-v-0752a37c="">Если вы отменяете бронирование менее чем за 24 часа до начала аренды, вам будут возвращены денежные средства, в случае приобретения дополнительной услуги “Защита бронирования”.</li><li data-v-0752a37c="">Бронирование не может быть отменено после начала аренды.</li></ul><p data-v-0752a37c="">Неявка</p><p data-v-0752a37c="">Под понятие «Неявка» подпадают следующие случаи:</p><ul data-v-0752a37c=""><li data-v-0752a37c="">Если мы своевременно не получаем уведомление об отмененном вами бронировании;</li><li data-v-0752a37c="">Если вы не являетесь на место получения автомобиля в установленное время;</li><li data-v-0752a37c="">Если при получении автомобиля у вас отсутствуют необходимые документы;</li></ul><p data-v-0752a37c="">Во всех перечисленных случаях возврат денежных средств невозможен.</p><p data-v-0752a37c="">Арендодатель сохраняет за собой право отказать вам в выдаче автомобиля, если вы не являетесь на место получения автомобиля в установленное время с документами, необходимыми для аренды, и кредитной картой, или если ранее вы были внесены в черный список прокатной компании.</p>
										
									 </div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="heading_5">
									 <h5 class="mb-0">
										 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
											ИЗМЕНЕНИЕ БРОНИРОВАНИЯ
										 </button>
									 </h5>
									</div>
									<div id="collapse_5" class="collapse" aria-labelledby="heading_5" data-parent="#accordion">
									 <div class="card-body">
										
										 <p data-v-0752a37c=""><b data-v-0752a37c="">Вы можете изменить бронирование по телефону <a data-v-0752a37c="" href="tel:+7 (978) 997-97-97" class="mgo-number">+7 (978) 997-97-97</a> не позднее чем за 24 часа до начала аренды. Обратите внимание, что любое изменение бронирования, включая изменение места получения или возврата автомобиля, класса автомобиля, продолжительности аренды, а также личных данных водителя, может повлиять на цену аренды, поэтому итоговая стоимость после изменений может отличаться от указанной при бронировании.</b></p><p data-v-0752a37c=""><b data-v-0752a37c="">Обратите внимание: цены указаны из расчета времени и даты получения и возврата автомобиля, которые вы выбираете при бронировании. Если вы получаете автомобиль позже или возвращаете раньше указанного срока, возврат денежных средств за неиспользованные часы или дни аренды невозможен.</b></p>
										
									 </div>
									</div>
								</div>
								<div class="card">
									<div class="card-header" id="heading_6">
									 <h5 class="mb-0">
										 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_6" aria-expanded="false" aria-controls="collapse_6">
											ГРУППА АВТОМОБИЛЯ/МОДЕЛЬ
										 </button>
									 </h5>
									</div>
									<div id="collapse_6" class="collapse" aria-labelledby="heading_6" data-parent="#accordion">
									 <div class="card-body">
										
										 <p data-v-0752a37c="">Мы гарантируем конкретную марку автомобиля и можем гарантировать тип топлива.</p>
										
									 </div>
									</div>
								</div>
						  </div>
					  </div>
				  </div>
	  
				</div>
				
			</div>
		</div>
	</div>
	
	<div id="fuelConditions" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fuelConditionsModal" aria-hidden="true">
	 <div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
	        <h4 class="modal-title" id="fuelConditionsModal">Топливная политика</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
	      </div>
				<div class="modal-body">
					Автомобиль предоставляется с полным топливным баком. Вернуть его необходимо также с полным баком во избежание дополнительной платы за нехватку топлива.
				</div>
			
			</div>
		</div>
	</div>
	
	<div id="airportConditions" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="airportConditionsModal" aria-hidden="true">
	 <div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
	        <h4 class="modal-title" id="airportConditionsModal">Встреча в аэропорту</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
      	</div>
				<div class="modal-body">
					По прибытии в аэропорт вас встретит представитель компании и передаст транспортное средство.
				</div>
			
			</div>
		</div>
	</div>
				 

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@stop