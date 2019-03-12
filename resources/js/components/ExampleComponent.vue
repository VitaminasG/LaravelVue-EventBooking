<template>
    <div class="card text-center w-75 h-75">
        <h4 class="card-header">
            Event Booking
        </h4>
        <div class="card-body">
            <p class="card-text">{{ content }}</p>
        </div>
        <div class="card-footer text-muted">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            content: {
                type: String,
                default: 'Please add content here'
            }
        }
    }
</script>
