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

                @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'применить'])

                <form action="" class="index_group">
                    <div class="index_heading">
                        <span class="index_heading-item">Или почтовый индекс</span>
                    </div>

                    <div class="form_group">
                        <label for="index" class="form_group-label">Индекс</label>
                        <div class="form_group-wrap">
                            <input type="text" name="index"/>
                            @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'применить'])
                        </div>
                    </div>
                </form>

              <div class="form_group address_group">
                    <label for="lastaddress" class="form_group-label">Ранее используемый пункт выдачи</label>
                    <input type="text" name="lastaddress"/>

                  <div class="btns_wrap">
                      <div class="form_group-btn active">
                          <span class="form_group-btn_item">Продолжить с этим адресом</span>
                      </div>
                      <div class="form_group-btn">
                          <span class="form_group-btn_item">Изменить адрес выдачи</span>
                      </div>
                  </div>
               </div>


                <div class="metro_form">
                    <div class="metro_group">
                        <div class="form_group">
                            <label for="metro" class="form_group-label">Выбрать ближайшее метро</label>
                            <input type="text" name="metro">
                        </div>

                        <div class="form_group">
                            <label for="station" class="form_group-label">Выбрать пункт выдачи</label>
                            <input type="text" name="station">
                        </div>
                    </div>
                    @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'Забрать из этого пункта'])
                </div>

                <div class="form_group map_group">
                    <div class="map_group-heading">
                        <span class="map_group-heading_item">Выбрать на карте</span>
                    </div>

                    <div class="map_group-map"></div>

                </div>
            </div>
         </div>

         <div class="dform_wrap-col">
            <div class="dform_wrap-col_item delivery_type">
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check')
                    <span>Самовывоз</span>
                </div>
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check')
                    <span>Доставка по Москве в пределах МКАД</span>
                </div>
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check')
                    <span>Доставка по Москве за МКАД</span>
                </div>
                <div class="delivery_type-item">
                    @include('components.checkbox.simple_check')
                    <span>Доставка почтой России</span>
                </div>
            </div>
         </div>
      </div>
   </div>

    @include('components.cart.order_list')
</div>

@endsection