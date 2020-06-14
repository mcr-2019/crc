@extends('layout.base', ['page' => 'child'])

@section('content')

<div class="page">
	
	<table class="page-content-with-menu">
		<tbody>
			<tr>
				<td class="page-content">
					<div class="path">
						<div class="path">
							<a href="{{ url('/') }}" class="m">Главная страница</a>Условия аренды
						</div>
					</div>
					
					<h1>Условия аренды</h1>
					
					<div class="documentation">
						<div>Возраст: с 23 лет</div>
						<div>Стаж: не менее 3 лет</div>
						<div>Залог за автомобиль: от 5 000 рублей</div>
						<div>Пробег:&nbsp;<strong>без ограничений</strong></div>
						<div>
							<div>&nbsp;</div>
							<div><strong>Часто задаваемые <a href="{{ url('/about/faq') }}/">вопросы по аренде</a> автомобиля.</strong></div>
							
							<br>Картинки автомобилей опубликованы на нашем сайте исключительно в целях ознакомления. По&nbsp;<!--googleoff: all--><a href="mailto:rent@crimearentacar.ru?subject=%D0%A0%D0%B5%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5%20%D1%84%D0%BE%D1%82%D0%BE%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D0%B8%20%D0%B0%D0%B2%D1%82%D0%BE%D0%BC%D0%BE%D0%B1%D0%B8%D0%BB%D1%8F">запросу</a><!--googleon: all-->&nbsp;мы с удовольствием отправим Вам реальные фотографии забронированного Вами автомобиля. Взять&nbsp;<a href="{{ url('/rent') }}/">автомобиль в прокат</a>&nbsp;можно на всей территории Республики Крым.&nbsp;В нашем автопарке <strong>уже</strong>&nbsp;<strong>более 300</strong> автомобилей.
						</div>
						<div>
							
							<h3>Необходимые документы</h3>
							
							<div>
								<div>
									
									<strong>Для граждан РФ:&nbsp;</strong>
									
									Паспорт РФ, действующая прописка, Водительское удостоверение
								</div>
								
								<div>
									<strong>Для иностранных граждан:&nbsp;</strong>
									
									Заграничный паспорт, Водительское удостоверение международного образца
								</div>
							</div>
						</div>
						
						<div>
							<div>
								<h3>Подача/Прием автомобиля</h3>
							</div>
							
							<div>
								<div>
									Аэропорт Симферополь -&nbsp;<strong>Бесплатно</strong>
								</div>
								
								<div>
									<div>
										По городу Симферополю - 1 000 рублей
										<br>Алушта, Саки, Бахчисарай - 2 000 рублей
									</div>
									
									<div>
										Ялта, Евпатория, Севастополь - 3 000 рублей
										<br>Судак, Коктебель, Феодосия - 4 000 рублей
										<br>Черноморское, Джанкой - 5 000 рублей
									</div>
								</div>
								
								<div>
									Керчь, Армянск - 7 000 рублей
								</div>
								
								<div>
									<h3>Дополнительные услуги</h3>
									
									<div>
										<div>
											Навигатор -&nbsp;
											<b style="color: rgb(68, 68, 68); font-family: Helvetica;">цену уточняйте у менеджера по бронированию</b>
											<br>Детское кресло -&nbsp;
											<b style="color: rgb(68, 68, 68); font-family: Helvetica;">цену уточняйте у менеджера по бронированию</b>
											<br>Набор автомобилиста -&nbsp;
											<strong>Бесплатно</strong>
										</div>
										
										<div>
											Дополнительный водитель -&nbsp;
											<strong>Бесплатно</strong>
											<br>Отмена залога и франшизы&nbsp;- &nbsp;от 300 до 1000 рублей в сутки
										</div>
										
										<div>
											Расширенное страхование - от 360 до 3 800 рублей в сутки
											<br>Wi-Fi Интернет - 300 рублей в сутки
										</div>
										
										<div>
											Камера GoPro - 500 рублей в сутки
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<p>&nbsp;</p>
					</div>
				</td>
				
			</tr>
		</tbody>
	</table>
</div>
	
@stop