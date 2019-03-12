<template>
    <div id="app">
        <h3>My Calendar</h3>
        <calendar-view
                @click-date="fire"
                :show-date="showDate"
                class="theme-default"
                :events="events">
            <calendar-view-header
                    slot="header"
                    slot-scope="{ headerProps }"
                    :header-props="headerProps"
                    @input="setShowDate"/>
        </calendar-view>
        <div class="card">
            {{ picked }}
        </div>
    </div>
</template>

<script>

    import { CalendarView, CalendarViewHeader, CalendarMathMixin } from 'vue-simple-calendar/src/components/bundle.js';

    require('vue-simple-calendar/static/css/default.css');

    export default {
        name: "CalendarComponent",
        components: {
            CalendarView,
            CalendarViewHeader
        },
        mixins: [CalendarMathMixin],
        data() {
            return {
                showDate: new Date(),
                picked : "",
                events: [
                     { id: 1, startDate: '2019-03-13', title: 'Coding'},
                     { id: 2, startDate: '2019-03-14', title: 'Coding2'}
                ]
            }
        },
        methods: {
            setShowDate(d) {
                this.showDate = d;
            },

            fire(el){

                this.picked = el;
            }
        }
    }
</script>

<style scoped>

    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        color: #2c3e50;
        height: 67vh;
        width: 90vw;
        margin-left: auto;
        margin-right: auto;
    }

</style>