@extends('layout.base', ['page' => 'child'])

@section('content')

	<div class="page">

		<table class="page-content-with-menu">
			<tr>
				<td class="page-content">
					<div class="path">
						<div class="path"><a href="{{ url('/') }}" class="m">Главная страница</a>Онлайн оплата</div>
					</div>
					
					<h1>Онлайн оплата</h1>
					
					<form name=ShopForm method="POST" action="https://money.yandex.ru/eshop.xml" validator="full">
						<font face=tahoma size=2>
						<input id="yandexMerchantReceipt" name="ym_merchant_receipt" type="hidden" />
						<input type="hidden" name="scid" value="20676" />
						<input type="hidden" name="shopId" value="29889" />
						<br>Марка автомобиля (*):<br>
						<input id="vehicleModel" type=text name="customerNumber" size="43" />
						<br>Ф.И.О. (*):<br>
						<input type=text id="customerFullName" name="custName" size="43" />
						<br>Email (*):<br>
						<input type=text id="customerEmail" name="customerEmail" size="43" />
						<br>Сумма (*):<br>
						<input id="moneyAmount" type=text name="sum" size="43" />
						<br><br>Способ оплаты (*):<br>
						<input name="paymentType" value="PC" type="radio" />
						Оплата со счета в Яндекс.Деньгах<br>
						<input name="paymentType" value="AC" type="radio" />
						Оплата банковской картой<br>
						<input name="paymentType" value="WM" type="radio" />
						Оплата cо счета WebMoney<br>
						<input name="paymentType" value="AB" type="radio" />
						Оплата через Альфа-Клик
						<br><br>(*) - Обязательные поля
						<br><br>
						<input id="checkoutButton" type=submit disabled value="О п л а т и т ь" />
						<br>
					</form>
					
					<br/>
					<h2>Банковские реквизиты</h2>
					<p>
						Так же вы можете осуществить платеж самостоятельно, воспользовавшись банковскими реквизитами удобного для вас банка
					</p>
					
					<div class="clear-fix onlinepayment-bank-block">
						<a href="https://click.alfabank.ru/" rel="nofollow" target="_blank">
							<img src="{{ url('public/images/skin/alfabank_panel.jpg') }}" class="onlinepayment-bank-panel" alt="Альфа клик" />
						</a>
						<div class="onlinepayment-bank-description">
							Номер счета в системе Альфа-Клик уточняйте у менеджера
						</div>
					</div>
					<div class="clear-fix onlinepayment-bank-block">
						<a href="https://online.sberbank.ru/" rel="nofollow">
							<img src="{{ url('public/images/skin/sberbank_panel.jpg') }}" class="onlinepayment-bank-panel" alt="Сбербанк онлайн" />
						</a>
						<div class="onlinepayment-bank-description">
							Номер карты Сбербанк уточняйте у менеджера
						</div>
					</div>
					<div class="clear-fix onlinepayment-bank-block">
						<a href="http://www.sberbank.ru/khabarovsk/ru/promo/p2p/" rel="nofollow">
							<img src="{{ url('public/images/skin/sberbanksms_panel.jpg') }}" class="onlinepayment-bank-panel" alt="Сбербанк смс" />
						</a>
						<div class="onlinepayment-bank-description">
							Номер телефона для СМС-перевода уточняйте у менеджера
						</div>
					</div>
				</td>
			</tr>
		</table>
		
	</div>
	
  <script>
	  
	  document.addEventListener('DOMContentLoaded', function(){ 		var customerFullnameField = document.getElementById('customerFullName'); 		var customerEmailField = document.getElementById('customerEmail'); 		var vehicleModelField = document.getElementById('vehicleModel'); 		var moneyAmountField = document.getElementById('moneyAmount'); 		var paymentTypeFields = document.getElementsByName('paymentType'); 		var checkoutButton = document.getElementById('checkoutButton'); 		 		if (!!customerFullnameField) { 			customerFullnameField.addEventListener("change", checkIfFieldsAreBlank); 		} 		if (!!customerEmailField) { 			customerEmailField.addEventListener("change", checkIfFieldsAreBlank); 		} 		if (!!vehicleModelField) { 			vehicleModelField.addEventListener("change", checkIfFieldsAreBlank); 		} 		if (!!moneyAmountField) { 			moneyAmountField.addEventListener("change", checkIfFieldsAreBlank); 		} 		if (!!paymentTypeFields && paymentTypeFields.length > 0) { 			for (var i = 0; i < paymentTypeFields.length; i++) { 				paymentTypeFields[i].addEventListener("change", checkIfFieldsAreBlank); 			}  		} 		 		function checkIfFieldsAreBlank() { 			if (!!checkoutButton) { 				var customerFullnameVal = customerFullnameField.value; 				var customerEmailVal = customerEmailField.value; 				var vehicleModelVal = vehicleModelField.value; 				var moneyAmountVal = moneyAmountField.value; 				var paymentTypeVal; 				for (var i = 0; i < paymentTypeFields.length; i++) { 					if (paymentTypeFields[i].type === 'radio' && paymentTypeFields[i].checked) { 						paymentTypeVal = paymentTypeFields[i].value;        					} 				}  				var yandexMerchantReceiptField = document.getElementById('yandexMerchantReceipt'); 				  				if (!!yandexMerchantReceiptField && !!customerEmailVal && !!customerFullnameVal &&  !!paymentTypeVal && !!vehicleModelVal && !!moneyAmountVal && !isNaN(moneyAmountVal)) {  				 					var yandexMerchantReceiptValue = { 						'customerContact' : customerEmailVal, 						'items': [{ 							'quantity': 1, 							'price': { 								'amount': moneyAmountVal 							}, 							'tax': 1, 							'text': 'Услуги по прокату автомобиля', 							'paymentSubjectType': 'service' 						}] 					}; 					  					yandexMerchantReceiptField.value = JSON.stringify(yandexMerchantReceiptValue); 					  					checkoutButton.removeAttribute('disabled'); 				} else { 					checkoutButton.setAttribute('disabled', true); 				}	 			}	 		} 	});
  </script>
@stop