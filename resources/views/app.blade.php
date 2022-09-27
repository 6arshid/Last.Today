<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title inertia>{{ config('app.name', 'Uncensored Society - Last.Today') }}</title>

    <!-- TailWind -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/public/assets/css/style.css"/>
    <link rel="stylesheet" href="/style.css"/>

    @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @inertiaHead
</head>
<body class="dark:bg-gray-800 bg-white-800 text-white-800 dark:text-gray-50">
    

   

        <main class="mx-auto">
        @inertia

@env ('local')
    <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
@endenv

            



  
<div class="flex items-end justify-end fixed bottom-0 left-0 mb-4 ml-4 z-10">
    <div> 
    <!-- <div id="google_translate_element"></div> -->
   
    </div>
</div>

      

        </main>
    </div>
<!--</div>-->

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-28608110-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-28608110-3');
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js'></script>
<script src='https://unpkg.com/vue-emoji-picker/dist/vue-emoji-picker.js'></script>


<script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
<script src="/public/assets/js/SwitchTheme.js"></script>
<script src="/script.js"></script>
</body>
</html>