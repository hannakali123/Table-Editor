require("./bootstrap");

import Vue from "vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import VuePapaParse from "vue-papa-parse";
import VueExcelEditor from "vue-excel-editor";

Vue.use(VuePapaParse);
Vue.use(Vuetify);
Vue.use(VueExcelEditor);

Vue.component(
    "welcome-component",
    require("./components/WelcomeComponent.vue").default
);

const app = new Vue({
    vuetify: new Vuetify(),
    el: "#app",
});
