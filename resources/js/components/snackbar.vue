<template>
    <v-snackbar v-if="text" :timeout="2000" :color="color" v-model="snackbar">
        {{ text }}

        <!-- <template v-slot:action="{ attrs }">
            <v-btn :color="color" text v-bind="attrs" @click="snackbar = false">
                Close
            </v-btn>
        </template> -->
    </v-snackbar>
</template>

<script>
export default {
    props: {
        text: {
            type: String,
        },
        modal: {
            type: Boolean,
        },
        color: {
            type: String,
        },
    },
    computed: {
        snackbar: {
            get() {
                return this.modal;
            },
            set(val) {
                this.$emit("close", val);
            },
        },
    },
    watch: {
        modal(val) {
            if (val == false) this.$emit("close");
        },
    },
};
</script>

<style></style>
