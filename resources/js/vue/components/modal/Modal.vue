<template>
  <div id="modal-1" class="uk-flex-top" uk-modal>
    <div id="modal_content" class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
      <div class="prdet">
        <div class="prdet_wrap">
            <div class="prdet_close uk-modal-close"></div>
          <div class="prdet_wrap-item">
            <div class="prdet_wrap-item_img" v-if="singleProduct.params">
              <img
                class="prdet_wrap-item_img_inner"
                onerror="this.src = '/images/unnecessary/owl-swiper.svg';"
                v-if="singleProduct.params"
                :src="`../storage/product_images/${singleProduct.params.Бренд}/SMALL/${singleProduct.photo}.png`"
                alt
              />
            </div>
          </div>
          <div class="prdet_wrap-item">
            <div class="prdet_wrap-item-head"  v-if="singleProduct.params">
              <span class="prdet_wrap-item-head-item">{{ singleProduct.name }}</span>
            </div>
              <div class="prdet_wrap-item-desc"  v-if="singleProduct.params">
                  <span class="prdet_wrap-item-desc-item">{{ singleProduct.params.color }} тонер-картридж {{ singleProduct.artikul }} для принтеров и МФУ:</span>
              </div>

            <div class="prdet_wrap-item-icons" v-if="singleProduct.params">
              <div
                v-if="singleProduct.params.color === 'Черный'"
                class="prdet_wrap-item-icons-item"
                style="background-image: url('/images/product/drip.svg')"
              ></div>
              <div
                v-if="singleProduct.params.color === 'Трехцветный'"
                class="prdet_wrap-item-icons-item"
                style="background-image: url('/images/product/drip_gradient.svg')"
              ></div>

              <div
                v-if="singleProduct.params.color === 'Желтый'"
                class="prdet_wrap-item-icons-item"
              >
                <svg
                  class="details_wrap-info_item-icons_icon"
                  width="50"
                  height="50"
                  viewBox="0 0 50 50"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <circle cx="25" cy="25" r="24.5" stroke="#40404C" />
                  <path
                    d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                    fill="#40404C"
                  />
                  <path
                    d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z"
                    fill="#fdd935"
                    stroke="#fdd935"
                  />
                </svg>
              </div>
              <div
                v-if="singleProduct.params.color === 'Пурпурный'"
                class="prdet_wrap-item-icons-item">
                   <svg class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#ff54a4" stroke="#ff54a4"/>
                        </svg>
              </div>
              <div
                v-if="singleProduct.params.color === 'Голубой'"
                class="prdet_wrap-item-icons-item">
                      <svg class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#00b7f7" stroke="#00b7f7"/>
                        </svg>
              </div>
              <div
                v-if="singleProduct.params.color === 'Серый'"
                class="prdet_wrap-item-icons-item">
                   <svg class="details_wrap-info_item-icons_icon" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="25" cy="25" r="24.5" stroke="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#40404C"/>
                            <path d="M33.4286 30.094C33.4286 34.4604 29.7509 38 25.2143 38C20.6777 38 17 34.4604 17 30.094C17 25.7277 25.2143 13 25.2143 13C25.2143 13 33.4286 25.7277 33.4286 30.094Z" fill="#686866" stroke="#686866"/>
                        </svg>
                </div>

              <div
                v-if="singleProduct.params.chip"
                class="prdet_wrap-item-icons-item"
                style="background-image: url('/images/product/chip.svg')"
              ></div>
              <div
                v-if="singleProduct.params.new"
                class="prdet_wrap-item-icons-item"
                style="background-image: url('/images/product/new.svg')"
              ></div>
              <div
                v-if="singleProduct.params.STMC"
                class="prdet_wrap-item-icons-item"
                style="background-image: url('/images/product/stmc.svg')"
              ></div>
            </div>

            <div class="prdet_wrap-item-stuff">
              <span>Фотобарабан Mitsubishi Chemical Corporation, тонер Mitsubishi Chemical Corporation</span>
              <span>
                ОЕМ-номер:
                <b>CE285A.</b>
              </span>
              <span>
                <b  v-if="singleProduct.params"
                    class="prder_wrap-item-res">
                    {{ singleProduct.params.Ресурс }}
                </b> текстовых страниц <b>А4</b> согласно ASTM F1856/STMC для картриджей «Всё в одном»
              </span>
            </div>

            <div class="prdet_wrap-icons_ctas">
              <div class="prdet_wrap-icons_ctas-amount" v-if="singleProduct">
                <PriceBtn :price="singleProduct.price" />
              </div>
              <div class="prdet_wrap-icons_ctas-increase">
                <span class="prdet_wrap-icons_ctas-increase-text">Количество (шт)</span>
                <AmountBtn v-if="singleProduct" :id="singleProduct.id" quantity="1" />
              </div>
              <div class="prdet_wrap-icons_ctas-buy" v-if="singleProduct">
                <BuyBtn
                  text="в корзину"
                  class="text_buy-btn animated_btn uk-modal-close"
                  :id="singleProduct.id"
                />
              </div>
              <a class="prdet_wrap-icons_ctas-details" :href="`/product/${singleProduct.id}`">
                <TextBtn class="flat_btn" text="подробнее" />
              </a>
            </div>
          </div>
        </div>

        <div class="prdet_comp">
          <div class="prdet_comp-item">
            <span class="prdet_comp-item-head">Подходит</span>
          </div>

          <div class="prdet_comp-item">
            <div class="prdet_table">
              <div class="prdet_table_head">
                <div class="prdet_table_head_item">
                  <span>Марка</span>
                </div>
                <div class="prdet_table_head_item">
                  <span>Модель</span>
                </div>
              </div>

              <div class="prdet_table_item" v-for="(index, item) in singleProduct.cape">
                <div class="prdet_table_item_inner">
                  <span>{{ item }}</span>
                </div>
                <div class="prdet_table_item_inner">
                  <span>{{ index }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PriceBtn from "../btns/PriceBtn";
import BuyBtn from "../btns/BuyBtn";
import AmountBtn from "../btns/AmountBtn";
import TextBtn from "../btns/TextBtn";

export default {
  name: "Modal",
  components: {
    BuyBtn,
    PriceBtn,
    AmountBtn,
    TextBtn,
  },
  computed: {
    singleProduct() {
      let prod =  this.$store.state.singleProduct;
      // if(!prod.color) prod.color = 'black';
      //
      // let amount = document.querySelector('.cart_wrap-item_inner-table_row-col_btns-btn-items_quantity');
      //     amount.innerText = 1;
      //     amount.setAttribute('data-modal-val', 1);

      return prod;
    },
  },
  methods: {
      _fillData(prod) {
          let res = this.$el.querySelector('.prder_wrap-item-res');
              res.innerText = prod.params;
      }
  }
};
</script>

<style scoped>
    .prdet_close {
        background-image: url('/images/icons/prdet_close.svg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: absolute;
        top: 30px;
        right: 20px;
        width: 12px;
        height: 12px;
        cursor: pointer;
    }
</style>
