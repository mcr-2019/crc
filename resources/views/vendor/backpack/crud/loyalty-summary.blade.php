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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header {{ $crud->hasAccess('create')?'with-border':'' }}">

                    @include('crud::inc.button_stack', ['stack' => 'top'])

                    <div id="datatable_button_stack" class="pull-right text-right"></div>
                </div>

                <div class="box-body table-responsive">

                    {{-- Backpack List Filters --}}
                    @if ($crud->filtersEnabled())
                        @include('crud::inc.filters_navbar')
                    @endif

                    <div class="row">
                        <div class="col-xs-6">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>Количество анкет</th>
                                    <th class="text-right">{{ $loyalties_count }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td>{{ $question->value }}</td>
                                        <td class="text-right">{!! round(array_get($questions_avg, $question->id), 2) ?: '&ndash;' !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>Количество анкет</th>
                                    <th class="text-right">{{ $loyalties_count }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($source_codes as $source_code)
                                    <tr>
                                        <td>@lang('app.loyalty_source_codes.'.$source_code)</td>
                                        <td class="text-right">{{ array_get($source_code_counts, $source_code, 0) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><!-- /.box-body -->

                @include('crud::inc.button_stack', ['stack' => 'bottom'])

            </div><!-- /.box -->
        </div>

    </div>

@endsection

@section('after_styles')
    @parent

    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/crud/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/backpack/crud/css/list.css') }}">

    <!-- CRUD LIST CONTENT - crud_list_styles stack -->
    @stack('crud_list_styles')
@endsection

@section('after_scripts')
    @parent

    <script src="{{ asset('public/vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('public/vendor/backpack/crud/js/form.js') }}"></script>
    <script src="{{ asset('public/vendor/backpack/crud/js/list.js') }}"></script>

    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    @stack('crud_list_scripts')
@endsection
