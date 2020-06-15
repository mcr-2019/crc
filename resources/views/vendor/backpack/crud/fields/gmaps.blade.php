<div class="form-group col-md-12">
    <div id="gmaps" class="gmaps" style="min-height: 300px;"></div>
</div>


{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script src="//maps.google.com/maps/api/js?libraries=places&key={{ env('GOOGLE_MAPS_KEY') }}" type="text/javascript"></script>
        <script src="/js/maps-google.js"></script>
        <script src="/js/locationpicker.jquery.js"></script>
        <script>
            $(document).ready(function () {

                //при изменении селекта отмечаем на карте и вставляем значение города в соответствующие поля
                $('.js-city-list').on('change', function (e) {
                    e.stopPropagation();
                    listenCounter = 0;
                    var choosenCity = $('.js-city-list option:selected').text();

                    $('.js-rus-city-name').val(choosenCity);
                    $('.js-en-city-name').val(choosenCity.translit());
                    $('.js-get-adress').val('г. ' + choosenCity);
                    pickAdress(choosenCity);
                });

                // по клику на ссылку отметить на карте отмечаем адрес на карте
                $('.js-set-adress-on-map').on('click', function (e) {
                    e.preventDefault();

                    var adress = $('.js-get-adress').val();
                    pickAdress(adress);

                    $('.js-rus-city-name').val('');
                    $('.js-en-city-name').val('');

                    //очистить селекты
//            $('.js-city-list option:selected').prop("selected", false)
                });

                //транслит
                String.prototype.translit = (function () {
                    var L = {
                            'А': 'A', 'а': 'a', 'Б': 'B', 'б': 'b', 'В': 'V', 'в': 'v', 'Г': 'G', 'г': 'g',
                            'Д': 'D', 'д': 'd', 'Е': 'E', 'е': 'e', 'Ё': 'Yo', 'ё': 'yo', 'Ж': 'Zh', 'ж': 'zh',
                            'З': 'Z', 'з': 'z', 'И': 'I', 'и': 'i', 'Й': 'Y', 'й': 'y', 'К': 'K', 'к': 'k',
                            'Л': 'L', 'л': 'l', 'М': 'M', 'м': 'm', 'Н': 'N', 'н': 'n', 'О': 'O', 'о': 'o',
                            'П': 'P', 'п': 'p', 'Р': 'R', 'р': 'r', 'С': 'S', 'с': 's', 'Т': 'T', 'т': 't',
                            'У': 'U', 'у': 'u', 'Ф': 'F', 'ф': 'f', 'Х': 'Kh', 'х': 'kh', 'Ц': 'Ts', 'ц': 'ts',
                            'Ч': 'Ch', 'ч': 'ch', 'Ш': 'Sh', 'ш': 'sh', 'Щ': 'Sch', 'щ': 'sch', 'Ъ': '"', 'ъ': '"',
                            'Ы': 'Y', 'ы': 'y', 'Ь': "'", 'ь': "'", 'Э': 'E', 'э': 'e', 'Ю': 'Yu', 'ю': 'yu',
                            'Я': 'Ya', 'я': 'ya'
                        },
                        r = '',
                        k;
                    for (k in L) r += k;
                    r = new RegExp('[' + r + ']', 'g');
                    k = function (a) {
                        return a in L ? L[a] : '';
                    };
                    return function () {
                        return this.replace(r, k);
                    };
                })();

                //по адресу рендерим карту
                function pickAdress(adress) {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({"address": adress }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var lat = results[0].geometry.location.lat(),
                                lng = results[0].geometry.location.lng(),
                                placeName = results[0].address_components[0].long_name,
                                latlng = new google.maps.LatLng(lat, lng);

                            $(".pac-container .pac-item:first").addClass("pac-selected");
                            $(".pac-container").css("display", "none");
                            $("#searchTextField").val(adress);
                            $(".pac-container").css("visibility", "hidden");

                            var newMap = {
                                latitude: lat,
                                longitude: lng,
                                placeName: placeName
                            };
                            renderLocationPicker($('#gmaps'), newMap);
                        } else {
                            alert('Ошибка! Такого адреса не существует, попробуйте ещё раз.')
                        }
                    });
                }

                function renderLocationPicker(obj, params) {
                    if (params) {
                        $('.js-latitude').val(params['latitude']);
                        $('.js-longitude').val(params['longitude']);
                        obj.locationpicker({
                            location: { latitude: params['latitude'], longitude: params['longitude'] },
                            radius: 300,
                            zoom: 12,
                            inputBinding: {
                                latitudeInput: $('#gmaps-latitude'),
                                longitudeInput: $('#gmaps-longitude'),
                                radiusInput: $('#radius'),
                                locationNameInput: $('#gmaps-city')
                            },
                            enableAutocomplete: false
                        });
                    }
                    else {
                        obj.locationpicker({
                            location: { latitude: $('#gmaps-latitude').val() || 55.75679196244, longitude: $('#gmaps-longitude').val() || 37.616269931738316 },
                            radius: 300,
                            zoom: 12,
                            inputBinding: {
                                latitudeInput: $('#gmaps-latitude'),
                                longitudeInput: $('#gmaps-longitude'),
                                radiusInput: $('#radius'),
                                locationNameInput: $('#gmaps-city')
                            },
                            enableAutocomplete: false
                        });
                    }
                }

                renderLocationPicker($('#gmaps'));

            });
        </script>
    @endpush

@endif
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
