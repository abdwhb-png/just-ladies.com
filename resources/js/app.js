import './bootstrap';
import.meta.glob(["../images/**", "../fonts/**"]);

//Import v-from
import {
    Form
} from 'vform';
import {
    Button,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess,
} from "vform/src/components/bootstrap5";


import {
    createApp
} from 'vue';

import SearchUserComponent from "./components/SearchUserComponent.vue";
import AutocompleteComponent from "./components/AutocompleteComponent.vue";
import ReloadButtonComponent from "./components/ReloadButtonComponent.vue";
import EscortNavGridComponent from "./components/EscortNavGridComponent.vue";
import GirlsResearchComponent from "./components/GirlsResearchComponent.vue";
import VueCarouselComponent from "./components/VueCarouselComponent.vue";
import GirlsResultsComponent from "./components/GirlsResultsComponent.vue";
import GirlsNavGridComponent from "./components/GirlsNavGridComponent.vue";
import CreateEscortComponent from "./components/CreateEscortComponent.vue";

const app = createApp({});

window.Form = Form;
app.component(Button.name, Button);
app.component(HasError.name, HasError);
app.component(AlertError.name, AlertError);
app.component(AlertErrors.name, AlertErrors);
app.component(AlertSuccess.name, AlertSuccess);

app.component('search-user-component', SearchUserComponent);
app.component('autocomplete-component', AutocompleteComponent);
app.component('reload-button-component', ReloadButtonComponent);
app.component('escort-nav-grid-component', EscortNavGridComponent);
app.component('girls-research-component', GirlsResearchComponent);
app.component("vue-carousel-component", VueCarouselComponent);
app.component('girls-results-component', GirlsResultsComponent);
app.component('girls-nav-grid-component', GirlsNavGridComponent);
app.component("create-escort-component", CreateEscortComponent);

app.mount("#app");