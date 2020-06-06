@extends('layouts.dash')

@section('center')
   <div class="dfill">
       <div class="dfill_wrap">
           <div class="dfill_wrap-heading">
                <span>Для дальнейшего удобства заказа, рекомендуем вам заполнить аккаунт. Эти данные потребуются при формировании корзины.</span>
           </div>

            <div class="dfill_wrap-form_top">
                <div class="dfill_wrap-form_top-left">

                    <form action="/home/userAvatar" method="post" class="invisible" enctype="multipart/form-data">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        @endif

                        {{ csrf_field() }}

                        <input type="file" class="upload_file" name="img" id="img" required>
                        <button type="submit">send</button>
                    </form>

                    <div class="dfill_wrap-form_top-left_inner" style="background-image: url('/images/dash/dash_avatar.svg')"></div>

                </div>
                <div class="dfill_wrap-form_top-right">
                    <div class="dfill_wrap-form_top-right_inner">
                        <form class="form-group" enctype="multipart/form-data" action="/home/collectProfileData" method="post">

                            {{csrf_field()}}
                            <label for="name">Имя <span>*</span></label>
                            <div class="input_wrap">

                                <input type="text" class="form-control" name="name" placeholder="Имя" required>

                                <button class="form-group-btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group" enctype="multipart/form-data" action="/home/collectProfileData" method="post">

                            {{csrf_field()}}
                            <label for="name">Фамилия <span>*</span></label>
                            <div class="input_wrap">
                                <input type="text" class="form-control" name="lastname" placeholder="Фамилия" required>
                                <button class="form-group-btn" type="submit">
                                     <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group" enctype="multipart/form-data" action="/home/collectProfileData" method="post">

                            {{csrf_field()}}
                            <label for="name">Телефон <span>*</span></label>

                            <div class="input_wrap">
                                <input type="text" class="form-control" name="tel" placeholder="Телефон" required>
                                <button class="form-group-btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group" enctype="multipart/form-data" action="/home/collectProfileData" method="post">
                            {{csrf_field()}}

                            <label for="name">Адрес электронной почты <span>*</span></label>
                            <div class="input_wrap" data-required>
                                <input type="text" class="form-control" name="email" placeholder="Адрес электронной почты">
                                <button class="form-group-btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
       </div>

       <a class="dfill_change" href="#">изменить пароль</a>

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
