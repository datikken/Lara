<div class="owl-wrapper" data-module="">
    <div class="owl-controls-heading">
        <div class="owl-controls-heading-item">Новинки</div>
    </div>

    <div class="owl-carousel owl-theme">
        @foreach ($products as $key=>$product)
            @include('components.owl.owl_card', $product)
        @endforeach
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function(){
        $(".owl-carousel").owlCarousel({
            nav: true,
            margin: 15,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
