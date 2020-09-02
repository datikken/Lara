(function () {
    /**
     * @returns {boolean}
     */
    function isTouch() {
        return ('ontouchstart' in window);
    }
    /**
     * @param {Function} callback
     * @param {number} limit
     * @param {Object} [ctx]
     * @param {boolean} [last]
     * @returns {Function}
     */
    function throttle(callback, limit, ctx = null, last = false) {
        let wait = false;
        return function () {
            if (!wait) {
                if (!last) {
                    callback.apply(ctx, arguments);
                }
                wait = true;
                setTimeout(function () {
                    wait = false;
                    if (last) {
                        callback.apply(ctx, arguments);
                    }
                }, limit);
            }
        }
    }

    return {
        isTouch,
        throttle
    }
});
