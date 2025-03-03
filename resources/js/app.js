import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap'
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faEye, faPenToSquare, faTrash } from '@fortawesome/free-solid-svg-icons';
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

library.add(faEye, faPenToSquare, faTrash);

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(Toast)
      .component("font-awesome-icon", FontAwesomeIcon)
      .mount(el)
  },
})



router.on('start', () => {
    NProgress.start()
})


router.on('finish', () =>{
    NProgress.done()
})