<!DOCTYPE html>
<html>
<head>
    <title>TO DO List</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('core-api.customers')}}">Demo App</a>
                </div>
            </div>
        </div>

    </div>
</nav>
<div class="container">
    @yield('content')
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="//rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        encrypted: true,
        cluster: "eu"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('pending-products');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('Core\\Api\\Events\\PendingProductsEvent', function (data) {
        $.notify(data.message, {type: "danger", position: "bottom right", className: 'info',});
    });

    function printFormErrorMsg(errors) {
        $.each(errors, function (key, value) {
            if ($.isPlainObject(value)) {
                $.each(value, function (key, value) {
                    if (!$('#' + key).parent().hasClass('has-error')) {
                        $('#' + key).parent().addClass('has-error');
                        $('#' + key).parent().append("<span class='help-block'>" + value + "</span>");
                    }

                });
            }
        });
    }
</script>
@yield('js')
</body>
</html>
