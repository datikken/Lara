@extends('layouts.dash')

@section('center')
   <div class="dfill">
       <div class="dfill_wrap">
           <div class="dfill_wrap-heading">
                <span>Для дальнейшего удобства заказа, рекомендуем вам заполнить аккаунт. Эти данные потребуются при формировании корзины.</span>
           </div>

            <div class="dfill_wrap-form_top">
                <div class="dfill_wrap-form_top-left">
                    <div class="dfill_wrap-form_top-left_inner" style="background-image: url('/images/dash/dash_avatar.svg')"></div>
                </div>
                <div class="dfill_wrap-form_top-right">
                    <form action="/" method="post">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Имя <span>*</span></label>
                            <div class="input_wrap">
                                <input type="text" class="form-control" name="name" placeholder="Имя" required>
                                <button class="form-group-btn">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Фамилия <span>*</span></label>
                            <div class="input_wrap">
                                <input type="text" class="form-control" name="lastname" placeholder="Фамилия" required>
                                <button class="form-group-btn">
                                     <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Телефон <span>*</span></label>

                            <div class="input_wrap">
                                <input type="text" class="form-control" name="tel" placeholder="Телефон" required>
                                <button class="form-group-btn">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Адрес электронной почты <span>*</span></label>
                            <div class="input_wrap">
                                <input type="text" class="form-control" name="email" placeholder="Адрес электронной почты" required>
                                <button class="form-group-btn">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </div>

                        {{--<button type="submit" name="submit" class="btn btn-primary">Submit</button>--}}

                    </form>
                </div>
            </div>
       </div>

       <a href="#">изменить пароль</a>

        <div class="dchange">
            <form action="/" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Действуйщий пароль <span>*</span></label>
                    <input type="text" class="form-control" name="password" placeholder="Имя" required>
                </div>

                <div class="form-group">
                    <label for="name">Новый пароль <span>*</span></label>
                    <input type="text" class="form-control" name="newpassword" placeholder="Имя" required>
                </div>

                <div class="form-group">
                    <label for="name">Подтвердите пароль <span>*</span></label>
                    <input type="text" class="form-control" name="dpassword" placeholder="Имя" required>
                </div>

                <button>
                    @include('components.btn.text_btn', [ 'class' => 'dchange_btn', 'text' => 'Сохранить изменения'])
                </button>
            </form>

            <div class="dchange_remind">
               <p>Поля отмеченые <span>*</span> обязательны к заполнению</p>
            </div>
        </div>
   </div>

@endsection
