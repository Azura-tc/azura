<script setup>
import InputField from '@/Components/InputField.vue';
import useValidatedForm from '@/Reusables/useValidatedForm';
import { usePage } from '@inertiajs/vue3';
import { isMin, isRequired, isSame } from 'intus/rules';
import { computed } from 'vue';

// const props = defineProps({user: Object})

const user = computed(() => usePage().props.auth.user)

const form = useValidatedForm({
    current_password: ["", [isRequired(), isMin(8)]],
    password: ["",[isRequired(), isMin(8)]],
    password_confirmation: ["",[isRequired(), isSame('password')]],
})

const submit = () => {
    form.put(route('user-password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};

</script>

<template>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile Information</h4>
                <form @submit.prevent="submit" novalidate>
                    <div class="row">
                        <InputField
                        v-model="form.current_password"
                        :error="form.errors?.current_password"
                        type="password"
                        placeholder="Current password"
                        label="Current password"
                        input-id="current_password"
                        class="col-md-8"
                        />
                        <InputField
                        v-model="form.password"
                        :error="form.errors?.password"
                        type="password"
                        placeholder="Password"
                        label="New Password"
                        input-id="password"
                        class="col-md-8"
                        />
                        <InputField
                        v-model="form.password_confirmation"
                        :error="form.errors?.password_confirmation"
                        type="password"
                        placeholder="Confirm Password"
                        label="Confirm Password"
                        input-id="password_confirmation"
                        class="col-md-8"
                        />
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
