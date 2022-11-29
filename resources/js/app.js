require('./bootstrap');

import { createApp } from 'vue'

import App from './vue/app'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faSquarePlus, faTrash } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faSquarePlus, faTrash)

createApp(App)
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount('#app');
