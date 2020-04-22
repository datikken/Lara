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
                    <form action="/" action="post">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Имя <span>*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Имя" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Фамилия <span>*</span></label>
                            <input type="text" class="form-control" name="lastname" placeholder="Фамилия" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Телефон <span>*</span></label>
                            <input type="text" class="form-control" name="tel" placeholder="Телефон" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Адрес электронной почты <span>*</span></label>
                            <input type="text" class="form-control" name="email" placeholder="Адрес электронной почты" required>
                        </div>

                        {{--<button type="submit" name="submit" class="btn btn-primary">Submit</button>--}}

                    </form>
                </div>
            </div>

       </div>
   </div>

@endsection
