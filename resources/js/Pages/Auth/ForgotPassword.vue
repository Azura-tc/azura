<script setup>
import { isRequired, isEmail } from 'intus/rules'
import InputField from '@/Components/InputField.vue';
import useValidatedForm from '@/Reusables/useValidatedForm';

defineProps({
    status: String,
});

const form = useValidatedForm({
    email: ["", [isRequired(), isEmail()]],
})

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password" />
    <h3 class="card-title text-start mb-3">Forgot your password ?</h3>
    <small>Enter your email and we'll send you a reset link.</small>
    <div v-if="status" class="alert alert-warning">{{status}}</div>
    <form class="mt-4" @submit.prevent="submit" novalidate>
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
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 text-uppercase auth-btn" :disabled="form.processing">Send reset link</button>
        </div>
        <p class="sign-up">Remember the password ? return <Link :href="route('login')">login</Link></p>
    </form>
</template>
