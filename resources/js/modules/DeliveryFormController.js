import $ from 'jquery';

class DeliveryFormController {
    constructor(form) {
        let addressForm = document.querySelector('.getSetAddress');
        if(form) {
            this._initMap(form);
            this._checkBoxes();
            this._listsHandler();
        }

        addressForm && this._setDeliveryAddress(addressForm);
    }
    _setDeliveryAddress(formEl) {
        const url = formEl.querySelector('[data-url]').getAttribute('data-url');
        const btn = formEl.querySelector('.setAddressSubmit');
        const _token = formEl.querySelector('[name="_token"]').getAttribute('value');
        const inputs = formEl.querySelectorAll('input');
        const delTypeBlock = document.querySelector('#delivery_type');
        const step = document.querySelector('.step_wrap');

        let dataObj = {};

        btn.addEventListener('click', function () {
            let delType = delTypeBlock.querySelector('[checked="true"]');
            if(!delType) {
                delTypeBlock.classList.add('deliveryTypeError');
                window.scrollTo(0, 0);
            }

            inputs.forEach((npt,i) => {
                if(i > 0) {
                    let name = npt.getAttribute('name');
                    let val = $(npt).val();

                    dataObj[name] = val;
                }
            });

             $.ajax({
                method: "GET",
                url: url,
                data: {
                    token: _token,
                    ...dataObj,
                    deliveryType: delType.getAttribute('name')
                },
                success: function () {
                    // console.log('Delivery address have been successfully set', data);
                    step.classList.remove('invisible');
                    window.scrollTo(0, 616);
                },
                error: function (error) {
                    console.warn('set delivery form error', error.responseJSON.message);
                }
            });
        })
    }

    _checkBoxes() {
        let block = document.querySelector('.delivery_type');
        let check = document.querySelectorAll('.delivery_type-item');
            function clear() {
                check.forEach((el) => {
                    let item = el.querySelector('img');

                    let checkbox = el.querySelector('[type="checkbox"]');
                        checkbox.removeAttribute('value');

                    if(item.classList.contains('display')) {
                            item.classList.remove('display')
                    }
                })
            }
            check.forEach((el) => {
                el.addEventListener('click', function() {
                    clear();

                    if(block.classList.contains('deliveryTypeError')) {
                        block.classList.remove('deliveryTypeError');
                    }
                });
            })
    }
    _initMap() {
        /* eslint-disable */

        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [55.751574, 37.573856],
                    zoom: 12
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                // Создаём макет содержимого.
                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                ),
                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    hintContent: 'Собственный значок метки',
                    balloonContent: 'Это красивая метка'
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#image',
                    // Своё изображение иконки метки.
                    iconImageHref: 'images/myIcon.gif',
                    // Размеры метки.
                    iconImageSize: [30, 42],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-5, -38]
                }),

                myPlacemarkWithContent = new ymaps.Placemark([55.661574, 37.573856], {
                    hintContent: 'Собственный значок метки с контентом',
                    balloonContent: 'А эта — новогодняя',
                    iconContent: '12'
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#imageWithContent',
                    // Своё изображение иконки метки.
                    iconImageHref: 'images/ball.png',
                    // Размеры метки.
                    iconImageSize: [48, 48],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-24, -24],
                    // Смещение слоя с содержимым относительно слоя с картинкой.
                    iconContentOffset: [15, 15],
                    // Макет содержимого.
                    iconContentLayout: MyIconContentLayout
                });

            myMap.geoObjects
                .add(myPlacemark)
                .add(myPlacemarkWithContent);
        });
    }

}

export default DeliveryFormController;
