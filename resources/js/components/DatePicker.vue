<template>
    <v-col
        cols="16"
        sm="6"
        md="4"
    >
        <v-dialog
            name="sanierung"
            v-model="fields.sanierung"
            ref="dialog"
            persistent
            width="290px"
        >
            <template v-slot:activator="{ on, attrs }">
                <v-text-field
                    v-model="date"
                    label="Letzte Sanierung am"
                    prepend-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                ></v-text-field>
            </template>
            <v-date-picker
                v-model="date"
                scrollable
                lang="de"
            >
                <v-btn
                    text
                    color="primary"
                    @click="modal = false"
                >
                    Cancel
                </v-btn>
                <v-btn
                    text
                    color="primary"
                    @click="$refs.dialog.save(date)"
                >
                    OK
                </v-btn>
            </v-date-picker>
        </v-dialog>
    </v-col>

</template>

<script>
export default {
    name: "DatePicker",
    data: () => ({

        fields: {},

        date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
            .toISOString()
            .substr(0, 10),

    }),


}
</script>

<style scoped>

</style>
