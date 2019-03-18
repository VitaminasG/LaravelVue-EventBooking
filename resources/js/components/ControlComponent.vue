<template>
    <form @submit.prevent>

        <!-- New Event -->
        <h5>New Event: </h5>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">New Date:</span>
            </div>
            <input type="text" class="form-control"
                   placeholder="Please select a day."
                   v-model="date.pDate"
                   :disabled="true">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">New Title:</span>
            </div>
            <input type="text" class="form-control"
                   placeholder="Please select a day."
                   v-model="cTitle"
                   :disabled="!date.pDate">
        </div>

        <!-- Button Submit -->
        <button type="submit" class="btn btn-primary"
                :disabled="buttons.sub"

                @click="submit">Submit
        </button>

        <hr>

        <!-- Booked Event -->
        <h5>Booked Event: </h5>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Event Date:</span>
            </div>
            <input type="text" class="form-control"
                   placeholder="Select booked event."
                   v-model="eDate"
                   :disabled="true">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Event Title:</span>
            </div>
            <input type="text" class="form-control"
                   placeholder="Select booked event."
                   v-model="eTitle"
                   :disabled="!eTitle">
        </div>

        <!-- Button Update -->
        <button type="submit" class="btn btn-info"
                :disabled="buttons.edit"

                @click="update">Update
        </button>

        <!-- Button Delete -->
        <button type="submit" class="btn btn-danger"
                :disabled="buttons.edit"

                @click="remove">Delete
        </button>

    </form>
</template>

<script>

    import axios from 'axios';

    export default {
        data(){
            return{
                buttons: { sub:true, edit:true },
                cDate: '',
                cTitle: '',
                url: '/home/event/',
                message:'',
            }
        },
        props: {
            date: {
                type: Object
            },
            event:{
                type: Object
            }
        },
        watch:{
            cTitle(value){
                if(value.length > 0 && this.date.pDate.length > 0){
                    this.notEmpty('sub', false);
                } else {
                    this.notEmpty('sub', true);
                }
            },
        },
        computed:{
            eDate:function(){
                if(this.event.eDate.length !== 0){
                    this.notEmpty('edit', false);
                    return this.event.eDate;
                } else {
                    this.notEmpty('edit', true);
                }
            },
            eTitle:{
                get(){
                    return this.event.eTitle;
                },
                set(value){
                    this.event.eTitle = value;
                }
            },
        },
        methods: {
            notEmpty(button, bool){
                this.buttons[button] = bool;
            },
            submit(){
                axios.post(this.url,{
                    date: this.date.pDate,
                    title: this.cTitle
                }).then(response => {
                    this.message = response.data;
                    this.$emit('update-msg', this.message);
                }).catch(error => {
                    console.log(error)
                });
            },
            update(){
                axios.patch(this.url+this.event.eId,{
                    title: this.eTitle
                }).then(response => {
                    this.message = response.data;
                    this.$emit('update-msg', this.message);
                    }).catch(function (error){
                    console.log(error)
                });
            },
            remove(){
                axios.delete(this.url+this.event.eId)
                    .then(response => {
                        this.message = response.data;
                        this.$emit('update-msg', this.message);
                    }).catch(function (error){
                    console.log(error)
                });
            }
        }
    }
</script>

<style scoped>

</style>