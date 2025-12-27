<template>
    <div>
        <v-card flat outlined>
            <div>
                <v-toolbar flat>
                    <v-toolbar-title class="font-weight-bold"
                        >Haus Editor</v-toolbar-title
                    >



                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="900px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                color="orange"
                                dark
                                depressed
                                :loading="exportCSVLoader"
                                class="mb-2 mx-2"
                                @click="exportCSV"
                            >
                                Expotieren
                            </v-btn>
                            <ImportCSV
                                @csvData="getImportFileData"
                                :importCSVLoader="importCSVLoader"
                            />

                            <v-btn
                                color="primary"
                                dark
                                depressed
                                class="mb-2"
                                v-bind="attrs"
                                v-on="on"
                            >
                                Neues hinzufügen
                            </v-btn>
                            <v-btn
                                @click="deleteItem(deleteItemRow)"
                                dark
                                color="red"
                                :loading="deleteButtonLoader"
                                depressed
                                class="mb-2 mx-1"
                            >
                                Löschen
                            </v-btn>
                            <v-btn
                                @click="SaveExcelRecord(editedRow)"
                                color="blue"
                                dark
                                :loading="saveButtonLoader"
                                depressed
                                class="mb-2 mx-1"
                            >
                                Speichern
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="text-h5">{{ formTitle }}</span>
                            </v-card-title>
                            <v-divider></v-divider>
                            <v-card-text>
                                <v-container>
                                    <HouseTextFields
                                        :editedItem="editedItem"
                                        @clear="close"
                                    />
                                </v-container>
                            </v-card-text>
                            <v-divider></v-divider>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="blue darken-1"
                                    text
                                    @click="close"
                                >
                                    Abrechen
                                </v-btn>
                                <v-btn
                                    :loading="saveButtonLoader"
                                    color="blue darken-1"
                                    text
                                    @click="save"
                                >
                                    {{ editedItem?.id ? "Update" : "Speichern" }}
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogDelete" max-width="500px">
                        <v-card>
                            <v-card-title class="text-h5"
                                >Bist du sicher diese Zeile zu löschen?</v-card-title
                            >
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="blue darken-1"
                                    text
                                    @click="closeDelete"
                                    >Abrechen</v-btn
                                >
                                <v-btn
                                    color="blue darken-1"
                                    text
                                    :loading="deleteButtonLoader"
                                    @click="deleteItemConfirm"
                                    >OK</v-btn
                                >
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
                <v-divider></v-divider>
            </div>

            <v-card-text class="pa-5">
                <vue-excel-editor
                    ref="grid"
                    :new-if-bottom="false"
                    :allow-add-col="true"
                    :no-header-edit="true"
                    width="100%"
                    v-model="dataItem"
                    @cell-click="onRowDataChange"
                    @update="updateRow"
                    @select="rowSelected"
                    :localized-label="myLabels"
                    filter-row
                >

                    <vue-excel-column
                        field="object"
                        label="Objekt"
                        type="string"
                        width="150px"
                    />
                    <vue-excel-column
                        field="spn"
                        label="Dienstleister. Nr"
                        type="string"
                        width="130px"
                    />

                    <vue-excel-column
                        field="description"
                        label="Beschreibung"
                        type="string"
                        width="150px"
                    />

                    <vue-excel-column
                        field="square-meter"
                        label="Quadratmeter"
                        type="number"
                        width="150px"
                    />

                    <vue-excel-column
                        field="floor"
                        label="Etagen"
                        type="number"
                        width="150px"
                    />

                    <vue-excel-column
                        field="spaces"
                        label="Räume"
                        type="number"
                        width="150px"
                    />

                    <vue-excel-column
                        field="bathroom"
                        label="Badezimmer"
                        type="number"
                        width="150px"
                    />
                    <vue-excel-column
                        field="street"
                        label="Straße"
                        type="number"
                        width="150px"
                    />
                    <vue-excel-column
                        field="homenumber"
                        label="Huasnummer"
                        type="number"
                        width="150px"
                    />

                    <vue-excel-column
                        field="zip"
                        label="Postleitzahl"
                        type="number"
                        width="150px"
                    />

                    <vue-excel-column
                        field="country"
                        label="Land"
                        type="string"
                        width="150px"
                    />

                    <vue-excel-column
                        field="managementtype"
                        label="Verwaltungart"
                        type="string"
                        width="150px"
                    />

                    <vue-excel-column
                        field="coldrent"
                        label="Kaltmiete"
                        type="number"
                    />

                    <vue-excel-column
                        field="deposit"
                        label="Kaution"
                        type="number"
                    />

                    <vue-excel-column
                        field="heatingcost"
                        label="Heizkosten"
                        type="number"
                    />

                    <vue-excel-column
                        field="aclsp"
                        label="Jährliches Kostenlimit"
                        type="number"
                        width="150px"
                    />

                    <vue-excel-column
                        field="clspo"
                        label="Kostenlimit je Auftrag "
                        type="number"
                        width="150px"
                    />

                    <vue-excel-column
                        field="builddate"
                        label="Buudatum"
                        type="date"
                        width="100px"
                    />

                    <vue-excel-column
                        field="kitchen"
                        label="Küche"
                        type="checkYN"
                    />

                    <vue-excel-column
                        field="balcon"
                        label="Balkon"
                        type="checkYN"
                    />

                    <vue-excel-column
                        field="guest-toilt"
                        label="Gäste WC "
                        type="checkYN"
                    />

                    <vue-excel-column
                        field="garden"
                        label="Garten"
                        type="checkYN"
                        width="150px"
                    />
                    <vue-excel-column
                        field="cellar"
                        label="Keller"
                        type="checkYN"
                        width="150px"
                    />

                    <vue-excel-column
                        field="parking"
                        label="Parkplatz"
                        type="checkYN"
                        width="150px"
                    />
                    <vue-excel-column
                        field="disabledaccess"
                        label="Behindertengerecht"
                        type="checkYN"
                        width="150px"
                    />

                    <vue-excel-column
                        field="animals"
                        label="Tiere"
                        type="checkYN"
                        width="150px"
                    />
                    <vue-excel-column
                        field="quantityequipment"
                        label="Qualität der Ausstattung"
                        type="string"
                        width="150px"
                    />
                    <vue-excel-column
                        field="buildingstyle"
                        label="Gebäudestil"
                        type="number"
                        width="150px"
                    />
                    <vue-excel-column
                        field="lastrenovation"
                        label="Letzte Sanierung am"
                        type="date"
                        width="150px"
                    />
                </vue-excel-editor>

                <!-- <v-data-table
                    :options="{
                        itemsPerPage: 20,
                    }"
                    :headers="headers"
                    :items="dataItem"
                    sort-by="calories"
                >
                    <template v-slot:top>

                    </template>
                    <template v-slot:item.builddate="{ item }">
                        {{ dateFormat(item.builddate) }}
                    </template>
                    <template v-slot:item.lastrenovation="{ item }">
                        {{ dateFormat(item.lastrenovation) }}
                    </template>
                    <template v-slot:item.description="{ item }">
                        {{ textTruncate(item.description) }}
                    </template>
                    <template v-slot:item.actions="{ item }">
                        <div class="mx-2 d-flex align-center justify-center">
                            <v-icon
                                id="editButton"
                                color="info"
                                class="mr-2"
                                @click="editItem(item)"
                            >
                                mdi-pencil
                            </v-icon>
                            <v-icon color="red" @click="deleteItem(item)">
                                mdi-delete
                            </v-icon>
                        </div>
                    </template>
                </v-data-table> -->
            </v-card-text>
        </v-card>




        <!-- Toast Bar -->
        <Toast
            @close="toastModal = false"
            :modal="toastModal"
            :text="toastText"
            :color="toastColor"
        />
    </div>
