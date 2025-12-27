<template>
    <v-dialog persistent v-model="dialog" max-width="500px">
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                depressed
                color="success"
                dark
                :loading="importCSVLoader"
                class="mb-2 mx-2"
                v-bind="attrs"
                v-on="on"
            >
                Importieren
            </v-btn>
        </template>
        <v-card>
            <v-card-title>
                <span class="text-h5">Import CSV</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text class="pa-5">
                <v-file-input
                    :rules="rules"
                    accept=".csv, .xslx"
                    placeholder="datei suchen"
                    v-model="fileData"
                    color="success accent-4"
                    show-size
                    outlined
                    prepend-icon="mdi-file"
                ></v-file-input>
                <v-alert
                    v-model="message"
                    dense

                    type="error"
                >
                    wähle zuerst eine Datei
                </v-alert>

            </v-card-text>
            <v-divider></v-divider>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">
                    Abrechen
                </v-btn>
                <v-btn
                    :loading="buttonLoader"
                    color="green darken-1"
                    text
                    @click="save"
                >
                    hochladen
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: "import-csv",
    props: ["importCSVLoader"],
    data() {
        return {
            dialog: false,
            message: false,
            buttonLoader: false,
            fileData: null,
            rules: [
                (value) => {
                    return !value || !value.length;
                },
            ],
        };
    },
    methods: {
        close() {
            this.dialog = false;
            this.fileData = null;
            this.message = false;
        },
        save() {
            if(this.fileData){
                this.message = false;
            }else if(this.fileData === null ){
                this.message = true;
            }
            this.buttonLoader = false;
            this.$papa.parse(this.fileData, {
                header: true,
                complete: function (results) {
                    this.buttonLoader = false;
                    this.$emit("csvData", results.data);
                    this.close();

                }.bind(this),
                error: function (err, file, inputElem, reason) {
                    this.buttonLoader = false;
                },
            });
        },
    },
};
</script>
