require('./bootstrap');

import { createApp } from 'vue'
import HelloWorld from './components/Example'

const app = createApp({})

app.component('example', HelloWorld)

app.mount('#app')
