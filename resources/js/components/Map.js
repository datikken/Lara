class SimpleMap {
    _simpleMap(maps) {
        console.warn(maps);

        ymaps.ready(function () {
            $(maps).each(function (i, el) {
                let placeMark,
                    myMap,
                    yProjects;

                yProjects = [];

                myMap = new ymaps.Map(el, {
                    center: ['50', '39'],
                    zoom: 12,
                    type: 'yandex#map',
                    behaviors: [
                        'default',
                        'scrollZoom'
                    ]
                });

                // myMap.balloon.open([el.dataset.lat, el.dataset.lng], {
                //     contentHeader: el.dataset.desc,
                //     contentBody: '',
                //     contentFooter: el.dataset.adress,
                // }, {
                //     closeButton: false
                // });

                // placeMark = new ymaps.Placemark([el.dataset.lat,el.dataset.lng], {
                //     balloonContent: el.dataset.ballon,
                //     balloonCloseButton: true,
                //     hideIconOnBalloonOpen: true
                // }, {
                //     preset: 'islands#circleDotIcon',
                //     iconColor: '#333'
                // });
                //
                // myMap.geoObjects.add(placeMark);
            });
        });
    }
}


export default SimpleMap;