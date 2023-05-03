import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

import flatpickr from "flatpickr";
import { Russian } from "flatpickr/dist/l10n/ru.js";


const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        'progress_bar': {
            delay: 150,
            color: "#6dcb1b",
            css: true,
            spinner: false,
        },
        flatpickr,
        Russian,
    })
    .mount(el);
