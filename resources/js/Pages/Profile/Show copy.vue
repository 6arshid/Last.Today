<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import UpdateSocialNetworksForm from '@/Pages/Profile/Partials/UpdateSocialNetworksForm.vue';
import { Link  } from '@inertiajs/inertia-vue3'

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});

</script>

<template>
    <AppLayout title="Profile">





<div class="md:w-10/12 w-11/12 mx-auto mb-4">


    <div class="flex items-center -mx-4 space-x-2 overflow-x-auto overflow-y-hidden sm:justify-center flex-nowrap dark:bg-gray-800 dark:text-gray-100">
	<Link  :href="`/user/profile`" class="flex items-center flex-shrink-0 px-5 py-2 border-b-4 dark:border-violet-400 dark:text-gray-500">Basic Info</Link>
	<Link :href="`/user/profile/UpdatePasswordForm`"  class="flex items-center flex-shrink-0 px-5 py-2 border-b-4 dark:border-gray-700 dark:text-gray-400">Change Password</Link>
    <Link :href="`/user/profile/UpdatePasswordForm`"  class="flex items-center flex-shrink-0 px-5 py-2 border-b-4 dark:border-gray-700 dark:text-gray-400">Two Factor Authentication</Link>
	<Link :href="`/user/profile/UpdatePasswordForm`"  class="flex items-center flex-shrink-0 px-5 py-2 border-b-4 dark:border-gray-700 dark:text-gray-400">Browser Sessions</Link>
	<Link :href="`/user/profile/UpdatePasswordForm`"  class="flex items-center flex-shrink-0 px-5 py-2 border-b-4 dark:border-gray-700 dark:text-gray-400">Delete Account</Link>

</div>
    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
           <div v-if="$page.props.jetstream.canUpdateProfileInformation" id="basicinfo">
                    <UpdateProfileInformationForm :user="$page.props.user" />

                    <JetSectionBorder />
                </div>
        </div>

        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
  <div v-if="$page.props.jetstream.canUpdatePassword">
                      <UpdatePasswordForm class="mt-10 sm:mt-0" />
                      <JetSectionBorder />
                  </div>
                        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
        <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                    <TwoFactorAuthenticationForm 
                        :requires-confirmation="confirmsTwoFactorAuthentication"
                        class="mt-10 sm:mt-0" 
                    />

                    <JetSectionBorder />
                </div>

                        </div>
        <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="sessions" role="tabpanel" aria-labelledby="sessions-tab">
                   <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

                        </div>

         <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="delete" role="tabpanel" aria-labelledby="delete-tab">
   <template v-if="$page.props.jetstream.hasAccountDeletionFeatures" >
                    <DeleteUserForm class="mt-10 sm:mt-0" />
                                        <JetSectionBorder />
                </template>
                        </div>
    </div>


</div>







    </AppLayout>
</template>
