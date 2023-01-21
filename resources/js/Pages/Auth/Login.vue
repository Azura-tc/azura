<script setup>
import { isRequired, isEmail, isBoolean, isMin } from 'intus/rules'
import InputField from '@/Components/InputField.vue';
import CheckField from '@/Components/CheckField.vue';
import useValidatedForm from '@/Reusables/useValidatedForm';
import { Link } from '@inertiajs/vue3';

defineProps({
    status: String,
});

const form = useValidatedForm({
    email: ["", [isRequired(), isEmail()]],
    password: ["", [isRequired(), isMin(8)]],
    remember: [false, [isBoolean()]]
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Login" />
    <h3 class="card-title text-start mb-3">Login</h3>
    <div v-if="status" class="alert alert-warning">{{status}}</div>
    <form @submit.prevent="submit" novalidate>
        <InputField
          v-model="form.email"
          :error="form.errors?.email"
          type="email"
          placeholder="Email address"
          :autofocus="true"
          input-id="email"
          :required="true"
          input-class="form-control-lg"
        />
        <InputField
          v-model="form.password"
          :error="form.errors?.password"
          type="password"
          placeholder="Password"
          input-id="password"
          inputClass="form-control-lg"
        />
        <div class="form-group d-flex align-items-center justify-content-between">
            <CheckField
                v-model="form.remember"
                :error="form.errors?.remember"
                label="Remember me"
                input-id="remember"
                type="checkbox"
            />
            <Link :href="route('password.email')" class="forgot-pass">Forgot password</Link>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 text-uppercase auth-btn" :disabled="form.processing">Login</button>
        </div>
        <p class="sign-up">Don't have an Account ?<Link :href="route('register')"> Sign Up</Link></p>
    </form>
</template>
