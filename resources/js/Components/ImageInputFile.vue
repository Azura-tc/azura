<script setup>
import { onMounted, ref } from 'vue';
const props = defineProps({
    modelValue: [String, Number, Object],
    labelClass: String,
    inputId: String,
    required: {
        type: Boolean,
        default: false
    },
    label: {
        type: String,
        default: null,
    },
    error: {
        type: String,
        default: null
    },
    requireIndicator:{
        type: Boolean,
        default: true
    },
    placeholder : {
        type : String,
        default : 'Click to upload image'
    },
    defaultImage : String
})

const emit = defineEmits(['update:modelValue'])

const elt = ref(null)

onMounted(() => { if(props.autofocus) elt.value.focus()})

let imagePreview = ref(null);
const imageInput = ref(null);

const selectNewImage = () => {
    imageInput.value.click();
};

const updateImagePreview = () => {
    const image = imageInput.value.files[0];

    emit('update:modelValue', (imageInput.value?.files[0] || null))

    if (! image) {
        imagePreview.value = null
        return
    }
    console.log({image})

    const reader = new FileReader();

    reader.onload = (e) => {
        imagePreview.value = e.target.result;
    };

    reader.readAsDataURL(image);
};

const clearImageFileInput = () => {
    console.log('clearImageFileInput')
    if (imageInput.value?.value) {
        imageInput.value.value = null;
        updateImagePreview()
    }
};

</script>
<template>
    <div class="form-group">
        <label
          :class="labelClass"
          class="form-label"
          :for="inputId"
          v-if="label"
          @click="selectNewImage"
        >{{ label }} <span v-if="required && requireIndicator" class="text-danger">*</span> </label>
        <div
          class="max-w-full h-48 relative p-1 form-control hover"
          :class="{ 'border-danger' : error }"
        >
            <div class="flex w-full h-full justify-center items-center cursor-pointer" @click="selectNewImage">
                <span v-show="!imagePreview && !defaultImage">{{ placeholder }}</span>
                <img v-show="imagePreview || defaultImage" class="w-full h-full object-contain" :src="imagePreview || defaultImage">
            </div>
            <button v-if="!required" v-show="imagePreview" @click.prevent="clearImageFileInput" class="btn btn-outline-danger absolute top-2 right-2 z-20">Remove</button>
            <div v-show="imagePreview || defaultImage" class="absolute top-0 left-0 w-full h-full bg-black opacity-50 flex justify-center items-center space-y-4 cursor-pointer z-10 flex-col" @click="selectNewImage">

                <div v-show="imagePreview" class="text-white" style="opacity: 1;">{{ imageInput?.files[0]?.name }}</div>
                <div v-show="imagePreview" class="text-gray-400" style="opacity: 1;">{{ ((imageInput?.files[0]?.size) / 800)?.toFixed(1) }}k</div>
                <div class="text-gray-400" style="opacity: 1;">{{ placeholder }}</div>

            </div>
        </div>
        <input
          id="inputId"
          @change="updateImagePreview"
          class="hidden"
          :class="{ 'is-invalid' : error }"
          ref="imageInput"
          type="file"
        >

        <div v-if="error" class="invalid-feedback" v-text="error"></div>
    </div>
</template>

<style scoped>
.hover:hover{
    opacity: .7 !important;
}
.p-1 {
    padding: 0.25rem/* 4px */;
}
border-1px{
    border: 1px;
}
.z-10 {
    z-index: 10;
}
.z-20 {
    z-index: 20;
}
.bg-black {
    --tw-bg-opacity: 1;
    background-color: rgb(0 0 0 / var(--tw-bg-opacity));
}
.border-gray-100 {
    --tw-border-opacity: 1;
    border-color: rgb(243 244 246 / var(--tw-border-opacity));
}
.opacity-50 {
    opacity: 0.5;
}

.max-w-full {
    max-width: 100%;
}
.w-full {
    width: 100%;
}
.flex {
    display: flex;
}
.flex-col {
    flex-direction: column;
}
.hidden {
    display: none;
}
.h-48 {
    height: 12rem/* 192px */;
}
.h-1 {
    height: 0.25rem/* 4px */;
}
.h-full {
    height: 100%;
}
.cursor-pointer {
    cursor: pointer;
}
.absolute {
    position: absolute;
}
.top-0 {
    top: 0px;
}
.top-2 {
    top: 0.5rem/* 8px */;
}
.left-0 {
    left: 0px;
}
.right-2 {
    right: 0.5rem/* 8px */;
}
.relative {
    position: relative;
}
.object-contain {
    object-fit: contain;
}
.text-gray-400 {
    --tw-text-opacity: 1;
    color: rgb(156 163 175 / var(--tw-text-opacity));
}
.w-10 {
    width: 2.5rem/* 40px */;
}
.h-2px {
    height: 2px;
}
.space-y-4 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(1rem * var(--tw-space-y-reverse));
}
.justify-center {
    justify-content: center;
}

.items-center {
    align-items: center;
}

.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>
