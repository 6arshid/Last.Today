<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import JetButton from '@/Jetstream/Button.vue';
import JetFormSection from '@/Jetstream/FormSection.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetInputError from '@/Jetstream/InputError.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetActionMessage from '@/Jetstream/ActionMessage.vue';
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    youtube: props.user.youtube,
    instagram: props.user.instagram,
    facebook: props.user.facebook,    
    telegram: props.user.telegram,
    whatsapp: props.user.whatsapp,
    twitter: props.user.twitter,
    linkedin: props.user.linkedin,
    tiktok: props.user.tiktok,
    skype: props.user.skype,
    github: props.user.github,
    pinterest: props.user.pinterest,
    reddit: props.user.reddit,
    twitch: props.user.twitch,
    wechat: props.user.wechat,
    kuaishou: props.user.kuaishou,
    qzone: props.user.qzone,
    quora: props.user.quora,
    wikipedia: props.user.wikipedia,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);



// function submit() {
//       Inertia.post(`/user-profile-information.update`, {
//         _method: 'post',
//         youtube: form.youtube,
//         instagram: form.instagram,
//         facebook: form.facebook,
//         telegram: form.telegram,
//         whatsapp: form.whatsapp,
//         twitter: form.twitter,
//         linkedin: form.linkedin,
//         tiktok: form.tiktok,
//         skype: form.skype,
//         github: form.github,
//         pinterest: form.pinterest,
//         reddit: form.reddit,
//         twitch: form.twitch,
//         wechat: form.wechat,
//         kuaishou: form.kuaishou,
//         qzone: form.qzone,
//         quora: form.quora,
//         wikipedia: form.wikipedia
//       })
//     }

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (! photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    Inertia.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<template>
    <JetFormSection @submitted="UpdateSocialNetworks">
        <template #title>
            Social Networks
        </template>

        <template #description>
            <!-- Update your account's profile information and email address. -->
        </template>

        <template #form>

              <!-- youtube -->
            <div class="col-span-5 sm:col-span-4">
                <JetLabel for="youtube" value="Youtube" />
                <JetInput
                    id="youtube"
                    v-model="form.youtube"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="youtube"
                />
                <JetInputError :message="form.errors.youtube" class="mt-2" />
            </div>


            <!-- instagram -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="instagram" value="Instagram" />
                <JetInput
                    id="instagram"
                    v-model="form.instagram"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="instagram"
                />
                <JetInputError :message="form.errors.instagram" class="mt-2" />
            </div>

            <!-- facebook -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="facebook" value="Facebook" />
                <JetInput
                    id="facebook"
                    v-model="form.facebook"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="facebook"
                />
                <JetInputError :message="form.errors.facebook" class="mt-2" />
            </div>
            
            <!-- telegram -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="telegram" value="Telegram" />
                <JetInput
                    id="telegram"
                    v-model="form.telegram"
                    type="telegram"
                    class="mt-1 block w-full"
                />
                <JetInputError :message="form.errors.telegram" class="mt-2" />

            </div>

             <!-- whatsapp -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="whatsapp" value="Whatsapp" />
                <JetInput
                    id="whatsapp"
                    v-model="form.whatsapp"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="whatsapp"
                />
                <JetInputError :message="form.errors.whatsapp" class="mt-2" />
            </div>
               <!-- twitter -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="twitter" value="Twitter" />
                <JetInput
                    id="twitter"
                    v-model="form.twitter"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="twitter"
                />
                <JetInputError :message="form.errors.twitter" class="mt-2" />
            </div>
             <!-- linkedin -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="linkedin" value="Linkedin" />
                <JetInput
                    id="linkedin"
                    v-model="form.linkedin"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="linkedin"
                />
                <JetInputError :message="form.errors.linkedin" class="mt-2" />
            </div>
                <!-- tiktok -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="tiktok" value="Tiktok" />
                <JetInput
                    id="tiktok"
                    v-model="form.job"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="tiktok"
                />
                <JetInputError :message="form.errors.tiktok" class="mt-2" />
            </div>
              <!-- skype -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="skype" value="Skype" />
                <JetInput
                    id="skype"
                    v-model="form.skype"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="skype"
                />
                <JetInputError :message="form.errors.snapchat" class="mt-2" />
            </div>
        
                 <!-- github -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="github" value="Github" />
                <JetInput
                    id="github"
                    v-model="form.github"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="github"
                />
                <JetInputError :message="form.errors.github" class="mt-2" />
            </div>
               <!-- pinterest -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="pinterest" value="Pinterest" />
                <JetInput
                    id="pinterest"
                    v-model="form.pinterest"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="pinterest"
                />
                <JetInputError :message="form.errors.pinterest" class="mt-2" />
            </div>
                <!-- reddit -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="reddit" value="Reddit" />
                <JetInput
                    id="reddit"
                    v-model="form.reddit"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="reddit"
                />
                <JetInputError :message="form.errors.snapchat" class="mt-2" />
            </div>
                     <!-- twitch -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="twitch" value="Twitch" />
                <JetInput
                    id="twitch"
                    v-model="form.twitch"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="twitch"
                />
                <JetInputError :message="form.errors.twitch" class="mt-2" />
            </div>
                 <!-- wechat -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="wechat" value="Wechat" />
                <JetInput
                    id="wechat"
                    v-model="form.wechat"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="wechat"
                />
                <JetInputError :message="form.errors.wechat" class="mt-2" />
            </div>

                 <!-- kuaishou -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="kuaishou" value="Kuaishou" />
                <JetInput
                    id="kuaishou"
                    v-model="form.kuaishou"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="kuaishou"
                />
                <JetInputError :message="form.errors.kuaishou" class="mt-2" />
            </div>
                 <!-- qzone -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="qzone" value="Qzone" />
                <JetInput
                    id="qzone"
                    v-model="form.qzone"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="qzone"
                />
                <JetInputError :message="form.errors.qzone" class="mt-2" />
            </div>
                 <!-- quora -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="quora" value="Quora" />
                <JetInput
                    id="quora"
                    v-model="form.quora"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="quora"
                />
                <JetInputError :message="form.errors.snapchat" class="mt-2" />
            </div>
                     <!-- wikipedia -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="wikipedia" value="Wikipedia" />
                <JetInput
                    id="wikipedia"
                    v-model="form.wikipedia"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="wikipedia"
                />
                <JetInputError :message="form.errors.wikipedia" class="mt-2" />
            </div>
            
        </template>

        <template #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </JetActionMessage>

            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </JetButton>
        </template>
    </JetFormSection>
</template>
