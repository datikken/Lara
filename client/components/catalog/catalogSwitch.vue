<template>
    <div class="catalogSwitch">
        <div class="catalogSwitch_wrap">
            <div class="catalogSwitch_item" @click="rotateIcon">
                <span class="catalogSwitch_text">Сортировать</span>
                <div class="catalogSwitch_item catalogSwitch_arrow" data-sortDropdown_arrow></div>
            </div>

                <div class="sortDropdown as-none" data-sortDropdown>
                    <div class="sortDropdown_wrap">
                        <div class="sortDropdown_item" @click="filterProductsByPrice" data-filterAsc="true">
                            <div class="sortDropdown_text">По цене</div>
                            <div class="sortDropdown_icon">
                            </div>
                        </div>
                        <div class="sortDropdown_item"  @click="filterProductsByPrice" data-filterDesc="true">
                            <div class="sortDropdown_text">По цене</div>
                            <div class="sortDropdown_icon"></div>
                        </div>
                        <!--<div class="sortDropdown_item">-->
                            <!--<div class="sortDropdown_text">По популярности</div>-->
                            <!--<div class="sortDropdown_icon"></div>-->
                        <!--</div>-->
                        <!--<div class="sortDropdown_item">-->
                            <!--<div class="sortDropdown_text">По популярности</div>-->
                            <!--<div class="sortDropdown_icon"></div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>


            <svg class="catalogSwitch_item catalogSwitch_item-list" @click="switchCatalogGrid" data-grid="list" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.416504 1.01758H19.5832" stroke="#40404C" stroke-width="1.92" stroke-miterlimit="10"/>
                <path d="M0.416504 9H19.5832" stroke="#40404C" stroke-width="1.92" stroke-miterlimit="10"/>
                <path d="M0.416504 16.9824H19.5832" stroke="#40404C" stroke-width="1.92" stroke-miterlimit="10"/>
            </svg>
            <svg class="catalogSwitch_item catalogSwitch_item-grid catalogSwitch_item-active" @click="switchCatalogGrid" data-grid="grid" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.5915 1.25H8.4082V4.43333H11.5915V1.25Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M4.43333 1.25H1.25V4.43333H4.43333V1.25Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M18.7497 1.25H15.5664V4.43333H18.7497V1.25Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M11.5915 8.4082H8.4082V11.5915H11.5915V8.4082Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M4.43333 8.4082H1.25V11.5915H4.43333V8.4082Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M18.7497 8.4082H15.5664V11.5915H18.7497V8.4082Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M11.5915 15.5664H8.4082V18.7497H11.5915V15.5664Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M4.43333 15.5664H1.25V18.7497H4.43333V15.5664Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
                <path d="M18.7497 15.5664H15.5664V18.7497H18.7497V15.5664Z" stroke="black" stroke-width="1.91" stroke-miterlimit="10"/>
            </svg>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "catalogSwitch",
        data: function() {
            return {
                descending: true
            }
        },
        methods: {
            ...mapActions([
                'SWITCH_CATALOG_LAYOUT',
                'SEND_GOOGLE_ANALYTICS'
            ]),
            filterProductsByPrice(e) {
                if(e.currentTarget.dataset.filterdesc) {
                    this.$store.dispatch('PRICE_FILTER', 'desc');
                    this.descending = false;
                }

                if(e.currentTarget.dataset.filterasc) {
                    this.$store.dispatch('PRICE_FILTER', 'asc');
                    this.descending = true;
                }

                let gObj = {
                    category: 'filters',
                    eventAction: 'click',
                    eventLabel: 'price asc desc',
                    eventValue: this.descending
                };

                this.SEND_GOOGLE_ANALYTICS(gObj);

                this.rotateIcon();
            },
            rotateIcon() {
                let icon = this.$el.querySelector('[data-sortDropdown_arrow]');
                let dropdown = this.$el.querySelector('[data-sortDropdown]');
                    icon.classList.toggle('rotate180');
                    dropdown.classList.toggle('as-none');
            },
            switchCatalogGrid(e) {
                let type = e.currentTarget.dataset.grid;
                let svgs = this.$el.querySelectorAll('svg');
                let $class = 'catalogSwitch_item-active';

                svgs.forEach((svg) => {
                    svg.classList.remove($class);
                });

                e.currentTarget.classList.add($class);

                let resetClass = 'resetGrid';
                let grid = document.querySelector('.vue-ads-flex');

                if(grid.classList.contains(resetClass)) {
                    grid.classList.remove(resetClass);
                } else {
                    grid.classList.add(resetClass);
                }

                this.SWITCH_CATALOG_LAYOUT();

                let gObj = {
                    category: 'catalog grid',
                    eventAction: 'click',
                    eventLabel: 'catalog grid switched',
                    eventValue: type
                };

                this.SEND_GOOGLE_ANALYTICS(gObj);
            }
        }
    }
</script>
