import { createInertiaApp } from "@inertiajs/vue3";
import { createSSRApp, h, type DefineComponent } from "vue";
import { ZiggyVue } from "ziggy-js";
// import { createBootstrap } from "bootstrap-vue-next";
import Toast, { PluginOptions } from "vue-toastification";
import "vue-toastification/dist/index.css";

const option: PluginOptions = {
    transition: "Vue-Toastification__bounce",
    maxToasts: 10,
    newestOnTop: true,
    timeout: 3000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    draggable: true,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    hideProgressBar: true,
    closeButton: "button",
};
createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`] as DefineComponent;
    },
    setup({ el, App, props, plugin }) {
        createSSRApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Toast, option)
            .use(ZiggyVue)
            // .use(IconsPlugin)
            .mount(el);
    },
});
