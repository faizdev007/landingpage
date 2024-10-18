import 'bootstrap';


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

import jquery from 'jquery';
window.$ = window.jquery = jquery;

import DataTable from 'datatables.net-dt';

window.DataTable = DataTable;

 
new DataTable('#myTable', {
    responsive: true
});

$(document).ready(function() {
    $('input, select, textarea').on('blur', function() {
        if (!$(this).val() && $(this).attr('required')) {
            $(this).addClass(`border-danger`);
            $(this).parent().find('requiredalt').html('This is a required question').addClass(`text-danger`);
        }else{
            $(this).removeClass(`border-danger`);
            $(this).parent().find('requiredalt').html('');
        }
    });

    $('#backgroundimg').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" alt="Image Preview">');
                $('#imagePreview img').css('display', 'block');
            }
            reader.readAsDataURL(file);
        } else {
            $('#imagePreview').html('Image Preview');
        }
    });

    $('.btn-close').on('click', function() {
        // Find the form inside the modal and reset it
        $('#staticBackdrop form')[0].reset();
        // Clear the image preview
        $('#imagePreview').html('Image Preview');
        $('input[name="id"]').remove();
    });

    setTimeout(function(){
        $('#Message').fadeOut(1000);
    },3000);
});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
