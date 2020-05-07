<div class="mission">
    <div class="mission_wrap">
        <div class="mission_wrap-item">
            <div class="mission_wrap-item_decor">
                <div class="mission_wrap-item_decor-item"></div>
                <div class="mission_wrap-item_decor-item"></div>
                <div class="mission_wrap-item_decor-item"></div>
                <div class="mission_wrap-item_decor-item"></div>
            </div>
        </div>
        <div class="mission_wrap-item">
            <div class="mission_wrap-item_text">
                <p>
                    C 2009 года мы производим картриджи, фотобумагу и плёнку для принтеров,
                    многофункциональных устройств и факсов HP, Samsung, Canon, Xerox, Brother,
                    Kyocera, Epson, Panasonic, Sharp и Lexmark.
                </p>
            </div>

            <div class="mission_wrap-item_text">
                <p>
                    В наших картриджах используются дорогие японские американские,
                    южно-корейские комплектующие. На заводе внедрена система контроля качества.
                    Мы уверены в своих картриджах и даём на них гарантию.
                    Мы будем рады, если вы выберете продукцию Т2.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="about_hero">
    <div class="about_hero-wrap">
        <div class="about_hero-wrap_item">
            <img
                class="about_hero-wrap_item-img"
                src="/images/about/about_banner.png"
                alt="about_hero"
            />
        </div>
        <div class="about_hero-wrap_item">
            <div class="about_hero-wrap_item-top">
                <p class="about_hero-wrap_item-top_text">
                    C 2009 года мы производим картриджи,
                    фотобумагу и плёнку для принтеров,
                    многофункциональных устройств и факсов <strong> HP,
                        Samsung, Canon, Xerox, Brother,
                        Kyocera, Epson, Panasonic, Sharp и Lexmark.</strong>
                </p>
            </div>
            <div class="about_hero-wrap_item-bottom">
                <p class="about_hero-wrap_item-bottom_text">
                    В наших картриджах используются дорогие японские
                    американские, южно-корейские комплектующие.
                    На заводе внедрена система контроля качества.
                    Мы уверены в своих картриджах и даём на них гарантию.
                    Мы будем рады, если вы выберете продукцию Т2.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="navigator">
    <div class="navigator_wrap">
        <div class="navigator_wrap-items">
          <div class="desktop-hide">
            <div class="navigator_wrap-line"></div>
          </div>

          <div class="navigator_wrap-line descline">
            <div class="navigator_wrap-line_items">
                @foreach ($years as $year)
                    <span class="navigator_wrap-line_items-item">{{ $year }}</span>
                @endforeach
            </div>
          </div>
    </div>
</div>

@include('components.about.about_content', ['year' => 2017])
@include('components.about.about_content', ['year' => 2016])
