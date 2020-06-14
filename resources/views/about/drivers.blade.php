@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tbody>
				<tr>
					<td class="page-menu">
						<a href="{{ url('/about/events') }}/">Мероприятия</a>
						<a href="{{ url('/about/drivers') }}/" class="current">Водители</a>
						<a href="{{ url('/about/partners') }}/">Партнеры</a>
						<a href="{{ url('/about/faq') }}/">FAQ</a>
					</td>
					<td class="page-content">
						<div class="path">
							<div class="path">
								<a href="{{ url('/') }}" class="m">Главная страница</a>
								<a href="{{ url('/about') }}/">О компании</a>Мероприятия
							</div>
						</div>

						<h1>Водители</h1>
						
						<div>
							<div class="driver">
								<table>
									<tbody>
										<tr>
											<td class="photo-td">
												<img src="{{ url('/public/images/drivers/dr1.jpg') }}" style="width:152px;height:151px;" />
											</td>
											<td class="driver-info-td">
												<div class="driver-info">
													<h4>Ефимов Степан</h4>
													<div class="driver-info-inner-item">
														<span>Категория:</span>B, C, D
													</div>
													<div class="driver-info-inner-item">
														<span>Возраст:</span>47
													</div>
													<div class="driver-info-inner-item">
														<span>Стаж:</span>28
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							
							<div class="driver">
								<table>
									<tbody>
										<tr>
											<td class="photo-td">
												<img src="{{ url('/public/images/drivers/dr3.jpg') }}" style="width:152px;height:151px;" />
											</td>
											<td class="driver-info-td">
												<div class="driver-info">
													<h4>Макаров Андрей</h4>
													<div class="driver-info-inner-item">
														<span>Категория:</span>B, C, D
													</div>
													<div class="driver-info-inner-item">
														<span>Возраст:</span>43
													</div>
													<div class="driver-info-inner-item">
														<span>Стаж:</span>21
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						
					</td>
				</tr>
			</tbody>
		</table>

	</div>

@stop