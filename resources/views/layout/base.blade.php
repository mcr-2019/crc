<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<base href="/" />
	<title>Аренда авто в Крыму | Прокат авто в Крыму</title>
	<meta name="description" content="Аренда авто в Крыму – способ осмотреть достопримечательности Крыма в комфортном Вам режиме без спешки... Прокат авто в Крыму - полная свобода передвижения‏"/>
	<link rel="icon" href="{{ url('public/crimeacr_favicon.ico') }}" type="image/x-icon"/>
	<link rel="shortcut icon" href="{{ url('public/crimeacr_favicon.ico') }}" type="image/x-icon"/>
	 
  <link rel="stylesheet" href="{{ url('public/css/main.css') }}">

	<script type="text/javascript" src="{{ url('public/js/jquery-1.7.2.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('public/js/main.js') }}"></script>
</head>
 
<body
	@if (isset($bodyId))
		id="{{ $bodyId }}"
	@endif
	class="safari chrome"
>

	<noscript><div class="noscript alert_r">У вас отключен JavaScript, сайт не будет работать нормально</div></noscript>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P4XJQ4"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-P4XJQ4');</script>
	<!-- End Google Tag Manager -->

	<div
		@if (isset($page))
			@if ($page == 'child')
				class="header-childpage-bg"
			@else
				class="header-mainpage-bg"
			@endif
		@endif
	>
		<div class="header">
			<div class="header-row-first">
				<div class="phone">
					Мы работаем круглосуточно
					<div class="number">+7 (978) 997-97-97</div>
					<div class="subtext">Прокат авто в Крыму</div>
				</div>
				
				<a href="{{ url('/') }}" class="logo">
					<img style="width: 215px;" alt="Аренда авто в Крыму | Прокат авто в Крыму" src="{{ url('public/images/skin/logo.png') }}" />
				</a>
				
				<div class="phone last">
					<a href="javascript:void(0)" class="callback-btn header-btn" id="callback-btn">
						Заказать звонок
					</a>
					<a href="{{ url('/payment/') }}/"class="wallet-btn header-btn">
						Онлайн оплата
					</a>
				</div>
			</div>
		
			<div class="language-switcher">
				<a href="{{ url('/') }}" class="current">Рус</a>
				<a href="{{ url('/en/') }}">Eng</a>
			</div>
			 
			@if (isset($page))
				@if ($page == 'child')
					<div class="menu">
						<a class=" child_menu_auto_nodriver" href="/booking/">
							Автомобили без водителя
						</a>
						<a class=" child_menu_auto_driver" href="/service/">
							Автомобили с водителем
						</a>
					</div>
				@else
					<div class="offers-tizers">
						<a href="{{ url('/booking/') }}/" class="auto_nodriver">
							Автомобили без водителя
						</a>
						<a href="{{ url('/service/') }}/" class="auto_driver">
							Автомобили с водителем
						</a>
					</div>
				@endif
			@endif

		</div>
	</div>
		
	@yield('content')
	 
	<div class="footer-top-bg">
		<div class="footer-top">
			<div class="copyright">
				© «<a href="{{ url('/') }}">Crimea Rent-a-Car</a>» — транспортная компания, 2017
			</div>

			<div class="footer_menu a-alt">
				<a class="" href="{{ url('/about/') }}/">О компании</a>
				<a class="" href="{{ url('/news/') }}/">Новости</a>
				<a class="" href="{{ url('/contacts/') }}/">Контакты</a>
				<a class="" href="{{ url('/terms/') }}/">Условия аренды</a>
				<a class="last" href="{{ url('/more/') }}/">Еще</a>
			</div>
		</div>
	</div>

	<div class="footer-bottom-bg">
		<div class="footer-bottom">
			<div class="left-part clear-fix">
				<div class="text-1 a-alt">
					<div class="vcard">
						<br />
						<div>
							<br />
							<span class="category">Аренда авто в Крыму</span><br />
							<span class="fn org">Crimea Rent-a-Car</span><br />
						</div>
						<br />
						<div class="adr">
							<br />
							<span class="locality">Республика Крым, г. Симферополь</span>,<br />
							<span class="street-address">Международный аэропорт, Терминал А, 2 этаж</span><br />
						</div>
						<br />
						<div>
							Телефон: <span class="tel">+7 (978) 997-97-97 </span>
							<br>E-mail: <!--googleoff: all--><i class='sp0000'>%3Ea%2F%3C5000ps4000psracatneraemirc1000pstner%3E%225000ps4000psracatneraemirc1000pstner3000psot2000ps%22%3Dferh%20a%3C</i><!--googleon: all-->
						</div>
						<br />
						<div>
							Мы работаем <span class="workhours">ежедневно, круглосуточно</span><br />
							<span class="url"><br />
								<span class="value-title" title="http://crimearentacar.ru"> </span><br />
							</span><br />
						</div>
						<br />
					</div>
				</div>
			</div>
			
			<div class="right-part clear-fix">
				<div class="contacts_info_1">
					<div class="socials">
						<a href="https://vk.com/crimonline" rel="nofollow" class="vkontakte" target="_blank">&nbsp;</a>
						<a href="https://ok.ru/group/55085308379247" rel="nofollow" class="classmates" target="_blank">&nbsp;</a>
						<a href="https://www.facebook.com/%D0%9D%D0%B0-%D0%B0%D0%B2%D1%82%D0%BE%D0%BC%D0%BE%D0%B1%D0%B8%D0%BB%D0%B5-%D0%BF%D0%BE-%D0%9A%D1%80%D1%8B%D0%BC%D1%83-173079299745378/" rel="nofollow" class="facebook" target="_blank">&nbsp;</a>
						<a href="https://www.instagram.com/crimonline/" rel="nofollow" class="instagram" target="_blank">&nbsp;</a>
					</div>
				</div>
				<div class="contacts_info_2"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
		
	<!-- {literal} -->
	<script type='text/javascript'>
	window['l'+'i'+'veT'+'ex'] = true,
	window['l'+'iveT'+'e'+'x'+'ID'] = 118912,
	window['liveT'+'ex_o'+'bject'] = true;
	(function() {
	var t = document['create'+'El'+'eme'+'nt']('script');
	t.type ='text/javascript';
	t.async = true;
	t.src = '//cs1'+'5.l'+'ivet'+'ex.r'+'u/'+'js'+'/client.j'+'s';
	var c = document['getEleme'+'ntsByT'+'agNa'+'me']('script')[0];
	if ( c ) c['par'+'entNo'+'d'+'e']['in'+'sertBe'+'fore'](t, c);
	else document['d'+'o'+'cumen'+'tEleme'+'nt']['f'+'irstC'+'hi'+'ld']['a'+'pp'+'end'+'Chil'+'d'](t);
	})();
	</script>
	<!-- {/literal} —>
 
	<style type='text/css'>@font-face{font-family:'open_sansregular';src:url('apps/crimeacr/fonts/OpenSans-Regular-webfont.eot');src:url('apps/crimeacr/fonts/OpenSans-Regular-webfont.eot?#iefix') format('embedded-opentype'),url('apps/crimeacr/fonts/OpenSans-Regular-webfont.woff') format('woff'),url('apps/crimeacr/fonts/OpenSans-Regular-webfont.ttf') format('truetype'),url('apps/crimeacr/fonts/OpenSans-Regular-webfont.svg#open_sansregular') format('svg');font-weight:normal;font-style:normal}@font-face{font-family:'open_sanssemibold';src:url('apps/crimeacr/fonts/OpenSans-Semibold-webfont.eot');src:url('apps/crimeacr/fonts/OpenSans-Semibold-webfont.eot?#iefix') format('embedded-opentype'),url('apps/crimeacr/fonts/OpenSans-Semibold-webfont.woff') format('woff'),url('apps/crimeacr/fonts/OpenSans-Semibold-webfont.ttf') format('truetype'),url('apps/crimeacr/fonts/OpenSans-Semibold-webfont.svg#open_sansregular') format('svg');font-weight:normal;font-style:normal}</style>
	<!-- Yandex.Metrika counter --><script type="text/javascript" >(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");ym(30398272, "init", {clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true});</script><noscript><div><img src="https://mc.yandex.ru/watch/30398272" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

	<!-- Rating@Mail.ru counter -->
	<script type="text/javascript">
	var _tmr = _tmr || [];
	_tmr.push({id: "2645205", type: "pageView", start: (new Date()).getTime()});
	(function (d, w) {
	 var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true;
	 ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
	 var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
	 if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
	})(document, window);
	</script><noscript><div style="position:absolute;left:-10000px;">
	<img src="//top-fwz1.mail.ru/counter?id=2645205;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
	</div></noscript>
	<!-- //Rating@Mail.ru counter -->

	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create','UA-64862473-1','auto');ga('send','pageview');</script>

	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'GTVq8rALQF';var d=document;var w=window;function l(){
	var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
	s.src = '//code.jivosite.com/script/widget/'+widget_id
		; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
	if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
	else{w.addEventListener('load',l,false);}}})();
	</script>
	<!-- {/literal} END JIVOSITE CODE -->
	
</body>

</html>