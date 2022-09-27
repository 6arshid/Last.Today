<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

const form = useForm({
    // name: '',
    username: '',
    password: '',
    password_confirmation: '',
    language: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>
<script>
    async function web3Login() {
        if (!window.ethereum) {
            alert('MetaMask not detected. Please install MetaMask first.');
            return;
        }
    }
</script>
<template>
    <Head title="Register" />


<div class="h-full w-full py-1 px-4">
       <div v-if="status" class="mb-4 font-medium text-sm text-green-600 bg-info">
            {{ status }}
            </div>
            <div class="flex flex-col items-center justify-center">
                
       
                <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-5">
                  <Link :href="route('welcome')">  <img src="/images/logo.png" class="object-fill auth_logo zoom"/></Link>
                    <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800 mt-3">Register</p>
                 
                    <a href="/login/google" class="focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-700 py-3.5 px-4 border rounded-lg border-gray-700 flex items-center w-full mt-10">
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.9892 10.1871C18.9892 9.36767 18.9246 8.76973 18.7847 8.14966H9.68848V11.848H15.0277C14.9201 12.767 14.3388 14.1512 13.047 15.0812L13.0289 15.205L15.905 17.4969L16.1042 17.5173C17.9342 15.7789 18.9892 13.221 18.9892 10.1871Z" fill="#4285F4" />
                            <path d="M9.68813 19.9314C12.3039 19.9314 14.4999 19.0455 16.1039 17.5174L13.0467 15.0813C12.2286 15.6682 11.1306 16.0779 9.68813 16.0779C7.12612 16.0779 4.95165 14.3395 4.17651 11.9366L4.06289 11.9465L1.07231 14.3273L1.0332 14.4391C2.62638 17.6946 5.89889 19.9314 9.68813 19.9314Z" fill="#34A853" />
                            <path d="M4.17667 11.9366C3.97215 11.3165 3.85378 10.6521 3.85378 9.96562C3.85378 9.27905 3.97215 8.6147 4.16591 7.99463L4.1605 7.86257L1.13246 5.44363L1.03339 5.49211C0.37677 6.84302 0 8.36005 0 9.96562C0 11.5712 0.37677 13.0881 1.03339 14.4391L4.17667 11.9366Z" fill="#FBBC05" />
                            <path d="M9.68807 3.85336C11.5073 3.85336 12.7344 4.66168 13.4342 5.33718L16.1684 2.59107C14.4892 0.985496 12.3039 0 9.68807 0C5.89885 0 2.62637 2.23672 1.0332 5.49214L4.16573 7.99466C4.95162 5.59183 7.12608 3.85336 9.68807 3.85336Z" fill="#EB4335" />
                        </svg>
                        <p class="text-base font-medium ml-4 text-gray-700">Continue with Google</p>
                    </a>
                    <!-- <button aria-label="Continue with github" role="button" class="focus:outline-none  focus:ring-2 focus:ring-offset-1 focus:ring-gray-700 py-3.5 px-4 border rounded-lg border-gray-700 flex items-center w-full mt-4">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.1543 0C4.6293 0 0.154298 4.475 0.154298 10C0.153164 12.0993 0.813112 14.1456 2.04051 15.8487C3.26792 17.5517 5.00044 18.8251 6.9923 19.488C7.4923 19.575 7.6793 19.275 7.6793 19.012C7.6793 18.775 7.6663 17.988 7.6663 17.15C5.1543 17.613 4.5043 16.538 4.3043 15.975C4.1913 15.687 3.7043 14.8 3.2793 14.562C2.9293 14.375 2.4293 13.912 3.2663 13.9C4.0543 13.887 4.6163 14.625 4.8043 14.925C5.7043 16.437 7.1423 16.012 7.7163 15.75C7.8043 15.1 8.0663 14.663 8.3543 14.413C6.1293 14.163 3.8043 13.3 3.8043 9.475C3.8043 8.387 4.1913 7.488 4.8293 6.787C4.7293 6.537 4.3793 5.512 4.9293 4.137C4.9293 4.137 5.7663 3.875 7.6793 5.163C8.49336 4.93706 9.33447 4.82334 10.1793 4.825C11.0293 4.825 11.8793 4.937 12.6793 5.162C14.5913 3.862 15.4293 4.138 15.4293 4.138C15.9793 5.513 15.6293 6.538 15.5293 6.788C16.1663 7.488 16.5543 8.375 16.5543 9.475C16.5543 13.313 14.2173 14.163 11.9923 14.413C12.3543 14.725 12.6673 15.325 12.6673 16.263C12.6673 17.6 12.6543 18.675 12.6543 19.013C12.6543 19.275 12.8423 19.587 13.3423 19.487C15.3273 18.8168 17.0522 17.541 18.2742 15.8392C19.4962 14.1373 20.1537 12.0951 20.1543 10C20.1543 4.475 15.6793 0 10.1543 0Z" fill="#333333"/>
                            </svg>
                            
                        <p class="text-base font-medium ml-4 text-gray-700">Continue with Github</p>
                    </button>
                    <button aria-label="Continue with twitter" role="button" class="focus:outline-none  focus:ring-2 focus:ring-offset-1 focus:ring-gray-700 py-3.5 px-4 border rounded-lg border-gray-700 flex items-center w-full mt-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.1623 5.656C21.3989 5.9937 20.5893 6.21548 19.7603 6.314C20.634 5.79144 21.288 4.96902 21.6003 4C20.7803 4.488 19.8813 4.83 18.9443 5.015C18.3149 4.34158 17.4807 3.89497 16.5713 3.74459C15.6618 3.59421 14.7282 3.74849 13.9156 4.18346C13.1029 4.61842 12.4567 5.30969 12.0774 6.1498C11.6981 6.9899 11.607 7.93178 11.8183 8.829C10.1554 8.74566 8.52863 8.31353 7.04358 7.56067C5.55854 6.80781 4.24842 5.75105 3.1983 4.459C2.82659 5.09745 2.63125 5.82323 2.6323 6.562C2.6323 8.012 3.3703 9.293 4.4923 10.043C3.82831 10.0221 3.17893 9.84278 2.5983 9.52V9.572C2.5985 10.5377 2.93267 11.4736 3.54414 12.2211C4.15562 12.9685 5.00678 13.4815 5.9533 13.673C5.33691 13.84 4.6906 13.8647 4.0633 13.745C4.33016 14.5762 4.8503 15.3032 5.55089 15.8241C6.25147 16.345 7.09742 16.6338 7.9703 16.65C7.10278 17.3313 6.10947 17.835 5.04718 18.1322C3.98488 18.4294 2.87442 18.5143 1.7793 18.382C3.69099 19.6114 5.91639 20.2641 8.1893 20.262C15.8823 20.262 20.0893 13.889 20.0893 8.362C20.0893 8.182 20.0843 8 20.0763 7.822C20.8952 7.23017 21.6019 6.49702 22.1633 5.657L22.1623 5.656Z" fill="#1DA1F2"/>
                            </svg>
                            
                        <p class="text-base font-medium ml-4 text-gray-700">Continue with Twitter</p>
                    </button> -->
                    <div class="w-full flex items-center justify-between">
                         <hr class="w-full bg-gray-400">
                         <p class="text-base font-medium leading-4 px-2.5 text-gray-400">OR</p>
                         <hr class="w-full bg-gray-400 ">
                        </div>
                      
        <form @submit.prevent="submit">
            <div class="mx-auto max-w-lg">
              <!-- <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Name</span>
                <input 
                     id="name" type="text"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name" placeholder="Enter Name" class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
              </div> -->
              <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Username</span>
                <div class="relative">
                  <input  v-model="form.username" type="text"
                    required placeholder="Enter Username" class="text-md block px-3 py-2 rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                focus:placeholder-gray-500
                focus:bg-white 
                focus:border-gray-600  
                focus:outline-none">
                  
                </div>
              </div>
              <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Password</span>
                <input 
                     type="password"   id="password"
                    v-model="form.password"
                    required
                    autocomplete="new-password" placeholder="Enter Password" class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                    <svg class="h-6 text-gray-700 block" fill="none" @click="show = !show" :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                      <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                      </path>
                    </svg>

                    <svg class="h-6 text-gray-700 hidden" fill="none" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                      <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                      </path>
                    </svg>

                  </div>
              </div>
              <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Password Confirmation</span>
                <input 
                    type="password"  id="password_confirmation"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password" placeholder="Enter Passwod Again" class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
              </div>
          
                <div class="py-2">
                <span class="px-1 text-sm text-gray-600">Language</span>
                <select  id="language"
                    v-model="form.language"
                    required
                    autocomplete="language" placeholder="Enter Your Language" class="text-md block px-3 py-2  rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
    <option>Select Language</option>
    <option value="af">Afrikaans</option>
    <option value="sq">Albanian - shqip</option>
    <option value="am">Amharic - አማርኛ</option>
    <option value="ar">Arabic - العربية</option>
    <option value="an">Aragonese - aragonés</option>
    <option value="hy">Armenian - հայերեն</option>
    <option value="ast">Asturian - asturianu</option>
    <option value="az">Azerbaijani - azərbaycan dili</option>
    <option value="eu">Basque - euskara</option>
    <option value="be">Belarusian - беларуская</option>
    <option value="bn">Bengali - বাংলা</option>
    <option value="bs">Bosnian - bosanski</option>
    <option value="br">Breton - brezhoneg</option>
    <option value="bg">Bulgarian - български</option>
    <option value="ca">Catalan - català</option>
    <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
    <option value="zh">Chinese - 中文</option>
    <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
    <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
    <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
    <option value="co">Corsican</option>
    <option value="hr">Croatian - hrvatski</option>
    <option value="cs">Czech - čeština</option>
    <option value="da">Danish - dansk</option>
    <option value="nl">Dutch - Nederlands</option>
    <option value="en">English</option>
    <option value="en-AU">English (Australia)</option>
    <option value="en-CA">English (Canada)</option>
    <option value="en-IN">English (India)</option>
    <option value="en-NZ">English (New Zealand)</option>
    <option value="en-ZA">English (South Africa)</option>
    <option value="en-GB">English (United Kingdom)</option>
    <option value="en-US">English (United States)</option>
    <option value="eo">Esperanto - esperanto</option>
    <option value="et">Estonian - eesti</option>
    <option value="fo">Faroese - føroyskt</option>
    <option value="fil">Filipino</option>
    <option value="fi">Finnish - suomi</option>
    <option value="fr">French - français</option>
    <option value="fr-CA">French (Canada) - français (Canada)</option>
    <option value="fr-FR">French (France) - français (France)</option>
    <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
    <option value="gl">Galician - galego</option>
    <option value="ka">Georgian - ქართული</option>
    <option value="de">German - Deutsch</option>
    <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
    <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
    <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
    <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
    <option value="el">Greek - Ελληνικά</option>
    <option value="gn">Guarani</option>
    <option value="gu">Gujarati - ગુજરાતી</option>
    <option value="ha">Hausa</option>
    <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
    <option value="he">Hebrew - עברית</option>
    <option value="hi">Hindi - हिन्दी</option>
    <option value="hu">Hungarian - magyar</option>
    <option value="is">Icelandic - íslenska</option>
    <option value="id">Indonesian - Indonesia</option>
    <option value="ia">Interlingua</option>
    <option value="ga">Irish - Gaeilge</option>
    <option value="it">Italian - italiano</option>
    <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
    <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
    <option value="ja">Japanese - 日本語</option>
    <option value="kn">Kannada - ಕನ್ನಡ</option>
    <option value="kk">Kazakh - қазақ тілі</option>
    <option value="km">Khmer - ខ្មែរ</option>
    <option value="ko">Korean - 한국어</option>
    <option value="ku">Kurdish - Kurdî</option>
    <option value="ky">Kyrgyz - кыргызча</option>
    <option value="lo">Lao - ລາວ</option>
    <option value="la">Latin</option>
    <option value="lv">Latvian - latviešu</option>
    <option value="ln">Lingala - lingála</option>
    <option value="lt">Lithuanian - lietuvių</option>
    <option value="mk">Macedonian - македонски</option>
    <option value="ms">Malay - Bahasa Melayu</option>
    <option value="ml">Malayalam - മലയാളം</option>
    <option value="mt">Maltese - Malti</option>
    <option value="mr">Marathi - मराठी</option>
    <option value="mn">Mongolian - монгол</option>
    <option value="ne">Nepali - नेपाली</option>
    <option value="no">Norwegian - norsk</option>
    <option value="nb">Norwegian Bokmål - norsk bokmål</option>
    <option value="nn">Norwegian Nynorsk - nynorsk</option>
    <option value="oc">Occitan</option>
    <option value="or">Oriya - ଓଡ଼ିଆ</option>
    <option value="om">Oromo - Oromoo</option>
    <option value="ps">Pashto - پښتو</option>
    <option value="fa">Persian - فارسی</option>
    <option value="pl">Polish - polski</option>
    <option value="pt">Portuguese - português</option>
    <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
    <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
    <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
    <option value="qu">Quechua</option>
    <option value="ro">Romanian - română</option>
    <option value="mo">Romanian (Moldova) - română (Moldova)</option>
    <option value="rm">Romansh - rumantsch</option>
    <option value="ru">Russian - русский</option>
    <option value="gd">Scottish Gaelic</option>
    <option value="sr">Serbian - српски</option>
    <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
    <option value="sn">Shona - chiShona</option>
    <option value="sd">Sindhi</option>
    <option value="si">Sinhala - සිංහල</option>
    <option value="sk">Slovak - slovenčina</option>
    <option value="sl">Slovenian - slovenščina</option>
    <option value="so">Somali - Soomaali</option>
    <option value="st">Southern Sotho</option>
    <option value="es">Spanish - español</option>
    <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
    <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
    <option value="es-MX">Spanish (Mexico) - español (México)</option>
    <option value="es-ES">Spanish (Spain) - español (España)</option>
    <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
    <option value="su">Sundanese</option>
    <option value="sw">Swahili - Kiswahili</option>
    <option value="sv">Swedish - svenska</option>
    <option value="tg">Tajik - тоҷикӣ</option>
    <option value="ta">Tamil - தமிழ்</option>
    <option value="tt">Tatar</option>
    <option value="te">Telugu - తెలుగు</option>
    <option value="th">Thai - ไทย</option>
    <option value="ti">Tigrinya - ትግርኛ</option>
    <option value="to">Tongan - lea fakatonga</option>
    <option value="tr">Turkish - Türkçe</option>
    <option value="tk">Turkmen</option>
    <option value="tw">Twi</option>
    <option value="uk">Ukrainian - українська</option>
    <option value="ur">Urdu - اردو</option>
    <option value="ug">Uyghur</option>
    <option value="uz">Uzbek - o‘zbek</option>
    <option value="vi">Vietnamese - Tiếng Việt</option>
    <option value="wa">Walloon - wa</option>
    <option value="cy">Welsh - Cymraeg</option>
    <option value="fy">Western Frisian</option>
    <option value="xh">Xhosa</option>
    <option value="yi">Yiddish</option>
    <option value="yo">Yoruba - Èdè Yorùbá</option>
    <option value="zu">Zulu - isiZulu</option>
</select>
              </div>
            
                            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <JetLabel for="terms">
                    <div class="flex items-center">
                        <JetCheckbox id="terms" v-model:checked="form.terms" name="terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </JetLabel>
            </div>


               <JetButton class="mt-3 text-lg font-semibold 
                btn-primary w-full text-white rounded-lg
                px-6 py-3 block shadow-xl hover:text-white hover:bg-black" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </JetButton>
            </div>
          </form>
          <p tabindex="0" class="focus:outline-none text-sm mt-4 font-medium leading-none text-gray-500">Yoy have account?
                         <a href="/login"   class="hover:text-gray-500 focus:text-gray-500 focus:outline-none focus:underline hover:underline text-sm font-medium leading-none  text-gray-800 cursor-pointer">
                             Login</a></p>


                             <button class="btn btn-primary mt-5" onclick="web3Login();">Log in with MetaMask</button>

                </div>
            </div>
        </div>



</template>
