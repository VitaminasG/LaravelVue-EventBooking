<template>

    <div class="container _flex-center h-75">

        <loading-component v-show="show"></loading-component>

        <div v-show="!show" class="row mb-3">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="messenger"></span>
                    </div>
                    <div class="alert alert-info text-center mb-0">
                        {{ message }}
                    </div>
                </div>
            </div>
        </div>

        <div v-show="!show" class="row h-100 w-100">

            <div class="col-sm-4 _flex-block">
                <control-component :date="pickDate" :event="eBooked"></control-component>
            </div>

            <div class="col-sm-8 _flex-block my-2">
                <div id="app" class="card">
                    <h3 class="card-header text-center">My Calendar</h3>
                    <div class="card-body">
                        <calendar-view
                                @click-date="onClickDay"
                                @click-event="onClickEvent"
                                :show-date="showDate"
                                :events="userData.events"
                                :disable-past="true"
                                class="theme-default">
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
                userData: '',
                defaultMsg: 'Hi! I am your action messenger. Please pick date from calendar',
                calendMsg: '',
                showDate: new Date(),
                pickDate: '',
                pickTitle: '',

                eBooked: {
                    eId:'', eMsg:'', eTitle:'', eDate:''
                }
            }
        },
        mounted(){
            this.request(this.url);
        },
        computed:{
            message(){
                if(this.calendMsg.length > 0){
                    return this.calendMsg;
                } else {
                    return this.defaultMsg;
                }
            }
        },
        methods: {

            onClickDay(d) {
                this.calendMsg = `You clicked on: ${d.toDateString()}`;
                this.pickDate = this.isoYearMonthDay(d);
                this.pickTitle = ''
            },

            setShowDate(d) {
                this.calendMsg = `Changing calendar view to ${d.toLocaleDateString()}`;
                this.showDate = d
            },

            onClickEvent(e) {
                this.calendMsg = `Your booked event with title: ${e.title}`;

                this.eBooked.eId = e.id;
                this.eBooked.eTitle = e.title;
                this.eBooked.eDate = this.isoYearMonthDay(e.startDate);
            },

            thisMonth(d, h, m) {
                const t = new Date();
                return new Date(t.getFullYear(), t.getMonth(), d, h || 0, m || 0)
            },

            request(url){
                axios.get(url)
                    .then( response => {
                        this.userData = response.data;
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

    #messenger {
        background-image: url('../../assets/Messenger.svg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: 25px;
        padding: 1.5em;
    }

    #messenger .alert {
        border: none;
        border-radius: 0;
    }

</style>