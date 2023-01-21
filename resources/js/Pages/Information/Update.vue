<script setup>
import InputField from '@/Components/InputField.vue';
import useValidatedForm from '@/Reusables/useValidatedForm';
import { useForm } from '@inertiajs/vue3';
import { isEmail, isMax, isRequired } from 'intus/rules';
import { computed, reactive } from 'vue';


const props = defineProps({info:Object})

const info = computed(() => props.info)


console.log(info)

// const form = useValidatedForm({
//     name: [info.value?.name, [isRequired, isMax(30)]],
//     email: [info.value?.email, [isRequired(), isEmail()]],
//     tel: [info.value?.tel, [isMax(15)]],
//     bp: [info.value?.bp, [isMax(15)]],
//     address: [info.value?.address, [isMax(100)]],
//     description: [info.value?.description, [isMax(255)]],
// })
const form = useForm({
    name: info.value?.name,
    email: info.value?.email,
    tel: info.value?.tel,
    bp: info.value?.bp,
    address: info.value?.address,
    description: info.value?.description,
})

const submit = () => {
    form.put(route('admin.info.update', info.value));
};

</script>

<template>
    <Head title="Information - Update" />
    <div class="page-header">
        <h3 class="page-title"> Update Informations </h3>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
            <p class="card-description"> Basic form elements </p>
            
            <form @submit.prevent="submit" novalidate>
                <div class="row">
                    <InputField
                      v-model="form.name"
                      :autofocus="true"
                      :error="form.errors?.name"
                      :input-id="name"
                      label-class="col-form-label"
                      label="Name"
                      type="text"
                    />
                    <InputField
                      v-model="form.email"
                      :error="form.errors?.email"
                      :input-id="email"
                      label-class="col-form-label"
                      label="Email"
                      type="email"
                    />
                    <InputField
                      v-model="form.tel"
                      :error="form.errors?.tel"
                      :input-id="tel"
                      label-class="col-form-label"
                      label="Tel"
                      type="text"
                    />
                    <InputField
                      v-model="form.address"
                      :error="form.errors?.address"
                      :input-id="address"
                      label-class="col-form-label"
                      label="Address"
                      type="text"
                    />
                    <InputField
                      v-model="form.bp"
                      :error="form.errors?.bp"
                      :input-id="bp"
                      label-class="col-form-label"
                      label="Bp"
                      type="text"
                    />
                    <InputField
                      v-model="form.description"
                      :error="form.errors?.description"
                      :input-id="description"
                      :is-textarea="true"
                      label-class="col-form-label"
                      label="Description"
                      type="text"
                    />
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-dark">Cancel</button>
            </form>
        </div>
        </div>
    </div>
</template>
