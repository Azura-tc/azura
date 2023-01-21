<script setup>
import { isRequired, isEmail, isMin, isSame } from 'intus/rules'
import InputField from '@/Components/InputField.vue';
import CheckField from '@/Components/CheckField.vue';
import useValidatedForm from '@/Reusables/useValidatedForm';
import { Link } from '@inertiajs/vue3';

defineProps({
    status: String,
});

const form = useValidatedForm({
    name: ["",[isRequired()]],
    email: ["",[isRequired(), isEmail()]],
    password: ["",[isRequired(), isMin(8)]],
    password_confirmation: ["",[isRequired(), isSame('password')]],
})

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <h3 class="card-title text-start mb-3">Register</h3>
    <form @submit.prevent="submit" novalidate>
        <InputField
          v-model="form.name"
          :error="form.errors?.name"
          placeholder="Name"
          :autofocus="true"
          input-id="name"
          :required="true"
          input-class="form-control-lg"
        />
        <InputField
          v-model="form.email"
          :error="form.errors?.email"
          type="email"
          placeholder="Email address"
          input-id="email"
          :required="true"
          input-class="form-control-lg"
        />
        <div class="row">
            <InputField
            v-model="form.password"
            :error="form.errors?.password"
            type="password"
            placeholder="Password"
            input-id="password"
            inputClass="form-control-lg"
            class="col-sm-6"
            />
            <InputField
            v-model="form.password_confirmation"
            :error="form.errors?.password_confirmation"
            type="password"
            placeholder="Confirm Password"
            input-id="password_confirmation"
            inputClass="form-control-lg"
            class="col-sm-6"
            />
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 text-uppercase auth-btn" :disabled="form.processing">Register</button>
        </div>
        <p class="sign-up">Already have an Account ?<Link :href="route('login')"> Sign In</Link></p>
    </form>
</template>
