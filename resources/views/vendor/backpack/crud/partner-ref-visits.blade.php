@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            <span class="text-capitalize">{{ $crud->entity_name_plural }}</span>
            <small>{{ trans('backpack::crud.all') }} <span class="text-lowercase">{{ $crud->entity_name_plural }}</span> {{ trans('backpack::crud.in_the_database') }}.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url($crud->route) }}" class="text-capitalize">{{ $crud->entity_name_plural }}</a></li>
            <li class="active">{{ trans('backpack::crud.list') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Default box -->
    <div class="row">

      <!-- THE ACTUAL CONTENT -->

			@php
        $user = Auth::user();
        $refs = $user->refs->sortBy('title');
        $promocodes = $user->promocodes->sortBy('title');
				
				$refVisits = [];
				foreach($refs as $ref) {

					$refsVisitsCount = \App\Models\RefVisit::where('ref_id', $ref->id)
						->where('created_at', '>=', \Carbon\Carbon::now()->subYear()->toDateTimeString())
						->selectRaw('count(*) as refVisitsCount, YEAR(created_at) year, MONTH(created_at) month')
						->orderBy('year', 'asc')
						->orderBy('month', 'asc')
						->groupBy('year', 'month')
						->get();
					  
				 	if (!isset($refVisits[$ref->title])) {
						$refVisits[$ref->title] = [];
					}
					foreach($refsVisitsCount as $refsVisit) {
						 
						if (!isset($refVisits[$ref->title][$refsVisit->year])) {
							$refVisits[$ref->title][$refsVisit->year] = [];
						}
						if (!isset($refVisits[$ref->title][$refsVisit->year][$refsVisit->month])) {
							$refVisits[$ref->title][$refsVisit->year][$refsVisit->month] = $refsVisit->refVisitsCount;
						}
					} 
				}

				$index = 0;
			@endphp

      @if (count($refs) > 0)
        <div class="col-md-12">

          @php
            $refCommissionFee = !!$user->partner_ref_fee ? $user->partner_ref_fee : 0;
          @endphp
          <b>Рефы:</b><br>
          @foreach ($refs as $ref)
          <br>{{ $ref->title }} (Комиссия: {{ $refCommissionFee }}%)
          @endforeach

          <br><br>
        </div>
      @endif

      @if (count($promocodes) > 0)
        <div class="col-md-12">

          @php
            $promocodeCommissionFee = !!$user->partner_promocode_fee ? $user->partner_promocode_fee : 0;
          @endphp
          <b>Промокоды:</b><br>
          @foreach ($promocodes as $promocode)
          <br>{{ $promocode->title }} (Комиссия: {{ $promocodeCommissionFee }}%)
          @endforeach

          <br><br>
        </div>
      @endif

			@foreach ($refVisits as $refTitle => $refVisitsByYear)

				<div class="col-md-12">

					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

					  <div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="refContainerHeading_{{ $index }}">
					      <h4 class="panel-title">
					        <a role="button"
											data-toggle="collapse"
											data-parent="#accordion"
											href="#refContainerWrapper_{{ $index }}"
											aria-expanded="true"
											aria-controls="refContainerWrapper_{{ $index }}"
									>
					          График визитов по ref "{{ $refTitle }}" за год
					        </a>
					      </h4>
					    </div>
					    <div id="refContainerWrapper_{{ $index }}"
										class="panel-collapse collapse in"
										role="tabpanel"
										aria-labelledby="refContainerHeading_{{ $index }}"
							>
					      <div class="panel-body">

									<figure class="highcharts-figure">
										<div id="refContainer_{{ $index }}"></div>
									</figure>

					      </div>
					    </div>
					  </div>

					</div>
				</div>
			
			@php
				$index++;
			@endphp

			@endforeach

    </div>

@endsection

@section('after_styles')
    @parent

    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/crud/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/crud/css/list.css') }}">
		
		<style>
			.highcharts-figure, .highcharts-data-table table {
		    min-width: 360px; 
		    max-width: 800px;
		    margin: 1em auto;
			}

			.highcharts-data-table table {
				font-family: Verdana, sans-serif;
				border-collapse: collapse;
				border: 1px solid #EBEBEB;
				margin: 10px auto;
				text-align: center;
				width: 100%;
				max-width: 500px;
			}
			.highcharts-data-table caption {
		    padding: 1em 0;
		    font-size: 1.2em;
		    color: #555;
			}
			.highcharts-data-table th {
				font-weight: 600;
		    padding: 0.5em;
			}
			.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
		    padding: 0.5em;
			}
			.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
		    background: #f8f8f8;
			}
			.highcharts-data-table tr:hover {
		    background: #f1f7ff;
			}

		</style>

    <!-- CRUD LIST CONTENT - crud_list_styles stack -->
    @stack('crud_list_styles')
