<template>

    <div class="container _flex-center h-75">

        <loading-component v-show="show"></loading-component>

        <div v-show="!show" class="row h-100 w-100">

            <div class="col-sm-4 _flex-block">
                <control-component :date="pickDate" :title="pickTitle" :message="message"></control-component>
            </div>

            <div class="col-sm-8 _flex-block">
                <div id="app" class="card">
                    <h3 class="card-header text-center">My Calendar</h3>
                    <div class="card-body">
                        <calendar-view
                                @click-date="onClickDay"
                                @click-event="onClickEvent"
                                :show-date="showDate"
                                class="theme-default"
                                :events="data.events">
                            <calendar-view-header
                                    slot="header"
                                    slot-scope="{ headerProps }"
                                    :header-props="headerProps"
                                    @input="setShowDate"/>
                        </calendar-view>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>

    import LoadingComponent from './AsyncLoading';
    import { CalendarView, CalendarViewHeader, CalendarMathMixin } from 'vue-simple-calendar/src/components/bundle.js';

    import axios from 'axios';

    export default {
        name: "CalendarComponent",
        components: { CalendarView, CalendarViewHeader, LoadingComponent },
        mixins: [ CalendarMathMixin ],
        data() {
            return {
                show: true,
                url: '/home/data',
                showDate: new Date(),
                pickDate: '',
                pickTitle: '',
                data: '',
                message: ''
            }
        },
        mounted(){
            this.request(this.url);
        },
        methods: {

            onClickDay(d) {
                this.message = `You clicked on: ${d.toDateString()}`;
                this.pickDate = this.isoYearMonthDay(d);
                this.pickTitle = ''
            },

            setShowDate(d) {
                this.message = `Changing calendar view to ${d.toLocaleDateString()}`;
                this.showDate = d
            },

            onClickEvent(e) {
                this.message = `Your booked event with title: ${e.title}`;
                this.pickTitle = e.title;
                this.pickDate = this.isoYearMonthDay(e.startDate);
            },

            thisMonth(d, h, m) {
                const t = new Date();
                return new Date(t.getFullYear(), t.getMonth(), d, h || 0, m || 0)
            },

            request(url){
                axios.get(url)
                    .then( response => {
                        this.data = response.data;
                        this.show = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
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