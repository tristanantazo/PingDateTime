<template lang="">
    <div class="app">
        <Btn id="ping" class="light" btnText="Ping" :onClick="ping" />
        <div class="table-container" v-show="newData.length">
            <h1>New Record</h1>
            <Table
                :tableData="newData"
                :tableHeader="['id', 'body', 'header', 'status']"
                :pagination="false"
                key="new_comer"
            />
        </div>
        <div class="table-container">
            <h1>All Records</h1>
            <Table
                key="all_records"
                :tableData="tableData"
                :tableHeader="['id', 'body', 'header', 'status']"
                :pagination="true"
            />
        </div>
    </div>
</template>
<script>
import Btn from "./components/Button.vue";
import Table from "./components/Table.vue";
export default {
    components: {
        Btn,
        Table,
    },
    data() {
        return {
            tableData: [],
            newData: [],
        };
    },
    created() {
        axios.get(`${location.href}date-time/all`).then((response) => {
            this.tableData = response.data;
        });
    },
    methods: {
        ping() {
            axios.get(`${location.href}date-time/ping`).then((response) => {
                this.newData = [];
                this.newData.push(response.data);
                this.tableData.unshift(response.data);
            });
        },
    },
};
</script>
<style lang="scss">
.app {
    // padding: 20px 20px;
    .table-container {
        width: 60%;
        margin: 20px auto;
        box-shadow: 0 0 40px 0 rgb(0 0 0 / 15%);
        text-align: center;
        border-bottom: 1px solid;
    }
}
</style>
