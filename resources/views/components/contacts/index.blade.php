<div class="contacts">
    <div class="contacts_wrap">

        <div class="contacts_column">
            <div class="contacts_column-inner">
                <div class="contacts_wrap-inner">

                    <div class="contacts_wrap-item">
                        <div class="contacts_wrap-item_inner">
                            <div class="contacts_wrap-item_inner-location">
                                <img src='/images/icons/location.svg' alt="Location"/>
                            </div>
                        </div>
                        <div class="contacts_wrap-item_inner">
                            <div class="contacts_wrap-item_inner-item">
                                <span class="contacts_wrap-item_inner-item-text">Адрес:</span>
                            </div>
                            <div class="contacts_wrap-item_inner-item">
                                <span class="contacts_wrap-item_inner-item-desc">
                                    115230 Россия, Москва, Варшавское шоссе, дом, 36, строение 8, 2-й подъезд, этаж 2, офис 1578
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="contacts_wrap-item">
                        <div class="contacts_wrap-item_inner">
                            <div class="contacts_wrap-item_inner-contacts">
                                <img src='/images/header/contact.svg' alt="Contacts"/>
                            </div>
                        </div>
                        <div class="contacts_wrap-item_inner">
                            <div class="contacts_wrap-item_inner-item">
                                <span class="contacts_wrap-item_inner-item-text">Контакты</span>
                            </div>
                            <div class="contacts_wrap-item_inner-item">
                                <span class="contacts_wrap-item_inner-item-tel">
                                    +7 (495) 775-50-53
                                </span>
                                <span class="contacts_wrap-item_inner-item-mail">
                                kakayto_pochta@domen.com
                        </span>
                            </div>
                            <div class="contacts_wrap-item_socials">
                                <div class="contacts_wrap-item_socials-item">
                                    <div class="telegram">
                                        <img src='/images/icons/telegram.svg' alt="Telegram"/>
                                    </div>
                                </div>
                                <div class="contacts_wrap-item_socials-item">
                                    <div class="facebook">
                                        <img src='/images/icons/facebook.svg' alt="Facebook"/>
                                    </div>
                                </div>
                                <div class="contacts_wrap-item_socials-item">
                                    <div class="vk">
                                        <img src='/images/icons/vk.svg' alt="VK"/>
                                    </div>
                                </div>
                                <div class="contacts_wrap-item_socials-item">
                                    <div class="insta">
                                        <img src='/images/icons/instagram.svg' alt="Instagramm"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="desktop-hide">
                    @include('components.contacts.timing')
                </div>

                <div class="contacts_wrap-item contacts_feedback">
                    <div class="contacts_wrap-item_inner">
                        <div class="contacts_wrap-item_inner-feedback">
                            <img src="/images/icons/feedback.svg"} alt="feedback" />
                        </div>
                    </div>
                    <div class="contacts_wrap-item_inner">

                        <div class="contacts_wrap-item_inner-item">
                            <span class="contacts_wrap-item_inner-item-text">Обратная связь</span>
                        </div>

                        <div class="contacts_wrap-item_inner-item">
                            <div class="contacts_wrap-item_inner-item_form">

                                <div class="contacts_wrap-item_inner-inputs-wrap">

                                    <div class="contacts_wrap-item_inner-item_form_control-input">
                                        <label htmlfor="feedback[name]" class="contacts_wrap-item_inner-item_form_control-input-label">Имя</label>
                                        <input type="text" name="feedback[name]" placeholder="Имя"/>
                                    </div>

                                    <div class="contacts_wrap-item_inner-item_form_control-input">
                                        <label htmlfor="feedback[lastname]"  class="contacts_wrap-item_inner-item_form_control-input-label">Фамилия</label>
                                        <input type="text" name="feedback[lastname]" placeholder="Фамилия"/>
                                    </div>
                                </div>

                                <div class="contacts_wrap-item_inner-item_form_control-heading">
                                    <span class="contacts_wrap-item_inner-item_form_control-input-label">Тема обращения</span>
                                </div>

                                <div class="contacts_wrap-item_inner-item_form_control-options">
                                    <div class="contacts_wrap-item_inner-item_form_control-options_item">
                                        <span>Пожелания</span>
                                    </div>
                                    <div class="contacts_wrap-item_inner-item_form_control-options_item">
                                        <span>Вопрос</span>
                                    </div>
                                    <div class="contacts_wrap-item_inner-item_form_control-options_item">
                                        <span>Претензия</span>
                                    </div>
                                </div>

                                <div class="contacts_wrap-item_inner-item_form_control-input">
                                    <div class="contacts_wrap-item_inner-item_form_control-input_textarea">
                                <textarea type="text" name="feedback[text]"
                                          placeholder="Напишите свое обращения"></textarea>
                                    </div>
                                </div>

                                <div class="contacts_wrap-item_inner-item_form_control-submit">
                                    <div class="contacts_wrap-item_inner-item_form_control-submit_btn">
                                        <span>
                                            Отправить
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mobile-hide">
                @include('components.contacts.timing')
            </div>

        </div>
    </div>
</div>