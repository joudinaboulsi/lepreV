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

        .checoutProducts {
            margin-top: 25px;
        }

        @media (max-width:700px) {
            .totalcounter {
                transform: translate(55.247 108.761) !important;

            }
        }

        @media (max-width:768px) {
            .progress-step::after {
                font-size: 0.6rem !important;
            }
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
    <div class="container-fluid" style="background-color: #eee; height:100vh;">
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

        @yield('content')
    </div>
    {{-- <script>
        //@desc Select needed divs
        //1)Check Box
        var checkbox = document.getElementById('myCheck');
        //2) Count Text
        var countText = document.getElementById('count1');
        //3) Increase button
        var increase = document.getElementById('up1');
        //4) Decrease button
        var decrease = document.getElementById('down1');
        //5) select x div
        var xText = document.getElementById("textcounter");
        //6) To handle access of check box value
        var checkBoxValue = false;
        //@desc on Checkbox  click
        const onCheckBoxClick = () => {
            //@desc To convert value to be otherwise current value
            checkBoxValue = !checkBoxValue;
            if (checkBoxValue) {
                //1) If value true show needed divs
                countText.style.display = "block";
                increase.style.display = "block";
                decrease.style.display = "block";
                xText.style.display = "block";
            } else {
                //2) If false hide divs
                countText.style.display = "none";
                increase.style.display = "none";
                decrease.style.display = "none";
                xText.style.display = "none";
                countText.innerText = 1;
            }
        }
        //@desc Increase value of counter on click on plus div
        const increaseClick = () => {
            //1) Convert current text to integer to increase it by one as number
            countText.innerText = parseInt(countText.innerText, 10) + 1;
        }
        //@desc Decrease value of counter on click on minus div
        const decreaseClick = () => {
            //1) Check if number bigger than one we can minus
            if (parseInt(countText.innerText, 10) > 1) {
                //1) Convert current text to integer to descrease it by one as number
                countText.innerText = parseInt(countText.innerText, 10) - 1;
            } else {
                //2) if value less than or equals show alert ("value cannot be less than one")
                window.alert("Value cannot be less than one");

            }

        }
    </script> --}}

</body>

</html>
