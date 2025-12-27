<template>
    <div class="d-flex flex-column justify-center">
        <v-row style="height: 500px; width: 100%; overflow-y: auto">
            <v-col cols="12">
                <h3 class="text-left">Allgemeine Informationen </h3>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    hide-details
                    type="number"
                    hide-spin-buttons
                    v-model="editedItem.object"
                    label="Objekt"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    hide-details
                    v-model="editedItem.spn"
                    label="Dienstleister Nummer"
                ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    hide-details
                    hide-spin-buttons
                    type="number"
                    v-model="editedItem['square-meter']"
                    label="Quadratmeter"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    v-model="editedItem.street"
                    hide-details
                    label="Straße"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    type="number"
                    hide-spin-buttons
                    hide-details
                    dense
                    v-model="editedItem.homenumber"
                    label="Hausnummer"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    hide-details
                    type="number"
                    hide-spin-buttons
                    dense
                    v-model="editedItem.zip"
                    label="Postleitzahl"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="6">
                <v-text-field
                    outlined
                    dense
                    hide-details
                    v-model="editedItem.city"
                    label="Stadt"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="6">
                <v-text-field
                    outlined
                    hide-details
                    dense
                    v-model="editedItem.country"
                    label="Land"
                ></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-textarea
                    outlined
                    auto-grow
                    dense
                    hide-details
                    v-model="editedItem.description"
                    label="Beschreibung"
                ></v-textarea>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    hide-details
                    dense
                    type="number"
                    hide-spin-buttons
                    v-model="editedItem.floor"
                    label="Etagen"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    hide-details
                    v-model="editedItem.spaces"
                    label="Räume"
                ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    type="number"
                    hide-spin-buttons
                    v-model="editedItem.bathroom"
                    hide-details
                    label="Badezimmer"
                ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    hide-details
                    dense
                    v-model="editedItem.managementtype"
                    label="Verwaltungsart"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    hide-details
                    v-model="editedItem.coldrent"
                    label="Kaltmiete"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    hide-details
                    v-model="editedItem.heatingcost"
                    label="Heizkosten"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    v-model="editedItem.aclsp"
                    label="Jährliches Kostenlimit "
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    v-model="editedItem.clspo"
                    label="Kostenlimit je Auftrag"
                ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    v-model="editedItem.quantityequipment"
                    label="Qualität der Ausstattung"
                ></v-text-field>
            </v-col>

            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    v-model="editedItem.buildingstyle"
                    label="Gebäudestil"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="4">
                <v-text-field
                    outlined
                    dense
                    type="number"
                    hide-spin-buttons
                    prepend-inner-icon="mdi-currency-usd"
                    v-model="editedItem.deposit"
                    label="Kaution"
                ></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="6" class="py-0">
                <v-switch
                    v-model="editedItem.kitchen"
                    inset
                    :label="`Küche`"
                ></v-switch>
                <v-switch
                    v-model="editedItem.balcon"
                    inset
                    :label="`Balkon`"
                ></v-switch>

                <v-switch
                    v-model="editedItem['guest-toilt']"
                    inset
                    :label="`Gäste WC`"
                ></v-switch>
                <v-switch
                    v-model="editedItem.garden"
                    inset
                    :label="`Garten`"
                ></v-switch>
            </v-col>

            <v-col cols="12" sm="6" md="6">
                <v-switch
                    v-model="editedItem.cellar"
                    inset
                    :label="`Keller`"
                ></v-switch>
                <v-switch
                    v-model="editedItem.parking"
                    inset
                    :label="`Parkplatz`"
                ></v-switch>

                <v-switch
                    v-model="editedItem.disabledaccess"
                    inset
                    :label="`Behindertengerecht`"
                ></v-switch>
                <v-switch
                    v-model="editedItem.animals"
                    inset
                    :label="`Tiere`"
                ></v-switch>
            </v-col>

            <v-col cols="12" class="py-0">
                <h3>Datum</h3>
                <v-divider class="mb-5 mt-2"></v-divider>
                <div
                    class="d-flex align-center justify-space-between flex-wrap"
                >
                    <v-menu
                        v-model="lastrenovationDateMenu"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="auto"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                v-model="editedItem.lastrenovation"
                                label="Letzte Sanierung am"
                                prepend-inner-icon="mdi-calendar"
                                outlined
                                dense
                                class="mr-1"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                            ></v-text-field>
                        </template>
                        <v-date-picker
                            v-model="editedItem.lastrenovation"
                            @input="lastrenovationDateMenu = false"
                        >
                            <v-spacer></v-spacer>
                            <v-btn
                                text
                                color="primary"
                                @click="
                                    (editedItem.lastrenovation = date),
                                        (lastrenovationDateMenu = false)
                                "
                            >
                                Heutige Datum
                            </v-btn></v-date-picker
                        >
                    </v-menu>

                    <v-menu
                        v-model="buildDateMenu"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="auto"
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                v-model="editedItem.builddate"
                                label="Baudatum"
                                prepend-inner-icon="mdi-calendar"
                                outlined
                                dense
                                class="ml-1"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                            >
                            </v-text-field>
                        </template>
                        <v-date-picker
                            v-model="editedItem.builddate"
                            @input="buildDateMenu = false"
                        >
                            <v-spacer></v-spacer>
                            <v-btn
                                text
                                color="primary"
                                @click="
                                    (editedItem.builddate = date),
                                        (buildDateMenu = false)
                                "
                            >
                                Heutige Datum
                            </v-btn>
                        </v-date-picker>
                    </v-menu>
                </div>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: {
        editedItem: {
            type: Object,
        },
    },
    data() {
        return {
            date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                .toISOString()
                .substr(0, 10),
            lastrenovationDateMenu: false,
            buildDateMenu: false,
        };
    },
};
</script>

<style>
/* Scroll Bar */
::-webkit-scrollbar {
    height: 8px;
    width: 5px;
}

::-webkit-scrollbar-track {
    box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    background-color: rgba(218, 218, 218, 0.692);
    border-radius: 10px;
    outline: none;
}
</style>
