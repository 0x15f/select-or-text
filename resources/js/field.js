Nova.booting((Vue, router, store) => {
    Vue.component('index-select-or-custom', require('./components/IndexField'))
    Vue.component('detail-select-or-custom', require('./components/DetailField'))
    Vue.component('form-select-or-custom', require('./components/FormField'))
})
