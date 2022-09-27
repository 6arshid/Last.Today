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
    photo: null,
    username: props.user.username,
    name: props.user.name,
    family: props.user.family,    
    email: props.user.email,
    bio: props.user.bio,
    job: props.user.job,
    url: props.user.url,
    domain: props.user.domain,
    mobile: props.user.mobile,
    tronwallet: props.user.tronwallet,
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
    language:props.user.language
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

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
    <JetFormSection @submitted="updateProfileInformation">
        <!-- <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template> -->



        <template #form>


            <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
                   
            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos"  class="w-full overflow-hidden lg:w-1/2 xl:w-1/2">
                <!-- Profile Photo File Input -->
                <input
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    @change="updatePhotoPreview"
                >

                <JetLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div v-show="! photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                </div>

                <JetSecondaryButton class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </JetSecondaryButton>

                <JetSecondaryButton
                    v-if="user.profile_photo_path"
                    type="button"
                    class="mt-2"
                    @click.prevent="deletePhoto"
                >
                    Remove Photo
                </JetSecondaryButton>

                <JetInputError :message="form.errors.photo" class="mt-2" />
            </div>

          </div>
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5 text-right">
           <Link :href="`/${user.username}`" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box  mr-3" viewBox="0 0 16 16">
  <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
</svg>  Show your Profile</Link>
          </div>
        </div>
      </div>

      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
           
           <!-- Usernname -->
           <div  class="w-full overflow-hidden lg:w-1/2 xl:w-1/2">
                <JetLabel for="username" value="Username" />
                <JetInput
                    id="username" placeholder="Enter Username"
                    v-model="form.username"
                    type="text"
                    autocomplete="username"
                />
                <JetInputError :message="form.errors.username" class="mt-2" />
            </div>

        </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
           
    <!-- Name -->
    <div class="col-span-6 sm:col-span-12 md:col-span-6">
                <JetLabel for="name" value="Name" />
                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="name" placeholder="Enter Your Name"
                />
                <JetInputError :message="form.errors.name" class="mt-2" />
            </div>
     </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
                 <!-- Family -->
                 <div class="col-span-6 sm:col-span-12 md:col-span-6">
                <JetLabel for="family" value="Family" />
                <JetInput
                    id="family"
                    v-model="form.family"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="family" placeholder="Enter Your Family"
                />
                <JetInputError :message="form.errors.family" class="mt-2" />
            </div>
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="email" value="Email" />
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full" placeholder="Enter Your Email"
                />
                <JetInputError :message="form.errors.email" class="mt-2" />
