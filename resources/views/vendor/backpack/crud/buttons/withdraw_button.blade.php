	<div class="tab-pane">
			
			<div style="margin-top:20px;">

				@php
	        $currencySetting = \App\Models\Setting::where('key', 'currency')
	          ->first();
	        if (!is_null($currencySetting)) {
	          $currencyValue = $currencySetting->value;
	          $currencyMapping = (new \App\Models\Setting)->getCurrencyMapping();
	          $currencyAbbr = array_key_exists($currencyValue, $currencyMapping) ?
	            $currencyMapping[$currencyValue]['abbreviation'] : 'р.';
	        } else {
	          $currencyAbbr = 'р.';
	        } 
				
					$partner = Auth::user();
	        $refs = $partner->refs->pluck('title')->toArray();
	        $promocodes = $partner->promocodes->pluck('title')->toArray();

					$partnerOrders = \App\Models\Order::where(function ($query) use ($refs, $promocodes) {
	          $query->whereIn('ref', $refs);

	          foreach($promocodes as $promocode) {
	            $query->orWhere('data', 'like binary', '%"promocode":"' . $promocode . '"%');
	          }
	        })
					->where(function ($query) {
	          $query->where('partner_is_paid', '=', false)
									->orWhere('partner_is_paid', '=', null);
	        })
					->where('full_data', 'not like', '%Promo",%')
					->where('payment_status', \App\Models\Order::PAYMENT_STATUS_COMPLETED)
					->where('drop_off_datetime', '<', date('Y-m-d').' 00:00:00')
					->get();
					$totalToWithdraw = 0;
					
					$ordersIdsForWithdrawal = [];
					foreach($partnerOrders as $partnerOrder) {

						$commissionFee = 0;
						if (!!$partnerOrder->data && isset($partnerOrder->data['promocode'])) {
							$commissionFee = !!$partner->partner_promocode_fee ? $partner->partner_promocode_fee : 0;
						} else if (!!$partnerOrder->ref) {
							$commissionFee = !!$partner->partner_ref_fee ? $partner->partner_ref_fee : 0;
						}

						$amountToWithdraw = number_format($partnerOrder->cost * ($commissionFee / 100), 0, '.', '');

						if (!!$amountToWithdraw) {
							$ordersIdsForWithdrawal[] = $partnerOrder->id;
						}
						$totalToWithdraw += (int) $amountToWithdraw;
					}
				@endphp

				<b>Доступно к выводу:</b> {{ $totalToWithdraw . ' ' . $currencyAbbr }} // Сумма всех партнерских комиссий, где Статус = "Завершен" и Выплачено = "Нет".
				<br>(Минимальная сумма к выводу - 1000 {{ $currencyAbbr }})

				<form action="{{ url('withdraw_money') }}/"
							method="post"
							id="withdrawMoneyForm"
				>
	        {!! csrf_field() !!}
					<div style="margin-top:10px;">
						
						<input type="hidden"
										name="amount"
										value="{{ $totalToWithdraw }}"
						/>
						<input type="hidden"
										name="ordersIdsForWithdrawal"
										value="{{ json_encode($ordersIdsForWithdrawal) }}"
						/>
						<button id="withdrawMoney" 
										class="btn btn-success ladda-button
										@if ($totalToWithdraw < 1000)
											disabled
										@endif
										"
										data-style="zoom-in"
						>
							<i class="fa fa-upload"></i> Вывести</span>
						</button>

					</div>
				</form>

			</div> 
			<style>
				input[type="file"].import_file_input {
					display:none;
				}
			</style>
			
			@push('crud_list_scripts')
			  <script>
					jQuery(document).ready(function($) {
						 
						jQuery('#withdrawMoney').on('click', function(event){ 

							event.preventDefault();
							
							if ({{ $totalToWithdraw }} >= 1000) {
								jQuery('#withdrawMoneyForm').trigger('submit');
							}
						});
					});
				</script> 
			@endpush 
	</div>
</div>