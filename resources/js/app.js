require("./bootstrap");

import { createApp, h } from "vue";
import { App, plugin } from "@inertiajs/inertia-vue3";
import { InertiaLink } from "@inertiajs/inertia-vue3";

const el = document.getElementById("app");

createApp({
    render: () =>
        h(App, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}.vue`).default,
        }),
})
    .use(plugin)
    .component("inertia-link", InertiaLink)
    .mount(el);
