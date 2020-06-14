@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tbody>
				<tr>
					<td class="page-menu">
						<a href="{{ url('/about/events') }}/">Мероприятия</a>
						<a href="{{ url('/about/drivers') }}/">Водители</a>
						<a href="{{ url('/about/partners') }}/" class="current">Партнеры</a>
						<a href="{{ url('/about/faq') }}/">FAQ</a>
					</td>
					<td class="page-content">
						<div class="path">
							<div class="path">
								<a href="{{ url('/') }}" class="m">Главная страница</a>
								<a href="{{ url('/about') }}/">О компании</a>Мероприятия
							</div>
						</div>

						<h1>Партнеры</h1>
						
						<p>&nbsp;</p>
						<p><img alt="Autorenter.ru" src="{{ url('/public/images/companies/ar-logo.gif') }}" style="width: 330px; height: 99px;"><br><!--noindex--><a href="http://www.autorenter.ru" rel="nofollow">Autorenter.ru – прокат и аренда автомобилей</a><!--/noindex--></p>
						<p><a href="http://mycarrental.ru/" style="font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">MyCarRental.ru - аренда автомобилей по России</a><br style="color: rgb(34, 34, 34); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><img alt="MyCarRental - аренда автомобилей по всей России" src="{{ url('/public/images/companies/mcr.jpg') }}" style="cursor: default; color: rgb(34, 34, 34); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; width: 330px; height: 170px; float: left; background-color: rgb(255, 255, 255);"></p>
					</td>
				</tr>
			</tbody>
		</table>

	</div>

@stop