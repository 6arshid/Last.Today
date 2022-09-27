<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'
const props = defineProps({
  transactions: Array,
  username:String
})
</script>

<template>
    <AppLayout title="Transactions">
 

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row overflow-hidden shadow-xl sm:rounded-lg">




                    <div v-for="transaction in transactions" :key="transaction.id" :id="`#${transaction.id2}`" class="mb-5 p-1 rounded-md bg-gradient-to-r from-rose-900 via-pink-500 to-indigo-900 shadow-2xl shadow-pink-500/30">
            <div class="bg-black rounded-md border border-white/20">
                <div class="rounded-md p-10 bg-gradient-to-r from-rose-900/30 to-indigo-800/30">
                    <div class="md:flex items-center">
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold"> Cryptoamount:  {{ transaction.cryptoamount}} , Sender : <Link :href="`/${transaction.payerusername}`">{{transaction.payerusername}}</Link></h3>
                            
                            <p class="text-rose-100 font-medium mt-2" v-if="transaction.product == 1"> <Link :href="`/user/products/orders#${transaction.purl}`">{{ transaction.payercomment}}</Link></p>
                            
                            
                            <!-- <p class="text-rose-100 font-medium mt-2">
                                Token : {{ transaction.tokenid}} 
                            </p> -->
                        </div>
                        <div>
                            <a  class="group flex items-center leading-none text-indigo-400 bg-indigo-900/30 rounded px-4 py-2 text-sm mt-6 md:mt-0 ease-in-out transition-all duration-300 hover:bg-indigo-900/60 hover:text-indigo-300">
                                <span> Date : {{transaction.date}} - Get paid by you :

                                <p v-if="transaction.received == 0">No Received </p>
                                <p v-if="transaction.received == 1">Received</p>

                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 ease-in-out transition-all duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      

    
                </div>
            </div>
        </div>
    </AppLayout>
</template>
