<script setup>
import { isRequired, isEmail, isSame, isMin  } from 'intus/rules'
import InputField from '@/Components/InputField.vue';
import useValidatedForm from '@/Reusables/useValidatedForm';

const props = defineProps({
    email: String,
    token: String,
});

const form = useValidatedForm({
    email: [props.email, [isRequired(), isEmail()]],
    token: [props.token, [isRequired()]],
    password: ["",[isRequired(), isMin(8)]],
    password_confirmation: ["",[isRequired(), isSame('password')]],
})

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password" />
    <h3 class="card-title text-start mb-3">Reset new password</h3>
    <form class="mt-4" @submit.prevent="submit" novalidate>
        <input type="hidden" class="d-none" v-model="form.token">
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
            <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 text-uppercase auth-btn" :disabled="form.processing">Set password</button>
        </div>
        <p class="sign-up">Remember the password ? return to <Link :href="route('login')">login</Link></p>
    </form>
</template>
