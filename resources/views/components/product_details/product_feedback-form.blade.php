<div class="pfeedback <? if(isset($class)) { echo $class; } ?>">
    @include('components.product_details.product_feedback-item', ['feedbacks' => $product['feedback']])

    <div class="pfeedback_wrap">
        <form action="/productFeedback" method="get">
            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_head">
                    <h2>Написать отзыв</h2>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_desc">
                    <p>Спасибо, что делитесь опытом! Ваш отзыв поможет кому-то сделать выбор.</p>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_inputs">
                    <div class="pfeedback_wrap-item_inputs-wrap">
                        <label for="name">Имя <span>*</span></label>
                        <input type="text" name="name" />
                    </div>
                    <div class="pfeedback_wrap-item_inputs-wrap">
                        <label for="email">Почтовый адрес</label>
                        <input type="text" name="email" />
                    </div>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item-desc">
                    <p>Порекомендовали бы этот товар?</p>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                @include('components.checkbox.round_check', ['name' => 'recommendation', 'data' => 'yes'])
                <span>Да</span>
            </div>

            <div class="pfeedback_wrap-item pfeedback_features">
                <div class="pfeedback_wrap-item_inputs-wrap">
                    <label for="email">Плюсы</label>
                    <input type="text" name="features" placeholder="Преимущества" disabled/>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                @include('components.checkbox.round_check', ['name' => 'recommendation', 'data' => 'no'])
                <span>Нет</span>
            </div>

            <div class="pfeedback_wrap-item pfeedback_minuses">
                <div class="pfeedback_wrap-item_inputs-wrap">
                    <label for="email">Минусы</label>
                    <input type="text" name="minuses" placeholder="Недостатки" disabled></input>
                </div>
            </div>

            <div class="pfeedback_wrap-item">
                <div class="pfeedback_wrap-item_inputs-wrap">
                    <label for="email">Отзыв</label>
                    <textarea type="text" name="feedback" placeholder="Опишите свое впечатление, опыт. Что понравилось или наоборот."></textarea>
                </div>
            </div>

            <input type="text" name="product_id" class="invisible" value="{{ $product['id'] }}">

            @include('components.btn.text_btn', [ 'class' => 'cfeedback_wrap-row_btn animated_btn', 'text' => 'Отправить'])

        </form>

    </div>
</div>
