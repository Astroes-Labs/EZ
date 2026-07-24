<script>
document.addEventListener('livewire:navigated', function () {

    let pusherAppKey = "";
    let pusherAppCluster = "mt1";
    let soundUrl = "../notification-tune";

    var notification = new Pusher(pusherAppKey, {
        encrypted: true,
        cluster: pusherAppCluster,
    });

    var channel = notification.subscribe('user-notification109');

    channel.bind('notification-event', function (result) {
        playSound();
        latestNotification();
        notifyToast(result);
    });

});
</script>