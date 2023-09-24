import { createApp } from 'vue';
import SkillCarousel from './components/SkillCarousel.vue';

const skillCarousel = createApp({});

skillCarousel.component('SkillCarousel', SkillCarousel);
skillCarousel.mount('#skills_carousel');
