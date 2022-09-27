<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { reactive } from 'vue'
    import { Link ,useForm } from '@inertiajs/inertia-vue3'
    import { Inertia } from '@inertiajs/inertia'
    const props = defineProps({
        user_info:Object,
    })
    const logout = () => {
    Inertia.post(route('logout'));
};
    </script>
<style>

</style>
    <template>
    <AppLayout title="Dashboard">

<div class="bg-gradient-to-b from-pink-100 to-purple-200">
    <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">
        <div class="m-auto text-center lg:w-8/12 xl:w-7/12">
            <h2 class="text-2xl text-pink-900 font-bold md:text-4xl">Welcome to your LT Dashboard</h2>
        </div>
        <div class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
            <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110"></div>
                <div class="relative p-6 space-y-6 lg:p-8">
                    <h3 class="text-3xl text-gray-700 font-semibold text-center">Profile</h3>
                    <div>
                        <div class="relative flex justify-around">
                            <div class="flex items-end">
                                <Link :href="`/${user_info.username}`" type="button" class="mb-4 mx-1 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-pink-600 bg-pink-50 hover:text-pink-800 hover:bg-pink-100 active:bg-pink-200 focus:ring-pink-300 mt-10">Your Profile</Link>   
                        <Link :href="route('profile.show')" class="mb-4 mx-1 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition  bg-gray-50 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300" >Edit Profile</Link>
    <Link :href="route('transactions')"  class="mb-4 mx-1 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition  bg-gray-50 hover:bg-gray-600 active:bg-gray-700 focus:ring-gray-300" >Transactions</Link>
    <Link href="/logout" method="post" as="button" type="button"   class="mb-4 bg-red-500 hover:bg-red-600 active:bg-red-700 focus:ring-red-300 flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Logout</Link>

                            </div>
                        </div>
                    </div>
                    <h3 class="text-3xl text-gray-700 font-semibold text-center mb-5">Products</h3>
                <br/>
                <Link :href="`/user/products/new`" class="px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300">Add New</Link>
					
                    <Link :href="`/user/products`" class="border border-teal-500 text-teal-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-teal-600 focus:outline-none focus:shadow-outline">Archive</Link>
            
                    <Link :href="`/user/products/orders`" class="border border-yellow-500 text-yellow-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-yellow-600 focus:outline-none focus:shadow-outline">Orders <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span></Link>
            
        
                    <!-- <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>First premium advantage</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Second advantage weekly</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Third advantage donate to project</span>
                        </li>
                    </ul>
                    <p class="flex items-center justify-center space-x-4 text-lg text-gray-600 text-center">
                        <span>Call us at</span>
                        <a href="tel:+24300" class="flex space-x-2 items-center text-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <span class="font-semibold">+1 000 000</span>
                        </a>
                        <span>or</span>
                    </p>
                    <button type="submit" title="Submit" class="block w-full py-3 px-6 text-center rounded-xl transition bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-indigo-600">
                        <span class="text-white font-semibold">
                            Send us an email
                        </span>
                    </button> -->
                </div>
            </div>

            <div class="relative group md:w-6/12 lg:w-7/12">
                <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105"></div>
                <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
            <p class="text-gray-700">Take a deep breath, relax, search whatever you have in mind in web5 freedom country Last.Today, share and make money from your unique content!
Just as easily!
<br>
All business here is done through cryptocurrency, so all countries can easily use our services.
<br>
Respect humanity 🕊 🙏🏾❤️,
<br>
Trade easily with living in LT and see your friends with the latest today.

</p>

<div class="mt-3 mb-3 bg-blue-100 rounded-lg shadow-sm p-5 border-dashed border border-blue-500 flex flex-col sm:flex-row justify-between items-center gap-2 sm:gap-0">
		<div class="flex flex-col sm:flex-row justify-start items-center gap-4">
			<div class="bg-blue-200 flex p-2 rounded-md"><svg xmlns="http://www.w3.org/2000/svg"
					class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd"
						d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
						clip-rule="evenodd"></path>
				</svg></div>
			<div class="text-center sm:text-left">
				<h1 class="text-gray-700 font-bold tracking-wider">Send the following link to others to get a one percent discount , and you share a percentage of the user's sales</h1>
				<p class="text-gray-500 font-semibold"><a :href="`https://last.today/register?ref=${user_info.username}`" target="_blank">https://last.today/register?ref={{user_info.username}}</a></p>
			</div>
		</div>
		<div>
		</div>
	</div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
 
    
    
    </AppLayout>
    
    </template>
    
    