<!-- 
                <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                    <p class="text-sm mt-2">
                        Your email address is unverified.

                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="underline text-gray-600 hover:text-gray-900"
                            @click.prevent="sendEmailVerification"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        A new verification link has been sent to your email address.
                    </div>
                </div> -->
          </div>
        </div>
      </div>

      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="language" value="Language" />
                <JetInput
                    id="language"
                    v-model="form.language"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="language"   placeholder="Enter Your Language"
                />
                <JetInputError :message="form.errors.language" class="mt-2" />
             </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="bio" value="Bio" />
                <JetInput
                    id="bio"
                    v-model="form.bio"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="bio"  placeholder="Enter Your Bio"
                />
                <JetInputError :message="form.errors.bio" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="url" value="Url" />
                <JetInput
                    id="url"
                    v-model="form.url"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="url"   placeholder="Enter Your Url"
                />
                <JetInputError :message="form.errors.url" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="mobile" value="Mobile" />
                <JetInput
                    id="mobile"
                    v-model="form.mobile"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="mobile"  placeholder="Enter Your Mobile Number fx:+1..."
                />
                <JetInputError :message="form.errors.mobile" class="mt-2" />
          </div>
        </div>
      </div>

   

    

            
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="job" value="Job" />
                <JetInput
                    id="job"
                    v-model="form.job"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="job"  placeholder="Enter Your Job"
                />
                <JetInputError :message="form.errors.job" class="mt-2" />
             </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="domain" value="Domain" />
                <JetInput
                    id="domain"
                    v-model="form.domain"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="domain"  placeholder="Enter Your Domain Name"
                />
                <smal>Ns1.last.today , Ns2.last.today</smal>
                <JetInputError :message="form.errors.domain" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="tronwallet" value="Tron Wallet" />
                <JetInput
                    id="tronwallet"
                    v-model="form.tronwallet"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="tronwallet"  placeholder="Enter Your Tron Wallet"
                />
                <small>Fx : TSZfGyG2nLyuQwR3gHJMaZ4U2Ew5YDwieh</small>
                <JetInputError :message="form.errors.tronwallet" class="mt-2" />
          </div>
        </div>
        
      </div>
       

      <div class="text-right">
        <JetActionMessage :on="form.recentlySuccessful" class="btn btn-info float-right">
                Saved.
            </JetActionMessage>

            <JetButton class="btn btn-success" :disabled="form.processing">
                Save
            </JetButton>
      </div>



      <h2 class="mb-3 text-3xl font-bold text-gray-800">Social Network Address</h2>
                       
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="instagram" value="Instagram" />
                <JetInput
                    id="instagram"
                    v-model="form.instagram"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="instagram" placeholder="Enter Your Instagram Url"
                />
                <JetInputError :message="form.errors.instagram" class="mt-2" />
             </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="facebook" value="Facebook" />
                <JetInput
                    id="facebook"
                    v-model="form.facebook"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="facebook" placeholder="Enter Your Facebook Url"
                />
                <JetInputError :message="form.errors.facebook" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="telegram" value="Telegram" />
                <JetInput
                    id="telegram"
                    v-model="form.telegram"
                    type="telegram"
                    class="mt-1 block w-full" placeholder="Enter Your Telegram Url"
                />
                <JetInputError :message="form.errors.telegram" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="whatsapp" value="Whatsapp" />
                <JetInput
                    id="whatsapp"
                    v-model="form.whatsapp"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="whatsapp" placeholder="Enter Your Whatsap Number fx: +1"
                />
                <JetInputError :message="form.errors.whatsapp" class="mt-2" />
          </div>
        </div>
      </div> 
          
                       
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="youtube" value="Youtube" />
                <JetInput
                    id="youtube"
                    v-model="form.youtube"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="youtube" placeholder="Enter Your Youtube Url"
                />
                <JetInputError :message="form.errors.youtube" class="mt-2" />
             </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="twitter" value="Twitter" />
                <JetInput
                    id="twitter"
                    v-model="form.twitter"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="twitter" placeholder="Enter Your Twitter Url"
                />
                <JetInputError :message="form.errors.twitter" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="linkedin" value="Linkedin" />
                <JetInput
                    id="linkedin"
                    v-model="form.linkedin"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="linkedin"  placeholder="Enter Your Linkedin Url"
                />
                <JetInputError :message="form.errors.linkedin" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="tiktok" value="Tiktok" />
                <JetInput
                    id="tiktok"
                    v-model="form.job"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="tiktok"  placeholder="Enter Your Tiktok Url"
                />
                <JetInputError :message="form.errors.tiktok" class="mt-2" />
          </div>
        </div>
      </div> 
    
       <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="skype" value="Skype" />
                <JetInput
                    id="skype"
                    v-model="form.skype"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="skype"  placeholder="Enter Your Skype Username"
                />
                <JetInputError :message="form.errors.snapchat" class="mt-2" />
             </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="github" value="Github" />
                <JetInput
                    id="github"
                    v-model="form.github"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="github"  placeholder="Enter Your Github Url"
                />
                <JetInputError :message="form.errors.github" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="pinterest" value="Pinterest" />
                <JetInput
                    id="pinterest"
                    v-model="form.pinterest"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="pinterest"  placeholder="Enter Your Pinterest Url"
                />
                <JetInputError :message="form.errors.pinterest" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="reddit" value="Reddit" />
                <JetInput
                    id="reddit"
                    v-model="form.reddit"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="reddit" placeholder="Enter Your Reddit Url"
                />
                <JetInputError :message="form.errors.snapchat" class="mt-2" />
          </div>
        </div>
      </div>
      
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="twitch" value="Twitch" />
                <JetInput
                    id="twitch"
                    v-model="form.twitch"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="twitch"  placeholder="Enter Your Twitch Url"
                />
                <JetInputError :message="form.errors.twitch" class="mt-2" />
             </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="wechat" value="Wechat" />
                <JetInput
                    id="wechat"
                    v-model="form.wechat"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="wechat"  placeholder="Enter Your Wechat Url"
                />
                <JetInputError :message="form.errors.wechat" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="kuaishou" value="Kuaishou" />
                <JetInput
                    id="kuaishou"
                    v-model="form.kuaishou"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="kuaishou"  placeholder="Enter Your Kuaishou Url"
                />
                <JetInputError :message="form.errors.kuaishou" class="mt-2" />
          </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="qzone" value="Qzone" />
                <JetInput
                    id="qzone"
                    v-model="form.qzone"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="qzone" placeholder="Enter Your Qzone Url"
                />
                <JetInputError :message="form.errors.qzone" class="mt-2" />
          </div>
        </div>
      </div>
           
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="quora" value="Quora" />
                <JetInput
                    id="quora"
                    v-model="form.quora"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="quora" placeholder="Enter Your Quora Url"
                />
                <JetInputError :message="form.errors.snapchat" class="mt-2" />
             </div>
        </div>
        <div class="w-full px-3 sm:w-1/4">
          <div class="mb-5">
            <JetLabel for="wikipedia" value="Wikipedia" />
                <JetInput
                    id="wikipedia"
                    v-model="form.wikipedia"
                    type="text"
                    class="mt-1 block w-full"
                    autocomplete="wikipedia" placeholder="Enter Your Wikipedia Url"
                />
                <JetInputError :message="form.errors.wikipedia" class="mt-2" />
          </div>
        </div>

      </div>
          
     

        </template>

        <template #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="btn btn-info">
                Saved.
            </JetActionMessage>

            <JetButton class="btn btn-success" :disabled="form.processing">
                Save
            </JetButton>
        </template>
    </JetFormSection>
</template>
