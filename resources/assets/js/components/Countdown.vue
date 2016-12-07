<template>
    <div class="countdown">
        <div class="block">
            <p class="digit">{{ days | two_digits }}</p>
            <p class="text">Days</p>
        </div>
        <div class="block">
            <p class="digit">{{ hours | two_digits }}</p>
            <p class="text">Hours</p>
        </div>
        <div class="block">
            <p class="digit">{{ minutes | two_digits }}</p>
            <p class="text">Minutes</p>
        </div>
        <div class="block">
            <p class="digit">{{ seconds | two_digits }}</p>
            <p class="text">Seconds</p>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            window.setInterval(() => {
                this.now = Math.trunc((new Date()).getTime() / 1000);
            },1000);

            console.log(this.timestamp);
        },

        props : {
            date : {
                coerce: str => Math.trunc(Date.parse(str) / 1000)
            }
        },

        data() {
            return {
                now: Math.trunc((new Date()).getTime() / 1000),
                timestamp: Math.trunc(Date.parse(this.date) / 1000)
            }
        },

        computed: {
            seconds() {
                return (this.timestamp - this.now) % 60;
            },

            minutes() {
                return Math.trunc((this.timestamp - this.now) / 60) % 60;
            },

            hours() {
                return Math.trunc((this.timestamp - this.now) / 60 / 60) % 24;
            },

            days() {
                return Math.trunc((this.timestamp - this.now) / 60 / 60 / 24);
            }
        }
    }
</script>
