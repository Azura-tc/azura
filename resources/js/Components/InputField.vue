<script setup>
    const unique = Math.floor(Math.random() * 10)
    defineProps({
        modelValue: [String, Number],
        inputClass: String,
        labelClass: String,
        placeholder: String,
        inputId: String,
        required: {
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
        }
    })

    defineEmits(['update:modelValue'])

</script>
<template>
    <div class="form-group">
        <label
          :class="labelClass"
          class="form-label"
          :for="inputId"
          v-if="label"
        >{{ label }}</label>
        <input
          :value="modelValue"
          :autofocus="autofocus"
          :class="[{ 'is-invalid' : error }, inputClass]"
          :type="type"
          class="form-control"
          @input="$emit('update:modelValue', $event.target.value)"
          :id="inputId ?? `input${unique}`"
          :autocomplete="`${autocomplete?'on':'off'}`"
          :placeholder="placeholder"
          :required="required"
        />
        <div v-if="error" class="invalid-feedback" v-text="error"></div>
    </div>
</template>
