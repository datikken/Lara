@extends('layouts.cartProducts')
@section('center')
<div class="dform_outer">
   <div class="dform">
       <div class="dform_head">
           <span class="dform_head-item">Воспользуйтесь помощником для выбора доступных вариантов доставки</span>
       </div>

      <div class="dform_wrap">
         <div class="dform_wrap-col">
            <div class="dform_wrap-col_item">

              <div class="form_group">
                 <span class="form_group-heading">Введите город, улицу и номер дома.</span>
              </div>

                <div class="index_group getSetAddress">
                    @csrf
                     <div class="form_group">
                         <label for="city" class="form_group-label">Город</label>
                         <input type="text" name="city"/>
                      </div>

                      <div class="form_group">
                         <label for="street" class="form_group-label">Улица</label>
                         <input type="text" name="street"/>
                      </div>

                      <div class="form_group inline_group">
                         <div class="label_wrap">
                            <label for="house" class="form_group-label">Дом</label>
                            <input type="text" name="house"/>
                         </div>

                         <div class="label_wrap">
                            <label for="body" class="form_group-label">Корпус</label>
                            <input type="text" name="body"/>
                         </div>

                         <div class="label_wrap">
                            <label for="building" class="form_group-label">Строение</label>
                            <input type="text" name="building"/>
                         </div>
                      </div>
                    <button type="submit" class="setAddressSubmit" data-url="{{ route('setAddress') }}">
                        @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn animated_btn', 'text' => 'применить'])
                    </button>
                </div>
           <div class="step_wrap invisible">
                <form action="{{ route('setIndex') }}" class="index_group" method="POST">
                    {{--@csrf--}}
                    <div class="index_heading">
                        <span class="index_heading-item">Или почтовый индекс</span>
                    </div>

                    <div class="form_group">
                        <label for="index" class="form_group-label">Индекс</label>
                        <div class="form_group-wrap">
                            <input type="text" name="index"/>
                            <button class="btn animated_btn" type="submit">
                                @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn animated_btn', 'text' => 'применить'])
                            </button>
                        </div>
                    </div>
                </form>

              <div class="form_group address_group">
                  {{--@csrf--}}
                    <label
                        for="lastaddress"
                        class="form_group-label">
                        Ранее используемый пункт выдачи
                    </label>
                    <input type="text" name="lastaddress" placeholder="Россия, Москва, ул. Академика Королева, д. 8, корпус 38, строение 98, подъезд 8, офис 787" />

                  <div class="btns_wrap">
                      <button class="form_group-btn active animated_btn">
                          <span class="form_group-btn_item">Продолжить с этим адресом</span>
                      </button>
                      <button class="form_group-btn">
                          <span class="form_group-btn_item animated_btn">Изменить адрес выдачи</span>
                      </button>
                  </div>
               </div>


                <form class="metro_form" method="POST" action="{{ route('setIssue') }}">
                    <div class="metro_group">
                        <div class="form_group metro_group_wrap">
                            <label for="metro" class="form_group-label">Выбрать ближайшее метро</label>
                            <input type="text" name="metro" value="" class="invisible" />

                            <div class="metro_group_wrap_list-wrap">
                                <span class="metro_group_wrap_list-wrap-heading">Введите ближайшее метро</span>
                                <div class="metro_group_wrap_list-wrap-icon" style="background-image: url('/images/icons/arrow_right.svg')"></div>
                                <ul>
                                    @foreach (Config::get('constants.STATIONS') as $station)
                                        <li>{{ $station }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="form_group">
                            <label for="station" class="form_group-label">Выбрать пункт выдачи</label>
                            <input type="text" name="station" style="display: none;">

                            <div class="postamat_list-wrap">
                                <span class="postamat_list-wrap-heading">Введите ближайшее метро</span>
                                <div class="postamat_list-wrap-icon" style="background-image: url('/images/icons/arrow_right.svg')"></div>
                                <ul>
                                    @foreach (Config::get('constants.POSTAMATS') as $station)
                                        <li>{{ $station }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>



                    </div>
                    @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'Забрать из этого пункта'])
                </form>

                <div class="form_group map_group">
                    <div class="map_group-heading">
                        <span class="map_group-heading_item">Выбрать на карте</span>
                    </div>

                    <div id="map" class="ymaps map_group-delivery"></div>
                    @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'Забрать с этого постамата'])

                </div>
            </div>
         </div>
         </div>

         <div class="dform_wrap-col">
            <div class="dform_wrap-col_item delivery_type" id="delivery_type">
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check', ['name' => 'selfpick'])
                    <span>Самовывоз</span>
                </div>
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check', ['name' => 'delivery'])
                    <span>Доставка по Москве в пределах МКАД</span>
                </div>
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check', ['name' => 'mkad'])
                    <span>Доставка по Москве за МКАД</span>
                </div>
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check', ['name' => 'post'])
                    <span>Доставка почтой России</span>
                </div>
            </div>
         </div>
      </div>
   </div>

    @include('components.cart.order_list')
    <script async="false" src="//api-maps.yandex.ru/2.1/?lang=ru_RU" id="scriptonload-__api_maps_yandex_ru_2_1__lang_ru_RU"></script>

</div>
@endsection
