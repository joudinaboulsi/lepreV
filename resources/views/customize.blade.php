<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Le Pre</title>

    <!--== Favicon ==-->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <title>Le Pre</title>
    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--== Font-awesome Icons CSS ==-->
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!--== Icofont Min Icons CSS ==-->
    <link href="{{ asset('/css/icofont.min.css') }}" rel="stylesheet" />
    <!--== lastudioIcons CSS ==-->

    <style>
        .Boxcustomize {
            background-color: #91A13B !important;
        }

        .header-customize {
            background-color: #91A13B;
            width: 100%;
            height: calc(100vh -60px) !important
        }

        .back-shop {
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            margin-top: 25px
        }

        .back-shop:hover {
            color: #2E613A;

        }

        /* Progressbar */
        .progressbar {
            position: relative;
            display: flex;
            justify-content: space-around;
            counter-reset: step;
            margin: 2rem 0 4rem;
        }

        .progressbar::before,
        .progress {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            background-color: orange;
            z-index: -1;
        }

        .progress {
            background-color: red;
            width: 0%;
            transition: 0.3s;
        }

        .progress-step {
            width: 2.1875rem;
            height: 2.1875rem;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #708C9B;
        }

        .progress-step::before {
            counter-increment: step;
            content: counter(step);
        }

        .progress-step::after {
            content: attr(data-title);
            position: absolute;
            top: calc(100% + 0.5rem);
            font-size: 0.85rem;
            /* transform: translate(107px, -35px); */
            color: #2E613A;
        }

        .progress-step-active {
            background-color: #91A13B;
            color: #f3f3f3;
        }

        .btns {
            display: flex;
            justify-content: flex-end;
            padding-top: 25px;
        }

        #demo3 {
            font-size: 30px;
            font-weight: 300;
            color: #708C9B;
        }

        .previous_button {
            margin: 0 15px;
            background: #99a2a8;
            color: #FFF;
            border: none;
            border-radius: 25px;
            width: 140px;
            height: 40px;
        }

        .previous_button:hover,
        .previous_button:focus {
            background: #405867;
            border-color: #405867;
            color: #fff;
        }

        .next {
            background: #91A13B;
            color: white;
            border: 0 none;
            border-radius: 25px;
            cursor: pointer;
            min-width: 130px;
            font: 700 14px/40px "Roboto", sans-serif;
            border: 1px solid #5cb85c;
            margin: 0 5px;
            height: 40px;
            /* text-transform: uppercase; */
            display: inline-block;
        }

        .next i {
            font-size: 10px;
            margin: 0 5px;
        }

        .previous_button i {
            font-size: 10px;
            margin: 0 7px;

        }

        .add-favorite .card {
            width: 130px;
            margin: 2px;
            border-radius: 13px;
        }

        .title-progress {
            font-size: 15px;
            font-weight: 600;
        }

        .box-categories {
            padding-top: 30px;
        }

        .titleStep {
            color: #708C9B;
            font-weight: lighter;
            font-size: 30px;
        }

        .secondChoice .card {
            padding: 35px;
            border-color: #91A13B;
        }

        .secondChoice .card:hover {
            transition: 0.5s;
            cursor: pointer;
        }

        .productsCheck {
            padding: 35px;
        }

        .cardheader {
            display: flex;
            justify-content: flex-end;
        }

        .counternumber,
        .countertext {
            color: #91A13B;
            font-size: 20px;
            margin: 3px;
        }


        .card-content {
            display: flex !important;
            justify-content: space-around;
            padding: 0px 8px;
        }

        .btnincr,
        .btndesc {
            width: 25px;
            height: 25px;
            border: none;
            transform: translateY(3rem);
            background: transparent;
            font-weight: bold;
            font-size: 25px;
            color: #958282;
        }

        .imgProduct img {
            width: 80px;
        }

        .textproduct {
            font-size: 18px;
            font-weight: 700;
            justify-content: center;
            text-align: center;
            padding-top: 10px;
        }

        .ttlcheck {
            font-size: 25px;
            color: #708C9B;
            font-weight: 400;
        }

        .titleChoosen {
            font-size: 25px !important;
            color: #708C9B !important;
            font-weight: 400 !important;
        }

        #tt3 {
            font-size: 25px;
            color: #fff;
        }

        .header-customize .content {
            display: flex;
            justify-content: space-around;
            margin-top: 35px;
        }


        .btncheckout {
            background: #708C9B;
            font-weight: lighte;
            border-radius: 25px;
            width: 200px;
            height: 40px;
            color: #fff;
        }

        .check-card {
            display: flex;
        }

        .check-card .card {
            width: 140px;
            border-radius: 10px;
            margin: 0 5px;
        }

        .product-chekout .card {
            border-radius: 10px;
            margin: 0 4px;
        }

        .form-step {
            display: none;
            transform-origin: top;
            animation: animate 0.5s;
        }

        .form-step-active {
            display: block;
        }

        @keyframes animate {
            from {
                transform: scale(1, 0);
                opacity: 0;
            }

            to {
                transform: scale(1, 1);
                opacity: 1;
            }
        }

        .form__answer {
            display: inline-block;
            box-sizing: border-box;
            width: 23%;
            margin: 20px 1% 20px 0;
            height: 180px;
            vertical-align: top;
            font-size: 22px;
            text-align: center;
        }

        label {
            border: 1px solid rgba(yellow, .15);
            box-sizing: border-box;
            display: block;
            height: 100%;
            width: 100%;
            padding: 10px 10px 30px 10px;
            cursor: pointer;
            opacity: .5;
            transition: all .5s ease-in-out;

            &:hover,
            &:focus,
            &:active {
                border: 1px solid rgba(blue, .5);
            }
        }




        /* Input style */

        input[type="radio"] {
            opacity: 0;
            width: 0;
            height: 0;
        }

        input[type="radio"]:active~label {
            opacity: 1;
        }

        input[type="radio"]:checked~label {
            opacity: 1;
        }

        input[type=checkbox] {
            accent-color: #91A13B;
            color: #fff !important;
            width: 15px;
            height: 15px;
            margin: 7px;
            border-radius: 2px;
            border: solid white;
        }

        /* start section */
        .cat2 {
            margin-left: 50px !important;
            border-color: #023020;
        }

        .highlight-cat1:hover {
            stroke: #91A13B;

        }

        .highlight-cat2:hover {
            stroke: #91A13B;
        }

        .highlight-cat3:hover {
            stroke: #91A13B;
        }

        @media (max-width:500px) {
            .cat2 {
                margin-left: 0px !important;
            }
        }

        @media (min-width:501px) and (max-width:768px) {
            .cat2 {
                margin-left: 0px !important;
            }
        }

        @media (min-width:769px) and (max-width:991px) {
            .cat2 svg {
                transform: translateX(200px);
            }
        }

        @media (min-width:992px) and (max-width:1199px) {
            .cat2 svg {
                transform: translateX(50px);
            }
        }

        .count-result {
            transform: translate(50px, 130px);
        }

        .ctext {
            line-height: 1;
            font-weight: 900;
            font-size: 50px;
            color: #91A13B;
        }

        .resault {
            line-height: 1;
            font-weight: 900;
            font-size: 50px;
            color: #91A13B;
        }

        .counter-text {
            font-size: 25px;
            color: #91A13B;
        }

        .counter-number {
            font-size: 25px;
            color: #91A13B;
        }
    </style>

</head>

