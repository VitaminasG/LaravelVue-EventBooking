<template>
    <div class="card text-center">
        <h5 class="card-header">

            <!-- Title slot -->
            <slot name="title"></slot>

        </h5>
        <div class="card-body">

            <!-- text slot -->
            <slot name="information"></slot>

        </div>
        <!-- Link -->
        <div class="card-footer text-muted">
            <a :href="linkUrl" class="card-link" target="_blank">
                {{ linkText }}
            </a>
        </div>

    </div>
</template>

<script>
    export default {
        name: "IntroComponent",
        props:{
            linkText:{
                type: String,
                default: 'Card Link'
            },
            linkUrl:{
                type: String,
                default: '#'
            }
        },
        data(){
            return {

            }
        }
    }
</script>