@extends('layouts.cartProducts')

@section('center')
   <div class="dform">
      <div class="dform_wrap">
         <div class="dform_wrap-head">
            <span class="dform_wrap_head-item">Воспользуйтесь помощником для выбора доступных вариантов доставки</span>
         </div>

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

              <div class="form_group">
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
                  @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'применить'])
              </div>

              <div class="form_group">
                    <label for="lastaddress">Ранее используемый пункт выдачи</label>
                    <input type="text" name="lastaddress"/>

                    <div class="form_group-btn">
                        <span class="form_group-btn_item">Продолжить с этим адресом</span>
                    </div>
                    <div class="form_group-btn">
                        <span class="form_group-btn_item">Изменить адрес выдачи</span>
                    </div>
               </div>

                <div class="metro_group">
                    <div class="form_group">
                        <label for="metro">Выбрать ближайшее метро</label>
                        <input type="text" name="metro">
                    </div>

                    <div class="form_group">
                        <label for="station">Выбрать пункт выдачи</label>
                        <input type="text" name="station">
                    </div>
                    @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'Забрать из этого пункта'])
                </div>

                <div class="form_group map_group">
                    <div class="map_group-heading">
                        <span class="map_group-heading_item">Выбрать на карте</span>
                    </div>

                    <div class="map_group-map">

                    </div>

                    @include('components.btn.text_btn', [ 'class' => 'form_group-btn flat_btn', 'text' => 'Забрать с этого постамата'])

                </div>
            </div>
         </div>

         <div class="dform_wrap-col">
            <div class="dform_wrap-col_item"></div>
         </div>

      </div>
   </div>
   @include('components.cart.order_list')

@endsection