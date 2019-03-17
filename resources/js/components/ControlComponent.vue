<template>
    <form v-on:submit.prevent>
        <div class="form-group">
            <div v-if="message" class="alert alert-info text-center" role="alert">
                {{ message }}
            </div>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control"
                   placeholder="Please select day from Calendar."
                   :value="date"
                   :disabled="true">
        </div>
        <div class="form-group">
            <label>Tile</label>
            <input type="text" class="form-control"
                   placeholder="Title"
                   :value="title">
            <small class="form-text text-muted">
                Please enter your event title.
            </small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-info" :disabled="show">Update</button>
        <button type="submit" class="btn btn-danger" :disabled="show">Delete</button>
    </form>
</template>

<script>
    export default {
        data(){
            return{
                show: true
            }
        },
        props: {
            date: {
                default: ''
            },
            title: {
                default: ''
            },
            message: {
                default: ''
            }
        },
        watch:{
            title: function (value){
                if(value.length > 0){
                    return this.notEmpty(false);
                }else {
                    this.notEmpty(true);
                }
            }
        },
        methods: {
            notEmpty(bool){
                return this.show = bool;
            }
        }
    }
</script>

<style scoped>

</style>