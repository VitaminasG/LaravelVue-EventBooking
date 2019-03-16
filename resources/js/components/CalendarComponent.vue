<template>

    <div class="container">

        <div class="row">

            <div class="col-4">
                <control-component></control-component>
            </div>

            <div class="col-8">
                <div id="app" class="card">
                    <h3 class="card-header text-center">My Calendar</h3>
                    <div class="card-body">
                        <calendar-view
                                @click-date="fire"
                                :show-date="showDate"
                                class="theme-default"
                                :events="data.events">
                            <calendar-view-header
                                    slot="header"
                                    slot-scope="{ headerProps }"
                                    :header-props="headerProps"
                                    @input="setShowDate"/>
                        </calendar-view>
                        <div v-if="picked" class="card text-center mt-1">
                            {{ picked }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>

    import { CalendarView, CalendarViewHeader, CalendarMathMixin } from 'vue-simple-calendar/src/components/bundle.js';

    require('vue-simple-calendar/static/css/default.css');

    const axios = require('axios');

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
                data: "",
            }
        },
        mounted(){
          axios.get('home/data')
              .then( response => {
                  this.data = response.data;
              })
              .catch(function (error) {
                  console.log(error)
              })
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
        color: #2c3e50;
        height: 100%;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }

</style>