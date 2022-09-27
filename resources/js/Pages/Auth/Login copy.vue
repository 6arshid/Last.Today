<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 col-sm-8 col-10">
            <div class="logo d-flex justify-content-center">
                <a href="/">
                  <img src="/images/logo.png" width="150px" class="mx-auto d-block">
                </a>
            </div>
            <h3 class="mb-3 text-center">Sign in to</h3>
            <h1 class="mb-5 text-center">Last.Today</h1>
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 bg-info">
            {{ status }}
            </div>
                <form @submit.prevent="submit">
                  <div class="mb-3">
                    <input  class="form-control form-control-lg"  id="email"
                    v-model="form.email"
                    type="email" required>
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-lg" id="password"
                    v-model="form.password"
                    type="password"  required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                         <label class="float-start">
                    <JetCheckbox v-model:checked="form.remember" name="remember" />
                    <span class="form-check-input">Remember me</span>
                </label>
                    </div>
                </div>
                <div class="d-grid">
                    <JetButton class="ml-4" :class="`btn btn-primary mt-2 mb-2 btn-lg`" :disabled="form.processing">
                    Log in
                </JetButton>
                    <a href="/login/google" class="btn btn-outline-secondary btn-lg mt-3">
                        <svg width="25" height="25" class="ni gz y">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M20.66 12.7c0-.61-.05-1.19-.15-1.74H12.5v3.28h4.58a3.91 3.91 0 0 1-1.7 2.57v2.13h2.74a8.27 8.27 0 0 0 2.54-6.24z"
                                      fill="#4285F4"></path>
                                <path d="M12.5 21a8.1 8.1 0 0 0 5.63-2.06l-2.75-2.13a5.1 5.1 0 0 1-2.88.8 5.06 5.06 0 0 1-4.76-3.5H4.9v2.2A8.5 8.5 0 0 0 12.5 21z"
                                      fill="#34A853"></path>
                                <path d="M7.74 14.12a5.11 5.11 0 0 1 0-3.23v-2.2H4.9A8.49 8.49 0 0 0 4 12.5c0 1.37.33 2.67.9 3.82l2.84-2.2z"
                                      fill="#FBBC05"></path>
                                <path d="M12.5 7.38a4.6 4.6 0 0 1 3.25 1.27l2.44-2.44A8.17 8.17 0 0 0 12.5 4a8.5 8.5 0 0 0-7.6 4.68l2.84 2.2a5.06 5.06 0 0 1 4.76-3.5z"
                                      fill="#EA4335"></path>
                            </g>
                        </svg>
                        Sign in with Google
                    </a>
                </div>
                  <Link v-if="canResetPassword" :href="route('password.request')" class="me-3">
                    Forgot your password?
                </Link>
            </form>
            <p class="mt-3 text-center">
                Not a Member
                 <Link :href="route('register')">
                    Register Account
                </Link>
                
            </p>
        </div>
    </div>
</div>



</template>


