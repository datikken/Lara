<div class="owl-wrapper">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <div class="owl-controls-heading">
        <div class="owl-controls-heading-item">Новинки</div>
    </div>

    <div class="owl-carousel owl-theme">
        @foreach ($products as $key=>$product)
            @include('components.owl.owl_card', $product)
        @endforeach
    </div>

    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            items: 4,
            autoWidth: true,
            margin: 15,
            // autoplay: true,
            // autoplayTimeout: 1500,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>

</div>
</div>
