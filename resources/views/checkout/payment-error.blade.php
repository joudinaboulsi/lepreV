<!DOCTYPE html>
<html lang="en" style="height: 100%;">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

        <link href="/css/myaccount/all.css" rel="stylesheet" />
        <!--load all styles -->

        <title>Payment Error</title>
    </head>

    <body class="bg-light">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 text-center mt-4 bg-white">
                <!-- Logo -->
                <br />
                <br />

                <?php $img = app('settings')->logo_lg; ?>
                <a href="{{ route('home_path') }}"><img class="brand-logo-dark" src="{{$img}}" alt="{{ app('settings')->store_address->store_name }}" width="200" /></a>
                <br />
                <br />
                <br />
                <br />

                <i class="far fa-cross-circle fa-5x" style="color: green;"></i><br />
                <br />
                <b style="font-size: 25px;">Payment Error!</b><br />
                <br />
                <p>
                    Verify your credit card info or contact your bank! <br />
                    <br />
                </p>

                <a href="{{ route('shop_path') }}"><button class="btn btn-primary p-2">Continue shopping</button></a> <br />
                <br />
                <br />
                <br />
                <br />
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
</html>
