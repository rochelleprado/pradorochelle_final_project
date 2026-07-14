import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';


import './bootstrap';

window.Echo.channel('students')
    .listen('.student.created', (e) => {
        const alertBox = document.getElementById('student-alert');
        const tableBody = document.getElementById('student-table');

        if (alertBox) {
            alertBox.innerHTML = '<div class="alert alert-success">New student added:';
        }

        if (tableBody) {
            tableBody.insertAdjacentHTML('afterbegin',
                '<tr>' +
                    '<td>' + e.student_number + '</td>' +
                    '<td>' + e.name + '</td>' +
                    '<td>' + e.course + '</td>' +
                    '<td>' + e.year_level + '</td>' +
                '</tr>'
            );
        }
    });