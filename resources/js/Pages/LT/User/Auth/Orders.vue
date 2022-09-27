<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'
const props = defineProps({
  transactions: Array,
  username:String
})
</script>

<template>
    <AppLayout title="Orders">
 

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="p-6 sm:p-10 dark:bg-gray-900 dark:text-gray-100">
	<h2 class="text-xl font-semibold text-gray-800 dark:text-gray-50 dark:text-slate-200">New Orders</h2>
	<ul class="flex flex-col divide-y divide-gray-700">
		<li v-for="transaction in transactions" :key="transaction.id" class="flex flex-col py-6 sm:flex-row sm:justify-between">
			<div class="flex w-full space-x-2 sm:space-x-4">
				<div class="flex flex-col justify-between w-full pb-4">
					<div class="flex justify-between w-full pb-2 space-x-2">
						<div class="space-y-1">
							<a :href="`https://last.today/app/products/${transaction.producturl}`" target="_blank"><h3 class="text-lg font-semibold leading-snug sm:pr-8 text-gray-800 dark:text-gray-50 dark:text-slate-200">{{ transaction.payercomment}}</h3></a>
							<a :href="`https://www.google.com/maps/place/${transaction.useraddress}`" target="_blank"><h1 class="text-lg font-semibold leading-snug sm:pr-8 text-gray-800 dark:text-gray-50 dark:text-slate-200">Address : {{ transaction.useraddress}}</h1></a>
						</div>
						<div class="text-right">
							<p class="text-lg font-semibold">Cryptoamount:  {{ transaction.cryptoamount}} $</p>
							
						</div>
					</div>
					<div class="flex text-sm divide-x">
			
						<a :href="`/user/products/accept/${transaction.uniqid}`" class="mx-2 flex items-center px-2 py-1 space-x-1  px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-green-500 hover:bg-green-600 active:bg-green-700 focus:ring-green-300">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
								<path d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z"></path>
							</svg>
							<span>Deliver the order</span>
						</a>
						<h1 v-if="transaction.delivery == 'Order has been confirmed by seller, please wait for delivery' || transaction.delivery == 'delivered'" class="">
							You have already made changes to the order, but you are still allowed to make changes
						</h1>
						


						<a :href="`/user/products/reject/${transaction.uniqid}`"  class="mx-2  flex items-center px-2 py-1 pl-0 space-x-1 px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition text-white bg-red-500 hover:bg-red-600 active:bg-red-700 focus:ring-red-300 ">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
								<path d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z"></path>
								<rect width="32" height="200" x="168" y="216"></rect>
								<rect width="32" height="200" x="240" y="216"></rect>
								<rect width="32" height="200" x="312" y="216"></rect>
								<path d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z"></path>
							</svg>
							<span>You do not accept the order</span>
						</a>
<br/>
<h1 v-if="transaction.delivery == 'accept from customer'" class="text-lg font-semibold leading-snug sm:pr-8 text-gray-800 dark:text-gray-50 dark:text-slate-200">
	The good news of your order has been confirmed by the customer
						</h1>
						<h1 v-if="transaction.delivery == 'accept from customer'" class="text-lg font-semibold leading-snug sm:pr-8 text-gray-800 dark:text-gray-50 dark:text-slate-200">
							Oh shit, we have a problem !<br/>
							This is a customer message : transaction.	{{transaction.payercomment}}
						</h1>
						
					</div>
				</div>
			</div>
		</li>

	</ul>

</div>



                </div>
            </div>
        </div>
    </AppLayout>
</template>
