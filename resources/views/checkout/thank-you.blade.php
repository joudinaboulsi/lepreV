<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />

        <link href="/css/myaccount/all.css" rel="stylesheet" />
        <!--load all styles -->

        <title>Thank you for your order</title>

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '<?php echo app('settings')->fb_pixel; ?>');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id={{ app('settings')->fb_pixel }}&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ app('settings')->google_analytics }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo app('settings')->google_analytics; ?>');
        </script>
    </head>

    <body class="bg-light">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 text-center bg-white mt-3">
                    <!-- Logo -->
                    <br />
                    <br />

                    <?php $img = app('settings')->logo_lg; ?>
                    <a href="{{ route('home_path') }}"><img class="brand-logo-dark" src="{{$img}}" alt="{{ app('settings')->store_address->store_name }}" width="200" /></a>
                    <br />
                    <br />
                    <br />
                    <br />

                    <i class="far fa-check-circle fa-5x" style="color: green;"></i><br />
                    <br />
                    <h3><b>{{ app('notification')->title }}</b></h3><br />
                    <br />
                    <p>
                        <?php $message = preg_replace('/\r\n|\r|\n/','<br/>', app('notification')->content); echo $message; ?>
                    </p>

                    <a href="{{ route('shop_path') }}"><button class="btn btn-primary p-2 mt-3">Continue shopping</button></a> <br />
                    <br />
                    <br />
                    <br />
                    <br />
                </div>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </body>
</html>
