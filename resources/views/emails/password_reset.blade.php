<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <style>
        .email_header {
            display: block;
            height: 40px;
            background: #FDD935;
        }

        .email_header_logo {
            height: 20px;
            width: 20px;
            padding: 10px 0 0 20px;
            float: left;
        }

        .email_header_alogo {
            height: 20px;
            width: 35px;
            padding: 10px 50px 0 0;
            float: right;
        }

        .email_header p {
            float: left;
            margin: 0;
            font-size: 12px;
            line-height: 20px;
            color: #292930;
            padding: 10px 0 0 10px;
        }
        .main_btn {
            display: block;
            margin-bottom: 10px;
            width: 240px;
            height: 40px;
            background: #40404C;
            border-radius: 30px;
            color: white;
            display: table-cell;
            vertical-align: middle;
            text-decoration: none;
            font-size: 12px;
            line-height: 20px;
            text-transform: uppercase;
        }

        .main_heading {
            text-align: center;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 18px;
            text-align: center;
            text-indent: 10px;
            text-transform: uppercase;
            color: #292930;
            padding-top: 15px;
            display: block;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .main_description {
            font-style: normal;
            font-weight: 300;
            font-size: 12px;
            line-height: 18px;
            text-align: left;
            text-indent: 10px;
            color: #292930;
            padding: 0 50px 15px;
            display: block;
            text-indent: inherit;
        }
        .main_description_item {
            display: block;
            padding: 0 0 10px 0;
        }

        .footer_item_right {
            font-style: normal;
            font-weight: normal;
            font-size: 12px;
            line-height: 20px;
            letter-spacing: 0.02em;
        }

        .main_content {
            padding-bottom: 19px;
            width: 100%;
            max-width: 500px;
            min-width: 300px;
            margin: 0 auto;
            background-image: url("{{URL::to('/')}}/images/emails/email_bg1.png");
            background-size: cover;
            background-repeat: no-repeat;
            margin-top: 20px;
        }

        .colors {
            padding: 54px 0 0 57px;
        }
        .colors_a, .colors_b, .colors_c, .colors_d, .colors_e {
            width: 25px;
            height: 25px;
            border-radius: 30px;
            display: block;
            float: left;
            margin-right: 12px;
        }
        .colors_a {
            background-color: #FFCC33;
        }
        .colors_b {
            background-color: #14B6E7;
        }
        .colors_c {
            background-color: #FF9933;
        }
        .colors_d {
            background-color: #FF3399;
        }
        .colors_e {
            background-color: #66CCCC;
        }
        .footer_link a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body style="padding:0; margin:0;">
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#f6f6f6" style="width:100%; min-width:320px;">
    <tr align="center">
        <td valign="top" align="center" style="padding:0 10px;">
            <table border="0" cellpadding="0" cellspacing="0" style="width:100%; max-width:600px; min-width:300px;background: #fff;">
                <!-- LOGO -->
                <tr>
                    <td valign="top">
                        <a class="email_header">
                            <img class="email_header_logo" src="{{URL::to('/')}}/images/emails/reset_header_logo.png" alt="order_logo" />
                            <p>Подтверждение пароля</p>
                            <img class="email_header_alogo" src="{{URL::to('/')}}/images/emails/t2.png" alt="T2"/>
                        </a>
                    </td>
                </tr>
                <!--/ LOGO -->
                <!-- BODY -->
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" class="main_content">
                            <!-- TEXT -->
                            <tr>
                                <td>
                                    <span class="main_heading">Здравствуйте!</span>
                                    <span class="main_description">
                                     <span class="main_description_item">
                                         Мы получили запрос на восстановление доступа к вашей учётной записи RECART.me, которая привязана к почте {{ $data['email'] }}
                                     </span>
                                        <span class="main_description_item">
                                         Если это были вы, перейдите по ссылке, которая будет активна до
                                            <?
                                                $helper = new \App\Includes\HelperDate();
                                                echo $helper->getTommorrowWithMonth();
                                            ?> <a
                                                href="{{ $data['link'] }}"> {{ $data['link'] }} </a>
                                        </span>
                                        <span class="main_description_item">
                                            Если ссылка не работает, то скопируйте ее и откройте через адресную строку браузера.
                                        </span>
                                        <span class="main_description_item">
                                            Если вы не запрашивали изменение пароля, проигнорируйте это письмо.
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <!--/ TEXT -->
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;" class="second_block">
                            <div style="width: 100%;height: 150px; background-color: #292930;">
                                <div class="colors">
                                    <span class="colors_a"></span>
                                    <span class="colors_b"></span>
                                    <span class="colors_c"></span>
                                    <span class="colors_d"></span>
                                    <span class="colors_e"></span>
                                </div>
                                <div class="yellow_logo" style="float:right;width: 50px; padding-right: 56px; cursor: pointer;">
                                    <img src="{{URL::to('/')}}/images/emails/colors_logo.png" alt="logo">
                                </div>
                            </div>
                            <div style="background-image: url({{ URL::to('/')}}/images/emails/email_bg2.png);height: 111px;background-position: center;background-size: contain;background-repeat: no-repeat;text-align: center;" alt="">
                                <div class="socials" style="padding-top: 45px;">
                                    <img src="{{URL::to('/')}}/images/emails/social_facebook.png" style="margin-right: 35px;cursor: pointer">
                                    <img src="{{URL::to('/')}}/images/emails/social_instagram.png" style="margin-right: 35px;">
                                    <img src="{{URL::to('/')}}/images/emails/social_emails.png">
                                </div>
                            </div>
                        </table>
                    </td>
                </tr>
                <!-- BODY -->

                <!-- FOOTER -->
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;max-width: 600px;min-height: 500px;background-repeat: no-repeat;min-width: 300px;color: #fff;background-image: url({{URL::to('/')}}/images/emails/footer_iphone.png)">
                    <tr>
                        <td class="footer_item" style="display: block;padding: 25px 50px 0 50px;">
                            <div class="footer_item_left" style="height: 65px;float:left;">
                                <img src="{{URL::to('/')}}/images/emails/footer_location.png" alt="phone" style="float: left;padding-right: 10px;"/>
                            </div>
                            <div class="footer_item_right" style="float:left; display: contents;">
                                <span style="padding-bottom: 10px; display: block;">АДРЕС:</span>
                                <span>115230 Россия, Москва, Варшавское шоссе, дом, 36, строение 8, 2-й подъезд, этаж 2, офис 1578</span>
                            </div>
                        </td>
                        <td class="footer_item" style="display: block;padding: 0;padding: 10px 50px;">
                            <div class="footer_item_left" style="height: 65px;float:left;">
                                <img src="{{URL::to('/')}}/images/emails/footer_phone.png" alt="phone" style="float: left;padding-right: 10px;">
                            </div>
                            <div class="footer_item_right" style="float:left; display: contents;">
                                <span style="padding-bottom: 5px; display: block;">КОНТАКТЫ:</span>
                                <div class="footer_item_contacts">
                                    <div class="footer_item_contacts_left" style="float:left;">
                                        <img src="{{URL::to('/')}}/images/emails/footer_tel.png" alt="" style="float:left;padding-top: 1px;">
                                        <a href="tel:88005556633" style="padding-left: 18px;padding-bottom: 5px;color: white; text-decoration: none;">+7 (800) 555-66-33</a>
                                    </div>
                                    <div class="footer_item_contacts_right" style="float:left;padding-left: 40px;">
                                        <img src="{{URL::to('/')}}/images/emails/footer_mail.png" alt="" style="float:left;padding-top: 5px;">
                                        <span  style="padding-left: 18px;padding-bottom: 5px;color: white;text-decoration: none;" class="footer_link">support@recart.me</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td style="float: left; width: 100%;padding: 31px 0 14px 135px;">
                            <a href="#" style="color: black;font-size: 12px;height: 14px; cursor: pointer;text-decoration: none;">Политика конфиденциальности</a>
                        </td>

                        <td style="float: left;width: 100%;">
                            <a href="#" style="color: black;padding-left: 135px;font-size: 12px;line-height: 14px;cursor:pointer;text-decoration: none;">Платежные системы</a>
                        </td>

                    </tr>
                </table>
                <!-- FOOTER -->
                </td>

                </tr>
            </table>
</table>
</body>
<html>
