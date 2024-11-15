import './bootstrap';
import Alpine from 'alpinejs';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

// Inisialisasi Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Menambahkan kalender FullCalendar setelah halaman selesai dimuat
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');  // ID elemen tempat kalender akan dirender

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',  // Set tampilan default kalender
    });

    calendar.render();
});
