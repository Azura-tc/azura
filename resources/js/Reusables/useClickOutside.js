import { onMounted, onBeforeUnmount } from 'vue';

export function useClickOutside (el_target_ref, call_back_fn){
    if(! el_target_ref) return
    let listener = e => {
        // console.log({event : e.composedPath()})
        if(e.target == el_target_ref.value || e.composedPath().includes(el_target_ref.value)) return

        if(typeof call_back_fn == 'function') call_back_fn()
    }

    onMounted(() => {window.addEventListener('click', listener)})
    onBeforeUnmount(() => {window.removeEventListener('click', listener)})
    return { listener }
}
