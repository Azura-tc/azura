<script setup>
import InputField from '@/Components/InputField.vue';
import useValidatedForm from '@/Reusables/useValidatedForm';
import { usePage } from '@inertiajs/vue3';
import { isEmail, isMin, isRequired } from 'intus/rules';
import { computed } from 'vue';

// const props = defineProps({user: Object})

const user = computed(() => usePage().props.auth.user)

const form = useValidatedForm({
    name: [user.value?.name, [isRequired(), isMin(3)]],
    email: [user.value?.email, [isRequired(), isEmail()]],
})

const submit = () => {
    form.put(route('user-profile-information.update'), { preserveScroll: true,});
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
                        :autofocus="true"
                        label="Username"
                        placeholder="Username"
                        input-id="name"
                        v-model="form.name"
                        :error="form.errors?.name"
                        type="text"
                        class="col-md-8"
                        />
                        <InputField
                        :autofocus="true"
                        label="Email"
                        placeholder="Email"
                        input-id="email"
                        v-model="form.email"
                        :error="form.errors?.email"
                        type="email"
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
