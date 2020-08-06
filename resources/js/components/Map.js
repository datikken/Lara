/* eslint-disable */
class SimpleMap {
    constructor() {
        let that = this;
        if(document.querySelector('#map')) {
            window.onload = function () {
                that._simpleMap();
            }
        }
    }
    _simpleMap() {
            ymaps.ready(function () {
                var myMap = new ymaps.Map('map', {
                        center: [55.67967429999999, 37.6238394],
                        zoom: 17
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),
                    myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                        hintContent: 'Собственный значок метки',
                        balloonContent: 'Мы здесь!'
                    });
                myMap.geoObjects
                    .add(myPlacemark);
            });
    }
}


export default SimpleMap;
