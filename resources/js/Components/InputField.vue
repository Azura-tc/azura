<script setup>
import { onMounted, ref } from 'vue';

    const unique = Math.floor(Math.random() * 10)
    const props = defineProps({
        modelValue: [String, Number],
        inputClass: String,
        labelClass: String,
        placeholder: String,
        inputId: String,
        required: {
            type: Boolean,
            default: false
        },
        isTextarea: {
            type: Boolean,
            default: false
        },
        autofocus: {
            type: Boolean,
            default: false
        },
        type : {
            type : String,
            default : 'text'
        },
        label: {
            type: String,
            default: null,
        },
        error: {
            type: String,
            default: null
        },
        autocomplete:{
            type: Boolean,
            default: true
        },
        requireIndicator:{
            type: Boolean,
            default: true
        }
    })

    defineEmits(['update:modelValue'])

    const elt = ref(null)

    onMounted(() => { if(props.autofocus) elt.value.focus()})

</script>
<template>
    <div class="form-group">
        <label
          :class="labelClass"
          class="form-label"
          :for="inputId"
          v-if="label"
        >{{ label }} <span v-if="required && requireIndicator" class="text-danger">*</span> </label>
        <component :is="(isTextarea)? 'textarea' : 'input'"
          :value="modelValue"
          v-model="modelValue"
          :autofocus="autofocus"
          :class="[{ 'is-invalid' : error }, inputClass]"
          :type="type"
          class="form-control"
          @input="$emit('update:modelValue', $event.target.value)"
          :id="inputId ?? `input${unique}`"
          :autocomplete="`${autocomplete?'on':'off'}`"
          :placeholder="placeholder"
          :required="required"
          ref="elt"
        />
        <div v-if="error" class="invalid-feedback" v-text="error"></div>
    </div>
</template>
