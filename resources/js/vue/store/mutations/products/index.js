import axios from "axios/index";
import $ from "jquery";

let getAllProducts = function(state) {
    let that = this;

    if (state.products.length === 0) {
        axios.get('/catalogСartridge')
            .then(response => {
                response.data.forEach((el) => {
                    let params = JSON.parse(el.params);
                    let cape = JSON.parse(el.cape);
                    let newCape = {};

                    cape.map((obj) => {
                        Object.keys(obj).forEach(function (key) {
                            let str = obj[key];
                            newCape[key] = str.trim();
                        });
                    })

                    el.price = Math.ceil(el.price);
                    el.params = params;
                    el.cape = newCape;
                });

                state.products = response.data;
                state.filteredProducts = state.products;
            })

            .then(() => {
                that.dispatch('COLLECT_FILTERS');
                that.dispatch('SWITCH_PRODUCTS_LOADER');
            })

            .catch(err => {
                console.log(err);
            });
    }

    return state.products;
}

let getFilteredProducts = function(state, payload) {
    $.ajax({
        method: "get",
        url: '/search',
        data: {
            payload
        },
        success: function (data) {
            state.searchProducts = data;
        },
        error: function (error) {
            console.warn(error);
        }
    });

    state.closeListener = true;
}

let addProductToCart = function(state, {id, amount}) {
    let that = this;
    let url = `/products/addToCartAjaxGet/${id}`;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': window.token
        }
    });
    $.ajax({
        method: "get",
        url: `${url}`,
        data: {
            id,
            amount
        },
        success: function (data) {
            that.dispatch('fixCartStatus', {data})
        },
        error: function (error) {
            console.warn(error);
        }
    });

    let gObj = {
        category: 'catalog',
        eventAction: 'click',
        eventLabel: 'add product to cart',
        eventValue: `${id} - ${amount}`
    };

    this.dispatch('SEND_GOOGLE_ANALYTICS', gObj);
}


let getProductById = function(state, id) {
    let product = state.products.filter((el) => el.id === id)
    state.singleProduct = product[0];
}

let setProductsLoaded = function(state) {
    state.productsLoaded = true;
}

let filterProductsByBrand = function(state, query) {
    let newProducts = [];

    state.products.forEach((prdt) => {
        let cape = JSON.stringify(Object.keys(prdt.cape));

        if (cape.indexOf(query.brand) >= 0) {
            newProducts.push(prdt)
        }
    });

    if (newProducts.length > 0) {
        state.filteredProducts = newProducts;
    }
}

let filterProductsByPrinterType = function(state, query) {
    let newProducts = [];

    state.products.forEach((prdt) => {
        let param = prdt.params;
        if (param.printertype.indexOf(query.printertype) >= 0) {
            newProducts.push(prdt)
        }
    });

    state.filteredProducts = newProducts;
}

let filterProductsByModel = function(state, query) {
    let newProducts = [];

    state.products.forEach((prdt) => {
        let cape = JSON.stringify(Object.values(prdt.cape));

        if (cape.indexOf(query.model) >= 0) {
            newProducts.push(prdt)
        }
    });

    if (newProducts.length > 0) {
        state.filteredProducts = newProducts;
    }
}

let filterProductByQuery = function(state, query) {
    if (query.printertype) {
        this.dispatch('FILTER_PRODUCTS_BY_PRINTERTYPE', query);
    }
    if (query.brand) {
        this.dispatch('FILTER_PRODUCTS_BY_BRAND', query)
    }
    if (query.model) {
        this.dispatch('FILTER_PRODUCTS_BY_MODEL', query)
    }

    if (Object.keys(query).length === 0) {
        state.filteredProducts = state.products
    }

    this.dispatch('GET_MODEL_BRAND_FILTERS')
}

let getProductTypeFilters = function(state) {
    state.typeFilters = [...new Set(state.products.map(item => item.params.printertype))];
}

let getProductModelBrandFilters = function(state) {
    let allProductBrands = [];
    let allProductModels = [];

    state.filteredProducts.map((prdct) => {
        let cape = prdct.cape;
        let brands = Object.keys(cape);
        let models = Object.values(cape);

        brands.forEach(brand => allProductBrands.push(brand));
        models.forEach(model => allProductModels.push(model));
    })

    state.brandFilters = [...new Set(allProductBrands)];
    state.modelFilters = [...new Set(allProductModels)];
}

let getProductModelFilters = function(state, data = {}) {
    let newProducts = state.products.filter(item => {
        let param = item.params
        for (let key in data) {
            if (param[key] === undefined || param[key] != data[key])
                return false;
        }

        return true;
    });

    state.modelFilters = [...new Set(newProducts.map(item => item.params.art))];
}

let getViewedProducts = function(state) {
        fetch(`/getViewed`, {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.token
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer'
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                state.viewedProducts = data;
            })
            .catch((err) => {
                console.log(err);
            })
}

let setProductViewed = function(state, {pid}) {
    fetch(`/setViewed/${pid}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.token
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify({
            id: pid
        })
    })
        .then((response) => {
            return response.json();
        })

    let gObj = {
        category: 'catalog modal',
        eventAction: 'click',
        eventLabel: 'catalog modal opened',
        eventValue: pid
    };

    this.dispatch('SEND_GOOGLE_ANALYTICS', gObj);
}

export {
    getAllProducts,
    getFilteredProducts,
    addProductToCart,
    getProductModelFilters,
    getProductTypeFilters,
    filterProductsByModel,
    filterProductByQuery,
    getProductById,
    getProductModelBrandFilters,
    filterProductsByPrinterType,
    filterProductsByBrand,
    setProductsLoaded,
    getViewedProducts,
    setProductViewed
}
