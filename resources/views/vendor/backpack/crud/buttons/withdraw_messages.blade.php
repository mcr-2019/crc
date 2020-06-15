	@if (session('withdrawSuccessMessage'))
	 <div class="alert alert-success" style="margin-top:30px;">
			 {{ session('withdrawSuccessMessage') }}
	 </div>
	@endif
	@if ($errors->any()) 
	 <div class="alert alert-danger" style="margin-top:30px;">
			<b>При запросе на вывод денег произошла ошибка:</b>
			@foreach ($errors->all() as $error)
				<br>{{ $error }}
			@endforeach
	 </div> 
	@endif