<body>
    {{-- start header customize --}}
    <div class="header-customize">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Image and text -->
                    <nav>
                        <div class="content">
                            <div class="logo d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="89.475" height="74.94" viewBox="0 0 89.475 74.94">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect id="Rectangle_1327" data-name="Rectangle 1327" width="83.698"
                                                height="74.44" fill="none" stroke="#fff" stroke-width="1" />
                                        </clipPath>
                                    </defs>
                                    <g id="Group_12268" data-name="Group 12268" transform="translate(0 0.5)"
                                        clip-path="url(#clip-path)">
                                        <path id="Path_293" data-name="Path 293"
                                            d="M35.293,51.05H69.946a4.146,4.146,0,0,0,4.176-2.917h0l5.235-32.893A4.113,4.113,0,0,0,75.6,9.818H22.165l-2.2-6.4A4.143,4.143,0,0,0,15.8.5H4.671A3.94,3.94,0,0,0,.5,4.671,3.939,3.939,0,0,0,4.671,8.838h7.46L26.769,51Z"
                                            transform="translate(1.823 1.822)" fill="none" stroke="#fff"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                        <circle id="Ellipse_2486" data-name="Ellipse 2486" cx="7.163" cy="7.163"
                                            r="7.163" transform="translate(31.964 57.792)" fill="none"
                                            stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                        <circle id="Ellipse_2487" data-name="Ellipse 2487" cx="7.163" cy="7.163"
                                            r="7.163" transform="translate(56.916 57.792)" fill="none"
                                            stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1" />
                                    </g>
                                    <g id="Group_12337" data-name="Group 12337" transform="translate(48.393 0.5)">
                                        <ellipse id="Ellipse_2490" data-name="Ellipse 2490" cx="20.291"
                                            cy="20.291" rx="20.291" ry="20.291" fill="#91a13b" stroke="#fff"
                                            stroke-miterlimit="10" stroke-width="1" />
                                        <g id="Group_12296" data-name="Group 12296"
                                            transform="translate(27.287 33.532) rotate(180)">
                                            <path id="Path_296" data-name="Path 296" d="M6.457,3.573,0,7.554.689,0"
                                                transform="translate(0 16.342)" fill="#91a13b" stroke="#fff"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                            <rect id="Rectangle_1330" data-name="Rectangle 1330" width="6.785"
                                                height="19.224" transform="translate(10.814 0) rotate(31.78)"
                                                fill="#91a13b" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1" />
                                        </g>
                                    </g>
                                </svg>
                                <h2 id="tt3">CUSTOMIZING<br>
                                    YOUR PACK</h2>
                            </div>
                            <a href="{{ route('eshop_path') }}" class="back-shop"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>Back to Eshop </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- end header customize --}}

    {{-- start content csutomize --}}
    <div class="container-fluid" style="background-color: #eee">
        {{-- start section progressing bar --}}
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="progressbar">
                        <div class="progress" id="progress"></div>

                        <div class="progress-step progress-step-active" data-title="choose one product/on size">
                        </div>
                        <div class="progress-step" data-title="Choose the type of pack"></div>
                        <div class="progress-step" data-title="Add your favorite flavors"></div>
                        <div class="progress-step" data-title="Check out and wait it!"></div>
                    </div>

                </div>
            </div>
        </div>

        {{-- start section categories --}}
        <div class="box-categories d-flex form-step form-step-active">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="container">
                            <h2 class="titleStep">JUICES</h2>
                            <div class="row">
                                <div class="col-lg-4 col-xs-1 col-md-1">
                                    <div class="box" id="A" onclick="fnChangeBorder('A')">
                                        <input type="radio" name="match" id="match_1">
                                        <label for="match_1">
                                            <svg class="highlight-cat1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="313"
                                                height="312" viewBox="0 0 313 312">
                                                {{-- border --}}
                                                <defs>
                                                    <filter id="Rectangle_1411" x="0" y="0"
                                                        width="313" height="312" filterUnits="userSpaceOnUse">
                                                        <feOffset dy="1" input="SourceAlpha" />
                                                        <feGaussianBlur stdDeviation="6.5" result="blur" />
                                                        <feFlood flood-opacity="0.043" />
                                                        <feComposite operator="in" in2="blur" />
                                                        <feComposite in="SourceGraphic" />
                                                    </filter>
                                                </defs>
                                                <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectangle_1411)">
                                                    <rect id="Rectangle_1411-2" data-name="Rectangle 1411"
                                                        width="274" height="273" rx="10"
                                                        transform="translate(19.5 18.5)" fill="#fff" />
                                                </g>
                                                <g id="Group_12386" data-name="Group 12386"
                                                    transform="translate(137.116 73.524)">
                                                    <g id="Group_12382" data-name="Group 12382"
                                                        transform="translate(0 0)">
                                                        <path id="Path_304" data-name="Path 304"
                                                            d="M9.066,13.77V8.487s.946-.7,0-1.913V3.051S9.578.5,13.586.5H28.4s2.915.243,3.036,2.187V6.425s-.85,1.242,0,2.091V13.77Z"
                                                            transform="translate(-1.592 -0.064)" fill="none"
                                                            stroke="#2e613a" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1" />
                                                        <path id="Path_305" data-name="Path 305"
                                                            d="M30.584,27.945V17.257l.855-1.549H9.065l1.241,1.427v10.81"
                                                            transform="translate(-1.592 -2.003)" fill="#708c9b"
                                                            stroke="#708c9b" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1"
                                                            opacity="0.153" />
                                                        <path id="Path_306" data-name="Path 306"
                                                            d="M29.492,29.733v13.5c0,2.512,3.272,4.72,3.272,4.72a20.409,20.409,0,0,1,6.779,14.027V136.4c0,5.411-3.383,5.992-3.383,5.992H4.856C.42,142.387.5,136.4.5,136.4V62.563A18.943,18.943,0,0,1,6.1,49.516a12.447,12.447,0,0,0,3.109-5.026V29.733"
                                                            transform="translate(-0.5 -3.791)" fill="#708c9b"
                                                            stroke="#708c9b" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1"
                                                            opacity="0.278" />
                                                        <path id="Path_307" data-name="Path 307"
                                                            d="M9.066,7.3S12,6.22,20.253,6.22a69.031,69.031,0,0,1,11.186.6"
                                                            transform="translate(-1.592 -0.793)" fill="none"
                                                            stroke="gray" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1" />
                                                        <path id="Path_308" data-name="Path 308"
                                                            d="M30.751,135.906H9.595a3.128,3.128,0,0,1-3.128-3.127V72.152a3.128,3.128,0,0,1,3.128-3.128H30.751a3.127,3.127,0,0,1,3.127,3.128v60.626a3.127,3.127,0,0,1-3.127,3.127"
                                                            transform="translate(-1.261 -8.8)" fill="#f8fcfd"
                                                            opacity="0.997" />
                                                        <path id="Path_409" data-name="Path 409"
                                                            d="M3.584,0H23.826a3.585,3.585,0,0,1,3.585,3.585V63.3a3.585,3.585,0,0,1-3.585,3.585H3.584A3.584,3.584,0,0,1,0,63.3V3.584A3.584,3.584,0,0,1,3.584,0Z"
                                                            transform="translate(5.206 60.224)" fill="none" />
                                                        <path id="Path_309" data-name="Path 309"
                                                            d="M13.272,87.094a.606.606,0,0,0-.372-.176,1.393,1.393,0,0,0-.293,1.152.855.855,0,0,1,.665-.975"
                                                            transform="translate(-2.041 -11.081)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_310" data-name="Path 310"
                                                            d="M29.1,83.046c-.117.287-.36.293-.708.133a1.444,1.444,0,0,0,.388.179.443.443,0,0,0,.252-.14.255.255,0,0,1-.183.158,1.49,1.49,0,0,0,.154.03.343.343,0,0,0,.1-.36"
                                                            transform="translate(-4.056 -10.588)" fill="#708c9b" />
                                                        <path id="Path_311" data-name="Path 311"
                                                            d="M32.443,78.043a1.018,1.018,0,0,1,.377.211,1.1,1.1,0,0,0-.633-.394c-.072.058-.145.115-.217.175a1.276,1.276,0,0,1,.473.009"
                                                            transform="translate(-4.512 -9.927)" fill="#708c9b" />
                                                        <path id="Path_312" data-name="Path 312"
                                                            d="M32.269,78.16c-.034.321-.32.534-.521.837a.442.442,0,0,0,.256.738,1.136,1.136,0,0,0,.495-1.2,1.1,1.1,0,0,1-.369,1.225,2.346,2.346,0,0,1-1.518.4l-.01.13a2.479,2.479,0,0,0,1.523-.368c.106.171.286.248.576.123.526-.226.487-1.6-.431-1.884"
                                                            transform="translate(-4.337 -9.965)" fill="#708c9b" />
                                                        <path id="Path_313" data-name="Path 313"
                                                            d="M28.334,82.932c-.292-.364.337-.835.141-1.311a.677.677,0,0,0-.089-.154,1.081,1.081,0,0,0-.95-.571,1.039,1.039,0,0,0-1.035.711l-.554-.553h-.8v.114H25.4V86l.607.607h-.962v.115h1.8v-.115h-.355l-.01-4.224c.112-1.093.761-1.165.761-1.165a1.013,1.013,0,0,1,.555.017.951.951,0,0,1,.387.6c.049.335-.1.3-.005.913a2.339,2.339,0,0,1-.065-.852.864.864,0,0,0-.4-.619.809.809,0,0,0,0,1.387,1.134,1.134,0,0,0,.359.216.738.738,0,0,0,.267.052"
                                                            transform="translate(-3.629 -10.314)" fill="#708c9b" />
                                                        <path id="Path_314" data-name="Path 314"
                                                            d="M31.862,86.69a2.027,2.027,0,0,0,.894-.206,2.332,2.332,0,0,0,.756-.6l.08.069a2.412,2.412,0,0,1-.773.624,2.085,2.085,0,0,1-.957.223,2.225,2.225,0,0,1-.87-.183l-1.261-1.26a3.223,3.223,0,0,1-.32-1.42,3.16,3.16,0,0,1,.195-1.117,3,3,0,0,1,.527-.911,2.449,2.449,0,0,1,.779-.613,2.091,2.091,0,0,1,.95-.223,1.835,1.835,0,0,1,.877.211,2.188,2.188,0,0,1,.681.573,2.64,2.64,0,0,1,.441.842,3.255,3.255,0,0,1,.154,1.009h-3.5a3.031,3.031,0,0,0-.005.5c.01.168.028.332.051.493a3.945,3.945,0,0,0,.183.8,2.868,2.868,0,0,0,.3.625,1.463,1.463,0,0,0,.384.412.755.755,0,0,0,.441.149m0-5.5a.8.8,0,0,0-.5.183,1.608,1.608,0,0,0-.412.51,3.364,3.364,0,0,0-.292.768,5.1,5.1,0,0,0-.149.945h2.417a7.057,7.057,0,0,0-.08-.922,3.457,3.457,0,0,0-.2-.767,1.487,1.487,0,0,0-.332-.522.632.632,0,0,0-.453-.195"
                                                            transform="translate(-4.186 -10.337)" fill="#708c9b" />
                                                        <path id="Path_315" data-name="Path 315"
                                                            d="M19.7,88.028A2.34,2.34,0,0,1,17.879,89.3a.421.421,0,0,1-.157.058.483.483,0,0,1-.086.064c-.01.009-.02.02-.031.028a2.467,2.467,0,0,0,2.19-1.316.655.655,0,0,1-.1-.106"
                                                            transform="translate(-2.681 -11.223)" fill="#708c9b" />
                                                        <path id="Path_316" data-name="Path 316"
                                                            d="M17.893,89.785a2.909,2.909,0,0,1-3.262-.026c-.422-.578-1.434-1.079-1.662-1.683.441.668,1.326,1.057,1.728,1.585.177-1.081-1.25-1.16-1.869-2.034a.941.941,0,0,0-.106.34,1.973,1.973,0,0,0,.94,1.943.861.861,0,0,0,.846-.036,3.036,3.036,0,0,0,3.462-.019"
                                                            transform="translate(-2.057 -11.172)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_317" data-name="Path 317"
                                                            d="M16.569,88.582a.932.932,0,0,0-.178.292c.556-.185.837.762,1.483.74a.813.813,0,0,0,.756-.639,1.192,1.192,0,0,1-.879.2c-.416-.088-.308-.251-1.072-.4a2.906,2.906,0,0,1,1.031.294,1.085,1.085,0,0,0,.9-.2,1.017,1.017,0,0,0-1.634-.607,1.421,1.421,0,0,0-.412.327m.016-.131c-.34.34-.439.629-.152.893a.432.432,0,0,1-.383-.271,1.838,1.838,0,0,1,.1-.168.317.317,0,0,0,.106.285.559.559,0,0,1-.055-.359,1.829,1.829,0,0,1,.381-.38"
                                                            transform="translate(-2.482 -11.226)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_318" data-name="Path 318"
                                                            d="M14.036,87.928a3,3,0,0,0,2,1.2,2.913,2.913,0,0,0,3.4-2.826V78.59l-.6-.616h1.961s1.393.2,1.393,2.133a2.07,2.07,0,0,1-2.019,2.27v.113a3.127,3.127,0,0,0,.468.035,2.613,2.613,0,0,0,2.761-2.419A2.351,2.351,0,0,0,20.95,77.86H18v.114h.353v6.492a2.449,2.449,0,0,1,.91,1.882A2.78,2.78,0,0,1,16.363,89a2.982,2.982,0,0,1-2.37-1.124Z"
                                                            transform="translate(-2.22 -9.927)" fill="#708c9b" />
                                                        <path id="Path_319" data-name="Path 319"
                                                            d="M19.994,88.018a2.682,2.682,0,0,1-.519.7l-.085-.075a1.562,1.562,0,0,0,.446-.559,1.425,1.425,0,0,0,.119-.633,1.14,1.14,0,0,0-.017-.181,2.742,2.742,0,0,1,.056.749"
                                                            transform="translate(-2.908 -11.126)" fill="#708c9b" />
                                                        <path id="Path_320" data-name="Path 320"
                                                            d="M18.824,85.432a2.114,2.114,0,0,1,.892,1.732,2.027,2.027,0,0,1-2,1.938s1.823-.257,2.116-1.575a2.071,2.071,0,0,0-.745-2.067Z"
                                                            transform="translate(-2.695 -10.892)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_321" data-name="Path 321"
                                                            d="M16.595,84.953a1.372,1.372,0,0,1,.5.008,1.05,1.05,0,0,1,.4.223,1.17,1.17,0,0,0-.671-.417l-.229.186"
                                                            transform="translate(-2.552 -10.807)" fill="#708c9b" />
                                                        <path id="Path_322" data-name="Path 322"
                                                            d="M16.6,84.573c-.035.339-.337.567-.548.888a.467.467,0,0,0,.273.78,1.2,1.2,0,0,0,.52-1.276,1.47,1.47,0,0,1-.064.924h0a2.335,2.335,0,0,1-.756.6,2.027,2.027,0,0,1-.894.206.753.753,0,0,1-.441-.149,1.492,1.492,0,0,1-.384-.413A2.849,2.849,0,0,1,14,85.5a4,4,0,0,1-.183-.8q-.034-.241-.051-.493a3.245,3.245,0,0,1,.005-.5h3.507a3.256,3.256,0,0,0-.155-1.009,2.622,2.622,0,0,0-.441-.842A2.18,2.18,0,0,0,16,81.286a1.825,1.825,0,0,0-.877-.212,2.108,2.108,0,0,0-.951.223,2.471,2.471,0,0,0-.779.613,3.005,3.005,0,0,0-.527.911,3.162,3.162,0,0,0-.2,1.118A3.224,3.224,0,0,0,13,85.36l.288.288.973.973a2.214,2.214,0,0,0,.871.183,2.1,2.1,0,0,0,.957-.222,2.415,2.415,0,0,0,.331-.208c.106.224.3.34.647.193.556-.242.51-1.7-.464-1.994M13.923,82.65a3.348,3.348,0,0,1,.292-.768,1.6,1.6,0,0,1,.413-.51.8.8,0,0,1,.5-.183.636.636,0,0,1,.453.195,1.509,1.509,0,0,1,.332.522,3.528,3.528,0,0,1,.2.768,7.056,7.056,0,0,1,.08.923H13.774a5.167,5.167,0,0,1,.149-.946"
                                                            transform="translate(-2.052 -10.336)" fill="#708c9b" />
                                                        <path id="Path_323" data-name="Path 323"
                                                            d="M11.879,77.969h-.962l.607.619v7.634h.355v.115h-1.8v-.115h.962l-.607-.607V77.969H10.08v-.114h1.8Z"
                                                            transform="translate(-1.721 -9.926)" fill="#708c9b" />
                                                        <path id="Path_324" data-name="Path 324"
                                                            d="M21.608,89.947a.505.505,0,0,1-.392-.141l.135-.136a.351.351,0,0,0,.26.091c.123,0,.189-.047.189-.133a.12.12,0,0,0-.033-.091.159.159,0,0,0-.1-.038l-.129-.018a.36.36,0,0,1-.209-.089.286.286,0,0,1-.077-.211.331.331,0,0,1,.374-.325.462.462,0,0,1,.346.125l-.133.132a.3.3,0,0,0-.22-.074c-.112,0-.166.062-.166.136a.1.1,0,0,0,.031.077.188.188,0,0,0,.1.042l.127.018a.355.355,0,0,1,.205.083.3.3,0,0,1,.083.228c0,.208-.173.325-.4.325"
                                                            transform="translate(-3.141 -11.328)" fill="#708c9b" />
                                                        <rect id="Rectangle_1397" data-name="Rectangle 1397"
                                                            width="0.209" height="1.073"
                                                            transform="translate(19.077 77.535)" fill="#708c9b" />
                                                        <path id="Path_325" data-name="Path 325"
                                                            d="M23.323,89.535h-.207v.4h-.209V88.866h.416a.335.335,0,1,1,0,.669m-.01-.482h-.2v.294h.2a.147.147,0,1,0,0-.294"
                                                            transform="translate(-3.357 -11.33)" fill="#708c9b" />
                                                        <path id="Path_326" data-name="Path 326"
                                                            d="M24.291,89.947a.506.506,0,0,1-.392-.141l.135-.136a.351.351,0,0,0,.26.091c.123,0,.189-.047.189-.133a.12.12,0,0,0-.033-.091.159.159,0,0,0-.1-.038l-.129-.018a.36.36,0,0,1-.209-.089.286.286,0,0,1-.077-.211.331.331,0,0,1,.374-.325.462.462,0,0,1,.346.125l-.133.132a.3.3,0,0,0-.22-.074c-.112,0-.166.062-.166.136a.1.1,0,0,0,.031.077.188.188,0,0,0,.1.042l.127.018a.353.353,0,0,1,.205.083.3.3,0,0,1,.083.228c0,.208-.173.325-.4.325"
                                                            transform="translate(-3.483 -11.328)" fill="#708c9b" />
                                                        <path id="Path_327" data-name="Path 327"
                                                            d="M26.092,89.829a.416.416,0,0,1-.58,0c-.109-.108-.106-.243-.106-.428s0-.32.106-.428a.416.416,0,0,1,.58,0c.108.108.107.243.107.428s0,.319-.107.428m-.155-.729a.174.174,0,0,0-.134-.058.176.176,0,0,0-.135.058c-.041.045-.051.1-.051.3s.01.256.051.3a.176.176,0,0,0,.135.058.174.174,0,0,0,.134-.058c.041-.045.052-.1.052-.3s-.011-.257-.052-.3"
                                                            transform="translate(-3.675 -11.328)" fill="#708c9b" />
                                                        <path id="Path_328" data-name="Path 328"
                                                            d="M26.785,89.052v.263h.423V89.5h-.423v.435h-.209V88.866h.707v.187Z"
                                                            transform="translate(-3.824 -11.33)" fill="#708c9b" />
                                                        <path id="Path_329" data-name="Path 329"
                                                            d="M28.647,89.939l-.425-.659v.659h-.209V88.866H28.2l.425.657v-.657h.209v1.073Z"
                                                            transform="translate(-4.007 -11.33)" fill="#708c9b" />
                                                        <path id="Path_330" data-name="Path 330"
                                                            d="M29.851,89.938l-.064-.189h-.381l-.065.189h-.218l.39-1.073h.164l.393,1.073Zm-.25-.756-.136.391h.266Z"
                                                            transform="translate(-4.149 -11.33)" fill="#708c9b" />
                                                        <path id="Path_331" data-name="Path 331"
                                                            d="M30.67,89.052v.886H30.46v-.886H30.18v-.187h.77v.187Z"
                                                            transform="translate(-4.284 -11.33)" fill="#708c9b" />
                                                        <path id="Path_332" data-name="Path 332"
                                                            d="M31.65,89.948a.373.373,0,0,1-.4-.377v-.706h.209v.7a.187.187,0,1,0,.373,0v-.7h.209v.706a.373.373,0,0,1-.4.377"
                                                            transform="translate(-4.421 -11.33)" fill="#708c9b" />
                                                        <path id="Path_333" data-name="Path 333"
                                                            d="M33.015,89.939l-.21-.428h-.15v.428h-.21V88.866h.421a.324.324,0,0,1,.348.328.291.291,0,0,1-.2.283l.24.462Zm-.163-.886h-.2v.284h.2a.142.142,0,1,0,0-.284"
                                                            transform="translate(-4.572 -11.33)" fill="#708c9b" />
                                                        <path id="Path_334" data-name="Path 334"
                                                            d="M33.591,89.939V88.866H34.3v.187h-.5V89.3h.424v.187H33.8v.261h.5v.187Z"
                                                            transform="translate(-4.719 -11.33)" fill="#708c9b" />
                                                        <path id="Path_335" data-name="Path 335"
                                                            d="M9.066,13.77V8.487s.946-.7,0-1.913V3.051S9.578.5,13.586.5H28.4s2.915.243,3.036,2.187V6.425s-.85,1.242,0,2.091V13.77Z"
                                                            transform="translate(-1.592 -0.064)" fill="#2e613a" />
                                                        <path id="Path_336" data-name="Path 336"
                                                            d="M24.388,0V27.411H16.56V0"
                                                            transform="translate(-2.547 -0.001)" fill="#fff"
                                                            opacity="0.996" />
                                                        <path id="Path_337" data-name="Path 337"
                                                            d="M24.388,0V27.411H16.56V0"
                                                            transform="translate(-2.547 -0.001)" fill="none" />
                                                    </g>
                                                </g>
                                                <text id="_250_ml" data-name="250 ml"
                                                    transform="translate(150.5 231.5)" fill="#b8ba43" font-size="30"
                                                    font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                                    letter-spacing="-0.07em">
                                                    <tspan x="-41.449" y="23">250 ml</tspan>
                                                </text>
                                            </svg>
                                        </label>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-xs-1 col-md-1">
                                    <div id="B" onclick="fnChangeBorder2('B')" class="cat2">
                                        <input type="radio" name="match" id="match_2">
                                        <label for="match_2">
                                            <svg class="highlight-cat2" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="313"
                                                height="312" viewBox="0 0 313 312">
                                                <defs>
                                                    <filter id="Rectangle_1409" x="0" y="0"
                                                        width="313" height="312" filterUnits="userSpaceOnUse">
                                                        <feOffset dy="1" input="SourceAlpha" />
                                                        <feGaussianBlur stdDeviation="6.5" result="blur" />
                                                        <feFlood flood-opacity="0.043" />
                                                        <feComposite operator="in" in2="blur" />
                                                        <feComposite in="SourceGraphic" />
                                                    </filter>
                                                </defs>
                                                <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectangle_1409)">
                                                    <rect id="Rectangle_1409-2" data-name="Rectangle 1409"
                                                        width="274" height="273" rx="10"
                                                        transform="translate(19.5 18.5)" fill="#fff" />
                                                </g>
                                                <g id="Group_12384" data-name="Group 12384"
                                                    transform="translate(135.402 39.452)">
                                                    <path id="Path_410" data-name="Path 410"
                                                        d="M13.26,48.061v13.3S12.91,64.189,8.7,67.021.5,77.323.5,84.309v97.442s-.131,7.363,6.989,7.767c0,0,9.1.468,14.159.4l1.223-.007c2.319-.019,7.605-.095,12.936-.4,7.12-.4,6.989-7.767,6.989-7.767V84.309c0-6.986-4-14.456-8.2-17.288s-4.558-5.664-4.558-5.664v-13.3"
                                                        transform="translate(-0.5 -12.953)" fill="#d6dee2"
                                                        stroke="#d6dee2" stroke-miterlimit="10" stroke-width="1" />
                                                    <g id="Group_12380" data-name="Group 12380"
                                                        transform="translate(0)">
                                                        <path id="Path_338" data-name="Path 338"
                                                            d="M35.594,190.158H12.529a3.41,3.41,0,0,1-3.41-3.409v-66.1a3.41,3.41,0,0,1,3.41-3.409H35.594A3.409,3.409,0,0,1,39,120.651v66.1a3.409,3.409,0,0,1-3.409,3.409"
                                                            transform="translate(-2.823 -31.597)" fill="#fff"
                                                            opacity="0.75" />
                                                        <path id="Path_411" data-name="Path 411"
                                                            d="M4.667,0H25.216a4.668,4.668,0,0,1,4.668,4.668V68.249a4.667,4.667,0,0,1-4.667,4.667H4.667A4.667,4.667,0,0,1,0,68.249V4.667A4.667,4.667,0,0,1,4.667,0Z"
                                                            transform="translate(6.296 85.644)" fill="none" />
                                                        <path id="Path_339" data-name="Path 339"
                                                            d="M17.835,140.735a.662.662,0,0,0-.405-.193,1.52,1.52,0,0,0-.319,1.256.932.932,0,0,1,.725-1.064"
                                                            transform="translate(-4.97 -37.877)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_340" data-name="Path 340"
                                                            d="M38.44,135.5c-.128.313-.392.32-.772.145a1.566,1.566,0,0,0,.424.2.483.483,0,0,0,.275-.152.279.279,0,0,1-.2.172,1.573,1.573,0,0,0,.167.032.374.374,0,0,0,.105-.393"
                                                            transform="translate(-10.517 -36.518)" fill="#708c9b" />
                                                        <path id="Path_341" data-name="Path 341"
                                                            d="M42.845,128.947a1.1,1.1,0,0,1,.411.231,1.2,1.2,0,0,0-.69-.431l-.237.191a1.387,1.387,0,0,1,.516.01"
                                                            transform="translate(-11.773 -34.698)" fill="#708c9b" />
                                                        <path id="Path_342" data-name="Path 342"
                                                            d="M42.364,129.138c-.037.35-.349.582-.568.912a.482.482,0,0,0,.278.805,1.239,1.239,0,0,0,.54-1.313,1.2,1.2,0,0,1-.4,1.336,2.559,2.559,0,0,1-1.655.439l-.012.142a2.7,2.7,0,0,0,1.66-.4c.117.186.312.27.628.134.574-.246.531-1.745-.47-2.054"
                                                            transform="translate(-11.292 -34.803)" fill="#708c9b" />
                                                        <path id="Path_343" data-name="Path 343"
                                                            d="M36.9,134.921c-.318-.4.367-.91.154-1.43a.725.725,0,0,0-.1-.167,1.178,1.178,0,0,0-1.036-.623,1.131,1.131,0,0,0-1.128.775l-.6-.6h-.874V133H33.7v5.27l.662.663H33.312v.125h1.961v-.125h-.387l-.01-4.605c.122-1.192.829-1.27.829-1.27a1.1,1.1,0,0,1,.6.017,1.037,1.037,0,0,1,.423.651c.053.366-.112.327-.006.995a2.538,2.538,0,0,1-.072-.928.94.94,0,0,0-.438-.675.882.882,0,0,0,0,1.513,1.239,1.239,0,0,0,.391.236.813.813,0,0,0,.291.057"
                                                            transform="translate(-9.343 -35.764)" fill="#708c9b" />
                                                        <path id="Path_344" data-name="Path 344"
                                                            d="M41.669,139.055a2.2,2.2,0,0,0,.974-.224,2.539,2.539,0,0,0,.824-.649l.088.075a2.634,2.634,0,0,1-.843.681,2.278,2.278,0,0,1-1.043.243,2.426,2.426,0,0,1-.948-.2l-1.375-1.374A3.515,3.515,0,0,1,39,136.058a3.467,3.467,0,0,1,.212-1.218,3.292,3.292,0,0,1,.575-.993,2.683,2.683,0,0,1,.85-.668,2.286,2.286,0,0,1,1.036-.243,1.992,1.992,0,0,1,.956.231,2.393,2.393,0,0,1,.743.625,2.891,2.891,0,0,1,.481.918,3.566,3.566,0,0,1,.168,1.1H40.2a3.374,3.374,0,0,0-.006.55q.018.274.056.537a4.323,4.323,0,0,0,.2.868,3.122,3.122,0,0,0,.325.681,1.6,1.6,0,0,0,.418.449.82.82,0,0,0,.481.162m0-5.994a.869.869,0,0,0-.543.2,1.759,1.759,0,0,0-.45.556,3.687,3.687,0,0,0-.319.837,5.6,5.6,0,0,0-.162,1.03h2.635a7.727,7.727,0,0,0-.087-1.005,3.837,3.837,0,0,0-.219-.836,1.616,1.616,0,0,0-.362-.568.69.69,0,0,0-.494-.213"
                                                            transform="translate(-10.875 -35.827)" fill="#708c9b" />
                                                        <path id="Path_345" data-name="Path 345"
                                                            d="M25.908,141.988a2.553,2.553,0,0,1-1.985,1.386.48.48,0,0,1-.172.063.574.574,0,0,1-.093.07c-.012.009-.022.021-.034.03a2.691,2.691,0,0,0,2.388-1.435.72.72,0,0,1-.105-.115"
                                                            transform="translate(-6.732 -38.266)" fill="#708c9b" />
                                                        <path id="Path_346" data-name="Path 346"
                                                            d="M22.9,143.818a3.17,3.17,0,0,1-3.557-.029c-.459-.629-1.564-1.175-1.812-1.834.481.728,1.446,1.152,1.884,1.728.193-1.178-1.363-1.264-2.038-2.217a1.027,1.027,0,0,0-.115.371,2.153,2.153,0,0,0,1.024,2.118.94.94,0,0,0,.923-.039,3.311,3.311,0,0,0,3.774-.021"
                                                            transform="translate(-5.014 -38.126)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_347" data-name="Path 347"
                                                            d="M22.164,142.6a1.041,1.041,0,0,0-.194.318c.606-.2.913.831,1.618.807a.888.888,0,0,0,.824-.7,1.308,1.308,0,0,1-.958.218c-.454-.1-.336-.274-1.17-.44a3.176,3.176,0,0,1,1.125.321,1.185,1.185,0,0,0,.986-.222,1.108,1.108,0,0,0-1.782-.662,1.537,1.537,0,0,0-.449.357m.018-.143c-.371.371-.478.686-.166.973a.47.47,0,0,1-.417-.3,1.886,1.886,0,0,1,.112-.183.343.343,0,0,0,.115.31.608.608,0,0,1-.06-.39,2.013,2.013,0,0,1,.416-.414"
                                                            transform="translate(-6.186 -38.273)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_348" data-name="Path 348"
                                                            d="M18.966,139.723a3.264,3.264,0,0,0,2.175,1.312,3.213,3.213,0,0,0,3.674-2.669,3.029,3.029,0,0,0,.033-.412h0v-8.411l-.659-.672h2.137s1.52.217,1.52,2.326a2.256,2.256,0,0,1-2.2,2.475v.125a3.4,3.4,0,0,0,.51.037,2.849,2.849,0,0,0,3.01-2.637,2.562,2.562,0,0,0-2.662-2.45H23.283v.124h.386v7.078A2.671,2.671,0,0,1,24.66,138a3.03,3.03,0,0,1-3.157,2.886,3.249,3.249,0,0,1-2.583-1.226Z"
                                                            transform="translate(-5.464 -34.698)" fill="#708c9b" />
                                                        <path id="Path_349" data-name="Path 349"
                                                            d="M26.605,141.817a2.924,2.924,0,0,1-.565.762l-.093-.082a1.71,1.71,0,0,0,.487-.61,1.569,1.569,0,0,0,.129-.69,1.365,1.365,0,0,0-.018-.2,2.959,2.959,0,0,1,.061.817"
                                                            transform="translate(-7.358 -38)" fill="#708c9b" />
                                                        <path id="Path_350" data-name="Path 350"
                                                            d="M24.976,138.607a2.3,2.3,0,0,1,.972,1.888,2.209,2.209,0,0,1-2.176,2.112s1.987-.28,2.306-1.716a2.258,2.258,0,0,0-.812-2.254Z"
                                                            transform="translate(-6.772 -37.355)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_351" data-name="Path 351"
                                                            d="M22.308,137.944a1.49,1.49,0,0,1,.546.009,1.151,1.151,0,0,1,.435.243,1.273,1.273,0,0,0-.732-.454l-.25.2"
                                                            transform="translate(-6.377 -37.122)" fill="#708c9b" />
                                                        <path id="Path_352" data-name="Path 352"
                                                            d="M21.479,136.747c-.038.37-.367.618-.6.968a.51.51,0,0,0,.3.851,1.312,1.312,0,0,0,.568-1.392,1.6,1.6,0,0,1-.07,1.007h0a2.551,2.551,0,0,1-.825.65,2.2,2.2,0,0,1-.974.224.824.824,0,0,1-.481-.162,1.634,1.634,0,0,1-.419-.45,3.122,3.122,0,0,1-.324-.681,4.318,4.318,0,0,1-.2-.869q-.037-.262-.056-.537a3.546,3.546,0,0,1,.006-.55h3.824a3.571,3.571,0,0,0-.169-1.1,2.878,2.878,0,0,0-.481-.918,2.371,2.371,0,0,0-.744-.625,1.988,1.988,0,0,0-.955-.232,2.293,2.293,0,0,0-1.037.244,2.689,2.689,0,0,0-.85.668,3.3,3.3,0,0,0-.575.993,3.444,3.444,0,0,0-.212,1.218,3.509,3.509,0,0,0,.35,1.549l.313.313,1.061,1.061a2.433,2.433,0,0,0,.95.2,2.278,2.278,0,0,0,1.043-.243,2.544,2.544,0,0,0,.36-.226c.117.244.332.37.7.21.606-.263.556-1.85-.506-2.173m-2.915-2.1a3.686,3.686,0,0,1,.318-.837,1.751,1.751,0,0,1,.45-.556.868.868,0,0,1,.543-.2.691.691,0,0,1,.494.213,1.634,1.634,0,0,1,.362.568,3.816,3.816,0,0,1,.218.837,7.726,7.726,0,0,1,.088,1.006H18.4a5.664,5.664,0,0,1,.163-1.031"
                                                            transform="translate(-5.001 -35.826)" fill="#708c9b" />
                                                        <path id="Path_353" data-name="Path 353"
                                                            d="M15.785,128.865h-1.05l.663.675v8.323h.387v.125H13.823v-.125h1.05l-.662-.663v-8.336h-.388v-.125h1.962Z"
                                                            transform="translate(-4.09 -34.696)" fill="#708c9b" />
                                                        <path id="Path_354" data-name="Path 354"
                                                            d="M28.752,144.255a.552.552,0,0,1-.427-.154l.148-.148a.383.383,0,0,0,.283.1c.134,0,.207-.051.207-.145a.133.133,0,0,0-.036-.1.176.176,0,0,0-.1-.041l-.142-.02a.394.394,0,0,1-.226-.1.308.308,0,0,1-.084-.23.361.361,0,0,1,.408-.355.5.5,0,0,1,.378.137l-.145.143a.327.327,0,0,0-.24-.081c-.121,0-.181.067-.181.148a.112.112,0,0,0,.035.083.19.19,0,0,0,.108.046l.138.02a.383.383,0,0,1,.224.09.327.327,0,0,1,.091.248c0,.226-.189.355-.434.355"
                                                            transform="translate(-7.999 -38.557)" fill="#708c9b" />
                                                        <rect id="Rectangle_1401" data-name="Rectangle 1401"
                                                            width="0.229" height="1.17"
                                                            transform="translate(21.418 104.518)" fill="#708c9b" />
                                                        <path id="Path_355" data-name="Path 355"
                                                            d="M30.982,143.808h-.225v.44h-.229v-1.17h.454a.365.365,0,1,1,0,.73m-.012-.526h-.213v.321h.213a.161.161,0,1,0,0-.321"
                                                            transform="translate(-8.593 -38.56)" fill="#708c9b" />
                                                        <path id="Path_356" data-name="Path 356"
                                                            d="M32.245,144.255a.552.552,0,0,1-.427-.154l.148-.148a.383.383,0,0,0,.283.1c.134,0,.207-.051.207-.145a.133.133,0,0,0-.036-.1.176.176,0,0,0-.1-.041l-.142-.02a.394.394,0,0,1-.226-.1.308.308,0,0,1-.084-.23.361.361,0,0,1,.408-.355.5.5,0,0,1,.378.137l-.145.143a.327.327,0,0,0-.24-.081c-.121,0-.18.067-.18.148a.111.111,0,0,0,.034.083.19.19,0,0,0,.108.046l.138.02a.383.383,0,0,1,.224.09.327.327,0,0,1,.091.248c0,.226-.189.355-.434.355"
                                                            transform="translate(-8.94 -38.557)" fill="#708c9b" />
                                                        <path id="Path_357" data-name="Path 357"
                                                            d="M34.528,144.126a.453.453,0,0,1-.633,0c-.118-.118-.115-.264-.115-.467s0-.348.115-.467a.455.455,0,0,1,.633,0c.118.118.117.264.117.467s0,.348-.117.467m-.169-.8a.188.188,0,0,0-.146-.062.193.193,0,0,0-.148.062c-.045.05-.056.1-.056.329s.011.28.056.329a.193.193,0,0,0,.148.063.189.189,0,0,0,.146-.063c.045-.049.058-.1.058-.329s-.013-.279-.058-.329"
                                                            transform="translate(-9.469 -38.557)" fill="#708c9b" />
                                                        <path id="Path_358" data-name="Path 358"
                                                            d="M35.533,143.282v.288h.462v.2h-.462v.475H35.3v-1.17h.771v.2Z"
                                                            transform="translate(-9.88 -38.56)" fill="#708c9b" />
                                                        <path id="Path_359" data-name="Path 359"
                                                            d="M37.867,144.248l-.463-.718v.718h-.229v-1.17h.2l.463.717v-.717h.229v1.17Z"
                                                            transform="translate(-10.384 -38.56)" fill="#708c9b" />
                                                        <path id="Path_360" data-name="Path 360"
                                                            d="M39.414,144.249l-.069-.207h-.416l-.071.207H38.62l.426-1.171h.179l.427,1.171Zm-.273-.825-.148.426h.291Z"
                                                            transform="translate(-10.773 -38.56)" fill="#708c9b" />
                                                        <path id="Path_361" data-name="Path 361"
                                                            d="M40.532,143.282v.966H40.3v-.966H40v-.2h.84v.2Z"
                                                            transform="translate(-11.145 -38.56)" fill="#708c9b" />
                                                        <path id="Path_362" data-name="Path 362"
                                                            d="M41.829,144.258a.406.406,0,0,1-.43-.411v-.77h.228v.761a.2.2,0,1,0,.406,0v-.761h.226v.77a.406.406,0,0,1-.43.411"
                                                            transform="translate(-11.522 -38.56)" fill="#708c9b" />
                                                        <path id="Path_363" data-name="Path 363"
                                                            d="M43.568,144.248l-.229-.467h-.164v.467h-.229v-1.17h.459a.354.354,0,0,1,.38.359.315.315,0,0,1-.213.307l.261.5Zm-.178-.966h-.215v.309h.215a.155.155,0,1,0,0-.309"
                                                            transform="translate(-11.939 -38.56)" fill="#708c9b" />
                                                        <path id="Path_364" data-name="Path 364"
                                                            d="M44.439,144.248v-1.17h.771v.2h-.542v.275h.462v.2h-.462v.284h.542v.2Z"
                                                            transform="translate(-12.342 -38.56)" fill="#708c9b" />
                                                        <path id="Path_365" data-name="Path 365"
                                                            d="M34.743,13.4V8.923c0-.7-.755-1.4-.809-2.427s.432-2,.432-3.722S31.993.508,31.993.508H20.719s-2.374.54-2.374,2.265.486,2.7.432,3.722-.809,1.725-.809,2.427V13.4s1.132.592.863,1.24a1.634,1.634,0,0,1-.863.863V35.245H34.743V15.5a1.637,1.637,0,0,1-.863-.863C33.611,13.992,34.743,13.4,34.743,13.4Z"
                                                            transform="translate(-5.208 -0.137)" fill="none"
                                                            stroke="#2e613a" stroke-miterlimit="10"
                                                            stroke-width="1" />
                                                        <path id="Path_366" data-name="Path 366"
                                                            d="M34.743,13.4V8.923c0-.7-.755-1.4-.809-2.427s.432-2,.432-3.722S31.993.508,31.993.508H20.719s-2.374.54-2.374,2.265.486,2.7.432,3.722-.809,1.725-.809,2.427V13.4s1.132.592.863,1.24a1.634,1.634,0,0,1-.863.863V35.245H34.743V15.5a1.637,1.637,0,0,1-.863-.863c-.269-.648.863-1.24.863-1.24"
                                                            transform="translate(-5.208 -0.137)" fill="#2e613a" />
                                                        <path id="Path_369" data-name="Path 369"
                                                            d="M31.518,0V36.876H24.964V0"
                                                            transform="translate(-7.093)" fill="none" />
                                                        <path id="Path_368" data-name="Path 368"
                                                            d="M31.518,0V35.992H24.964V0"
                                                            transform="translate(-7.093 -0.256)" fill="#fff" />
                                                    </g>
                                                </g>
                                                <text id="_750_ml" data-name="750 ml"
                                                    transform="translate(150.5 231.5)" fill="#b8ba43" font-size="30"
                                                    font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                                    letter-spacing="-0.07em">
                                                    <tspan x="-41.449" y="23">750 ml</tspan>
                                                </text>
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">


                        <div class="container">
                            <div class="row">
                                <h2 class="titleStep">Vinegars</h2>
                                <div class="col-lg-4">

                                    <div class="cat3">
                                        <input type="radio" name="match" id="match_3">
                                        <label for="match_3">
                                            <svg class="highlight-cat3" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="313"
                                                height="312" viewBox="0 0 313 312">
                                                <defs>
                                                    <filter id="Rectangle_1410" x="0" y="0"
                                                        width="313" height="312" filterUnits="userSpaceOnUse">
                                                        <feOffset dy="1" input="SourceAlpha" />
                                                        <feGaussianBlur stdDeviation="6.5" result="blur" />
                                                        <feFlood flood-opacity="0.043" />
                                                        <feComposite operator="in" in2="blur" />
                                                        <feComposite in="SourceGraphic" />
                                                    </filter>
                                                </defs>
                                                <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectangle_1410)">
                                                    <rect id="Rectangle_1410-2" data-name="Rectangle 1410"
                                                        width="274" height="273" rx="10"
                                                        transform="translate(19.5 18.5)" fill="#fff" />
                                                </g>
                                                <g id="Group_12383" data-name="Group 12383"
                                                    transform="translate(138.219 55.953)">
                                                    <g id="Group_12381" data-name="Group 12381"
                                                        transform="translate(0 0)">
                                                        <path id="Path_370" data-name="Path 370"
                                                            d="M32.113,7.115c-.046-.372-.571-.591-.609-.951s.758-.642.584-1.285a3.166,3.166,0,0,1-.045-1.285,1.9,1.9,0,0,0-.771-1.966C30.482.461,24.379.486,23.051.506,21.722.486,15.618.461,14.829,1.628a1.9,1.9,0,0,0-.771,1.966,3.152,3.152,0,0,1-.045,1.285c-.174.642.623.925.585,1.285s-.563.578-.609.951-.162,3.546-.136,3.855,1.015.372,1.169,1.028H31.08c.154-.656,1.144-.72,1.169-1.028s-.09-3.482-.136-3.855"
                                                            transform="translate(-4.557 -0.5)" fill="#2e613a" />
                                                        <path id="Path_371" data-name="Path 371"
                                                            d="M32.113,7.115c-.046-.372-.571-.591-.609-.951s.758-.642.584-1.285a3.166,3.166,0,0,1-.045-1.285,1.9,1.9,0,0,0-.771-1.966C30.482.461,24.379.486,23.051.506,21.722.486,15.618.461,14.829,1.628a1.9,1.9,0,0,0-.771,1.966,3.152,3.152,0,0,1-.045,1.285c-.174.642.623.925.585,1.285s-.563.578-.609.951-.162,3.546-.136,3.855,1.015.372,1.169,1.028H31.08c.154-.656,1.144-.72,1.169-1.028S32.159,7.487,32.113,7.115Z"
                                                            transform="translate(-4.557 -0.5)" fill="none"
                                                            stroke="#708c9b" stroke-miterlimit="10"
                                                            stroke-width="1" />
                                                        <path id="Path_372" data-name="Path 372"
                                                            d="M11.053,17.018,10.575,48s-.155,3.8-2.981,5.654S.5,58.379.5,63.159v94.98s-.154,5.089,3.7,6.58c2.319.9,7.464,1.179,11.2,1.263l2.954.022s11.667.2,15.522-1.285,3.7-6.58,3.7-6.58V63.159c0-4.78-4.266-7.659-7.093-9.508S27.5,48,27.5,48l-.479-30.979"
                                                            transform="translate(-0.5 -5.521)" fill="#d6dee2"
                                                            opacity="0.733" />
                                                        <path id="Path_373" data-name="Path 373"
                                                            d="M31.736,171.348H11.874a3.09,3.09,0,0,1-3.09-3.09V105.72a3.09,3.09,0,0,1,3.09-3.09H31.736a3.089,3.089,0,0,1,3.09,3.09v62.538a3.089,3.089,0,0,1-3.09,3.09"
                                                            transform="translate(-3.018 -31.543)" fill="#fff" />
                                                        <path id="Path_412" data-name="Path 412"
                                                            d="M4.439,0H21.6a4.439,4.439,0,0,1,4.439,4.439v59.84A4.439,4.439,0,0,1,21.6,68.718H4.439A4.439,4.439,0,0,1,0,64.279V4.439A4.439,4.439,0,0,1,4.439,0Z"
                                                            transform="translate(5.766 71.088)" fill="none" />
                                                        <path id="Path_374" data-name="Path 374"
                                                            d="M16.723,119.734a.577.577,0,0,0-.353-.168,1.324,1.324,0,0,0-.278,1.095.813.813,0,0,1,.631-.927"
                                                            transform="translate(-5.233 -36.69)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_375" data-name="Path 375"
                                                            d="M35.565,114.956c-.111.273-.342.278-.672.127a1.357,1.357,0,0,0,.369.17.418.418,0,0,0,.239-.132.241.241,0,0,1-.173.15,1.275,1.275,0,0,0,.145.029.327.327,0,0,0,.092-.342"
                                                            transform="translate(-10.954 -35.289)" fill="#708c9b" />
                                                        <path id="Path_376" data-name="Path 376"
                                                            d="M39.6,108.954a.956.956,0,0,1,.358.2,1.046,1.046,0,0,0-.6-.376l-.206.166a1.217,1.217,0,0,1,.449.008"
                                                            transform="translate(-12.249 -33.412)" fill="#708c9b" />
                                                        <path id="Path_377" data-name="Path 377"
                                                            d="M39.109,109.137c-.032.3-.3.507-.495.795a.42.42,0,0,0,.243.7,1.081,1.081,0,0,0,.471-1.144,1.047,1.047,0,0,1-.351,1.164,2.234,2.234,0,0,1-1.443.382l-.01.124a2.363,2.363,0,0,0,1.447-.349c.1.161.271.235.547.116.5-.214.463-1.52-.409-1.79"
                                                            transform="translate(-11.753 -33.52)" fill="#708c9b" />
                                                        <path id="Path_378" data-name="Path 378"
                                                            d="M34.033,114.33c-.278-.345.32-.794.134-1.246a.616.616,0,0,0-.085-.145,1.026,1.026,0,0,0-.9-.543.987.987,0,0,0-.983.675l-.526-.526h-.761v.109h.337v4.593l.577.577h-.914v.109h1.708v-.109H32.28l-.01-4.013c.106-1.039.722-1.107.722-1.107a.959.959,0,0,1,.528.015.9.9,0,0,1,.368.567c.046.319-.1.285,0,.867a2.211,2.211,0,0,1-.063-.809.821.821,0,0,0-.381-.588.769.769,0,0,0,0,1.318,1.071,1.071,0,0,0,.34.206.725.725,0,0,0,.254.049"
                                                            transform="translate(-9.743 -34.511)" fill="#708c9b" />
                                                        <path id="Path_379" data-name="Path 379"
                                                            d="M38.436,117.943a1.923,1.923,0,0,0,.849-.2,2.219,2.219,0,0,0,.718-.566l.077.065a2.312,2.312,0,0,1-.735.594,1.985,1.985,0,0,1-.909.212,2.107,2.107,0,0,1-.826-.174l-1.2-1.2a3.061,3.061,0,0,1-.3-1.349,3.012,3.012,0,0,1,.185-1.061,2.872,2.872,0,0,1,.5-.865,2.35,2.35,0,0,1,.741-.583,1.99,1.99,0,0,1,.9-.212,1.735,1.735,0,0,1,.833.2,2.071,2.071,0,0,1,.647.544,2.514,2.514,0,0,1,.419.8,3.1,3.1,0,0,1,.147.958H37.152a2.973,2.973,0,0,0,0,.479c.01.159.027.315.049.468a3.82,3.82,0,0,0,.174.757,2.716,2.716,0,0,0,.283.593,1.419,1.419,0,0,0,.364.392.717.717,0,0,0,.419.141m0-5.224a.757.757,0,0,0-.473.174,1.522,1.522,0,0,0-.391.484,3.158,3.158,0,0,0-.278.729,4.885,4.885,0,0,0-.142.9h2.3a6.622,6.622,0,0,0-.076-.876,3.3,3.3,0,0,0-.191-.729,1.4,1.4,0,0,0-.315-.495.6.6,0,0,0-.43-.185"
                                                            transform="translate(-11.323 -34.576)" fill="#708c9b" />
                                                        <path id="Path_380" data-name="Path 380"
                                                            d="M24.039,120.889a2.224,2.224,0,0,1-1.73,1.208.406.406,0,0,1-.149.056.574.574,0,0,1-.081.061c-.01.008-.019.019-.029.026a2.345,2.345,0,0,0,2.081-1.25.633.633,0,0,1-.092-.1"
                                                            transform="translate(-7.05 -37.092)" fill="#708c9b" />
                                                        <path id="Path_381" data-name="Path 381"
                                                            d="M21.143,122.461a2.762,2.762,0,0,1-3.1-.025c-.4-.549-1.363-1.025-1.579-1.6.419.635,1.261,1,1.642,1.506.168-1.027-1.188-1.1-1.776-1.932a.9.9,0,0,0-.1.324,1.876,1.876,0,0,0,.892,1.846.818.818,0,0,0,.8-.035,2.883,2.883,0,0,0,3.289-.018"
                                                            transform="translate(-5.278 -36.947)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_382" data-name="Path 382"
                                                            d="M20.69,121.419a.91.91,0,0,0-.169.277c.528-.175.8.724,1.41.7a.773.773,0,0,0,.718-.606,1.14,1.14,0,0,1-.835.19c-.4-.084-.292-.239-1.019-.384a2.775,2.775,0,0,1,.98.279,1.031,1.031,0,0,0,.86-.193.966.966,0,0,0-1.552-.577,1.346,1.346,0,0,0-.392.311m.015-.125c-.324.323-.417.6-.145.848a.41.41,0,0,1-.363-.258,1.636,1.636,0,0,1,.1-.16.3.3,0,0,0,.1.271.53.53,0,0,1-.052-.34,1.746,1.746,0,0,1,.362-.361"
                                                            transform="translate(-6.487 -37.099)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_383" data-name="Path 383"
                                                            d="M17.787,118.344a2.845,2.845,0,0,0,1.9,1.143,2.8,2.8,0,0,0,3.2-2.326,2.733,2.733,0,0,0,.029-.359h0v-7.329l-.574-.585H24.2s1.325.189,1.325,2.027a1.966,1.966,0,0,1-1.918,2.156v.109a2.961,2.961,0,0,0,.444.033,2.481,2.481,0,0,0,2.623-2.3,2.233,2.233,0,0,0-2.319-2.135H21.549v.109h.336v6.168a2.329,2.329,0,0,1,.864,1.788A2.641,2.641,0,0,1,20,119.359a2.832,2.832,0,0,1-2.251-1.068Z"
                                                            transform="translate(-5.742 -33.412)" fill="#708c9b" />
                                                        <path id="Path_384" data-name="Path 384"
                                                            d="M24.748,120.7a2.561,2.561,0,0,1-.493.664l-.081-.072a1.492,1.492,0,0,0,.424-.531,1.377,1.377,0,0,0,.113-.6,1.169,1.169,0,0,0-.016-.171,2.6,2.6,0,0,1,.053.711"
                                                            transform="translate(-7.696 -36.818)" fill="#708c9b" />
                                                        <path id="Path_385" data-name="Path 385"
                                                            d="M23.234,117.8a2.009,2.009,0,0,1,.848,1.645,1.926,1.926,0,0,1-1.9,1.84s1.731-.244,2.01-1.5a1.967,1.967,0,0,0-.708-1.964Z"
                                                            transform="translate(-7.091 -36.153)" fill="#708c9b"
                                                            fill-rule="evenodd" />
                                                        <path id="Path_386" data-name="Path 386"
                                                            d="M20.846,117.182a1.289,1.289,0,0,1,.476.008,1.007,1.007,0,0,1,.379.212,1.116,1.116,0,0,0-.638-.4l-.218.177"
                                                            transform="translate(-6.684 -35.912)" fill="#708c9b" />
                                                        <path id="Path_387" data-name="Path 387"
                                                            d="M19.9,115.931c-.033.324-.32.539-.521.844a.444.444,0,0,0,.259.741,1.143,1.143,0,0,0,.494-1.213,1.387,1.387,0,0,1-.061.878h0a2.212,2.212,0,0,1-.718.567,1.925,1.925,0,0,1-.849.2.718.718,0,0,1-.42-.141,1.415,1.415,0,0,1-.365-.393,2.732,2.732,0,0,1-.283-.593,3.831,3.831,0,0,1-.174-.757c-.022-.152-.038-.308-.049-.468a3.056,3.056,0,0,1,.006-.479h3.331a3.108,3.108,0,0,0-.147-.958,2.5,2.5,0,0,0-.419-.8,2.056,2.056,0,0,0-.648-.544,1.734,1.734,0,0,0-.832-.2,2,2,0,0,0-.9.212,2.345,2.345,0,0,0-.74.583,2.854,2.854,0,0,0-.5.866,3.012,3.012,0,0,0-.185,1.061,3.062,3.062,0,0,0,.3,1.35l.274.274.924.924a2.114,2.114,0,0,0,.828.174,1.987,1.987,0,0,0,.909-.212,2.373,2.373,0,0,0,.314-.2c.1.212.289.323.614.183.528-.23.484-1.612-.441-1.895m-2.54-1.826a3.2,3.2,0,0,1,.278-.729,1.533,1.533,0,0,1,.392-.484.757.757,0,0,1,.474-.175.6.6,0,0,1,.429.185,1.424,1.424,0,0,1,.316.5,3.341,3.341,0,0,1,.191.729,6.763,6.763,0,0,1,.076.877h-2.3a4.9,4.9,0,0,1,.141-.9"
                                                            transform="translate(-5.265 -34.575)" fill="#708c9b" />
                                                        <path id="Path_388" data-name="Path 388"
                                                            d="M14.8,108.882h-.915l.577.588v7.253H14.8v.109h-1.71v-.109H14l-.577-.577v-7.264h-.338v-.109H14.8Z"
                                                            transform="translate(-4.325 -33.41)" fill="#708c9b" />
                                                        <path id="Path_389" data-name="Path 389"
                                                            d="M26.72,122.91a.479.479,0,0,1-.372-.134l.129-.129a.333.333,0,0,0,.246.086c.118,0,.18-.045.18-.126a.114.114,0,0,0-.031-.086.155.155,0,0,0-.09-.035l-.123-.017a.34.34,0,0,1-.2-.084.27.27,0,0,1-.073-.2.314.314,0,0,1,.356-.31.436.436,0,0,1,.329.119l-.126.125a.285.285,0,0,0-.209-.07c-.106,0-.158.059-.158.129a.1.1,0,0,0,.031.073.173.173,0,0,0,.094.04l.12.017a.333.333,0,0,1,.195.079.286.286,0,0,1,.079.216c0,.2-.164.309-.378.309"
                                                            transform="translate(-8.356 -37.391)" fill="#708c9b" />
                                                        <rect id="Rectangle_1406" data-name="Rectangle 1406"
                                                            width="0.199" height="1.02"
                                                            transform="translate(18.944 84.491)" fill="#708c9b" />
                                                        <path id="Path_390" data-name="Path 390"
                                                            d="M28.758,122.521h-.2v.384h-.2v-1.02h.4a.318.318,0,1,1,0,.635m-.01-.458h-.186v.279h.186a.14.14,0,1,0,0-.279"
                                                            transform="translate(-8.969 -37.395)" fill="#708c9b" />
                                                        <path id="Path_391" data-name="Path 391"
                                                            d="M29.915,122.91a.479.479,0,0,1-.372-.134l.129-.129a.333.333,0,0,0,.246.086c.118,0,.18-.045.18-.126a.114.114,0,0,0-.031-.086.155.155,0,0,0-.09-.035l-.123-.017a.34.34,0,0,1-.2-.084.27.27,0,0,1-.073-.2.314.314,0,0,1,.355-.31.437.437,0,0,1,.329.119l-.126.125a.285.285,0,0,0-.209-.07c-.106,0-.158.059-.158.129a.1.1,0,0,0,.031.073.171.171,0,0,0,.094.04l.12.017a.333.333,0,0,1,.195.079.286.286,0,0,1,.079.216c0,.2-.164.309-.378.309"
                                                            transform="translate(-9.327 -37.391)" fill="#708c9b" />
                                                        <path id="Path_392" data-name="Path 392"
                                                            d="M31.989,122.8a.4.4,0,0,1-.551,0c-.1-.1-.1-.23-.1-.406s0-.3.1-.407a.4.4,0,0,1,.551,0c.1.1.1.23.1.407s0,.3-.1.406m-.148-.693a.166.166,0,0,0-.127-.054.169.169,0,0,0-.129.054c-.039.043-.049.09-.049.287s.01.243.049.286a.167.167,0,0,0,.129.054.164.164,0,0,0,.127-.054c.038-.043.05-.09.05-.286s-.012-.244-.05-.287"
                                                            transform="translate(-9.873 -37.392)" fill="#708c9b" />
                                                        <path id="Path_393" data-name="Path 393"
                                                            d="M32.93,122.063v.251h.4v.177h-.4v.414h-.2v-1.02H33.4v.177Z"
                                                            transform="translate(-10.297 -37.395)" fill="#708c9b" />
                                                        <path id="Path_394" data-name="Path 394"
                                                            d="M35.045,122.905l-.4-.626v.626h-.2v-1.02h.177l.4.624v-.624h.2v1.02Z"
                                                            transform="translate(-10.816 -37.395)" fill="#708c9b" />
                                                        <path id="Path_395" data-name="Path 395"
                                                            d="M36.456,122.906l-.061-.18h-.362l-.062.18h-.207l.371-1.02h.156l.372,1.02Zm-.238-.719-.129.371h.253Z"
                                                            transform="translate(-11.218 -37.395)" fill="#708c9b" />
                                                        <path id="Path_396" data-name="Path 396"
                                                            d="M37.489,122.063v.842h-.2v-.842h-.267v-.177h.732v.177Z"
                                                            transform="translate(-11.601 -37.395)" fill="#708c9b" />
                                                        <path id="Path_397" data-name="Path 397"
                                                            d="M38.679,122.914a.355.355,0,0,1-.375-.358v-.671h.2v.663a.177.177,0,1,0,.354,0v-.663h.2v.671a.355.355,0,0,1-.375.358"
                                                            transform="translate(-11.99 -37.395)" fill="#708c9b" />
                                                        <path id="Path_398" data-name="Path 398"
                                                            d="M40.262,122.906l-.2-.406h-.143v.406h-.2v-1.02h.4a.308.308,0,0,1,.331.312.275.275,0,0,1-.187.268l.228.44Zm-.155-.842h-.188v.269h.188a.135.135,0,1,0,0-.269"
                                                            transform="translate(-12.421 -37.395)" fill="#708c9b" />
                                                        <path id="Path_399" data-name="Path 399"
                                                            d="M41.085,122.905v-1.02h.672v.177h-.473v.239h.4v.177h-.4v.248h.473v.177Z"
                                                            transform="translate(-12.836 -37.395)" fill="#708c9b" />
                                                    </g>
                                                </g>
                                                <text id="_500_ml" data-name="500 ml"
                                                    transform="translate(150.5 231.5)" fill="#b8ba43" font-size="30"
                                                    font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                                    letter-spacing="-0.07em">
                                                    <tspan x="-41.449" y="23">500 ml</tspan>
                                                </text>
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btns">
                        <button type="button" class="next btn-next action-button">Next<i class="fa fa-arrow-right"
                                aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

        </div>

        {{-- second step --}}
        <div class="secondChoice">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="titleStep">JUICES</h2>
                    </div>
                    <div class="card content">
                        <div class="row">
                            <div class="col-lg-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="147" height="188.039"
                                    viewBox="0 0 147 188.039">
                                    <g id="Group_12386" data-name="Group 12386" transform="translate(54.616 0.063)">
                                        <g id="Group_12382" data-name="Group 12382" transform="translate(0 0)">
                                            <path id="Path_304" data-name="Path 304"
                                                d="M9.066,13.77V8.487s.946-.7,0-1.913V3.051S9.578.5,13.586.5H28.4s2.915.243,3.036,2.187V6.425s-.85,1.242,0,2.091V13.77Z"
                                                transform="translate(-1.592 -0.064)" fill="none" stroke="#2e613a"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                            <path id="Path_305" data-name="Path 305"
                                                d="M30.584,27.945V17.257l.855-1.549H9.065l1.241,1.427v10.81"
                                                transform="translate(-1.592 -2.003)" fill="#708c9b" stroke="#708c9b"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                opacity="0.153" />
                                            <path id="Path_306" data-name="Path 306"
                                                d="M29.492,29.733v13.5c0,2.512,3.272,4.72,3.272,4.72a20.409,20.409,0,0,1,6.779,14.027V136.4c0,5.411-3.383,5.992-3.383,5.992H4.856C.42,142.387.5,136.4.5,136.4V62.563A18.943,18.943,0,0,1,6.1,49.516a12.447,12.447,0,0,0,3.109-5.026V29.733"
                                                transform="translate(-0.5 -3.791)" fill="#f3b939" />
                                            <path id="Path_307" data-name="Path 307"
                                                d="M9.066,7.3S12,6.22,20.253,6.22a69.031,69.031,0,0,1,11.186.6"
                                                transform="translate(-1.592 -0.793)" fill="none" stroke="gray"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                            <path id="Path_308" data-name="Path 308"
                                                d="M30.751,135.906H9.595a3.128,3.128,0,0,1-3.128-3.127V72.152a3.128,3.128,0,0,1,3.128-3.128H30.751a3.127,3.127,0,0,1,3.127,3.128v60.626a3.127,3.127,0,0,1-3.127,3.127"
                                                transform="translate(-1.261 -8.8)" fill="#f8fcfd" opacity="0.997" />
                                            <path id="Path_409" data-name="Path 409"
                                                d="M3.584,0H23.826a3.585,3.585,0,0,1,3.585,3.585V63.3a3.585,3.585,0,0,1-3.585,3.585H3.584A3.584,3.584,0,0,1,0,63.3V3.584A3.584,3.584,0,0,1,3.584,0Z"
                                                transform="translate(5.206 60.224)" fill="none" />
                                            <path id="Path_309" data-name="Path 309"
                                                d="M13.272,87.094a.606.606,0,0,0-.372-.176,1.393,1.393,0,0,0-.293,1.152.855.855,0,0,1,.665-.975"
                                                transform="translate(-2.041 -11.081)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_310" data-name="Path 310"
                                                d="M29.1,83.046c-.117.287-.36.293-.708.133a1.444,1.444,0,0,0,.388.179.443.443,0,0,0,.252-.14.255.255,0,0,1-.183.158,1.49,1.49,0,0,0,.154.03.343.343,0,0,0,.1-.36"
                                                transform="translate(-4.056 -10.588)" fill="#708c9b" />
                                            <path id="Path_311" data-name="Path 311"
                                                d="M32.443,78.043a1.018,1.018,0,0,1,.377.211,1.1,1.1,0,0,0-.633-.394c-.072.058-.145.115-.217.175a1.276,1.276,0,0,1,.473.009"
                                                transform="translate(-4.512 -9.927)" fill="#708c9b" />
                                            <path id="Path_312" data-name="Path 312"
                                                d="M32.269,78.16c-.034.321-.32.534-.521.837a.442.442,0,0,0,.256.738,1.136,1.136,0,0,0,.495-1.2,1.1,1.1,0,0,1-.369,1.225,2.346,2.346,0,0,1-1.518.4l-.01.13a2.479,2.479,0,0,0,1.523-.368c.106.171.286.248.576.123.526-.226.487-1.6-.431-1.884"
                                                transform="translate(-4.337 -9.965)" fill="#708c9b" />
                                            <path id="Path_313" data-name="Path 313"
                                                d="M28.334,82.932c-.292-.364.337-.835.141-1.311a.677.677,0,0,0-.089-.154,1.081,1.081,0,0,0-.95-.571,1.039,1.039,0,0,0-1.035.711l-.554-.553h-.8v.114H25.4V86l.607.607h-.962v.115h1.8v-.115h-.355l-.01-4.224c.112-1.093.761-1.165.761-1.165a1.013,1.013,0,0,1,.555.017.951.951,0,0,1,.387.6c.049.335-.1.3-.005.913a2.339,2.339,0,0,1-.065-.852.864.864,0,0,0-.4-.619.809.809,0,0,0,0,1.387,1.134,1.134,0,0,0,.359.216.738.738,0,0,0,.267.052"
                                                transform="translate(-3.629 -10.314)" fill="#708c9b" />
                                            <path id="Path_314" data-name="Path 314"
                                                d="M31.862,86.69a2.027,2.027,0,0,0,.894-.206,2.332,2.332,0,0,0,.756-.6l.08.069a2.412,2.412,0,0,1-.773.624,2.085,2.085,0,0,1-.957.223,2.225,2.225,0,0,1-.87-.183l-1.261-1.26a3.223,3.223,0,0,1-.32-1.42,3.16,3.16,0,0,1,.195-1.117,3,3,0,0,1,.527-.911,2.449,2.449,0,0,1,.779-.613,2.091,2.091,0,0,1,.95-.223,1.835,1.835,0,0,1,.877.211,2.188,2.188,0,0,1,.681.573,2.64,2.64,0,0,1,.441.842,3.255,3.255,0,0,1,.154,1.009h-3.5a3.031,3.031,0,0,0-.005.5c.01.168.028.332.051.493a3.945,3.945,0,0,0,.183.8,2.868,2.868,0,0,0,.3.625,1.463,1.463,0,0,0,.384.412.755.755,0,0,0,.441.149m0-5.5a.8.8,0,0,0-.5.183,1.608,1.608,0,0,0-.412.51,3.364,3.364,0,0,0-.292.768,5.1,5.1,0,0,0-.149.945h2.417a7.057,7.057,0,0,0-.08-.922,3.457,3.457,0,0,0-.2-.767,1.487,1.487,0,0,0-.332-.522.632.632,0,0,0-.453-.195"
                                                transform="translate(-4.186 -10.337)" fill="#708c9b" />
                                            <path id="Path_315" data-name="Path 315"
                                                d="M19.7,88.028A2.34,2.34,0,0,1,17.879,89.3a.421.421,0,0,1-.157.058.483.483,0,0,1-.086.064c-.01.009-.02.02-.031.028a2.467,2.467,0,0,0,2.19-1.316.655.655,0,0,1-.1-.106"
                                                transform="translate(-2.681 -11.223)" fill="#708c9b" />
                                            <path id="Path_316" data-name="Path 316"
                                                d="M17.893,89.785a2.909,2.909,0,0,1-3.262-.026c-.422-.578-1.434-1.079-1.662-1.683.441.668,1.326,1.057,1.728,1.585.177-1.081-1.25-1.16-1.869-2.034a.941.941,0,0,0-.106.34,1.973,1.973,0,0,0,.94,1.943.861.861,0,0,0,.846-.036,3.036,3.036,0,0,0,3.462-.019"
                                                transform="translate(-2.057 -11.172)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_317" data-name="Path 317"
                                                d="M16.569,88.582a.932.932,0,0,0-.178.292c.556-.185.837.762,1.483.74a.813.813,0,0,0,.756-.639,1.192,1.192,0,0,1-.879.2c-.416-.088-.308-.251-1.072-.4a2.906,2.906,0,0,1,1.031.294,1.085,1.085,0,0,0,.9-.2,1.017,1.017,0,0,0-1.634-.607,1.421,1.421,0,0,0-.412.327m.016-.131c-.34.34-.439.629-.152.893a.432.432,0,0,1-.383-.271,1.838,1.838,0,0,1,.1-.168.317.317,0,0,0,.106.285.559.559,0,0,1-.055-.359,1.829,1.829,0,0,1,.381-.38"
                                                transform="translate(-2.482 -11.226)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_318" data-name="Path 318"
                                                d="M14.036,87.928a3,3,0,0,0,2,1.2,2.913,2.913,0,0,0,3.4-2.826V78.59l-.6-.616h1.961s1.393.2,1.393,2.133a2.07,2.07,0,0,1-2.019,2.27v.113a3.127,3.127,0,0,0,.468.035,2.613,2.613,0,0,0,2.761-2.419A2.351,2.351,0,0,0,20.95,77.86H18v.114h.353v6.492a2.449,2.449,0,0,1,.91,1.882A2.78,2.78,0,0,1,16.363,89a2.982,2.982,0,0,1-2.37-1.124Z"
                                                transform="translate(-2.22 -9.927)" fill="#708c9b" />
                                            <path id="Path_319" data-name="Path 319"
                                                d="M19.994,88.018a2.682,2.682,0,0,1-.519.7l-.085-.075a1.562,1.562,0,0,0,.446-.559,1.425,1.425,0,0,0,.119-.633,1.14,1.14,0,0,0-.017-.181,2.742,2.742,0,0,1,.056.749"
                                                transform="translate(-2.908 -11.126)" fill="#708c9b" />
                                            <path id="Path_320" data-name="Path 320"
                                                d="M18.824,85.432a2.114,2.114,0,0,1,.892,1.732,2.027,2.027,0,0,1-2,1.938s1.823-.257,2.116-1.575a2.071,2.071,0,0,0-.745-2.067Z"
                                                transform="translate(-2.695 -10.892)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_321" data-name="Path 321"
                                                d="M16.595,84.953a1.372,1.372,0,0,1,.5.008,1.05,1.05,0,0,1,.4.223,1.17,1.17,0,0,0-.671-.417l-.229.186"
                                                transform="translate(-2.552 -10.807)" fill="#708c9b" />
                                            <path id="Path_322" data-name="Path 322"
                                                d="M16.6,84.573c-.035.339-.337.567-.548.888a.467.467,0,0,0,.273.78,1.2,1.2,0,0,0,.52-1.276,1.47,1.47,0,0,1-.064.924h0a2.335,2.335,0,0,1-.756.6,2.027,2.027,0,0,1-.894.206.753.753,0,0,1-.441-.149,1.492,1.492,0,0,1-.384-.413A2.849,2.849,0,0,1,14,85.5a4,4,0,0,1-.183-.8q-.034-.241-.051-.493a3.245,3.245,0,0,1,.005-.5h3.507a3.256,3.256,0,0,0-.155-1.009,2.622,2.622,0,0,0-.441-.842A2.18,2.18,0,0,0,16,81.286a1.825,1.825,0,0,0-.877-.212,2.108,2.108,0,0,0-.951.223,2.471,2.471,0,0,0-.779.613,3.005,3.005,0,0,0-.527.911,3.162,3.162,0,0,0-.2,1.118A3.224,3.224,0,0,0,13,85.36l.288.288.973.973a2.214,2.214,0,0,0,.871.183,2.1,2.1,0,0,0,.957-.222,2.415,2.415,0,0,0,.331-.208c.106.224.3.34.647.193.556-.242.51-1.7-.464-1.994M13.923,82.65a3.348,3.348,0,0,1,.292-.768,1.6,1.6,0,0,1,.413-.51.8.8,0,0,1,.5-.183.636.636,0,0,1,.453.195,1.509,1.509,0,0,1,.332.522,3.528,3.528,0,0,1,.2.768,7.056,7.056,0,0,1,.08.923H13.774a5.167,5.167,0,0,1,.149-.946"
                                                transform="translate(-2.052 -10.336)" fill="#708c9b" />
                                            <path id="Path_323" data-name="Path 323"
                                                d="M11.879,77.969h-.962l.607.619v7.634h.355v.115h-1.8v-.115h.962l-.607-.607V77.969H10.08v-.114h1.8Z"
                                                transform="translate(-1.721 -9.926)" fill="#708c9b" />
                                            <path id="Path_324" data-name="Path 324"
                                                d="M21.608,89.947a.505.505,0,0,1-.392-.141l.135-.136a.351.351,0,0,0,.26.091c.123,0,.189-.047.189-.133a.12.12,0,0,0-.033-.091.159.159,0,0,0-.1-.038l-.129-.018a.36.36,0,0,1-.209-.089.286.286,0,0,1-.077-.211.331.331,0,0,1,.374-.325.462.462,0,0,1,.346.125l-.133.132a.3.3,0,0,0-.22-.074c-.112,0-.166.062-.166.136a.1.1,0,0,0,.031.077.188.188,0,0,0,.1.042l.127.018a.355.355,0,0,1,.205.083.3.3,0,0,1,.083.228c0,.208-.173.325-.4.325"
                                                transform="translate(-3.141 -11.328)" fill="#708c9b" />
                                            <rect id="Rectangle_1397" data-name="Rectangle 1397" width="0.209"
                                                height="1.073" transform="translate(19.077 77.535)"
                                                fill="#708c9b" />
                                            <path id="Path_325" data-name="Path 325"
                                                d="M23.323,89.535h-.207v.4h-.209V88.866h.416a.335.335,0,1,1,0,.669m-.01-.482h-.2v.294h.2a.147.147,0,1,0,0-.294"
                                                transform="translate(-3.357 -11.33)" fill="#708c9b" />
                                            <path id="Path_326" data-name="Path 326"
                                                d="M24.291,89.947a.506.506,0,0,1-.392-.141l.135-.136a.351.351,0,0,0,.26.091c.123,0,.189-.047.189-.133a.12.12,0,0,0-.033-.091.159.159,0,0,0-.1-.038l-.129-.018a.36.36,0,0,1-.209-.089.286.286,0,0,1-.077-.211.331.331,0,0,1,.374-.325.462.462,0,0,1,.346.125l-.133.132a.3.3,0,0,0-.22-.074c-.112,0-.166.062-.166.136a.1.1,0,0,0,.031.077.188.188,0,0,0,.1.042l.127.018a.353.353,0,0,1,.205.083.3.3,0,0,1,.083.228c0,.208-.173.325-.4.325"
                                                transform="translate(-3.483 -11.328)" fill="#708c9b" />
                                            <path id="Path_327" data-name="Path 327"
                                                d="M26.092,89.829a.416.416,0,0,1-.58,0c-.109-.108-.106-.243-.106-.428s0-.32.106-.428a.416.416,0,0,1,.58,0c.108.108.107.243.107.428s0,.319-.107.428m-.155-.729a.174.174,0,0,0-.134-.058.176.176,0,0,0-.135.058c-.041.045-.051.1-.051.3s.01.256.051.3a.176.176,0,0,0,.135.058.174.174,0,0,0,.134-.058c.041-.045.052-.1.052-.3s-.011-.257-.052-.3"
                                                transform="translate(-3.675 -11.328)" fill="#708c9b" />
                                            <path id="Path_328" data-name="Path 328"
                                                d="M26.785,89.052v.263h.423V89.5h-.423v.435h-.209V88.866h.707v.187Z"
                                                transform="translate(-3.824 -11.33)" fill="#708c9b" />
                                            <path id="Path_329" data-name="Path 329"
                                                d="M28.647,89.939l-.425-.659v.659h-.209V88.866H28.2l.425.657v-.657h.209v1.073Z"
                                                transform="translate(-4.007 -11.33)" fill="#708c9b" />
                                            <path id="Path_330" data-name="Path 330"
                                                d="M29.851,89.938l-.064-.189h-.381l-.065.189h-.218l.39-1.073h.164l.393,1.073Zm-.25-.756-.136.391h.266Z"
                                                transform="translate(-4.149 -11.33)" fill="#708c9b" />
                                            <path id="Path_331" data-name="Path 331"
                                                d="M30.67,89.052v.886H30.46v-.886H30.18v-.187h.77v.187Z"
                                                transform="translate(-4.284 -11.33)" fill="#708c9b" />
                                            <path id="Path_332" data-name="Path 332"
                                                d="M31.65,89.948a.373.373,0,0,1-.4-.377v-.706h.209v.7a.187.187,0,1,0,.373,0v-.7h.209v.706a.373.373,0,0,1-.4.377"
                                                transform="translate(-4.421 -11.33)" fill="#708c9b" />
                                            <path id="Path_333" data-name="Path 333"
                                                d="M33.015,89.939l-.21-.428h-.15v.428h-.21V88.866h.421a.324.324,0,0,1,.348.328.291.291,0,0,1-.2.283l.24.462Zm-.163-.886h-.2v.284h.2a.142.142,0,1,0,0-.284"
                                                transform="translate(-4.572 -11.33)" fill="#708c9b" />
                                            <path id="Path_334" data-name="Path 334"
                                                d="M33.591,89.939V88.866H34.3v.187h-.5V89.3h.424v.187H33.8v.261h.5v.187Z"
                                                transform="translate(-4.719 -11.33)" fill="#708c9b" />
                                            <path id="Path_335" data-name="Path 335"
                                                d="M9.066,13.77V8.487s.946-.7,0-1.913V3.051S9.578.5,13.586.5H28.4s2.915.243,3.036,2.187V6.425s-.85,1.242,0,2.091V13.77Z"
                                                transform="translate(-1.592 -0.064)" fill="#2e613a" />
                                            <path id="Path_336" data-name="Path 336" d="M24.388,0V27.411H16.56V0"
                                                transform="translate(-2.547 -0.001)" fill="#d6870a"
                                                opacity="0.996" />
                                            <path id="Path_337" data-name="Path 337" d="M24.388,0V27.411H16.56V0"
                                                transform="translate(-2.547 -0.001)" fill="none" />
                                        </g>
                                    </g>
                                    <text id="_250_ml" data-name="250 ml" transform="translate(0 158.039)"
                                        fill="#b8ba43" font-size="30" font-family="Helvetica-Bold, Helvetica"
                                        font-weight="700" letter-spacing="-0.07em">
                                        <tspan x="41.449" y="23">250 ml</tspan>
                                    </text>
                                </svg>
                            </div>
                            <div class="col-4 d-flex">
                                <input type="radio" name="match4" id="match_4">
                                <label for="match_4">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="191.903"
                                        height="165.414" viewBox="0 0 191.903 165.414">
                                        <defs>
                                            <clipPath id="clip-path">
                                                <rect id="Rectangle_1412" data-name="Rectangle 1412"
                                                    width="154.86" height="134.414" fill="none" />
                                            </clipPath>
                                        </defs>
                                        <text id="Pack_of_6_bottles" data-name="Pack of 6 bottles"
                                            transform="translate(3.403 147.414)" fill="#708c9b" font-size="18"
                                            font-family="Helvetica" letter-spacing="-0.03em">
                                            <tspan x="-62.218" y="14">Pack of 6 bottles</tspan>
                                        </text>
                                        <g id="Group_12443" data-name="Group 12443"
                                            transform="translate(-543.347 -444.565)">
                                            <g id="Group_12441" data-name="Group 12441"
                                                transform="translate(543.347 444.565)">
                                                <g id="Group_12389" data-name="Group 12389"
                                                    clip-path="url(#clip-path)">
                                                    <path id="Path_401" data-name="Path 401"
                                                        d="M169.606,8.955V124.6L68.729,136V15.6Z"
                                                        transform="translate(-15.136 -1.972)" fill="#708c9b"
                                                        stroke="#708c9b" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1"
                                                        opacity="0.111" />
                                                    <path id="Path_402" data-name="Path 402"
                                                        d="M53.7,14.747.5,5.074V117.815l53.2,17.327Z"
                                                        transform="translate(-0.11 -1.118)" fill="#6b8594"
                                                        stroke="#708c9b" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1"
                                                        opacity="0.277" />
                                                    <path id="Path_403" data-name="Path 403"
                                                        d="M154.58,7.093,95.533.5.5,4.067l53.2,9.674Z"
                                                        transform="translate(-0.11 -0.11)" fill="#708c9b"
                                                        stroke="#708c9b" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1" opacity="0.51" />
                                                </g>
                                            </g>
                                            <text id="x6" transform="translate(563.25 514.734)"
                                                fill="#708c9b" font-size="40"
                                                font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                                letter-spacing="-0.07em">
                                                <tspan x="-20.846" y="31">x6</tspan>
                                            </text>
                                        </g>
                                        <g id="Group_12448" data-name="Group 12448"
                                            transform="translate(65.019 59.459)">
                                            <g id="Group_12382" data-name="Group 12382"
                                                transform="translate(0 0)">
                                                <path id="Path_304" data-name="Path 304"
                                                    d="M9.066,5.678V3.617s.369-.273,0-.747V1.5s.2-1,1.763-1h5.781S17.748.6,17.8,1.354V2.812s-.332.484,0,.816v2.05Z"
                                                    transform="translate(-6.15 -0.331)" fill="none"
                                                    stroke="#2e613a" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1" />
                                                <path id="Path_305" data-name="Path 305"
                                                    d="M17.461,20.483v-4.17l.334-.6H9.065l.484.557v4.218"
                                                    transform="translate(-6.149 -10.361)" fill="#708c9b"
                                                    stroke="#708c9b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1" opacity="0.153" />
                                                <path id="Path_306" data-name="Path 306"
                                                    d="M11.812,29.733V35c0,.98,1.277,1.842,1.277,1.842a7.963,7.963,0,0,1,2.645,5.473V71.35c0,2.111-1.32,2.338-1.32,2.338H2.2C.469,73.687.5,71.35.5,71.35V42.542a7.391,7.391,0,0,1,2.187-5.09A4.856,4.856,0,0,0,3.9,35.491V29.733"
                                                    transform="translate(-0.5 -19.611)" fill="#708c9b"
                                                    stroke="#708c9b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1" opacity="0.278" />
                                                <path id="Path_307" data-name="Path 307"
                                                    d="M9.066,6.642a14.555,14.555,0,0,1,4.365-.422,26.934,26.934,0,0,1,4.365.233"
                                                    transform="translate(-6.15 -4.103)" fill="none"
                                                    stroke="gray" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1" />
                                                <path id="Path_308" data-name="Path 308"
                                                    d="M15.942,95.119H7.687a1.22,1.22,0,0,1-1.22-1.22V70.244a1.22,1.22,0,0,1,1.22-1.22h8.254a1.22,1.22,0,0,1,1.22,1.22V93.9a1.22,1.22,0,0,1-1.22,1.22"
                                                    transform="translate(-4.436 -45.527)" fill="#f8fcfd"
                                                    opacity="0.997" />
                                                <path id="Path_409" data-name="Path 409"
                                                    d="M1.4,0H9.3a1.4,1.4,0,0,1,1.4,1.4V24.7a1.4,1.4,0,0,1-1.4,1.4H1.4A1.4,1.4,0,0,1,0,24.7V1.4A1.4,1.4,0,0,1,1.4,0Z"
                                                    transform="translate(2.031 23.497)" fill="none" />
                                                <path id="Path_309" data-name="Path 309"
                                                    d="M12.854,86.987a.236.236,0,0,0-.145-.069.543.543,0,0,0-.114.449.334.334,0,0,1,.259-.381"
                                                    transform="translate(-8.472 -57.329)" fill="#708c9b"
                                                    fill-rule="evenodd" />
                                                <path id="Path_310" data-name="Path 310"
                                                    d="M28.667,83.046c-.046.112-.141.114-.276.052a.563.563,0,0,0,.151.07.173.173,0,0,0,.1-.054.1.1,0,0,1-.071.062.579.579,0,0,0,.06.012.134.134,0,0,0,.038-.141"
                                                    transform="translate(-18.896 -54.775)" fill="#708c9b" />
                                                <path id="Path_311" data-name="Path 311"
                                                    d="M32.155,77.931a.4.4,0,0,1,.147.082.431.431,0,0,0-.247-.154l-.085.068a.5.5,0,0,1,.185,0"
                                                    transform="translate(-21.257 -51.355)" fill="#708c9b" />
                                                <path id="Path_312" data-name="Path 312"
                                                    d="M31.252,78.16c-.013.125-.125.208-.2.326a.172.172,0,0,0,.1.288.443.443,0,0,0,.193-.47.429.429,0,0,1-.144.478.915.915,0,0,1-.592.157l0,.051a.967.967,0,0,0,.594-.144c.042.067.112.1.225.048.205-.088.19-.624-.168-.735"
                                                    transform="translate(-20.354 -51.552)" fill="#708c9b" />
                                                <path id="Path_313" data-name="Path 313"
                                                    d="M26.329,81.691c-.114-.142.131-.326.055-.512a.264.264,0,0,0-.035-.06.422.422,0,0,0-.371-.223.405.405,0,0,0-.4.277l-.216-.216h-.313V81h.139v1.886l.237.237h-.375v.045h.7v-.045h-.139l0-1.648c.044-.427.3-.454.3-.454a.4.4,0,0,1,.217.006.371.371,0,0,1,.151.233c.019.131-.04.117,0,.356a.913.913,0,0,1-.026-.332.337.337,0,0,0-.157-.241.316.316,0,0,0,0,.541.443.443,0,0,0,.14.084.288.288,0,0,0,.1.02"
                                                    transform="translate(-16.69 -53.357)" fill="#708c9b" />
                                                <path id="Path_314" data-name="Path 314"
                                                    d="M30.367,83.267a.791.791,0,0,0,.349-.08.91.91,0,0,0,.295-.233l.031.027a.941.941,0,0,1-.3.243.814.814,0,0,1-.373.087.868.868,0,0,1-.339-.071l-.492-.492a1.257,1.257,0,0,1-.125-.554,1.233,1.233,0,0,1,.076-.436,1.172,1.172,0,0,1,.206-.355.956.956,0,0,1,.3-.239.816.816,0,0,1,.371-.087.716.716,0,0,1,.342.082.854.854,0,0,1,.266.224,1.03,1.03,0,0,1,.172.329,1.27,1.27,0,0,1,.06.394H29.84a1.183,1.183,0,0,0,0,.2c0,.065.011.13.02.192a1.539,1.539,0,0,0,.071.31,1.119,1.119,0,0,0,.116.244.571.571,0,0,0,.15.161.294.294,0,0,0,.172.058m0-2.145a.311.311,0,0,0-.194.071.627.627,0,0,0-.161.2,1.312,1.312,0,0,0-.114.3,1.988,1.988,0,0,0-.058.369h.943a2.754,2.754,0,0,0-.031-.36,1.349,1.349,0,0,0-.078-.3.58.58,0,0,0-.129-.2.247.247,0,0,0-.177-.076"
                                                    transform="translate(-19.569 -53.476)" fill="#708c9b" />
                                                <path id="Path_315" data-name="Path 315"
                                                    d="M18.423,88.028a.913.913,0,0,1-.71.5.164.164,0,0,1-.061.023.188.188,0,0,1-.033.025l-.012.011a.962.962,0,0,0,.854-.513.256.256,0,0,1-.037-.041"
                                                    transform="translate(-11.783 -58.061)" fill="#708c9b" />
                                                <path id="Path_316" data-name="Path 316"
                                                    d="M14.732,88.469a1.135,1.135,0,0,1-1.273-.01c-.165-.225-.56-.421-.649-.657.172.261.517.412.674.619.069-.422-.488-.452-.729-.794a.367.367,0,0,0-.042.133.77.77,0,0,0,.367.758.336.336,0,0,0,.33-.014,1.185,1.185,0,0,0,1.351-.007"
                                                    transform="translate(-8.553 -57.797)" fill="#708c9b"
                                                    fill-rule="evenodd" />
                                                <path id="Path_317" data-name="Path 317"
                                                    d="M16.253,88.256a.364.364,0,0,0-.069.114c.217-.072.326.3.579.289a.317.317,0,0,0,.295-.249.465.465,0,0,1-.343.078c-.162-.034-.12-.1-.418-.158a1.134,1.134,0,0,1,.4.115.423.423,0,0,0,.353-.079.4.4,0,0,0-.638-.237.554.554,0,0,0-.161.128m.006-.051c-.133.133-.171.245-.059.348a.168.168,0,0,1-.149-.106.718.718,0,0,1,.04-.066.124.124,0,0,0,.042.111.218.218,0,0,1-.021-.14.713.713,0,0,1,.149-.148"
                                                    transform="translate(-10.756 -58.074)" fill="#708c9b"
                                                    fill-rule="evenodd" />
                                                <path id="Path_318" data-name="Path 318"
                                                    d="M14.01,81.788a1.169,1.169,0,0,0,.779.469,1.136,1.136,0,0,0,1.327-1.1v-3.01l-.236-.24h.765s.544.078.544.832a.808.808,0,0,1-.788.886v.044a1.22,1.22,0,0,0,.182.014,1.019,1.019,0,0,0,1.077-.944.917.917,0,0,0-.953-.877H15.555V77.9h.138v2.533a.956.956,0,0,1,.355.734,1.085,1.085,0,0,1-1.13,1.033,1.163,1.163,0,0,1-.925-.438Z"
                                                    transform="translate(-9.4 -51.355)" fill="#708c9b" />
                                                <path id="Path_319" data-name="Path 319"
                                                    d="M19.626,87.561a1.047,1.047,0,0,1-.2.273L19.39,87.8a.609.609,0,0,0,.174-.218.556.556,0,0,0,.046-.247.444.444,0,0,0-.006-.07,1.07,1.07,0,0,1,.022.292"
                                                    transform="translate(-12.959 -57.56)" fill="#708c9b" />
                                                <path id="Path_320" data-name="Path 320"
                                                    d="M18.15,85.432a.825.825,0,0,1,.348.676.791.791,0,0,1-.779.756s.711-.1.826-.614a.808.808,0,0,0-.291-.806Z"
                                                    transform="translate(-11.857 -56.349)" fill="#708c9b"
                                                    fill-rule="evenodd" />
                                                <path id="Path_321" data-name="Path 321"
                                                    d="M16.595,84.84a.535.535,0,0,1,.2,0,.41.41,0,0,1,.156.087.456.456,0,0,0-.262-.163l-.09.073"
                                                    transform="translate(-11.116 -55.91)" fill="#708c9b" />
                                                <path id="Path_322" data-name="Path 322"
                                                    d="M14.2,82.439c-.014.132-.131.221-.214.347a.182.182,0,0,0,.107.3.47.47,0,0,0,.2-.5.573.573,0,0,1-.025.361h0a.911.911,0,0,1-.3.233.791.791,0,0,1-.349.08.294.294,0,0,1-.172-.058.582.582,0,0,1-.15-.161,1.111,1.111,0,0,1-.116-.244,1.562,1.562,0,0,1-.071-.31q-.013-.094-.02-.192a1.266,1.266,0,0,1,0-.2h1.369a1.27,1.27,0,0,0-.061-.394,1.023,1.023,0,0,0-.172-.329.85.85,0,0,0-.266-.224.712.712,0,0,0-.342-.083.823.823,0,0,0-.371.087.964.964,0,0,0-.3.239,1.172,1.172,0,0,0-.206.355,1.234,1.234,0,0,0-.076.436,1.258,1.258,0,0,0,.125.554l.112.112.38.38a.864.864,0,0,0,.34.071A.818.818,0,0,0,14,83.223a.942.942,0,0,0,.129-.081c.042.087.118.133.252.075.217-.094.2-.662-.181-.778m-1.043-.75a1.306,1.306,0,0,1,.114-.3.626.626,0,0,1,.161-.2.311.311,0,0,1,.194-.071.248.248,0,0,1,.177.076.589.589,0,0,1,.13.2,1.376,1.376,0,0,1,.078.3,2.753,2.753,0,0,1,.031.36H13.1a2.016,2.016,0,0,1,.058-.369"
                                                    transform="translate(-8.53 -53.474)" fill="#708c9b" />
                                                <path id="Path_323" data-name="Path 323"
                                                    d="M10.782,77.9h-.375l.237.241V81.12h.139v.045h-.7V81.12h.375l-.237-.237V77.9H10.08v-.045h.7Z"
                                                    transform="translate(-6.819 -51.351)" fill="#708c9b" />
                                                <path id="Path_324" data-name="Path 324"
                                                    d="M21.369,89.281a.2.2,0,0,1-.153-.055l.053-.053a.137.137,0,0,0,.1.035c.048,0,.074-.018.074-.052a.047.047,0,0,0-.013-.035.062.062,0,0,0-.037-.015l-.05-.007a.141.141,0,0,1-.081-.035.112.112,0,0,1-.03-.082.129.129,0,0,1,.146-.127.18.18,0,0,1,.135.049l-.052.051a.116.116,0,0,0-.086-.029c-.044,0-.065.024-.065.053a.04.04,0,0,0,.012.03.073.073,0,0,0,.039.016l.049.007a.139.139,0,0,1,.08.032.117.117,0,0,1,.032.089c0,.081-.067.127-.155.127"
                                                    transform="translate(-14.164 -58.607)" fill="#708c9b" />
                                                <rect id="Rectangle_1397" data-name="Rectangle 1397"
                                                    width="0.082" height="0.419"
                                                    transform="translate(7.443 30.252)" fill="#708c9b" />
                                                <path id="Path_325" data-name="Path 325"
                                                    d="M23.069,89.127h-.081v.158h-.082v-.419h.162a.131.131,0,1,1,0,.261m0-.188h-.077v.115h.077a.057.057,0,1,0,0-.115"
                                                    transform="translate(-15.279 -58.614)" fill="#708c9b" />
                                                <path id="Path_326" data-name="Path 326"
                                                    d="M24.052,89.281a.2.2,0,0,1-.153-.055l.053-.053a.137.137,0,0,0,.1.035c.048,0,.074-.018.074-.052a.047.047,0,0,0-.013-.035.062.062,0,0,0-.037-.015l-.05-.007a.141.141,0,0,1-.081-.035.112.112,0,0,1-.03-.082.129.129,0,0,1,.146-.127.18.18,0,0,1,.135.049l-.052.051a.116.116,0,0,0-.086-.029c-.044,0-.065.024-.065.053a.04.04,0,0,0,.012.03.073.073,0,0,0,.039.016l.049.007a.138.138,0,0,1,.08.032.117.117,0,0,1,.032.089c0,.081-.067.127-.155.127"
                                                    transform="translate(-15.933 -58.607)" fill="#708c9b" />
                                                <path id="Path_327" data-name="Path 327"
                                                    d="M25.674,89.235a.162.162,0,0,1-.226,0c-.043-.042-.041-.095-.041-.167s0-.125.041-.167a.162.162,0,0,1,.226,0c.042.042.042.095.042.167s0,.125-.042.167m-.061-.285a.068.068,0,0,0-.052-.022.069.069,0,0,0-.053.022c-.016.018-.02.037-.02.118s0,.1.02.117a.069.069,0,0,0,.053.022.068.068,0,0,0,.052-.022c.016-.018.02-.037.02-.117s0-.1-.02-.118"
                                                    transform="translate(-16.927 -58.607)" fill="#708c9b" />
                                                <path id="Path_328" data-name="Path 328"
                                                    d="M26.658,88.938v.1h.165v.073h-.165v.17h-.082v-.419h.276v.073Z"
                                                    transform="translate(-17.699 -58.614)" fill="#708c9b" />
                                                <path id="Path_329" data-name="Path 329"
                                                    d="M28.26,89.284l-.166-.257v.257h-.082v-.419h.073l.166.256v-.256h.082v.419Z"
                                                    transform="translate(-18.646 -58.614)" fill="#708c9b" />
                                                <path id="Path_330" data-name="Path 330"
                                                    d="M29.406,89.284l-.025-.074h-.149l-.026.074h-.085l.152-.419h.064l.153.419Zm-.1-.3-.053.153h.1Z"
                                                    transform="translate(-19.378 -58.613)" fill="#708c9b" />
                                                <path id="Path_331" data-name="Path 331"
                                                    d="M30.371,88.938v.346h-.082v-.346h-.11v-.073h.3v.073Z"
                                                    transform="translate(-20.076 -58.614)" fill="#708c9b" />
                                                <path id="Path_332" data-name="Path 332"
                                                    d="M31.409,89.287a.146.146,0,0,1-.154-.147v-.275h.082v.272a.073.073,0,1,0,.145,0v-.272h.081v.275a.146.146,0,0,1-.154.147"
                                                    transform="translate(-20.785 -58.613)" fill="#708c9b" />
                                                <path id="Path_333" data-name="Path 333"
                                                    d="M32.667,89.285l-.082-.167h-.059v.167h-.082v-.419h.164a.127.127,0,0,1,.136.128.114.114,0,0,1-.077.11l.094.18Zm-.064-.346h-.077v.111H32.6a.055.055,0,1,0,0-.111"
                                                    transform="translate(-21.569 -58.614)" fill="#708c9b" />
                                                <path id="Path_334" data-name="Path 334"
                                                    d="M33.591,89.284v-.419h.276v.073h-.194v.1h.165v.073h-.165v.1h.194v.073Z"
                                                    transform="translate(-22.326 -58.614)" fill="#708c9b" />
                                                <path id="Path_335" data-name="Path 335"
                                                    d="M9.066,5.678V3.617s.369-.273,0-.747V1.5s.2-1,1.763-1h5.781S17.748.6,17.8,1.354V2.812s-.332.484,0,.816v2.05Z"
                                                    transform="translate(-6.15 -0.331)" fill="#2e613a" />
                                                <path id="Path_336" data-name="Path 336"
                                                    d="M19.614,0V10.7H16.56V0" transform="translate(-11.093 -0.001)"
                                                    fill="#fff" opacity="0.996" />
                                                <path id="Path_337" data-name="Path 337"
                                                    d="M19.614,0V10.7H16.56V0" transform="translate(-11.093 -0.001)"
                                                    fill="none" />
                                            </g>
                                        </g>
                                    </svg>
                                </label>
                                <div
                                    style="border-left:1px solid ;border-color: #91A13B; height:80px; padding-top:50px;padding-left:50px;">
                                </div>
                            </div>

                            <div class="col-4">

                                <input type="radio" name="match5" id="match_5">
                                <label for="match_5">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="201.902"
                                        height="165.415" viewBox="0 0 201.902 165.415">
                                        <defs>
                                            <clipPath id="clip-path">
                                                <rect id="Rectangle_1412" data-name="Rectangle 1412"
                                                    width="154.86" height="134.414" fill="none" />
                                            </clipPath>
                                        </defs>
                                        <text id="Pack_of_12_bottles" data-name="Pack of 12 bottles"
                                            transform="translate(10.451 147.415)" fill="#708c9b" font-size="18"
                                            font-family="Helvetica" letter-spacing="-0.03em">
                                            <tspan x="-66.953" y="14">Pack of 12 bottles</tspan>
                                        </text>
                                        <g id="Group_12441" data-name="Group 12441">
                                            <g id="Group_12389" data-name="Group 12389"
                                                clip-path="url(#clip-path)">
                                                <path id="Path_401" data-name="Path 401"
                                                    d="M169.606,8.955V124.6L68.729,136V15.6Z"
                                                    transform="translate(-15.136 -1.972)" fill="#708c9b"
                                                    stroke="#708c9b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1" opacity="0.111" />
                                                <path id="Path_402" data-name="Path 402"
                                                    d="M53.7,14.747.5,5.074V117.815l53.2,17.327Z"
                                                    transform="translate(-0.11 -1.118)" fill="#6b8594"
                                                    stroke="#708c9b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1" opacity="0.277" />
                                                <path id="Path_403" data-name="Path 403"
                                                    d="M154.58,7.093,95.533.5.5,4.067l53.2,9.674Z"
                                                    transform="translate(-0.11 -0.11)" fill="#708c9b"
                                                    stroke="#708c9b" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1" opacity="0.51" />
                                            </g>
                                        </g>
                                        <text id="x12" transform="translate(29.902 70.169)" fill="#708c9b"
                                            font-size="40" font-family="Helvetica-Bold, Helvetica"
                                            font-weight="700" letter-spacing="-0.07em">
                                            <tspan x="-30.569" y="31">x12</tspan>
                                        </text>
                                    </svg>
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="btns">
                        <button type="button" class="btn-prev  previous_button">Previous<i
                                class="fa fa-arrow-left" aria-hidden="true"></i></button>
                        <button type="button" class="next btn-next action-button">Next<i
                                class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end second step --}}

        {{-- third step starting  --}}
        <div class="productsCheck">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <div class="col-lg-6 col-xs-6">
                            <h2 id="demo3">JUICES</h2>
                            <button type="button" onclick="displayPhrase()" class="btn btncheckout">Checkout
                                Out</button>
                        </div>
                        <div class="col-lg-6 col-xs-6 d-flex flex-nowrap">
                            <div class="col-6">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="313" height="312" viewBox="0 0 313 312">
                                    {{-- border --}}

                                    <defs>
                                        <filter id="Rectangle_1411" x="0" y="0" width="313"
                                            height="312" filterUnits="userSpaceOnUse">
                                            <feOffset dy="1" input="SourceAlpha" />
                                            <feGaussianBlur stdDeviation="6.5" result="blur" />
                                            <feFlood flood-opacity="0.043" />
                                            <feComposite operator="in" in2="blur" />
                                            <feComposite in="SourceGraphic" />
                                        </filter>
                                    </defs>

                                    <g id="Group_12386" data-name="Group 12386" transform="translate(16 50.524)">
                                        <g id="Group_12382" data-name="Group 12382" transform="translate(0 0)">
                                            <path id="Path_304" data-name="Path 304"
                                                d="M9.066,13.77V8.487s.946-.7,0-1.913V3.051S9.578.5,13.586.5H28.4s2.915.243,3.036,2.187V6.425s-.85,1.242,0,2.091V13.77Z"
                                                transform="translate(-1.592 -0.064)" fill="none"
                                                stroke="#2e613a" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" />
                                            <path id="Path_305" data-name="Path 305"
                                                d="M30.584,27.945V17.257l.855-1.549H9.065l1.241,1.427v10.81"
                                                transform="translate(-1.592 -2.003)" fill="#708c9b"
                                                stroke="#708c9b" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" opacity="0.153" />
                                            <path id="Path_306" data-name="Path 306"
                                                d="M29.492,29.733v13.5c0,2.512,3.272,4.72,3.272,4.72a20.409,20.409,0,0,1,6.779,14.027V136.4c0,5.411-3.383,5.992-3.383,5.992H4.856C.42,142.387.5,136.4.5,136.4V62.563A18.943,18.943,0,0,1,6.1,49.516a12.447,12.447,0,0,0,3.109-5.026V29.733"
                                                transform="translate(-0.5 -3.791)" fill="#708c9b" stroke="#708c9b"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                opacity="0.278" />
                                            <path id="Path_307" data-name="Path 307"
                                                d="M9.066,7.3S12,6.22,20.253,6.22a69.031,69.031,0,0,1,11.186.6"
                                                transform="translate(-1.592 -0.793)" fill="none" stroke="gray"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1" />
                                            <path id="Path_308" data-name="Path 308"
                                                d="M30.751,135.906H9.595a3.128,3.128,0,0,1-3.128-3.127V72.152a3.128,3.128,0,0,1,3.128-3.128H30.751a3.127,3.127,0,0,1,3.127,3.128v60.626a3.127,3.127,0,0,1-3.127,3.127"
                                                transform="translate(-1.261 -8.8)" fill="#f8fcfd"
                                                opacity="0.997" />
                                            <path id="Path_409" data-name="Path 409"
                                                d="M3.584,0H23.826a3.585,3.585,0,0,1,3.585,3.585V63.3a3.585,3.585,0,0,1-3.585,3.585H3.584A3.584,3.584,0,0,1,0,63.3V3.584A3.584,3.584,0,0,1,3.584,0Z"
                                                transform="translate(5.206 60.224)" fill="none" />
                                            <path id="Path_309" data-name="Path 309"
                                                d="M13.272,87.094a.606.606,0,0,0-.372-.176,1.393,1.393,0,0,0-.293,1.152.855.855,0,0,1,.665-.975"
                                                transform="translate(-2.041 -11.081)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_310" data-name="Path 310"
                                                d="M29.1,83.046c-.117.287-.36.293-.708.133a1.444,1.444,0,0,0,.388.179.443.443,0,0,0,.252-.14.255.255,0,0,1-.183.158,1.49,1.49,0,0,0,.154.03.343.343,0,0,0,.1-.36"
                                                transform="translate(-4.056 -10.588)" fill="#708c9b" />
                                            <path id="Path_311" data-name="Path 311"
                                                d="M32.443,78.043a1.018,1.018,0,0,1,.377.211,1.1,1.1,0,0,0-.633-.394c-.072.058-.145.115-.217.175a1.276,1.276,0,0,1,.473.009"
                                                transform="translate(-4.512 -9.927)" fill="#708c9b" />
                                            <path id="Path_312" data-name="Path 312"
                                                d="M32.269,78.16c-.034.321-.32.534-.521.837a.442.442,0,0,0,.256.738,1.136,1.136,0,0,0,.495-1.2,1.1,1.1,0,0,1-.369,1.225,2.346,2.346,0,0,1-1.518.4l-.01.13a2.479,2.479,0,0,0,1.523-.368c.106.171.286.248.576.123.526-.226.487-1.6-.431-1.884"
                                                transform="translate(-4.337 -9.965)" fill="#708c9b" />
                                            <path id="Path_313" data-name="Path 313"
                                                d="M28.334,82.932c-.292-.364.337-.835.141-1.311a.677.677,0,0,0-.089-.154,1.081,1.081,0,0,0-.95-.571,1.039,1.039,0,0,0-1.035.711l-.554-.553h-.8v.114H25.4V86l.607.607h-.962v.115h1.8v-.115h-.355l-.01-4.224c.112-1.093.761-1.165.761-1.165a1.013,1.013,0,0,1,.555.017.951.951,0,0,1,.387.6c.049.335-.1.3-.005.913a2.339,2.339,0,0,1-.065-.852.864.864,0,0,0-.4-.619.809.809,0,0,0,0,1.387,1.134,1.134,0,0,0,.359.216.738.738,0,0,0,.267.052"
                                                transform="translate(-3.629 -10.314)" fill="#708c9b" />
                                            <path id="Path_314" data-name="Path 314"
                                                d="M31.862,86.69a2.027,2.027,0,0,0,.894-.206,2.332,2.332,0,0,0,.756-.6l.08.069a2.412,2.412,0,0,1-.773.624,2.085,2.085,0,0,1-.957.223,2.225,2.225,0,0,1-.87-.183l-1.261-1.26a3.223,3.223,0,0,1-.32-1.42,3.16,3.16,0,0,1,.195-1.117,3,3,0,0,1,.527-.911,2.449,2.449,0,0,1,.779-.613,2.091,2.091,0,0,1,.95-.223,1.835,1.835,0,0,1,.877.211,2.188,2.188,0,0,1,.681.573,2.64,2.64,0,0,1,.441.842,3.255,3.255,0,0,1,.154,1.009h-3.5a3.031,3.031,0,0,0-.005.5c.01.168.028.332.051.493a3.945,3.945,0,0,0,.183.8,2.868,2.868,0,0,0,.3.625,1.463,1.463,0,0,0,.384.412.755.755,0,0,0,.441.149m0-5.5a.8.8,0,0,0-.5.183,1.608,1.608,0,0,0-.412.51,3.364,3.364,0,0,0-.292.768,5.1,5.1,0,0,0-.149.945h2.417a7.057,7.057,0,0,0-.08-.922,3.457,3.457,0,0,0-.2-.767,1.487,1.487,0,0,0-.332-.522.632.632,0,0,0-.453-.195"
                                                transform="translate(-4.186 -10.337)" fill="#708c9b" />
                                            <path id="Path_315" data-name="Path 315"
                                                d="M19.7,88.028A2.34,2.34,0,0,1,17.879,89.3a.421.421,0,0,1-.157.058.483.483,0,0,1-.086.064c-.01.009-.02.02-.031.028a2.467,2.467,0,0,0,2.19-1.316.655.655,0,0,1-.1-.106"
                                                transform="translate(-2.681 -11.223)" fill="#708c9b" />
                                            <path id="Path_316" data-name="Path 316"
                                                d="M17.893,89.785a2.909,2.909,0,0,1-3.262-.026c-.422-.578-1.434-1.079-1.662-1.683.441.668,1.326,1.057,1.728,1.585.177-1.081-1.25-1.16-1.869-2.034a.941.941,0,0,0-.106.34,1.973,1.973,0,0,0,.94,1.943.861.861,0,0,0,.846-.036,3.036,3.036,0,0,0,3.462-.019"
                                                transform="translate(-2.057 -11.172)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_317" data-name="Path 317"
                                                d="M16.569,88.582a.932.932,0,0,0-.178.292c.556-.185.837.762,1.483.74a.813.813,0,0,0,.756-.639,1.192,1.192,0,0,1-.879.2c-.416-.088-.308-.251-1.072-.4a2.906,2.906,0,0,1,1.031.294,1.085,1.085,0,0,0,.9-.2,1.017,1.017,0,0,0-1.634-.607,1.421,1.421,0,0,0-.412.327m.016-.131c-.34.34-.439.629-.152.893a.432.432,0,0,1-.383-.271,1.838,1.838,0,0,1,.1-.168.317.317,0,0,0,.106.285.559.559,0,0,1-.055-.359,1.829,1.829,0,0,1,.381-.38"
                                                transform="translate(-2.482 -11.226)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_318" data-name="Path 318"
                                                d="M14.036,87.928a3,3,0,0,0,2,1.2,2.913,2.913,0,0,0,3.4-2.826V78.59l-.6-.616h1.961s1.393.2,1.393,2.133a2.07,2.07,0,0,1-2.019,2.27v.113a3.127,3.127,0,0,0,.468.035,2.613,2.613,0,0,0,2.761-2.419A2.351,2.351,0,0,0,20.95,77.86H18v.114h.353v6.492a2.449,2.449,0,0,1,.91,1.882A2.78,2.78,0,0,1,16.363,89a2.982,2.982,0,0,1-2.37-1.124Z"
                                                transform="translate(-2.22 -9.927)" fill="#708c9b" />
                                            <path id="Path_319" data-name="Path 319"
                                                d="M19.994,88.018a2.682,2.682,0,0,1-.519.7l-.085-.075a1.562,1.562,0,0,0,.446-.559,1.425,1.425,0,0,0,.119-.633,1.14,1.14,0,0,0-.017-.181,2.742,2.742,0,0,1,.056.749"
                                                transform="translate(-2.908 -11.126)" fill="#708c9b" />
                                            <path id="Path_320" data-name="Path 320"
                                                d="M18.824,85.432a2.114,2.114,0,0,1,.892,1.732,2.027,2.027,0,0,1-2,1.938s1.823-.257,2.116-1.575a2.071,2.071,0,0,0-.745-2.067Z"
                                                transform="translate(-2.695 -10.892)" fill="#708c9b"
                                                fill-rule="evenodd" />
                                            <path id="Path_321" data-name="Path 321"
                                                d="M16.595,84.953a1.372,1.372,0,0,1,.5.008,1.05,1.05,0,0,1,.4.223,1.17,1.17,0,0,0-.671-.417l-.229.186"
                                                transform="translate(-2.552 -10.807)" fill="#708c9b" />
                                            <path id="Path_322" data-name="Path 322"
                                                d="M16.6,84.573c-.035.339-.337.567-.548.888a.467.467,0,0,0,.273.78,1.2,1.2,0,0,0,.52-1.276,1.47,1.47,0,0,1-.064.924h0a2.335,2.335,0,0,1-.756.6,2.027,2.027,0,0,1-.894.206.753.753,0,0,1-.441-.149,1.492,1.492,0,0,1-.384-.413A2.849,2.849,0,0,1,14,85.5a4,4,0,0,1-.183-.8q-.034-.241-.051-.493a3.245,3.245,0,0,1,.005-.5h3.507a3.256,3.256,0,0,0-.155-1.009,2.622,2.622,0,0,0-.441-.842A2.18,2.18,0,0,0,16,81.286a1.825,1.825,0,0,0-.877-.212,2.108,2.108,0,0,0-.951.223,2.471,2.471,0,0,0-.779.613,3.005,3.005,0,0,0-.527.911,3.162,3.162,0,0,0-.2,1.118A3.224,3.224,0,0,0,13,85.36l.288.288.973.973a2.214,2.214,0,0,0,.871.183,2.1,2.1,0,0,0,.957-.222,2.415,2.415,0,0,0,.331-.208c.106.224.3.34.647.193.556-.242.51-1.7-.464-1.994M13.923,82.65a3.348,3.348,0,0,1,.292-.768,1.6,1.6,0,0,1,.413-.51.8.8,0,0,1,.5-.183.636.636,0,0,1,.453.195,1.509,1.509,0,0,1,.332.522,3.528,3.528,0,0,1,.2.768,7.056,7.056,0,0,1,.08.923H13.774a5.167,5.167,0,0,1,.149-.946"
                                                transform="translate(-2.052 -10.336)" fill="#708c9b" />
                                            <path id="Path_323" data-name="Path 323"
                                                d="M11.879,77.969h-.962l.607.619v7.634h.355v.115h-1.8v-.115h.962l-.607-.607V77.969H10.08v-.114h1.8Z"
                                                transform="translate(-1.721 -9.926)" fill="#708c9b" />
                                            <path id="Path_324" data-name="Path 324"
                                                d="M21.608,89.947a.505.505,0,0,1-.392-.141l.135-.136a.351.351,0,0,0,.26.091c.123,0,.189-.047.189-.133a.12.12,0,0,0-.033-.091.159.159,0,0,0-.1-.038l-.129-.018a.36.36,0,0,1-.209-.089.286.286,0,0,1-.077-.211.331.331,0,0,1,.374-.325.462.462,0,0,1,.346.125l-.133.132a.3.3,0,0,0-.22-.074c-.112,0-.166.062-.166.136a.1.1,0,0,0,.031.077.188.188,0,0,0,.1.042l.127.018a.355.355,0,0,1,.205.083.3.3,0,0,1,.083.228c0,.208-.173.325-.4.325"
                                                transform="translate(-3.141 -11.328)" fill="#708c9b" />
                                            <rect id="Rectangle_1397" data-name="Rectangle 1397" width="0.209"
                                                height="1.073" transform="translate(19.077 77.535)"
                                                fill="#708c9b" />
                                            <path id="Path_325" data-name="Path 325"
                                                d="M23.323,89.535h-.207v.4h-.209V88.866h.416a.335.335,0,1,1,0,.669m-.01-.482h-.2v.294h.2a.147.147,0,1,0,0-.294"
                                                transform="translate(-3.357 -11.33)" fill="#708c9b" />
                                            <path id="Path_326" data-name="Path 326"
                                                d="M24.291,89.947a.506.506,0,0,1-.392-.141l.135-.136a.351.351,0,0,0,.26.091c.123,0,.189-.047.189-.133a.12.12,0,0,0-.033-.091.159.159,0,0,0-.1-.038l-.129-.018a.36.36,0,0,1-.209-.089.286.286,0,0,1-.077-.211.331.331,0,0,1,.374-.325.462.462,0,0,1,.346.125l-.133.132a.3.3,0,0,0-.22-.074c-.112,0-.166.062-.166.136a.1.1,0,0,0,.031.077.188.188,0,0,0,.1.042l.127.018a.353.353,0,0,1,.205.083.3.3,0,0,1,.083.228c0,.208-.173.325-.4.325"
                                                transform="translate(-3.483 -11.328)" fill="#708c9b" />
                                            <path id="Path_327" data-name="Path 327"
                                                d="M26.092,89.829a.416.416,0,0,1-.58,0c-.109-.108-.106-.243-.106-.428s0-.32.106-.428a.416.416,0,0,1,.58,0c.108.108.107.243.107.428s0,.319-.107.428m-.155-.729a.174.174,0,0,0-.134-.058.176.176,0,0,0-.135.058c-.041.045-.051.1-.051.3s.01.256.051.3a.176.176,0,0,0,.135.058.174.174,0,0,0,.134-.058c.041-.045.052-.1.052-.3s-.011-.257-.052-.3"
                                                transform="translate(-3.675 -11.328)" fill="#708c9b" />
                                            <path id="Path_328" data-name="Path 328"
                                                d="M26.785,89.052v.263h.423V89.5h-.423v.435h-.209V88.866h.707v.187Z"
                                                transform="translate(-3.824 -11.33)" fill="#708c9b" />
                                            <path id="Path_329" data-name="Path 329"
                                                d="M28.647,89.939l-.425-.659v.659h-.209V88.866H28.2l.425.657v-.657h.209v1.073Z"
                                                transform="translate(-4.007 -11.33)" fill="#708c9b" />
                                            <path id="Path_330" data-name="Path 330"
                                                d="M29.851,89.938l-.064-.189h-.381l-.065.189h-.218l.39-1.073h.164l.393,1.073Zm-.25-.756-.136.391h.266Z"
                                                transform="translate(-4.149 -11.33)" fill="#708c9b" />
                                            <path id="Path_331" data-name="Path 331"
                                                d="M30.67,89.052v.886H30.46v-.886H30.18v-.187h.77v.187Z"
                                                transform="translate(-4.284 -11.33)" fill="#708c9b" />
                                            <path id="Path_332" data-name="Path 332"
                                                d="M31.65,89.948a.373.373,0,0,1-.4-.377v-.706h.209v.7a.187.187,0,1,0,.373,0v-.7h.209v.706a.373.373,0,0,1-.4.377"
                                                transform="translate(-4.421 -11.33)" fill="#708c9b" />
                                            <path id="Path_333" data-name="Path 333"
                                                d="M33.015,89.939l-.21-.428h-.15v.428h-.21V88.866h.421a.324.324,0,0,1,.348.328.291.291,0,0,1-.2.283l.24.462Zm-.163-.886h-.2v.284h.2a.142.142,0,1,0,0-.284"
                                                transform="translate(-4.572 -11.33)" fill="#708c9b" />
                                            <path id="Path_334" data-name="Path 334"
                                                d="M33.591,89.939V88.866H34.3v.187h-.5V89.3h.424v.187H33.8v.261h.5v.187Z"
                                                transform="translate(-4.719 -11.33)" fill="#708c9b" />
                                            <path id="Path_335" data-name="Path 335"
                                                d="M9.066,13.77V8.487s.946-.7,0-1.913V3.051S9.578.5,13.586.5H28.4s2.915.243,3.036,2.187V6.425s-.85,1.242,0,2.091V13.77Z"
                                                transform="translate(-1.592 -0.064)" fill="#2e613a" />
                                            <path id="Path_336" data-name="Path 336" d="M24.388,0V27.411H16.56V0"
                                                transform="translate(-2.547 -0.001)" fill="#fff"
                                                opacity="0.996" />
                                            <path id="Path_337" data-name="Path 337" d="M24.388,0V27.411H16.56V0"
                                                transform="translate(-2.547 -0.001)" fill="none" />
                                        </g>
                                        <text id="x6" transform="translate(563.25 514.734)" fill="#708c9b"
                                            font-size="40" font-family="Helvetica-Bold, Helvetica"
                                            font-weight="700" letter-spacing="-0.07em">
                                            <tspan x="-20.846" y="31">x6</tspan>
                                        </text>
                                    </g>

                                </svg>
                            </div>
                            <div class="d-flex flex-nowrap count-result">
                                <h1 class="ctext" id="rText" style="display: none">X</h1>
                                <h1 class="resault" id="count2" style="display: none">
                                    1
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-lg-8 col-md-6 d-flex">
                        <div class="container">
                            <div class="row">
                                <div class="add-favorite d-flex flex-wrap">
                                    <div class="col-lg-2 col-md-3 card">
                                        <div class="cardheader">
                                            <h2 class="counter-text" id="textcounter" style="display:none">X</h2>
                                            <h2 class="counter-number" style="display:none" id="count1">
                                                1
                                            </h2>
                                            <input type="checkbox" name="" id="myCheck"
                                                onclick="onCheckBoxClick()">
                                        </div>
                                        <label>
                                            <div class="card-content">
                                                <button id="down1" class="btndesc" onClick="decreaseClick()"
                                                    style="display:none">-</button>
                                                <div class="imgProduct">

                                                    <img src="{{ url('assets/Apple & Kiwi.png') }}" alt="">
                                                </div>
                                                <button id="up1" class="btnincr" onClick="increaseClick()"
                                                    style="display:none">+</button>
                                            </div>
                                        </label>
                                        <h2 class="textproduct">Apple juice</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btns">
                    <button type="button" class="btn-prev  previous_button">Previous</button>
                    <button type="button" class="next btn-next action-button">Next</button>
                </div>
            </div>
            {{-- third step ending  --}}
        </div>

        {{-- laststep checkout starting --}}

        <div class="checoutProducts form-step">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h2 class="ttlcheck">Here is your customized pack!</h2>
                    </div>
                    <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="274" height="36"
                            viewBox="0 0 274 36">
                            <g id="Group_12648" data-name="Group 12648" transform="translate(-934 -319)">
                                <g id="Rectangle_1658" data-name="Rectangle 1658" transform="translate(1076 319)"
                                    fill="#91a13b" stroke="#91a13b" stroke-width="1">
                                    <rect width="132" height="36" rx="18" stroke="none" />
                                    <rect x="0.5" y="0.5" width="131" height="35"
                                        rx="17.5" fill="none" />
                                </g>
                                <text id="Add_to_cart" data-name="Add to cart"
                                    transform="translate(1092.555 342.893)" fill="#f3facc" font-size="16"
                                    font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                    letter-spacing="-0.02em">
                                    <tspan x="0" y="0">Add to cart</tspan>
                                </text>
                                <g id="Group_12507" data-name="Group 12507" transform="translate(1177 326.893)">
                                    <ellipse id="Ellipse_2490" data-name="Ellipse 2490" cx="10.5"
                                        cy="10.5" rx="10.5" ry="10.5" fill="#fff" />
                                </g>
                                <g id="Rectangle_1659" data-name="Rectangle 1659" transform="translate(934 319)"
                                    fill="#91a13b" stroke="#91a13b" stroke-width="1" opacity="0.098">
                                    <rect width="132" height="36" rx="18" stroke="none" />
                                    <rect x="0.5" y="0.5" width="131" height="35"
                                        rx="17.5" fill="none" />
                                </g>
                                <path id="Path_424" data-name="Path 424"
                                    d="M22306.84,1200.054l3.533,4.562,7.1-10.032" transform="translate(-21125 -861)"
                                    fill="none" stroke="#91a13b" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1" />
                                <g id="Group_12508" data-name="Group 12508" transform="translate(-27 -56)">
                                    <text id="Edit_order" data-name="Edit order"
                                        transform="translate(981 398.893)" fill="#91a13b" font-size="16"
                                        font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                        letter-spacing="-0.02em">
                                        <tspan x="0" y="0">Edit order</tspan>
                                    </text>
                                    <g id="Group_12501" data-name="Group 12501"
                                        transform="translate(1058.445 382.893)">
                                        <ellipse id="Ellipse_2490-2" data-name="Ellipse 2490" cx="10.5"
                                            cy="10.5" rx="10.5" ry="10.5" fill="#91a13b" />
                                        <g id="Group_12296" data-name="Group 12296"
                                            transform="translate(14.12 17.352) rotate(180)">
                                            <path id="Path_296" data-name="Path 296"
                                                d="M3.341,1.849,0,3.909.357,0" transform="translate(0 8.457)"
                                                fill="#91a13b" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1" />
                                            <rect id="Rectangle_1330" data-name="Rectangle 1330" width="3.511"
                                                height="9.948" transform="translate(5.596 0) rotate(31.78)"
                                                fill="#91a13b" stroke="#fff" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="sectiontwo">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xs-1">
                            <div class="box-price d-flex">
                                <h4 style="margin-top:70px;color:#708C9B;font-weight:700;font-size:30px">
                                    Total :</h4>
                                <h4
                                    style="color:#91A13B;margin-top:60px;font-size:40px;font-weight:800;
                            margin-left:5px">
                                    LBP 113000</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-1"
                            style="margin-top: 80px;
                             padding-left: 150px">
                            <h2 classe="titleChoosen" style="font-size: 18px;color:#708C9B;ont-weight: 700">
                                Juice / 250ml / Pack of 6 bottles / Customized</h2>
                        </div>
                    </div>
                </div>
                <div class="sectionthree" style="padding: 24px 5px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <svg id="Group_12443" data-name="Group 12443" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="287.247" height="197.522"
                                    viewBox="0 0 287.247 197.522">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect id="Rectangle_1412" data-name="Rectangle 1412" width="227.566"
                                                height="197.522" fill="none" />
                                        </clipPath>
                                    </defs>
                                    <g id="Group_12441" data-name="Group 12441" transform="translate(0 0)">
                                        <g id="Group_12389" data-name="Group 12389" clip-path="url(#clip-path)">
                                            <path id="Path_401" data-name="Path 401"
                                                d="M216.967,8.955V178.894L68.729,195.642V18.723Z"
                                                transform="translate(10.025 1.306)" fill="#dbc877"
                                                opacity="0.111" />
                                            <path id="Path_402" data-name="Path 402"
                                                d="M78.681,19.289.5,5.074V170.747l78.18,25.462Z"
                                                transform="translate(0.073 0.74)" fill="#bfb172"
                                                opacity="0.277" />
                                            <path id="Path_403" data-name="Path 403"
                                                d="M226.92,10.188,140.15.5.5,5.741,78.681,19.957Z"
                                                transform="translate(0.073 0.073)" fill="#cbbd83"
                                                opacity="0.51" />
                                        </g>
                                    </g>
                                    <text id="x6" transform="translate(34.247 98.761)" fill="#91a13b"
                                        font-size="65" font-family="Helvetica-Bold, Helvetica" font-weight="700"
                                        letter-spacing="-0.07em">
                                        <tspan x="-33.875" y="50">x6</tspan>
                                    </text>
                                </svg>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col d-flex flex-wrap">
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>

                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>

                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>

                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>
                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>

                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>

                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>

                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                        <div class="product-chekout">
                                            <div class="card">
                                                <div class="cardheader">
                                                    <h2 class="countertext">X</h2>
                                                    <h2 class="counternumber">1</h2>

                                                </div>
                                                <div class="card-content">

                                                    <div class="imgProduct">

                                                        <img src="{{ url('assets/Apple & Kiwi.png') }}"
                                                            alt="">
                                                        <h2 class="textproduct" style="font-size: 15px">Apple
                                                            juice
                                                        </h2>
                                                    </div>

                                                </div>

                                            </div>
                                            <h4 class="price"
                                                style="font-size: 15px;color:#708C9B;text-align:center">
                                                199LL</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        //@desc Select needed divs
        //1)Check Box
        var checkbox = document.getElementById('myCheck');
        //2) Count Text
        var countText = document.getElementById('count1');
        //3) Resault Count Text
        var rcount = document.getElementById('count2');
        //4) Increase button
        var increase = document.getElementById('up1');
        //5) Decrease button
        var decrease = document.getElementById('down1');
        //6) select x div
        var xText = document.getElementById("textcounter");
        //7) Resault select x div 
        var resaultT = document.getElementById("rText");
        //8) To handle access of check box value
        var checkBoxValue = false;
        //@desc on Checkbox  click
        const onCheckBoxClick = () => {
            //@desc To convert value to be otherwise current value
            checkBoxValue = !checkBoxValue;
            if (checkBoxValue) {
                //1) If value true show needed divs
                countText.style.display = "block";
                rcount.style.display = "block";
                increase.style.display = "block";
                decrease.style.display = "block";
                xText.style.display = "block";
                resaultT.style.display = "block";
            } else {
                //2) If false hide divs
                countText.style.display = "none";
                rcount.style.display = "none";
                increase.style.display = "none";
                decrease.style.display = "none";
                xText.style.display = "none";
                resaultT.style.display = "none";
                countText.innerText = 1;
            }
        }
        //@desc Increase value of counter on click on plus div
        const increaseClick = () => {
            //1) Convert current text to integer to increase it by one as number
            countText.innerText = parseInt(countText.innerText, 10) + 1;
            rcount.innerText = parseInt(rcount.innerText, 10) + 1;
        }
        //@desc Decrease value of counter on click on minus div
        const decreaseClick = () => {
            //1) Check if number bigger than one we can minus
            if (parseInt(countText.innerText, 10) > 1) {
                //1) Convert current text to integer to descrease it by one as number
                countText.innerText = parseInt(countText.innerText, 10) - 1;
                rcount.innerText = parseInt(rcount.innerText, 10) - 1;
            } else {
                //2) if value less than or equals show alert ("value cannot be less than one")
                window.alert("Value cannot be less than one");

            }

        }
    </script>



</body>

</html>
