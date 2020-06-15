<form action="{{ url($crud->route.'/multiupdate') }}" method="post">
    {{ csrf_field() }}
    <button type="button" class="btn btn-primary ladda-button js-multisave-submit" data-style="zoom-in">
        <span class="ladda-label"><i class="fa fa-save"></i>
            Сохранить
        </span>
    </button>
</form>

@section('after_scripts')
    @parent

    <script>
        $(document).on('click', '.js-multisave-submit', function () {
            var form = $(this).closest('form');

            $('[type=checkbox][data-multiupdate]').each(function () {
                var input = $(document.createElement('input')).attr({
                    type: 'hidden',
                    name: $(this).attr('name'),
                    value: $(this).prop('checked') ? 1 : 0
                });
                form.append(input);
                form.submit();
            });
        });
    </script>
@stop
