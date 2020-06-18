/* eslint-disable */
class SimpleMap {
    constructor() {
        if(document.querySelector('#map')) {
            this._simpleMap();
        }
    }
    _simpleMap() {
            ymaps.ready(function () {
                var myMap = new ymaps.Map('map', {
                        center: [55.751574, 37.573856],
                        zoom: 9
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),
                    MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                    ),
                    myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                        hintContent: 'Собственный значок метки',
                        balloonContent: 'Это красивая метка'
                    }, {
                        iconLayout: 'default#image',
                        iconImageHref: 'images/myIcon.gif',
                        iconImageSize: [30, 42],
                        iconImageOffset: [-5, -38]
                    }),
                    myPlacemarkWithContent = new ymaps.Placemark([55.661574, 37.573856], {
                        hintContent: 'Собственный значок метки с контентом',
                        balloonContent: 'А эта — новогодняя',
                        iconContent: '12'
                    }, {
                        iconLayout: 'default#imageWithContent',
                        iconImageHref: 'images/ball.png',
                        iconImageSize: [48, 48],
                        iconImageOffset: [-24, -24],
                        iconContentOffset: [15, 15],
                        iconContentLayout: MyIconContentLayout
                    });

                myMap.geoObjects
                    .add(myPlacemark)
                    .add(myPlacemarkWithContent);
            });
    }
}


export default SimpleMap;
