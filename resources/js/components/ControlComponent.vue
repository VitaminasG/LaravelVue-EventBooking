<template>
    <form v-on:submit.prevent>

        <!-- New Event -->
        <h5>New Event: </h5>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">New Date:</span>
            </div>
            <input type="text" class="form-control"
                   placeholder="Please select a day."
                   v-model="date"
                   :disabled="true">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">New Title:</span>
            </div>
            <input type="text" class="form-control"
                   placeholder="Please select a day."
                   v-model="cTitle"
                   :disabled="!date">
        </div>

        <button type="submit" class="btn btn-primary" :disabled="buttons.sub">Submit</button>

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

        <button type="submit" class="btn btn-info" :disabled="buttons.edit">Update</button>
        <button type="submit" class="btn btn-danger" :disabled="buttons.edit">Delete</button>

    </form>
</template>

<script>
    export default {
        data(){
            return{
                buttons: { sub:true, edit:true },
                cDate: '',
                cTitle: '',
            }
        },
        props: {
            date: {
                default: ''
            },
            event:{
                type: Object
            }
        },
        watch:{
            cTitle(value){
                if(value.length > 0 && this.date.length > 0){
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
            eTitle:function(){
                return this.event.eTitle;
            },
        },
        methods: {
            notEmpty(button, bool){
                this.buttons[button] = bool;
            },
            submit(){

            },
            update(){

            },
            delete(){

            }
        }
    }
</script>

<style scoped>

</style>