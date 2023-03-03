// import './bootstrap';
import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
import.meta.glob([
    '../images/**',
]);

Alpine.plugin(intersect)

window.Alpine = Alpine

Alpine.start()
