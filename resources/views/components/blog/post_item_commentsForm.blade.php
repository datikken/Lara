<div class="blogCom" data-blogCommentsForm>
    <div class="blogCom_wrap">
        <div class="blogCom_head">
            <p class="blogCom_head-item">оставить комментарий</p>
        </div>

        <div class="blogCom_inputs">
            <div class="blogCom_group">
                <label for="name">Имя <span>*</span></label>
                <input type="name">
            </div>
            <div class="blogCom_group">
                <label for="name">Почтовый адрес</label>
                <input type="email">
            </div>
        </div>

        <div class="blogCom_area">
            <label for="message">Комментарий</label>
            <textarea name="message" id="" cols="30" rows="10" placeholder="Напишите свой комментарий"></textarea>
        </div>

        @include('components.btn.text_btn', [ 'class' => 'action_btn', 'text' => 'отправить'])

    </div>
</div>