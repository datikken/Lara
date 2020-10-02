@extends('layouts.dash')

{{--@php--}}
    {{--dump(isset($user->name));--}}
    {{--dump($user->lastname);--}}
    {{--dump($user->tel);--}}
    {{--dump($user->email);--}}
{{--@endphp--}}

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

                    <? if($user_avatar) { ?>
                        <div class="dfill_wrap-form_top-left_inner" style="background-image: url('{{Storage::disk('local')->url('user_avatars/' . $user_avatar )}}')"></div>
                    <? } else { ?>
                        <div class="dfill_wrap-form_top-left_inner" style="background-image: url('/images/dash/dash_avatar.svg')"></div>
                    <? }?>

                </div>
                <div class="dfill_wrap-form_top-right">
                    <div class="dfill_wrap-form_top-right_inner">
                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">

                            {{csrf_field()}}
                            <label for="name">Имя <span>*</span></label>
                            <div class="input_wrap">

                                <input type="text" class="form-control" name="name" placeholder="Имя" required value="<?if(isset($user->name)) { echo $user->name; } ?>">

                                <button class="form-group-btn animated_btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">

                            {{csrf_field()}}
                            <label for="name">Фамилия <span>*</span></label>
                            <div class="input_wrap">
                                <input type="text" class="form-control" name="lastname" placeholder="Фамилия" required value="<?if(isset($user->lastname)) { echo $user->lastname; } ?>">
                                <button class="form-group-btn animated_btn" type="submit">
                                     <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">

                            {{csrf_field()}}
                            <label for="name">Телефон <span>*</span></label>

                            <div class="input_wrap">
                                <input type="number" class="form-control" name="tel" placeholder="Телефон" required value="<?if(isset($user->tel)) { echo $user->tel; } ?>">
                                <button class="form-group-btn animated_btn" type="submit">
                                    <span>
                                        изменить
                                    </span>
                                </button>
                            </div>
                        </form>

                        <form class="form-group one_input_form" enctype="multipart/form-data" action="/home/collectProfileData" method="get">
                            {{csrf_field()}}

                            <label for="name">Адрес электронной почты <span>*</span></label>
                            <div class="input_wrap" data-required>
                                <input type="text" class="form-control" name="email" placeholder="Адрес электронной почты" value="<?if(isset($user->email)) { echo $user->email; } ?>">
                                <button class="form-group-btn animated_btn" type="submit">
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
            <form action="{{ route('StoreNewPassword') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group input_wrap">
                    <label for="name">Действуйщий пароль<span>*</span></label>
                    <input id="password" type="password" class="form-control" name="current_password" autocomplete="off">
                </div>

                <div class="form-group input_wrap">
                    <label for="name">Новый пароль<span>*</span></label>
                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="off">
                </div>

                <div class="form-group input_wrap">
                    <label for="name">Подтвердите новый пароль<span>*</span></label>
                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                </div>

                @include('components.btn.text_btn', [ 'class' => 'dchange_btn animated_btn action_btn', 'text' => 'Сохранить изменения'])

            </form>

            <div class="dchange_remind">
               <p>Поля отмеченые <span>*</span> обязательны к заполнению</p>
            </div>
        </div>
   </div>
@endsection