@endsection

@section('after_scripts')
    @parent

    <script src="{{ asset('public/vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('public/vendor/backpack/crud/js/form.js') }}"></script>
    <script src="{{ asset('public/vendor/backpack/crud/js/list.js') }}"></script>

		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://code.highcharts.com/modules/accessibility.js"></script>
		
		<script>
		
			var currentDate = new Date();
			
			var previousYear = currentDate.getFullYear() - 1;
			var currentYear = currentDate.getFullYear();
			var nextMonth = currentDate.getMonth() + 1;
			
			var pointStart = Date.UTC(previousYear, nextMonth, 1);
			var pointEnd = Date.UTC(currentYear, nextMonth, 1);

			@php
				$containerIndex = 0;
				
			@endphp

			@foreach ($refVisits as $refTitle => $refVisitsByYear)

				var data = [];
				
				@php
					$currentYear = date('Y');
					$prevYear = $currentYear - 1;
					$currentYearMonth = 1;
					$currentPrevYearMonth = date('m');

					$index = 0;
					while ($currentPrevYearMonth <= 12) {
						
						if (isset($refVisitsByYear[$prevYear]) && isset($refVisitsByYear[$prevYear][$currentPrevYearMonth])) {
							$value = $refVisitsByYear[$prevYear][$currentPrevYearMonth];
						} else {
							$value = 0;
						}
						
						$jsPrevMonth = $currentPrevYearMonth - 1;
						echo 'data[' . $index . '] = [Date.UTC(' . $prevYear . ', ' . $jsPrevMonth . ', 1), ' . $value . '];' ;
						$currentPrevYearMonth++;
						$index++;
					}
					while ($currentYearMonth <= 12) {
						
						if (isset($refVisitsByYear[$currentYear]) && isset($refVisitsByYear[$currentYear][$currentYearMonth])) {
							$value = $refVisitsByYear[$currentYear][$currentYearMonth];
						} else {
							$value = 0;
						}
						
						$jsMonth = $currentYearMonth - 1;
						echo 'data[' . $index . '] = [Date.UTC(' . $currentYear . ', ' . $jsMonth . ', 1), ' . $value . '];' ;
						$currentYearMonth++;
						$index++;
					}
				@endphp
			
		    var chart = new Highcharts.Chart('refContainer_{{ $containerIndex }}',
					{
						title: {
		            text: 'График визитов по ref "{{ $refTitle }}" за год'
		        },
		        xAxis: {
		            type: 'datetime',
		            dateTimeLabelFormats: {
		                second: '%H:%M:%S',
		                minute: '%H:%M',
		                hour: '%H:%M',
		                day: '%e. %b',
		                week: '%e. %b',
		                month: '%b', //month formatted as month only
		                year: '%Y'
		            },
		            labels: {
		                style: {
		                    fontFamily: 'Tahoma'
		                },
		                rotation: -45
		            },
		            maxZoom: 24 * 3600 * 1000 * 30, // fourteen days
		        },
		        yAxis: {
		            title: {
		                text: 'Количество визитов'
		            },
								min: 0
		        },
		        tooltip: {
		            shared: true,
		            formatter: function () {
		                var result = '<b>' + Highcharts.dateFormat('%b, %Y', this.x) + '</b>';
		                $.each(this.points, function (i, datum) {
		                    result += '<br />' + datum.y + ' визита(ов)';
		                });
		                return result;
		            }
		        },
		        legend: {
		            enabled: false
		        },
		
		        plotOptions: {
	            area: {
	                fillColor: {
	                    linearGradient: {
	                        x1: 0,
	                        y1: 0,
	                        x2: 0,
	                        y2: 1
	                    },
	                    stops: [
	                        [0, Highcharts.getOptions().colors[0]],
	                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
	                    ]
	                },
	                lineWidth: 1,
	                marker: {
	                    enabled: true
	                },
	                shadow: false,
	                states: {
	                    hover: {
	                        lineWidth: 1
	                    }
	                },
	                threshold: null
	            }
		        },
		
		        series: [{
		            type: 'area',
		            name: 'Количество визитов',
		            dataGrouping: {
		                enabled: false
		            },
		            data: data
		        }]
			    });

				@php
					$containerIndex++;
				@endphp

			@endforeach
		</script>

    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    @stack('crud_list_scripts')
@endsection
