import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
// resources/js/app.js
import * as bootstrap from 'bootstrap';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
  progress: {
    color : 'purple',
    showSpinner: true,
  },
})