</template>

<script>
import ImportCSV from "./ImportCSV";
import HouseTextFields from "./TextFields";
import Toast from "./snackbar.vue";
import axios from "axios";
import moment from "moment";
export default {
    name: "Home",
    components: {
        ImportCSV,
        Toast,
        HouseTextFields,
    },
    data() {

        return {
            myLabels: {
                footerLeft: (top, bottom, total) => `Datensatz ${top} zu ${bottom} von ${total}`,
                first: 'Erste',
                previous: 'Vorher',
                next: 'Nächste',
                last: 'Letzte',
                footerRight: {
                    selected: 'Ausgewählt:',
                    filtered: 'Gefiltert:',
                    loaded: 'Geladen:'
                },
                processing: 'Processing',
                tableSetting: 'Table Setting',
                exportExcel: 'Export Excel',
                importExcel: 'Import Excel',
                back: 'zurück',
                reset: 'Standart',
                sortingAndFiltering: 'Sortieren und Filtern',
                sortAscending: 'aufsteigend sortieren',
                sortDescending: 'Absteigend sortieren',
                near: '≒ Nah',
                exactMatch: '= Genaue Übereinstimmung',
                notMatch: '≠ keine Übereinstimmung',
                greaterThan: '&gt; größer als',
                greaterThanOrEqualTo: '≥ größer als oder gleich',
                lessThan: '&lt; kleiner als',
                lessThanOrEqualTo: '≤ kleiner als Oder gleich ',
                regularExpression: '~ Regular Expression',
                customFilter: 'eigener Filter',
                listFirstNValuesOnly: n => `List first ${n} values only`,
                apply: 'Anwenden',
                noRecordIsRead: 'No record is read',
                readonlyColumnDetected: 'Readonly column detected',
                columnHasValidationError: (name, err) => `Column ${name} has validation error: ${err}`,
                noMatchedColumnName: 'Kein übereinstimmender Spaltenname',
                invalidInputValue: 'Invalid input value',
                missingKeyColumn: 'Missing key column',
                noRecordIndicator: 'Keine Daten vorhanden.'
            },
            editedRow: {
                index: -1,
                data: null,
            },
            deleteItemRow: null,
            toastModal: false,
            exportCSVLoader: false,
            importCSVLoader: false,
            toastText: "",
            toastColor: "",
            deleteButtonLoader: false,
            saveButtonLoader: false,
            dialog: false,
            dialogDelete: false,
            headers: [
                {
                    text: "Id",
                    align: "start",
                    sortable: false,
                    value: "id",
                },
                {
                    text: "Object No.",

                    sortable: false,
                    value: "object",
                },
                { text: "SPN", value: "spn" },
                { text: "Description", value: "description", sortable: false },
                { text: "Square Meter", value: "square-meter", width: 100 },
                { text: "Floor", value: "floor", width: 100 },
                { text: "Spaces", sortable: false, value: "spaces" },
                { text: "Bathroom", sortable: false, value: "bathroom" },
                { text: "Street", sortable: false, value: "street" },
                { text: "House Number", sortable: false, value: "homenumber" },
                { text: "Zip code", sortable: false, value: "bathroom" },
                { text: "City", sortable: false, value: "zip" },
                { text: "Country", sortable: false, value: "country" },
                {
                    text: "Management Type",
                    sortable: false,
                    value: "managementtype",
                },
                { text: "Cold Rent", sortable: false, value: "coldrent" },
                { text: "Deposit", sortable: false, value: "deposit" },
                {
                    text: "Heating costs",
                    sortable: false,
                    value: "heatingcost",
                },
                { text: "ACLSP", sortable: false, value: "aclsp" },
                { text: "CLSPO", sortable: false, value: "clspo" },
                { text: "ACLSP", sortable: false, value: "aclsp" },
                {
                    text: "Build date",
                    sortable: false,
                    value: "builddate",
                    width: 120,
                },
                {
                    text: "Kitchen available",
                    sortable: false,
                    value: "kitchen",
                },
                { text: "Balcony available", sortable: false, value: "balcon" },
                {
                    text: "Guest Toilet Available",
                    sortable: false,
                    value: "guest-toilt",
                    width: 120,
                },
                { text: "Garden Available", sortable: false, value: "garden" },
                { text: "Cellar Available", sortable: false, value: "cellar" },
                {
                    text: "Parking Available",
                    sortable: false,
                    value: "parking",
                },
                {
                    text: "Disabled Access",
                    sortable: false,
                    value: "disabledaccess",
                },
                { text: "Animals Allowed", sortable: false, value: "animals" },
                {
                    text: "Quantity Equipment",
                    sortable: false,
                    value: "quantityequipment",
                },
                {
                    text: "Building Style",
                    sortable: false,
                    value: "buildingstyle",
                },
                {
                    text: "Last Renovation",
                    sortable: false,
                    value: "lastrenovation",
                    width: 120,
                },
                {
                    text: "",
                    value: "actions",
                    sortable: false,
                    width: 100,
                },
            ],
            tasks: ['school', 'homework', 'math,'],
            dataItem: [],
            editedIndex: -1,
            editedItem: {
                id: null,
                object: null,
                spn: null,
                description: null,
                "square-meter": null,
                floor: null,
                spaces: null,
                bathroom: null,
                street: null,
                homenumber: null,
                zip: null,
                city: null,
                country: null,
                managementtype: null,
                coldrent: null,
                deposit: null,
                heatingcost: null,
                aclsp: null,
                clspo: null,
                builddate: null,
                kitchen: 0,
                balcon: 0,
                "guest-toilt": 0,
                garden: 0,
                cellar: 0,
                parking: 0,
                disabledaccess: 0,
                animals: 0,
                quantityequipment: null,
                buildingstyle: null,
                lastrenovation: null,
            },
            defaultItem: {
                id: null,
                object: null,
                spn: null,
                description: null,
                "square-meter": null,
                floor: null,
                spaces: null,
                bathroom: null,
                street: null,
                homenumber: null,
                zip: null,
                city: null,
                country: null,
                managementtype: null,
                coldrent: null,
                deposit: null,
                heatingcost: null,
                aclsp: null,
                clspo: null,
                builddate: null,
                kitchen: 0,
                balcon: 0,
                "guest-toilt": 0,
                garden: 0,
                cellar: 0,
                parking: 0,
                disabledaccess: 0,
                animals: 0,
                quantityequipment: null,
                buildingstyle: null,
                lastrenovation: null,
            },
        };
    },

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New Item" : "Edit Item";
        },
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
        dialogDelete(val) {
            val || this.closeDelete();
        },
    },

    created() {
        this.getHouseRecords();
    },

    methods: {
        updateRow(val) {
            if (val && val.length > 0) {
                let arr = [];

                val.forEach((row) => {
                    if (this.dataItem?.length) {
                        this.dataItem.find((el) => {
                            if (el.$id === row.$id) {
                                // delete $id.
                                delete el["$id"];

                                // Change date format
                                if (el.builddate)
                                    el.builddate = moment(el.builddate).format("YYYY-MM-DD");
                                if (el.lastrenovation)
                                    el.lastrenovation = moment(el.lastrenovation).format("YYYY-MM-DD");

                                if (el.created_at)
                                    el.created_at = moment(el.created_at).format("YYYY-MM-DD");

                                if (el.updated_at)
                                    el.updated_at = moment(el.updated_at).format("YYYY-MM-DD");

                                // Push in array
                                arr.push(el);
                            }
                        });
                    }
                });

                console.log("row", arr);
                this.editedRow.data = [...arr];
                this.SaveExcelRecord();
            }
        },


        rowSelected(obj) {
            this.deleteItemRow = this.dataItem[obj[obj.length - 1]];
        },
        onRowDataChange(position) {
            const { rowPos, colPos } = position;
            this.editedRow.index = rowPos;
        },
        dateFormat(date) {
            return moment(date).format("DD.MM.YYYY");
        },
        initToast(text, color) {
            this.toastText = text;
            this.toastColor = color;
            this.toastModal = true;
        },
        async getImportFileData(csv_inJSON) {
            if (csv_inJSON?.length) {
                await csv_inJSON.map(async (row) => {
                    if (row.builddate)
                        row.builddate = moment(row.builddate).format(
                            "YYYY-MM-DD"
                        );
                    if (row.lastrenovation)
                        row.lastrenovation = moment(row.lastrenovation).format(
                            "YYYY-MM-DD"
                        );

                    if (row.created_at)
                        row.created_at = moment(row.created_at).format(
                            "YYYY-MM-DD"
                        );

                    if (row.updated_at)
                        row.updated_at = moment(row.updated_at).format(
                            "YYYY-MM-DD"
                        );
                });
            }

            this.importCSVLoader = true;
            await axios
                .post(`http://127.0.0.1:8000/api/JsonBulk`, csv_inJSON)
                .then((response) => {
                    this.initToast(
                         "CSV Datei erfolgreich hochgeladen.",
                        "success"
                    );
                    this.getHouseRecords();
                    this.close();
                    this.importCSVLoader = false;
                })
                .catch((err) => {
                    this.initToast(
                        "CSV Datei konnte nicht hochgeladen werden.",
                        "error"
                    );

                })
                .finally(() => {
                    this.importCSVLoader = false;
                });
        },
        async getHouseRecords() {
            await axios
                .get("http://127.0.0.1:8000/api/Json")
                .then((response) => {
                    this.dataItem = response.data;
                });
        },
        exportCSV() {
            if (this.dataItem?.length) {
                this.exportCSVLoader = true;

                setTimeout(() => {
                    let records = this.$papa.unparse(this.dataItem);
                    this.exportCSVLoader = false;
                    this.$papa.download(records, "HouseData");
                }, 2000);
            }
        },
        textTruncate(txt) {
            if (txt?.length > 15) {
                return txt.substring(0, 15) + "...";
            }
            return txt;
        },

        editItem(item) {
            this.editedIndex = this.dataItem.indexOf(item);

            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            this.editedIndex = this.dataItem.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialogDelete = true;
        },

        async deleteItemConfirm() {
            this.deleteButtonLoader = true;
            await axios
                .delete(`http://127.0.0.1:8000/api/Json/${this.editedItem?.id}`)
                .then(() => {
                    this.getHouseRecords();
                    this.deleteItemRow = null;
                    this.closeDelete();
                })
                .finally(() => {
                    this.deleteButtonLoader = false;
                });
        },

        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        closeDelete() {
            this.dialogDelete = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        async SaveExcelRecord() {
            if (!this.editedRow.data || this.editedRow.data.length === 0) {
                // this.initToast("Nothing to save.", "info");
                return 'no data';
            }

            this.saveButtonLoader = true;

            try {
                // Assuming that the API supports batch update
                await axios.post(`http://127.0.0.1:8000/api/JsonBulk`, this.editedRow.data);
                this.initToast("Daten wurden aktualisiert und gespeichert!", "success");

                // reset
                this.editedRow = {
                    index: -1,
                    data: [],
                };

                // load all records
                this.getHouseRecords();

                this.close();
            } catch (error) {
                this.initToast("Daten konnten nicht aktualisiert werden", "error");
            } finally {
                this.saveButtonLoader = false;
            }
        },


        async save() {
            this.saveButtonLoader = true;

            if (this.editedItem?.id) {
                await axios
                    .put(
                        `http://127.0.0.1:8000/api/Json/${this.editedItem?.id}`,
                        this.editedItem
                    )
                    .then(() => {
                        this.getHouseRecords();
                        this.close();
                        this.saveButtonLoader = false;
                        // if (this.editedIndex > -1) {
                        //   Object.assign(this.dataItem[this.editedIndex], this.editedItem);
                        //   this.dataItem = [...this.dataItem];
                        // } else {
                        //   let arr = [];
                        //   arr.push(this.editedItem);
                        //   this.dataItem = [...this.dataItem, ...arr];
                        // }
                    })
                    .catch((err) => {
                        alert(err.message || "Error");
                    })
                    .finally(() => {
                        this.saveButtonLoader = false;
                    });
            } else {
                // create new record
                await axios
                    .post(`http://127.0.0.1:8000/api/Json/`, this.editedItem)
                    .then(() => {
                        this.initToast(
                            "Erfolgreich hinzugefügt",
                            "success"
                        );
                        this.getHouseRecords();
                        this.close();
                        this.saveButtonLoader = false;
                    })
                    .catch((err) => {
                        alert( "Bitte prüfen Sie Ihre Eingaben");
                    })
                    .finally(() => {
                        this.saveButtonLoader = false;
                    });
            }
        },
    },
};
</script>
