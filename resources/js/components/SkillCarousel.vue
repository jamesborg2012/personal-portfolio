<template>
    <div v-if="skills">
        <Carousel v-bind="settings" :breakpoints="breakpoints" :wrap-around="true" :autoplay="5000" :pause-autoplay-on-hover="true">
            <Slide v-for="data in skills" :key="data">
                <div class="carousel__item">
                    <div class="text-center single-skill">
                        <i v-bind:class="'text-7xl ' + data.icon"></i>
                    </div>
                </div>
            </Slide>

            <template #addons>
                <Navigation />
            </template>
        </Carousel>
    </div>
    <div v-else>
        <p>Loading...</p>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import 'vue3-carousel/dist/carousel.css';

export default defineComponent({
    name: 'Skills',
    props: { skillsid: String },
    components: {
        Carousel,
        Slide,
    },
    data: () => ({
        skills: null,
        settings: {
            itemsToShow: 2,
            snapAlign: 'center',
        },
        breakpoints: {
            700: {
                itemsToShow: 3,
            },
            1024: {
                itemsToShow: 4,
                snapAlign: 'start',
            },
        },
    }),
    beforeCreate() {
        fetch('/skills/get-by-ids-string/' + this.skillsid)
            .then(response => response.json())
            .then(data => {
                this.skills = data.data
                console.log(this.skills)
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    },
})
</script>

<style>
.carousel__item {
    min-height: 200px;
    width: 100%;
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__item i {
    color: #fff !important;
}

.carousel__slide {
    padding: 10px;
}
</style>
