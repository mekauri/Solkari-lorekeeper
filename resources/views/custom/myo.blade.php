@extends('layouts.app')

@section('title') MYO GUIDE @endsection

@section('content')
{!! breadcrumbs(['MYO GUIDE' => 'linkthatgoesthere']) !!}

<!-- Container Info -->
<div class="container-fluid card border-0 px-0 pt-5 pb-4" style="margin-top: -58px;">
    <div class="container modal-open p-0 mb-2" style="box-shadow: 0px 0px 1em rgba(0,0,0,.25); font-size: 10pt; border-radius: 1em; max-width: 1448px;">

        <!-- SITE BG -->
        <div style="background-image: url('https://static.wixstatic.com/media/95622c_343e78f446f642c18887fabf9f409759~mv2.png/v1/fill/w_2080,h_1608,al_c,q_95,usm_0.66_1.00_0.01,enc_auto/simple-bg.png'); background-color: #a8c8ff; background-repeat: repeat;" class="p-lg-4 p-md-4 p-3">
            <div style="border: 12px; background-color: transparent; border-radius: 3em; overflow: hidden;">

                <!-- TOP BANNER -->
                <div style="background-repeat: repeat; min-height: 200px;" class="d-flex align-items-center justify-content-center">
                    <!-- LOGO START -->
                    <div style="border: 20px; background-color: rgba(255, 255, 255, 0.63); border-radius: 2em; overflow: hidden;">
                        <img src="https://f2.toyhou.se/file/f2-toyhou-se/groups/117751?1662823891" alt="Logo" style="width: 100%; height: auto; max-width: 300px;"> <!-- Add responsive styling -->
                    </div>
                    <!-- END OF LOGO -->
                </div>
            </div>


            <div style="line-height: 1; letter-spacing: 1px; border: 0px" class="px-md-4 px-2 py-2">
                <div style="border: 12px; background-color: transparent; border-radius: 2em; overflow: hidden; background-color:#0b0530;">
                    <br>
                    <!-- Enlarged and Centered Title -->
                    <h1 style="font-size: 36px; text-align: center; margin: 0; color: #ffffff;">MYO GUIDE</h1>
                    <br>

                    <!-- GOOGLE SLIDES START (VISIBLE ON DESKTOP) -->
                    <div class="desktop-only" style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; margin: auto;">
                        <iframe
                          src="https://docs.google.com/presentation/d/1sBzmzPPrKEdOOlEVv5f7BuSz8Wnza5HqacG6NlYNG0Y/embed?rm=minimal"
                          frameborder="0"
                          style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                          allowfullscreen="true"
                          mozallowfullscreen="true"
                          webkitallowfullscreen="true"
                          sandbox="allow-scripts allow-same-origin allow-popups">
                        </iframe>
                    </div>

                    <!-- ALTERNATIVE CONTENT (VISIBLE ON MOBILE) -->
                    <div class="mobile-only" style="display: none; text-align: center;">
                        <p style="color:white;">Welcome! The content below is specifically designed for mobile users. You can view the interactive guide on your desktop for a full experience.</p>

                        <!-- Mobile user content below -->
                        <div class="image-container">
                            <!-- Responsive Images -->
                            <img src="https://static.wixstatic.com/media/95622c_eced58ac2e87428a8ed6406e05606f11~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_f343c441b83a4633a3c0160b3a649109~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(1).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_667fb5daa2974d088b607ba1c49a9713~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(2).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_39b2a843106b47d8bb411ac9f03041db~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(3).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_36dd2ebb24644793a3614ae07c83f672~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(4).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_7d71056055d04c2098bd486f07179029~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(5).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_0ca0c05a34914579a612713060337a3a~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(6).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_c74d8efdf75d49b5bcd284b1b66626f9~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(7).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_3b263eceb5ee4cdeb4476b36bb14d89c~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(8).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_8fdb4b8195de492ea684afbe0290d16f~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(9).png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_d369aafaa81b46f780ebd4767467b49d~mv2.png/v1/fill/w_691,h_575,al_c,lg_1,q_90,enc_auto/MYO%20GUIDE%20MOBILE%20IMAGES%20(10).png" class="responsive-img">
                        </div>
 <!-- Button to View Written Guide -->
 <div class="button-container" style="margin-top: 20px;">
    <a href="https://docs.google.com/document/d/10B_A1VPb0qe8LzqlkB-FIq5v68i4DVYQvzuCqI4y0MY/edit?usp=sharing" target="_blank" class="btn btn-primary" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; text-decoration: none;">View Written Guide</a>
</div>
<br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<style>
/* Default CSS (Desktop View) */
.desktop-only {
    display: block !important; /* Show desktop content by default */
}

.mobile-only {
    display: none !important; /* Hide mobile content by default */
}

.image-container {
    text-align: center; /* Center images within the container */
}

.responsive-img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 10px auto; /* Center the images */
}

/* Media Query for Mobile Devices */
@media only screen and (max-width: 992px) {
    .desktop-only {
        display: none !important; /* Hide desktop content on mobile */
    }
    .mobile-only {
        display: block !important; /* Show mobile content on mobile */
    }
}
</style>

@endsection
