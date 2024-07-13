import './bootstrap';
import flatpickr from "flatpickr";

document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#date_of_birth", {
        dateFormat: "Y-m-d",
    });
});
window.$ = window.jQuery = require('jquery');
