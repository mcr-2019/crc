<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	@if($entry->payment_status != \App\Models\Order::PAYMENT_STATUS_COMPLETED)
		<div class="row">
			<div class="col-xs-12 col-md-12 text-left m-b-10">
				<strong>Ссылка на оплату:</strong><br>
				<a href="{{ route('order.pay', [$entry->uuid]) }}" target="_blank">{{ route('order.pay', [$entry->uuid]) }}	</a>
				<br><br>
			</div>
		</div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-md-3 text-left m-b-10">
			<strong>Автомобиль:</strong><br>
			{{ array_get($entry->full_data, 'vehicle.model') }} {{ array_get($entry->full_data, 'vehicle.modification') }}<br>
			@if (!!array_get($entry->full_data, 'vehicle.transmission') || !!array_get($entry->full_data, 'vehicle.year'))
				({{ array_get($entry->full_data, 'vehicle.transmission') }}, {{ array_get($entry->full_data, 'vehicle.year') }})
			@endif
			<div class="media">
				<div class="media-left">
					<a href="#">
						<img src="{{ array_get($entry->full_data, 'vehicle.images.0.thumbnail') }}" style="width:200px">
					</a>
				</div>
			</div>
			<br>
			<strong>Данные клиента:</strong><br>
			ФИО: {{ $entry->data['surname'] }} {{ $entry->data['name'] }} {{ array_get($entry->data, 'middle_name') }}<br>
			Телефон: {{ $entry->data['phone'] }}<br>
			Email: <a href="mailto:{{ $entry->data['email'] }}">{{ $entry->data['email'] }}</a><br>
			  
			@if($entry->payment_status == \App\Models\Order::PAYMENT_STATUS_HOLD && $entry->preorder && ($entry->preorder_expired || $entry->preorder_confirmed === false))
				<a href="{{ url($crud->route.'/'.$entry->getKey().'/reverse') }}" class="btn btn-xs btn-default"><i class="fa fa-money"></i> Снять авторизацию с предоплаты</a>
			@endif
			<br> 
			@if( ! empty($entry->reservation_data['vendor']))
				<strong>Поставщик:</strong><br>
				Название: {{ array_get($entry->reservation_data['vendor'], 'brand_name') }}<br>
				Телефон: {{ array_get($entry->reservation_data['vendor'], 'phone') }}<br>
				Email: <a href="mailto:{{ array_get($entry->reservation_data['vendor'], 'email') }}">{{ array_get($entry->reservation_data['vendor'], 'email') }}</a><br> 
			@endif
			 
		</div>
		<div class="col-xs-12 col-md-3 text-left m-b-10">
			<strong>Формирование стоимости:</strong><br>
			Аренда за период: {{ number_format(array_get($entry->full_data, 'vehicle.rate_subtotal', 0), 0, '.', ' ').' '.$currencyAbbrLong }}<br>
			@if( ! empty(array_get($entry->full_data, 'extras.pick_up_location_fee', 0)))
				Стоимость подачи: {{ number_format(array_get($entry->full_data, 'extras.pick_up_location_fee', 0), 0, '.', ' ').' '.$currencyAbbrLong }}<br>
			@endif
			@if( ! empty(array_get($entry->full_data, 'extras.drop_off_location_fee', 0)))
				Стоимость приема: {{ number_format(array_get($entry->full_data, 'extras.drop_off_location_fee', 0), 0, '.', ' ').' '.$currencyAbbrLong }}<br>
			@endif
			@if( ! empty(array_get($entry->full_data, 'extras.location_change_fee', 0)))
				Стоимость возврата между станциями: {{ number_format(array_get($entry->full_data, 'extras.location_change_fee', 0), 0, '.', ' ').' '.$currencyAbbrLong }}<br>
			@endif
			@if( ! empty(array_get($entry->full_data, 'extras.airport_fee', 0)))
				Аэропортный сбор: {{ number_format(array_get($entry->full_data, 'extras.airport_fee', 0), 0, '.', ' ').' '.$currencyAbbrLong }}<br>
			@endif
			@if( ! empty(array_get($entry->full_data, 'extras.out_working_hours_fee', 0)))
				Стоимость обслуживания вне рабочего времени: {{ number_format(array_get($entry->full_data, 'extras.out_working_hours_fee', 0), 0, '.', ' ').' '.$currencyAbbrLong }}<br>
			@endif
			@if( ! empty($entry->data['equipment']))
				<br>
				<u>Дополнительное оборудование:</u><br>
				@php
					$equipmentTotal = 0;
				@endphp
				@foreach($entry->data['equipment'] as $equip)
					{{ $equip['name'] }} - {{ $equip['qty'] }} шт. {{ $equip['rate'] * $equip['qty'] }} {{ $equip['calculation_method'] == 'day' ? $currencyAbbrLong .'/сутки' : $currencyAbbrLong}}<br>
					@php
						$equipNumber = $equip['calculation_method'] == 'day' ? array_get($entry->full_data, 'vehicle.rent_period_days', 1) : 1;
						$equipmentTotal += $equip['rate'] * $equip['qty'] * $equipNumber;
					@endphp
				@endforeach
				<b>Общая стоимость доп. оборудования:</b> {{ $equipmentTotal . ' ' . $currencyAbbrLong }}<br>
			@endif
			<br>
			<strong>ИТОГО: {{ number_format($entry->cost, 0, '.', ' ').' '.$currencyAbbrLong}}</strong><br>
			
			<br>Оплачено онлайн ({{ $currencyAbbrLong }}):
			<br>
			<input type="text"
						class="change_money_received_content"
						rows="3"
						style="width:100%;resize:none;"
						data-mask="999999.99"
						value="{{ $entry->money_received }}" 
			/>
			<strong>Поменять статус оплаты:</strong><br>
			<select name="change_order_payment_status_select" 
							class="change_order_payment_status_select"
							style="width: 100%;margin-bottom:5px;"
			> 
				@php
					$order_payment_statuses = [
						$entry::PAYMENT_STATUS_NEW,
						$entry::PAYMENT_STATUS_FAILED,
						$entry::PAYMENT_STATUS_COMPLETED,
						$entry::PAYMENT_STATUS_PROCESSING,
						$entry::PAYMENT_STATUS_CANCELLED,
						$entry::PAYMENT_STATUS_HOLD,
						$entry::PAYMENT_STATUS_REVERSED
					];
				@endphp
				
				@foreach ($order_payment_statuses as $order_payment_status) 
					<option value="{{ $order_payment_status }}" {{ $entry->payment_status === $order_payment_status ? 'selected' : '' }}>
						{{ trans('app.order_payment_statuses.' . $order_payment_status) }}
					</option>
				@endforeach
			</select> 
			<button class="change_money_received btn btn-xs btn-default"
							style="margin-top:10px;"
							onclick="changeMoneyReceivedAndPaymentStatus(this, {{ $entry->id }})"
			>
				<i class="fa fa-spinner fa-spin" style="display:none;"></i>
				Сохранить
			</button>
			
		</div>
		<div class="col-xs-12 col-md-3 text-left m-b-10">
			<strong>Получение:</strong><br>
			@if(empty($entry->full_data['info']['pick_up_location']['region_name']))
				{{ $entry->full_data['info']['pick_up_location']['name'] }}<br>
			@else
				{{ $entry->full_data['info']['pick_up_location']['name'] }}, {{ $entry->full_data['info']['pick_up_location']['region_name'] }}<br>
			@endif
			{{ $entry->full_data['info']['date_start']['date_localized_short'] }}<br>
			<br>
			<strong>Возврат:</strong><br>
			@if(empty($entry->full_data['info']['drop_off_location']['region_name']))
				{{ $entry->full_data['info']['drop_off_location']['name'] }}<br>
			@else
				{{ $entry->full_data['info']['drop_off_location']['name'] }}, {{ $entry->full_data['info']['drop_off_location']['region_name'] }}<br>
			@endif
			{{ $entry->full_data['info']['date_end']['date_localized_short'] }}<br>
		</div>
		<div class="col-xs-12 col-md-3 text-left m-b-10">
			@if( ! empty($entry->data) && !empty($entry->data['comment'])) 
				<strong>Комментарий клиента:</strong><br>
				{{ $entry->data['comment'] }}
			@endif 
		</div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-xs-12 col-md-3 text-left m-b-10"> 
			<strong>Поменять статус заказа:</strong><br>
			@php
				$orderStatus = $entry->status;
				if ($entry->preorder) {
          if (
            $entry->payment_status == $entry::PAYMENT_STATUS_COMPLETED ||
            $entry->payment_status == $entry::PAYMENT_STATUS_HOLD
          ) { 
						if ($entry->preorder_confirmed) {
								$orderStatus = "preorder_confirmed";
						}
						elseif ($entry->preorder_confirmed === false) {
								$orderStatus = "preorder_declined";
						}
						elseif ($entry->preorder_expired) {
								$orderStatus = "preorder_expired";
						}
						else {
								$orderStatus = "to_be_confirmed";
						}
					}
				}
				else {
					if ($entry->payment_status == $entry::PAYMENT_STATUS_COMPLETED) {
							$orderStatus = "paid";
					}
				}
				 
			@endphp
			
			<select name="change_order_status_select"
							onchange="setStatusValue(this);"
							class="change_order_status_select"
							style="width: 100%;margin-bottom:5px;"
			>
				<option value="preorder_confirmed" {{ $orderStatus === "preorder_confirmed" ? 'selected' : '' }}>
					Предзаказ подтвержден
				</option>
				<option value="preorder_declined" {{ $orderStatus === "preorder_declined" ? 'selected' : '' }}>
					Предзаказ отклонен
				</option>
				<option value="preorder_expired" {{ $orderStatus === "preorder_expired" ? 'selected' : '' }}> 
					Предзаказ просрочен
				</option>
				<option value="to_be_confirmed" {{ $orderStatus === "to_be_confirmed" ? 'selected' : '' }}>  
					Предзаказ ожидает подтверждения
				</option> 
				<option value="{{ $entry::STATUS_NEW }}" {{ $orderStatus === $entry::STATUS_NEW ? 'selected' : '' }}>   
					Не завершен
				</option>
				<option value="{{ $entry::STATUS_ACCEPTED }}" {{ $orderStatus === $entry::STATUS_ACCEPTED ? 'selected' : '' }}>   
					Принят
				</option>
				<option value="{{ $entry::STATUS_FAILED }}" {{ $orderStatus === $entry::STATUS_FAILED ? 'selected' : '' }}>   
					Ошибка
				</option> 
			</select>
			<a href=""
				data-href="{{ url('/admin-panel/change-order-status') . '/' . $entry->id }}"
				class="change_order_status_button btn btn-xs btn-default disabled"
			>
				ОК
			</a>
		</div>
		<div class="col-xs-12 col-md-4 text-left m-b-10">
			<strong>Комментарий админа:</strong>
			<br>
			@php
				$admin_comment_content = '';
				$admin_comment_time = '';
				$admin_comment_user = '';
				if (!is_null($entry->admin_comment)) {
					$admin_comment_data = json_decode($entry->admin_comment, true);
					if (is_array($admin_comment_data)) {
						if (array_key_exists('content', $admin_comment_data)) {
							$admin_comment_content = $admin_comment_data['content'];
						}
						if (array_key_exists('time', $admin_comment_data)) {
							$admin_comment_time = date('d/m/Y, H:i', $admin_comment_data['time']);
						}
						if (array_key_exists('user', $admin_comment_data)) {
							$admin_comment_user = $admin_comment_data['user'];
						}
					} 
				}
			@endphp
			@if (!!$admin_comment_time && !!$admin_comment_user)
				<i style="font-size:13px;">(Последнее редактирование: {{ $admin_comment_time }}: {{ $admin_comment_user }})</i>
				<br>
			@endif
			<textarea class="change_admin_comment_content"
								rows="3"
								style="width:100%;resize:none;"
			>{{ $admin_comment_content }}</textarea> 
			<button class="change_admin_comment btn btn-xs btn-default"
							style="margin-top:10px;"
							onclick="changeAdminComment(this, {{ $entry->id }})"
			>
				<i class="fa fa-spinner fa-spin" style="display:none;"></i>
				Сохранить
			</button>
		</div>
		<div class="col-xs-12 col-md-3 text-left m-b-10">

			<strong>Деньги переведены партнеру:</strong>
			<br>
			<select name="partner_is_paid" 
					class="change_partner_is_paid_select"
					style="width: 100%;margin-bottom:5px;"
			>
				<option value="0"
					@if (!$entry->partner_is_paid)
						selected
					@endif
				>Нет</option>
				<option value="1"
					@if ($entry->partner_is_paid)
						selected
					@endif
				>Да</option>
			</select> 
			<button class="change_partner_is_paid btn btn-xs btn-default"
							style="margin-top:10px;"
							onclick="changePartnerIsPaidStatus(this, {{ $entry->id }})"
			>
				<i class="fa fa-spinner fa-spin" style="display:none;"></i>
				Сохранить
			</button>

		</div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-xs-12 col-md-12 text-left m-b-10">  
			<a href="{{ url($crud->route.'/'.$entry->getKey()) }}"
					class="btn btn-xs btn-default"
					data-button-type="delete"
			>
				<i class="fa fa-trash"></i> {{ trans('backpack::crud.delete') }}
			</a>
		</div>
	</div>
</div>
<div class="clearfix"></div>
