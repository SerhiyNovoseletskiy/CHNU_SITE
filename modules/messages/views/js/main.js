$(document).ready(function () {
    load_messages();
    setInterval(load_messages, 4000);

    $('#btn-chat').click(send_message);

    $('#btn-input').keypress(function(e) {
        if(e.which == 13) {
            first_get = true;
            send_message();
        }
    });
});

var first_get = true;

function send_message() {
    if ($('#btn-input').val()) {
        $.post('/messages/send', {to_user: to_user, message: $('#btn-input').val()}, function (d) {
            load_messages();
            $('#btn-input').val('');
        })
    }
}

function load_messages() {
    console.log('Load messages');
    var chat = $('#chat');


    $.get('/messages/get_messages/' + to_user, {}, function (d) {
        chat.html(d);

        if (first_get) {
            $('.panel-body').animate({ scrollTop: chat.height() }, 0);
            first_get = !first_get;
        }

        $.post('/messages/set_is_read/',{from_user: to_user}, function(d) {console.log(d)});
    }, 'html');
}