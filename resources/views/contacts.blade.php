@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">
		<table class="page-content-with-menu">
			<tbody>
				<tr>
					<td class="page-content">
						<div class="path">
							<div class="path">
								<a href="{{ url('/') }}" class="m">Главная страница</a>Контактная информация
							</div>
						</div>
						
						<h1>Контактная информация</h1>
						
						<table class="contacts-info-table">
							<tbody>
								<tr>
									<td class="c1">
										
										<h2>Карта проезда</h2>
										
										<script type="text/javascript" charset="utf-8" async="" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Acdebb2b09e7d4b5147aa2d4496ead2e268a41c849af521d2caf3fc1a5b36814d&amp;width=600&amp;height=450&amp;lang=ru_RU&amp;scroll=true"></script>
									</td>
									
									<td>
										
										<h2>Контакты</h2>
										
										<div class="vcard">
											<div><strong>Наш адрес</strong>:</div>
											<div>
												<span class="category">Аренда автомобилей</span>
												<strong><span class="fn org">Crimea Rent-a-Car</span></strong>
											</div>
											
											<div class="adr">
												<span class="locality">Республика Крым, </span>
												<span style="color: rgb(0, 0, 0); font-family: Helvetica; caret-color: rgb(0, 0, 0);">аэропорт Симферополь, зал прилета</span>
											</div>
											
											<div class="adr">Координаты GPS&nbsp;45.02070536, 33.99770535</div>
											
											<div>&nbsp;</div>
											
											<div>
												<strong>Телефон</strong>:&nbsp;+7 (978) 997-97-97
												<br><strong>E-mail:</strong> <!--googleoff: all--><a href="mailto:rent@crimearentacar.ru">rent@crimearentacar.ru</a><!--googleon: all-->
											</div>
											
											<div>&nbsp;</div>
											
											<div>
												<img height="20px" src="{{ url('/public/images/social/viber.svg') }}" style="display: inline-block; vertical-align: middle;" width="20px" />
												<img height="20px" src="{{ url('/public/images/social/whatsapp.svg') }}" style="display: inline-block; vertical-align: middle; margin-left: 7px;" width="20px" />
												<img height="20px" src="{{ url('/public/images/social/iMessage.svg') }}" style="display: inline-block; vertical-align: middle; margin-left: 7px;" width="20px" />
												<b>&nbsp;</b>&nbsp;
												<span class="whatsapp-viber-imessage">+7 (978) 997-97-97</span>
											</div>
											
											<div>&nbsp;</div>
											<div><strong>ICQ</strong>: <span class="icq">663337373</span></div>
											<div>&nbsp;</div>
											<div>Мы работаем для Вас&nbsp;<span class="workhours"><strong>ежедневно, круглосуточно</strong></span></div>
											<div><span class="workhours">Прием и выдача автомобилей в нерабочее время осуществляется&nbsp;<strong>БЕСПЛАТНО</strong></span></div>
										</div>
										
										<p>&nbsp;</p>
									</td>
								</tr>
							</tbody>
						</table>
						
						<a name="message-sended" class="hidden-anchor"></a>
						
						<h2>Обратная связь</h2>
						
						<form class="form contacts-form" validator="full" action="{{ url('/contacts') }}/" method="post">
							<table>
								<tbody>
									<tr>
										<td class="c1">
											<div>
												<label id="contacts-fio">Ф.И.О.</label>
												<input class="i" id="contacts-fio" name="fio" title="Ф.И.О." maxlength="255" />
											</div>
											
											<div>
												<label id="contacts-phone">Телефон</label>
												<input class="i" validator="none" id="contacts-phone" name="phone" title="Телефон" maxlength="255" />
											</div>
											
											<div>
												<label id="contacts-email">Почта</label>
												<input class="i" id="contacts-email" name="email" title="Почта" maxlength="255" />
											</div>
										</td>
										
										<td class="c2">
											<div>
												<label id="contacts-question">Вопрос</label>
												<textarea class="t" id="contacts-question" name="question" title="Вопрос"></textarea>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							
							<a href="{{ url('/contacts') }}/#" class="contacts-submit">Отправить</a>
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	
	</div>
	
@stop