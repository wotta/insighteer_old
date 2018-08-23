Nova.booting((Vue, router) => {
    Vue.component('index-iban-validation-field', require('./components/IndexField'));
    Vue.component('detail-iban-validation-field', require('./components/DetailField'));
    Vue.component('form-iban-validation-field', require('./components/FormField'));
})
