<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetBanner from '@/Jetstream/Banner.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    Inertia.post(route('logout'));
};

</script>
 <style>
    .last-today-logo .cls-1 {
        fill: url(#linear-gradient);
    }

    .last-today-logo .cls-2 {
        fill: url(#linear-gradient-2);
    }

    .last-today-logo .cls-3 {
        fill: url(#linear-gradient-3);
    }

    .last-today-logo .cls-4 {
        fill: url(#linear-gradient-4);
    }

    .last-today-logo .cls-5 {
        fill: url(#linear-gradient-5);
    }

    .last-today-logo .cls-6 {
        fill: url(#linear-gradient-6);
    }

    .last-today-logo .cls-7 {
        fill: url(#linear-gradient-7);
    }

    .last-today-logo .cls-8 {
        fill: url(#linear-gradient-8);
    }

    .last-today-logo .cls-9 {
        fill: url(#linear-gradient-9);
    }

    .last-today-logo .cls-10 {
        fill: url(#linear-gradient-10);
    }

    .last-today-logo .cls-11 {
        fill: url(#linear-gradient-11);
    }

    .last-today-logo .text-light {
        fill: var(--setxo-h) !important;
    }
</style>

<template>
   
        <Head :title="title" />

        <JetBanner />

  
       


            <main>

                <div v-if="$page.props.flash.message" class="alert">
        {{ $page.props.flash.message }}
      </div>
                <slot />
            </main>

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
    <div class="container-fluid">
      





       <Link :href="route('welcome')" class="last-today-logo navbar-brand align-text-top">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1134 782.5">
                <defs>
                   
                    <linearGradient id="linear-gradient" x1="374" y1="387.73" x2="870.4" y2="387.73"
                                    gradientTransform="matrix(1, 0, 0, -1, 0, 877.28)"
                                    gradientUnits="userSpaceOnUse">
                        <stop  offset="0.52" style="stop-color:#ee2250"/>
                        <stop  offset="0.52" style="stop-color:var(--setxo-h)"/>
                    </linearGradient>
                    <linearGradient id="linear-gradient-2" x1="668.8" y1="463.43" x2="1026.2" y2="463.43"
                                    xlink:href="#linear-gradient"/>
                    <linearGradient id="linear-gradient-3" x1="328" y1="583.48" x2="624.1" y2="583.48"
                                    xlink:href="#linear-gradient"/>
                    <linearGradient id="linear-gradient-4" x1="899.6" y1="487.48" x2="1182" y2="487.48"
                                    xlink:href="#linear-gradient"/>
                    <linearGradient id="linear-gradient-5" x1="52.7" y1="537.33" x2="380.8" y2="537.33"
                                    xlink:href="#linear-gradient"/>
                    <linearGradient id="linear-gradient-6" x1="620.1" y1="752.08" x2="903.4" y2="752.08"
                                    xlink:href="#linear-gradient"/>
                    <linearGradient id="linear-gradient-7" x1="469.4" y1="131.58" x2="587.3" y2="131.58"
                                    gradientTransform="matrix(1, 0, 0, -1, 0, 877.28)"
                                    gradientUnits="userSpaceOnUse">
                        <stop offset="0.34" stop-color="#ee2250"/>
                        <stop offset="0.52" stop-color="#ee2250"/>
                    </linearGradient>
                    <linearGradient id="linear-gradient-8" x1="593.2" y1="130.53" x2="759.8" y2="130.53"
                                    xlink:href="#linear-gradient-7"/>
                    <linearGradient id="linear-gradient-9" x1="789.3" y1="130.53" x2="912.2" y2="130.53"
                                    xlink:href="#linear-gradient-7"/>
                    <linearGradient id="linear-gradient-10" x1="918.4" y1="134.33" x2="1063.3" y2="134.33"
                                    xlink:href="#linear-gradient-7"/>
                    <linearGradient id="linear-gradient-11" x1="1043.5" y1="130.53" x2="1186.7" y2="130.53"
                                    xlink:href="#linear-gradient-7"/>
                </defs>
                <path class="cls-1"
                      d="M870.4,620l-89-3.1,44.5,1.5-44.5-1.5v-3c0-90.5-73.8-165-164.5-165.7-72.5,0-135.7,45.2-158.5,112.4L374,531.9A254.79,254.79,0,0,1,615.4,359.1c141.6,1.2,255,115.6,255,255Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-2"
                      d="M937.1,618.8V614c0-157.9-112.8-291.3-268.3-317.2l14.7-87.9C882.1,242,1026.2,412.4,1026.2,614v3.2Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-3"
                      d="M390.3,384.3,328,320.7A408.26,408.26,0,0,1,615.4,203.3l8.7.4-5.1,41v47.8l-1-.1h0C530.7,292.4,450.8,325.1,390.3,384.3Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-4"
                      d="M1092.8,620.7l.1-4V614c0-150.4-72.2-293.8-193.3-383.6l53.1-71.5C1096.3,265.4,1182,435.6,1182,614.1v4.5Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-5"
                      d="M141.2,559.2,52.7,549C73.2,369.9,179.5,209.7,337,120.7l43.8,77.5C248.1,273.3,158.5,408.2,141.2,559.2Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-6"
                      d="M858,202.8a476.94,476.94,0,0,0-237.9-66.1l.9-89.1A567.44,567.44,0,0,1,903.4,126Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="text-light" d="M171.4,830.1H75.7V663.4h26.1V806.5h69.6Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="text-light"
                      d="M280.8,794.4H221.5l-14.2,35.7H178.5l72.6-174.3,72.3,174.3H295ZM271.4,771l-20.2-50.8L231,771Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="text-light"
                      d="M431.6,796.6c-4.7,16.2-19.3,29-37.5,32.6a49.29,49.29,0,0,1-10.1.9,53.81,53.81,0,0,1-19.8-3.6,65.42,65.42,0,0,1-27.6-21.3L357.3,789c4.7,6.3,10.3,10.8,16.4,13a25.18,25.18,0,0,0,15.3,1.3c8.5-1.6,15.5-7.2,17.5-13.9,2.3-7.6-2.9-14.4-7.6-18.9-7.4-7-19.5-18.9-20.4-19.8l-20.4-19.3c-6.3-6.1-10.6-12.8-12.8-20a36.2,36.2,0,0,1-.5-21.1,37.25,37.25,0,0,1,12.4-18.6,43.08,43.08,0,0,1,20-9.4,44.49,44.49,0,0,1,24.7,1.8,57.09,57.09,0,0,1,22.7,16.8L404,697.3c-8.5-10.3-17.3-10.3-22-9.4-5.8,1.1-10.8,4.9-12.1,9.7-.9,3.1-.7,8.3,6.3,15.1l27.9,26.7c4,4,9,8.8,12.6,12.1,7.2,6.5,12.1,13.9,14.6,21.8A41.07,41.07,0,0,1,431.6,796.6Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-7" d="M587.3,696.3H541.5V830.1H515.2V696.3H469.4v-35H587.3v35Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="text-light" d="M561.7,696.3H515.9V830.1H489.6V696.3H443.8v-35H561.7v35Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-8"
                      d="M644.2,823.6a81.91,81.91,0,0,1-26.5-18,84.64,84.64,0,0,1-18-26.5,82.46,82.46,0,0,1-6.5-32.3,85,85,0,0,1,6.5-32.6,87.64,87.64,0,0,1,18-26.5,83.09,83.09,0,0,1,58.8-24.3,82.53,82.53,0,0,1,76.8,50.8,84.3,84.3,0,0,1,6.5,32.6,83.56,83.56,0,0,1-24.2,58.8,89.49,89.49,0,0,1-26.5,18,84.3,84.3,0,0,1-32.6,6.5A82.46,82.46,0,0,1,644.2,823.6Zm-8.1-117.3a57,57,0,1,0,40.4-16.8A56.91,56.91,0,0,0,636.1,706.3Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-9"
                      d="M912.2,746.8c0,23.6-7,43.8-20.2,58.4a67.76,67.76,0,0,1-26.7,18.4c-10.8,4.3-22.9,6.5-36.4,6.5H789.3V663.4h39.6c13.5,0,25.6,2,36.4,6.5A67,67,0,0,1,892,688.3C905.3,703,912.2,723.2,912.2,746.8Zm-26,0c0-17.1-4.7-31.2-13.5-40.9-9.9-11-24.5-16.4-43.8-16.4H815.4V804h13.5c19.3,0,33.9-5.6,43.8-16.4C881.4,778,886.2,763.6,886.2,746.8Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-10"
                      d="M1020.7,794.4H961.4l-14.2,35.7H918.4L991,655.8l72.3,174.3h-28.5Zm-9.4-23.4-20.2-50.8L970.9,771Z"
                      transform="translate(-52.7 -47.6)"/>
                <path class="cls-11" d="M1128.2,742.9v87.2h-26.1V742.9l-58.6-79.5h28.1l43.6,59.3,43.6-59.3h27.9Z"
                      transform="translate(-52.7 -47.6)"/>
            </svg>
        </Link>


    
        <div class="float-end">
        </div>

        <ul class="d-flex mb-0 justify-content-around order-lg-1 order-md-1 order-sm-1 order-2 desktop-version mx-auto">
          

         <li class="nav-item">
                <Link :href="route('articles')" :active="route().current('articles')" class="nav-link icon pointer">
                <img src="/assets/img/icons8-newspaper-48.png">
                     </Link>
            
            </li> 

      <li class="nav-item">


                  <Link :href="route('worldometers')" :active="route().current('worldometers')" class="nav-link icon pointer">
                    <img src="/assets/img/icons8-globe-48.png" height="40">

                     </Link>

              
            </li>
          
       <li class="nav-item">
                   <Link data-bs-toggle="modal" data-bs-target="#wall" class="nav-link pointer icon">
                                       <img src="/assets/img/icons8-news-100.png" height="40">

                   </Link>
              
            </li> 

       


            
         <li class="nav-item home-icon">

            <button type="button" class="nav-link icon pointer" data-bs-toggle="modal" data-bs-target="#spotify">
                    <img src="/assets/img/icons8-spotify-48.png" height="40">
            </button>
            </li> 

        
            <li class="nav-item">
                  <Link :href="route('youtubelives')" :active="route().current('youtubelives')" class="nav-link icon pointer">
                    <img src="/assets/img/icons8-youtube-48.png" height="40">
                </Link>
            </li> 
            <li class="nav-item">
                 <Link :href="route('new_article')" :active="route().current('new_article')" class="nav-link icon pointer">
                    <img src="/assets/img/icons8-pen-48.png" height="40">
                </Link>
            </li>
            <li class="nav-item">
                     <Link :href="route('nftmarketplace')" :active="route().current('nftmarketplace')"  class="nav-link icon pointer">
                    <img src="/assets/img/icons8-nft-64-4.png" height="40">
                </Link>
            </li> 


  <li class="nav-item">
                     <Link :href="route('userhomeshopindex')" :active="route().current('userhomeshopindex')"  class="nav-link icon pointer">
                    <img src="/assets/img/icons8-online-shop-48.png" height="40">
                </Link>
            </li> 
     <li class="nav-item">
                     <Link :href="route('notes')" :active="route().current('notes')"  class="nav-link icon pointer">
                    <img src="/assets/img/icons8-note-48.png" height="40">
                </Link>
            </li> 
     <li class="nav-item">
                     <Link :href="route('users')" :active="route().current('users')"  class="nav-link icon pointer">
                    <img src="/assets/img/icons8-group-48.png" height="40">
                </Link>
            </li> 
                <li class="nav-item home-icon">
                  <Link :href="route('notifications')" :active="route().current('notifications')" class="nav-link icon pointer">

                    <img src="/assets/img/icons8-notification-48.png" height="40">
                </Link>
            </li>
     <li class="nav-item">
                     <Link :href="route('information')" :active="route().current('information')"  class="nav-link icon pointer">
                    <img src="/images/icons/icons8-info-48.png" height="40">
                </Link>
            </li> 


        </ul>
        <div class="order-last" id="navbarSupportedContent">
            <div class="ms-auto">

                <ul class="d-flex mb-0 justify-content-around">
                 <li class="nav-item">
                     <Link  :href="route('dashboard')" :active="route().current('dashboard')">
                            <img src="/assets/img/icons8-user-48.png">
                        </Link>
                    </li> 
                    <li class="nav-item display_none_descktop">
                        <a class="nav-link icon pointer" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                            <img src="/assets/img/icons8-circled-menu-48.png">
                        </a>
                    </li> 
                    <li class="nav-item me-0">
                        <a class="nav-link icon pointer" data-bs-toggle="offcanvas"
                           data-bs-target="#offcanvasExample"
                           aria-controls="offcanvasExample">
                            <img src="/assets/img/icons8-setting-64.png">
                        </a>
                    </li>
                  
                </ul>

            </div>
        </div>
    </div>
</nav>




        <div class="MainMenu">
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom"
         aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-chevron-down"></i>
            </button>
        </div>
        <div class="offcanvas-body text-center">
            <div class="container">
                <div class="row justify-content-center">
                     <Link :href="route('articles')"  class="col-md-2  col-6">
                        <img src="/assets/img/icons8-newspaper-48.png" class="mx-auto d-block" height="40">
                        <h4>Contents</h4>
                    </Link> 
                   <Link :href="route('worldometers')" class="col-md-2  col-6">
                        <img src="/assets/img/icons8-globe-48.png" class="mx-auto d-block" height="40">
                        <h4>WorldOMeters</h4>
                    </Link>
               <a data-bs-toggle="modal" data-bs-target="#wall" class="col-md-2  col-6">
                        <img src="/assets/img/icons8-news-100.png" class="mx-auto d-block" height="40">
                        <h4>Wall</h4>
                    </a>
                   <Link :href="route('new_article')" class="col-md-2  col-6">
                        <img src="/assets/img/icons8-pen-48.png" class="mx-auto d-block" height="40">
                        <h4>Add Article</h4>
                    </Link>
                    <Link :href="route('users')" class="col-md-2  col-6">
                        <img src="/assets/img/icons8-group-48.png" class="mx-auto d-block" height="40">
                        <h4>Users</h4>
                    </Link> 
                    <Link  data-bs-toggle="modal" data-bs-target="#spotify" class="col-md-2  col-6">
                        <img src="/assets/img/icons8-spotify-48.png" class="mx-auto d-block" height="40">
                        <h4>Spotify</h4>
                    </Link>
                    <Link :href="route('youtubelives')"  class="col-md-2  col-6">
                        <img src="/assets/img/icons8-youtube-48.png" class="mx-auto d-block" height="40">
                        <h4>Youtube</h4>
                    </Link>
                    <!-- <a href="" target="_blank" class="col-md-3 col-sm-4 col-6">
                        <img src="/assets/img/icons8-notification-48.png" class="mx-auto d-block" height="40">
                        <h4>Notifications</h4>
                    </a> -->
                    <Link :href="route('nftmarketplace')" class="col-md-2  col-6">
                        <img src="/assets/img/icons8-nft-64-4.png" class="mx-auto d-block" height="40">
                        <h4>NFT Marketplace</h4>
                    </Link>
                     <!-- <Link :href="route('sms')"  class="col-md-2  col-6">
                        <img src="/assets/img/icons8-speech-bubble-48.png" class="mx-auto d-block" height="40">
                        <h4>SMS</h4>
                    </Link> -->
                     <Link :href="route('notes')" class="col-md-2  col-6">
                        <img src="/assets/img/icons8-note-48.png" class="mx-auto d-block" height="40">
                        <h4>Note</h4>
                    </Link>
                    
                    <Link :href="route('userhomeshopindex')"  class="col-md-2  col-6">
                        <img src="/assets/img/icons8-online-shop-48.png" class="mx-auto d-block" height="40">
                        <h4>Shop</h4>
                    </Link> 

                    <Link :href="route('information')"  class="col-md-2  col-6">
                        <img src="/images/icons/icons8-info-48.png" class="mx-auto d-block" height="40">
                        <h4>Info</h4>
                    </Link> 
                </div>
            </div>
        </div>
        <div class="offcanvas-footer">
            <div class="d-grid">
                <button type="button" class="btn btn-light" data-bs-dismiss="offcanvas" aria-label="Close">
                    Close Menu
                </button>
            </div>
        </div>
    </div>
</div>








</template>
