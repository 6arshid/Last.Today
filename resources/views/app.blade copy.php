<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
          <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/style.css" rel="stylesheet" type="text/css"/>
    <!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @inertiaHead
</head>
<!-- <body class="Pages"  style="background-image: url('/assets/img/bg.jpg');background-position: center center;background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-attachment: fixed;"> -->
<body class="Pages">
    
@inertia

@env ('local')
    <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
@endenv





         <!-- spotify -->
         <div class="modal fade" id="spotify" aria-hidden="true" aria-labelledby="new_contentModalToggleLabel" tabindex="-1">
        <div class="modal-dialog  modal-md modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="dwnewsModalToggleLabel2">Today's top hits on Spotify</h5>

              <!-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"> -->
            </div>
            <div class="modal-body row text-center">
            
                  <iframe  src='https://open.spotify.com/embed/playlist/37i9dQZF1DXcBWIGoYBM5M?utm_source=generator&theme=0' width='100%' height='580' frameBorder='0' allowfullscreen='' allow='autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture'></iframe>
          
       
            </div>
          </div>
        </div>
      </div>  


            <!-- wall -->
            <div class="modal fade" id="wall" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <div class="modal-body">
            <a href="/user/follow/hashtags" class="btn btn-primary btn-lg mb-2">Hashtags</a>
            <a href="/user/follow/users" class="btn btn-primary btn-lg mb-2 ">Connections</a>

            </div>
            
            </div>
        </div>
        </div>



        <div class="settings">
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
         aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Settings</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bi bi-chevron-left"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="px-2">
                <h6>Display</h6>
                <p class="mt-3">Adjust the appearance to reduce glare and give your eyes a break.</p>
                <label class="switch">
                    <input class="switch__input" type="checkbox" id="themeSwitch">
                    <span class="slider round switch__marker" for="themeSwitch"></span>
                </label>
                <label class="form-check-label mx-1 themeSwitch" for="themeSwitch">Switch Theme
                    Color</label>
                <div class="d-block mt-2">
                    <label class="switch">
                        <input class="switch__input" type="checkbox" id="textSwitch">
                        <span class="slider round switch__marker" for="textSwitch"></span>
                    </label>
                    <label class="form-check-label mx-1 themeSwitch" for="textSwitch">Switch Text
                        Color</label>
                </div>
                <!-- <div class="border-bottom mt-3 mb-3"></div> -->

                <!-- <h6>Update Background</h6>
                <form id="upload_cover" action="" method="POST"
                      enctype="multipart/form-data">
                    <div class="mt-3">
                        <div class="mb-2">
                            <input class="form-control form-control-sm SelectImage" type="file" id="MainBg" name="MainBg" required>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="update_avatar">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i> Update Cover
                                </button>
                            </div>
                    
                        </div>
                    </div>
                </form>

                <div class="border-bottom mt-3 mb-3"></div> -->

                <!-- <h6>Language</h6>
                <div class="mt-3">
                    <select class="form-select" aria-label="Default select example">
                        <option value="1" selected>English</option>
                        <option value="2">Danish</option>
                        <option value="3">Persian</option>
                    </select>
                </div>

                <div class="border-bottom mt-3 mb-3"></div> -->



               
              
                <div class="border-bottom mt-3 mb-3"></div>
                <div class="footer">
                    © 2016 - @php echo date("Y"); @endphp All Rights Reserved 
                    <!-- <br> -->
                    <!-- Powered By <a href="https://Last.Today">Last.Today</a> -->
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

 

 

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-28608110-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-28608110-3');
</script>


<!-- <script src="/assets/js/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script> -->
<script src="/assets/js/theme.js"></script>
<script src="/assets/js/SwitchTheme.js"></script>
<script src="/script.js"></script>
</body>
</html>