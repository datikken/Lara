<template>

    <div class="left_column">
        <Filters />
        <Viewed />
    </div>

</template>

<script>
    import ResizeObserver from '../../../../js/functions/ResizeObserver';
    import utils from '../../../../js/functions/utils';
    import Filters from '../filters/Filters';
    import Viewed from '../viewed/Viewed';

    export default {
        name: "LeftColumn",
        components: {
            Filters,
            Viewed
        },
        created: {
            // /**
            //  * Пересчитывает абсолютные значения отступов обертки и контейнера
            //  * Вызывать при изменении геометрии смежных блоков (например, размеров баннера)
            //  */
            // init() {
            //     this.scrollDelta = 0;
            //     this.scrollPosition = window.pageYOffset;
            //     this.scrollDirection = null;
            //
            //     this._setTopShift(0);
            //     this._setState(states.SCROLL);
            // },
            //
            // _checkState() {
            //     let a = getAbsoluteTopPosition(this.stickyWrapper);
            //
            //     if(a > window.pageYOffset) {
            //
            //         this.stickyContainer.classList.remove('__fixed-top');
            //     }
            // },
            //
            // render() {
            //     const scrollPosition = window.pageYOffset;
            //     const viewportHeight = window.innerHeight;
            //     const viewportHeightWithoutToolbar =
            //         viewportHeight - this.fixedTopThreshold;
            //
            //     const mainColumnObject = this.mainContentColumn.getBoundingClientRect();
            //     const rectObject = this.stickyContainer.getBoundingClientRect();
            //     const mainColumnHeight = mainColumnObject.height;
            //     const stickyHeight = rectObject.height;
            //     const wrapperAbsoluteTop = getAbsoluteTopPosition(this.stickyWrapper);
            //
            //     // Панель не меньше высоты документа
            //     if (
            //         document.documentElement.scrollHeight <=
            //         wrapperAbsoluteTop + stickyHeight
            //     ) {
            //         this.init();
            //         return;
            //     }
            //
            //     // если залипающий блок выше основного контента, то и залипать не надо
            //     if (stickyHeight > mainColumnHeight) {
            //         this.init();
            //         return;
            //     }
            //
            //     const isFooterReached = mainColumnObject.bottom - viewportHeight < 0;
            //
            //     if (stickyHeight <= viewportHeightWithoutToolbar) {
            //         // Стики-панель меньше вьюпорта
            //         if (scrollPosition > wrapperAbsoluteTop - this.fixedTopThreshold) {
            //             if (this.scrollDirection === scrollState.UP) {
            //                 if (this.state === states.SCROLL) {
            //                     if (rectObject.top < this.fixedTopThreshold) {
            //                         this._setTopShift(mainColumnHeight - stickyHeight - GAP);
            //                         this._setState(states.SCROLL);
            //                     } else {
            //                         this._setState(states.TOP);
            //                     }
            //                 }
            //             } else if (this.scrollDirection === scrollState.DOWN) {
            //                 switch (this.state) {
            //                     case states.TOP:
            //                         if (isFooterReached) {
            //                             this._setTopShift(mainColumnHeight - stickyHeight - GAP);
            //                             this._setState(states.SCROLL);
            //                         } else {
            //                             this._setState(states.TOP);
            //                         }
            //                         break;
            //                     case states.SCROLL:
            //                         if (!isFooterReached) {
            //                             this._setState(states.TOP);
            //                         }
            //                         break;
            //                 }
            //             }
            //         } else {
            //             this.init();
            //         }
            //     } else {
            //         // Стики-панель больше вьюпорта
            //
            //         if (this.scrollDirection === scrollState.UP) {
            //             // не выше, чем обертка
            //             if (wrapperAbsoluteTop - this.fixedTopThreshold > scrollPosition) {
            //                 this.init();
            //                 return;
            //             }
            //
            //             switch (this.state) {
            //                 case states.SCROLL:
            //                     if (rectObject.top > this.fixedTopThreshold) {
            //                         this._setState(states.TOP);
            //                     }
            //                     break;
            //                 case states.BOTTOM:
            //                     // this.scrollDelta - учитываем, что скролл уже произошел
            //                     this._setTopShift(
            //                         scrollPosition +
            //                         rectObject.top -
            //                         wrapperAbsoluteTop -
            //                         this.scrollDelta
            //                     );
            //                     this._setState(states.SCROLL);
            //                     break;
            //             }
            //         }
            //
            //         if (this.scrollDirection === scrollState.DOWN) {
            //             switch (this.state) {
            //                 case states.TOP:
            //                     this._setTopShift(
            //                         scrollPosition + rectObject.top - wrapperAbsoluteTop
            //                     );
            //                     this._setState(states.SCROLL);
            //                     break;
            //                 case states.SCROLL:
            //                     // не ниже нижней границы вьюпорта
            //                     if (!isFooterReached && rectObject.bottom <= viewportHeight) {
            //                         this._setState(states.BOTTOM);
            //                     }
            //                     break;
            //                 case states.BOTTOM:
            //                     if (isFooterReached) {
            //                         this._setTopShift(mainColumnHeight - stickyHeight - GAP);
            //                         this._setState(states.SCROLL);
            //                     }
            //                     break;
            //             }
            //         }
            //
            //         // Загрузка произошла, позиция скролла фактически ненулевая, а события на скролл не случилось
            //         // (Хром пытается сохранить предыдущую позицию скролла, если загрузка достаточно быстра)
            //         if (this.scrollDirection === null && this.topShift === 0) {
            //             if (isFooterReached) {
            //                 this._setTopShift(mainColumnHeight - stickyHeight - GAP);
            //                 this._setState(states.SCROLL);
            //                 return;
            //             }
            //
            //             if (scrollPosition > wrapperAbsoluteTop - this.fixedTopThreshold) {
            //                 this._setState(states.TOP);
            //             }
            //         }
            //     }
            // },
            // _onScroll() {
            //     const position = window.pageYOffset;
            //     if (position === this.scrollPosition) {
            //         return;
            //     }
            //
            //     this.scrollDelta = position - this.scrollPosition;
            //     this.scrollDirection =
            //         this.scrollDelta > 0 ? scrollState.DOWN : scrollState.UP;
            //
            //     this.scrollPosition = position;
            //
            //     this.render();
            // },
            // /**
            //  *
            //  * @param {string} state
            //  * @private
            //  */
            // _setState(state) {
            //     const stickyContainerClassList = this.stickyContainer.classList;
            //     switch (state) {
            //         case states.TOP:
            //             stickyContainerClassList.remove("__fixed-bottom");
            //             stickyContainerClassList.add("__fixed-top");
            //             this.stickyContainer.style.marginTop = "0px";
            //             break;
            //         case states.SCROLL:
            //             stickyContainerClassList.remove("__fixed-top", "__fixed-bottom");
            //             this.stickyContainer.style.marginTop = this.topShift + "px";
            //             break;
            //         case states.BOTTOM:
            //             stickyContainerClassList.remove("__fixed-top");
            //             stickyContainerClassList.add("__fixed-bottom");
            //             this.stickyContainer.style.marginTop = "0px";
            //             break;
            //     }
            //
            //     this.state = state;
            // },
            // /**
            //  *
            //  * @param {number} value
            //  * @private
            //  */
            // _setTopShift(value) {
            //     if (this.topShift !== value) {
            //         this.topShift = value < 0 ? 0 : value;
            //     }
            // },
            // activate(element) {
            //     if (utils.isTouch()) {
            //         return;
            //     }
            //
            //     this.fixedTopThreshold = 50; // tmp
            //
            //     // Сдвиг контейнера относительно обертки
            //     this.topShift = 0;
            //
            //     /** @type {HTMLElement} */
            //     this.stickyWrapper = this.$el;
            //     /** @type {HTMLElement} */
            //     this.stickyContainer = this.$el.firstElementChild;
            //     /** @type {HTMLElement} */
            //     this.mainContentColumn = document.querySelector(".content");
            //
            //     /** @type {ResizeObserver} */
            //     const mainColumnObserver = new ResizeObserver(() => {
            //         this.render();
            //     });
            //     mainColumnObserver.observe(this.mainContentColumn);
            //
            //     /** @type {ResizeObserver} */
            //     const columnObserver = new ResizeObserver(() => {
            //         this.render();
            //     });
            //
            //     columnObserver.observe(this.stickyContainer);
            //
            //     this.scrollHandler = utils.throttle(this._onScroll, 10, this);
            //     this.resizeHandler = utils.throttle(this.render, 10, this);
            //
            //     this.init();
            //     this.render();
            //
            //     window.addEventListener("scroll", this.scrollHandler, false);
            //     window.addEventListener("resize", this.resizeHandler, false);
            //
            // }
        }
    }
</script>

<style scoped>

</style>
