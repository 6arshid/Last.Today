<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'
</script>


<template>
    <AppLayout title="Information">
<br/><br/>
        <div class="bg-white pt-10 shadow rounded-lg p-3 md:w-5/12 w-11/12 mx-auto mb-4">

        <div class="grid grid-rows-3 grid-flow-col gap-4">
  <div class="row-span-2">
                        <Link href="/sys/about" class="btn btn-link">About</Link>

  </div>
  <div class="row-span-2">
                        <Link href="/sys/contact" class="btn btn-link">Contact</Link>

  </div>
  <div class="row-span-2">
                        <Link href="/sys/rules" class="btn btn-link">Rules</Link>

  </div>
</div>
</div>
    </AppLayout>
</template>
