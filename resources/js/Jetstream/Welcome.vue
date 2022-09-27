<script setup>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetBanner from '@/Jetstream/Banner.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';

const logout = () => {
    Inertia.post(route('logout'));
};


</script>

<template>

         
<section class="w-full gap-5 mx-auto">

    <aside>
    
        <div class="bg-white shadow rounded-lg p-10 mb-4">
            <div class="flex gap-1 text-center items-center">
                   <div class="ml-3 relative">
                                <JetDropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-32 w-32 bg-white p-2 rounded-full shadow mb-4" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ $page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <!-- <JetDropdownLink :href="`${ltusername}`">
                                           Show Profile
                                        </JetDropdownLink> -->


                                        <JetDropdownLink :href="route('profile.show')">
                                           Edit Profile
                                        </JetDropdownLink>

                                        <JetDropdownLink :href="route('transactions')">
                                            Transactions
                                        </JetDropdownLink>

                                        <JetDropdownLink v-if="$page.props.user.is_admin == 1" :href="route('admin')">
                                            Admin
                                        </JetDropdownLink>

                                        <div class="border-t border-gray-100" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <JetDropdownLink as="button">
                                                Log Out
                                            </JetDropdownLink>
                                        </form>
                                    </template>
                                </JetDropdown>
                            </div>
                <h1 class="capitalize text-dark-400">Good time 🌼❤️ {{ $page.props.user.name }}</h1>
                <div class="text-sm leading-normal text-dark-400 flex justify-center items-center">

<p class="text-start">Take a deep breath, relax, search whatever you have in mind in web5 freedom country Last.Today, share and make money from your unique content!
Just as easily!
<br>
All business here is done through cryptocurrency, so all countries can easily use our services.
<br>
Respect humanity 🕊 🙏🏾❤️,
<br>
Trade easily with living in LT and see your friends with the latest today.

</p>
                </div>
            </div>
            <div class="flex justify-center items-center gap-2 my-3">
                <div class="font-semibold text-center mx-4">
                                       <Link href="/logout" method="post" as="button" type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2">
<img class="mr-2 -ml-1 w-6 h-5 zoom" src="/files/icons/icons8-pen-48.png"/>
Contents
</Link>
                </div>
                <div class="font-semibold text-center mx-4 zoom">
                                       <Link href="/logout" method="post" as="button" type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2">
<img class="mr-2 -ml-1 w-6 h-5 zoom" src="data:image/png;base64,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"/>
Bank
</Link>
                </div>
                <div class="font-semibold text-center mx-4 zoom">
                    <Link href="/logout" method="post" as="button" type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 mr-2 mb-2">
<img class="mr-2 -ml-1 w-6 h-5 zoom" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADoAAAA6CAYAAADhu0ooAAAABmJLR0QA/wD/AP+gvaeTAAAD5ElEQVRoge2bUWhbVRiAv/8mXdZWh65umnWOKhstE8skBaljYEEROlYVFpwvvuxRLlEQpA+FvOxhbA828cWhe+iD4qKo6xARH6StY4gIIsOnuVm7lqBNa5G6Nm1+H5rUJE1u0uTU9l7yQUg457//OV/uzTmHk3uFLUJ51p86dH+nYoXEIoQSEpWRvZOfX9qqNp3wm0hSSioFIZDdshYAQAa5YqK9Wti0qBL2pQ7d6yqUkqeAlnypnUZF0T8eHTjgEwmpJSGU4ynSveBr3clSpSgQzZdSJSTwDLBXwVVSpZDch+sdLyQ7tXn/Vjb2rs7Mjkjyr3py3PrtzmFq+NrXz6jA7no6UA1LkmkD2ra6nVJY29HoduAZUY1G73Oq94wozbym5849XK7a9aIajbbohegZhChN6Y/0fLRH9b9BNofrRQkEAqx55F5+Lr23YX1gZAm4ncjg4BzwoV6IPkKGK/J2dKpUnOtF1/FzWd6Mzperdv+lm8VJEjwkWomGqNdoiHqNhqhbCIfVV02cMdGm49088P1lfB1BUymrIhjkrG3rc5XijIn6ujqw9j+I9fgBUymrQpUWEa5GIvq8U5zrL90szaqM2raeLBewo9a6LS0H6To66Bhz8sX+j4uKjmTfAyIkbFtfisfl6+LjdpSov2kPwfb+SmFhh7pmEUZtW0/H4zKaX+GVSzefXSJ8Ytt6Kr/Qi6KQlY1EdCBX4FVRAPK3VIyJZpKzoEomOWcqZT0sixCOxeSLXIGxwWj52nfMTfyEzv9tKmXNXVHldCxWOBgZHXXrlVxJLzBz90vHmGB7f6Ko6AhwLPv5HvByPC5fFR9nTLSp90laL9osvDpEZjJZU47FxSl+/OF1x5hbn955hbz/Xmxb3xDhGLAkQnh4eKMkmFwCHn0Mq30fvsMHTaXcDP+IcGp4WK6VCzB2Rld/uU0mmSLz67SplFUhwqIqA7GYfOMUZ0w0ff1n5p8+aypd1czM8EEiIauV4lw/j1YjCR4QrZaGqNdoiHqNhqjbuHFD9zjVe0Z0eZkhVd3wl34O14tOTGjn+LheBN4aG+P9sTHtLhXnetF0mqQqU4BaFtPATKm4HbULWAt9fTIPvDM+rm0nTshQuTjXn9EcKyucd6r3jGhfnzhub3hGtBLrv1Fd229xnIvqJaDWLEJdt7HWSsG8U+7GZFONqUrkocnPYqbybYaCUXff71engWlgfauw+FZzoBdo/X+7WT8Vp5di+VIPD5B9eGCL+1oXm55HhcQqk9wEbgIjUPpxELKPgxjub80YWTAI365skH8ivOvPhaVun8/Xo0oItMeyNG2ivVr4F3gEMZdPGvk8AAAAAElFTkSuQmCC"/>
Logout
</Link>
                </div>
            </div>
        </div>


    </aside>

  
    
</section>

    

          
</template>
