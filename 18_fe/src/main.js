import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import Default from './layout/wrapper/index.vue'
import Blank from './layout/wrapper/index_blank.vue'
import Client from './layout/wrapper/index_client.vue'
import DaiLy from './layout/wrapper/index_daily.vue'
import Toaster from "@meforma/vue-toaster"
const app = createApp(App)

app.use(router)
app.use(Toaster, {
    position: "top-right"
})
app.component("default-layout", Default);
app.component("blank-layout", Blank);
app.component("client-layout", Client);
app.component("daily-layout", DaiLy);

app.mount("#app")