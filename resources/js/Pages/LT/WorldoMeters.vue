<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';

</script>
<script>
export default {
  methods: {
    WorldoMeters() {
      window.open("https://www.worldometers.info/", "_blank");
    },
  },
};
</script>
<template>
    <AppLayout title="WorldoMeters.info">
      <div class="w-11/12 md:w-12/12 mx-auto">




    <!-- <button @click="WorldoMeters()" class="btn btn-info mt-5 mb-5 zoomappindex w-50">WorldoMeters</button> -->


                <div class="overflow-hidden shadow-xl">
                    <iframe width="100%" height="850px" src='https://www.worldometers.info/'  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            
</div>
    </AppLayout>
</template>
