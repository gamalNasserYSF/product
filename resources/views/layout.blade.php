<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Neucha&display=swap" rel="stylesheet">

    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 700px;
            margin: auto;
            text-align: center;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

    </style>

</head>


<body>

    <!-- header -->
    <header class="header">
        <div class="container">
            <nav class="navbar navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand">Product-Gamal</a>

                <form class="form-inline col-12 col-sm-8 col-md-6 col-lg-5 p-0" method="get" action="{{ url('filter/') }}">
                    <input class="form-control mr-2 flex-grow-1 col-9" name="search" placeholder="Search" style="background-image: url('../assets/search2.png')">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

            </nav>
        </div>
    </header>
    <!-- end header -->

    @yield('body')

    <script>

        function getProductInfo(id) {

            event.preventDefault();

            var x = "{{ url('api/') }}";

            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')},
                url: x + '/'+ id + '/get',
                type: 'GET',
                contentType: "application/x-www-form-urlencoded; charset=utf-8",
                data: {'id': id}, //see the $_token

                success: function (data) {

                    $('#productName').html(data['data']['title']);
                    $('#productDetails').html(data['data']['description']);
                   // $('#productDisplay').html(data['data']['length_of_display']);
                    $('#productDate').html(data['data']['created_at']);

                    $('#product_info').modal('show');

                    window.history.pushState(null, null, 'http://localhost/products/public/product/'+id);
                }
            });

        }

        $('#product_info').on('hidden.bs.modal', function () {
            window.history.pushState(null, null, 'http://localhost/products/public');
        });

    </script>

    @stack('js')


</body>

</html>