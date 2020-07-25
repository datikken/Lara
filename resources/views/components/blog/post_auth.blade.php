<div class="postItem_auth">
    <div class="postItem_auth_login">
        <form action="/login">
            <div class="form_group">
                <span class="postItem_login_head">Чтобы оставить комментарий войдите в систему</span>
            </div>

            <div class="form_group">
                <label for="login" class="form_group_label">Логин</label>
                <input type="text" name="login" placeholder="Введите логин">
            </div>

            <div class="form_group">
                <label for="password" class="form_group_label">Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">
            </div>

            <div class="form_group btn_group">
                @include('components.btn.text_btn', [ 'class' => 'animated_btn', 'text' => 'Войти'])
            </div>
        </form>
    </div>

    <div class="postItem_auth_register">
        <form action="/register">
            <div class="form_group">
                <span class="postItem_login_head">Или зарегистрируйтесь</span>
            </div>

            <div class="form_group">
                <label for="login" class="form_group_label">Логин</label>
                <input type="text" name="login" placeholder="Введите логин">
            </div>

            <div class="form_group">
                <label for="password" class="form_group_label">Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">
            </div>

            <div class="form_group">
                <label for="password" class="form_group_label">Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">
            </div>

            <div class="form_group btn_group">
                @include('components.btn.text_btn', [ 'class' => '', 'text' => 'Регистрация'])
            </div>
        </form>
    </div>
</div>
