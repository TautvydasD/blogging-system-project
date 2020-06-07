function showUserTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    return "Your computer time: " + hours + ":" + minutes;
}

var $container = $('.js-time-show');
$container.text(showUserTime());
// var $container = $('.js-vote-arrows');
// $container.find('a').on('click', function(e) {
//     e.preventDefault();
//     var $link = $(e.currentTarget);
//     $.ajax({
//         url: '/comments/10/vote/'+$link.data('direction'),
//         method: 'POST'
//     }).then(function(data) {
//         $container.find('.js-vote-total').text(data.votes);
//     });
// });