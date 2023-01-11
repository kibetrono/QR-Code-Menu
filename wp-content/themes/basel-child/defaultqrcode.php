<?php
if (!is_user_logged_in()) {
    auth_redirect();
}
?>
<!-- <meta name="viewport" content="width=device-width"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Jost', sans-serif !important;
    }

    .rounded-circle {
        width: 50%;
        height: 50%;
    }

    .main-page-wrapper {
        background-color: #212121 !important;
    }

    .qr_code {
        background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcNQ42Uva4vCJKDZuckBjuHxN71U8WynsG7A&usqp=CAU');
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 10px;
        opacity: 0.9
    }

    .the_qr_img {
        background-color: white;
        width: 25%;
        margin-left: auto;
        border-radius: 10px
    }

    .qr_code>h1 {
        font-size: 22px !important;
    }

    .food_menu {
        box-shadow: rgba(60, 64, 67, 0.01) 5px 1px 2px 3px, rgba(60, 64, 67, 0.08) 2px 3px 5px 1px !important;
        width: 30% !important;
        margin-right: 30px !important;
    }

    .mapouter {
        position: relative;
        text-align: right;
        margin-left: auto !important;
        margin-right: auto !important;
        width: 100%;
        overflow: hidden;
    }

    .gmap_canvas {
        overflow: hidden;
        background: none !important;
        width: 290px;
    }

    .gmap_iframe {
        width: 290px !important;
        height: auto !important;
    }

    @media screen and (max-width:319px) {
        .qr_code_image {
            width: 50px !important;
        }

        .qr_code>h1 {
            font-size: 12px !important;
        }

        .the_qr_inner_img {
            padding: 12px !important;
        }

        .food_menu {
            width: 100% !important;
            box-shadow: unset !important;
        }

        .main_data {
            padding-left: 0px !important;
            width: 100% !important;
            box-shadow: unset !important;
        }

        .top_content {
            width: 100% !important;
        }

        .down_description1 {
            width: 100% !important;
        }

        .down_description2 {
            width: 100% !important;
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
            height: auto !important;
        }
    }

    /* Phone */
    @media screen and (min-width:320px) and (max-width: 480px) {
        .food_menu {
            width: 100% !important;
            box-shadow: unset !important;
        }

        .qr_code>h1 {
            font-size: 15px !important;
        }

        .the_qr_inner_img {
            padding: 15px !important;
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100% !important;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
            height: auto !important;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
            height: auto !important;
        }
    }

    @media screen and (min-width:481px) and (max-width:768px) {

        .food_menu {
            width: 100% !important;
            margin-right: 0px !important;
            box-shadow: unset !important;
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100% !important;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
            height: auto !important;
        }

        .qr_code {
            width: 100% !important
        }

    }

    /* Tablet on LB */
    @media screen and (min-width:769px) and (max-width:1024px) {

        .food_menu {
            width: 100% !important;
            margin-right: 0px !important;
            box-shadow: unset !important;
        }

        .qr_code {
            width: 100% !important
        }

        .mapouter {
            position: relative;
            text-align: right;
            width: 100% !important;
            overflow: hidden;
        }

        .gmap_canvas {
            background: none !important;
            width: 100% !important;
        }

        .gmap_iframe {
            width: 100% !important;
            height: auto !important;
        }

    }
</style>

<div class="row">

    <div class="col-md-4 food_menu">
        <div class="text-center pt-4">
            <p style="line-height: 30px;"><span style="color:orange">The Food</span> <br> <span class="fs-1" style="text-shadow: 1px 1px green;"> MENU</span></p>
        </div>
        <div class="text-center pt-1">
            <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhLyB2gDsuxGNjZyUmiiMKo_5RZHlXIVhTXA&usqp=CAU" alt="">
        </div>

        <div class="text-center pt-3 fw-bold">
            <p>Open hours: 4AM - 11PM <br> <span>Location</span> </p>
        </div>
        <div class="mapouter mb-2">
            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=358&amp;height=242&amp;hl=en&amp;q=Karen Nairobi&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://piratebay-proxys.com/"></a></div>
        </div>
    </div>

    <div class="col-md-8 text-end qr_code">
        <h1 class="text-white">TO SEE OUR MENU <br> <span class="text-warning"> SCAN HERE</span></h1>
        <div class="the_qr_img">
            <div>
                <img class="the_qr_inner_img" style="padding:25px" src="http://qrmenu.dev.softwareske.net/wp-content/uploads/sos-dynamic-qr-code/q_2c1055f477c0030dbdc08f8893e484849e8c7d99.png" alt="Restaurant Menu Code" />
            </div>
        </div>
    </div>

</div>