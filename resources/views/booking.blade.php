@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tbody>
				<tr> 
					<td class="page-content">
				 
						<div class="path">
						 	<div class="path">
								<a href="/" class="m">Главная страница</a>Система бронирования
							</div>
						</div>

					 	<h1>Система бронирования</h1>
						
						<p>С помощью системы бронирования автомобилей, Вы можете выбрать и заказать авто онлайн на ваши даты. Мы гарантируем мгновенное подтверждение заказа и его стоимость.</p>
						
						<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
						
						<!--
						<div id="widget" style="margin-top: 10px">
							<div style="text-align: center; display: none;">LOADING...</div>
							<div style="visibility: visible;">
								<iframe src="https://mycarrental.ru/widgets/search-form/" style="border-width: 0px; overflow: hidden; width: 100%; height: 4827px;">
								</iframe>
							</div>
						</div>
						
						<script>
						(function (url, d, w, cb, wr, wP) {    (w[cb] = w[cb] || []).push(function (wC) {        try {            w[wP] = new wC({url: url, container: wr});        } catch (e) { console.log(e); }    });    var n = d.getElementsByTagName("script")[0],        s = d.createElement("script"),        f = function () { n.parentNode.insertBefore(s, n); };    s.type = "text/javascript";    s.async = true;    s.src = url+'/cors/widgets/loader.js';    if (w.opera === "[object Opera]") {        d.addEventListener("DOMContentLoaded", f, false);    } else { f(); }})('https://mycarrental.ru', document, window, 'mcr_widget_callback', '#widget', 'MCRWidget');
						</script>
					-->
					
					</td>
				</tr>
			</tbody>
		</table>

	</div>

@stop