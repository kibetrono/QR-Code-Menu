<?php
if (!is_user_logged_in()) {
    auth_redirect();
}
?>

<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style>
    .main-page-wrapper {background-color: #212121 !important;}
</style>

<div class="row">

    <div class="col-md-4 qrcode_food_menu">
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

    <div class="col-md-8 text-center qrcode_qr_code">
        <h1 class="text-white">TO SEE OUR MENU <br> <span class="text-warning"> SCAN HERE</span></h1>
        <div class="qrcode_the_qr_img">
            <div>
                <img class="qrcode_the_qr_inner_img" style="padding:20px" src="http://qrmenu.dev.softwareske.net/wp-content/uploads/sos-dynamic-qr-code/q_2c1055f477c0030dbdc08f8893e484849e8c7d99.png" alt="Restaurant Menu Code" />
            </div>
        </div>
    </div>

</div>