@extends('layouts.app')

@section('title')  Lore @endsection

@section('content')
{!! breadcrumbs(['Lore' => 'linkthatgoesthere']) !!}

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
                    <h1 style="font-size: 36px; text-align: center; margin: 0; color: #ffffff;">History || Lore</h1>
                    <br>

                    <!-- GOOGLE SLIDES START (VISIBLE ON DESKTOP) -->
                    <div class="desktop-only" style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; margin: auto;">
                        <iframe
                          src="https://docs.google.com/presentation/d/e/2PACX-1vTSxRTNxoXtuLcgJjduobUdPl-8Ewf4TGtjNyEVwEIWXrkuybgmn_TrqmL7sE16i3NP5f47olbyAE3I/embed?rm=minimal"
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
                        <p style="color:white;">Welcome! The content below is specifically designed for mobile users. You can view the interactive version on your desktop for a full experience.</p>

                        <!-- Mobile user content below -->
                        <div class="image-container">
                            <!-- Responsive Images -->
                            <img src="https://static.wixstatic.com/media/95622c_629f4c3493fa4f9188f2edfc24431c7e~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-01.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_7e414a30d16c46cb81a08e39ef91f6a4~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-02.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_18b5156b241c4bf0892cc84d041f54bc~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-03.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_5b4825aab7254f349c13e79ed8d31653~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-04.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_30d270eb51bc49f29a30b02538f3248b~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-05.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_a0b37dee67784ed0ad7cf7c88f9d2e59~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-06.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_50ce73a618a348c78929df55b8506e02~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-07.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_ad6a159414624ecd9d73c05f27554544~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-08.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_b59d332bb0be45a086f7f7756698d979~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-09.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_1bf6e2ed7f1f43ac8f75e48d684481f2~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-10.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_ce7521a82139473d8808b41e5834686f~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-11.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_dccf5e72ef984174be33b7da3b57b085~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-12.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_f3fa034365ff47fba00cdb0f7975e608~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-13.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_6b9499cd93d84e60b114c2341052cb2f~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-14.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_528d14a77c2049918d1abe85c7dd63a0~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-15.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_4206a535b14d4feba507933218fc758b~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-16.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_d6e7ef078f534785823bd1ff50fa855f~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-17.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_9f29c7687ed94c82a0b5028e29ff87d1~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-18.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_69a52d8c0fbd4b2f85cbaa1c599f46e8~mv2.png/v1/fill/w_1200,h_676,al_c,q_90,usm_0.66_1.00_0.01,enc_auto/Lore%20Mobile%20images-19.png" class="responsive-img">
                            <img src="https://static.wixstatic.com/media/95622c_add90c4c4fe7426a8a39acce351ddda9~mv2.png/v1/fill/w_959,h_540,al_c,q_90,enc_auto/Lore%20Mobile%20images.png" class="responsive-img">

                        </div>

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
