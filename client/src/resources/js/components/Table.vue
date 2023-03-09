<template lang="">
    <table v-show="tableData.length">
        <tr>
            <th v-for="(item, index) in tableHeader" :key="index">
                {{ item }}
            </th>
        </tr>
        <tr v-for="(item, index) in tablePage" :key="index">
            <td>{{ item.id }}</td>
            <td>{{ item.body }}</td>
            <td>{{ item.header }}</td>
            <td>{{ item.status }}</td>
        </tr>
    </table>
    <div class="page_container" v-show="tableData.length" v-if="pagination">
        <div class="pagination">
            <button
                @click="
                    page_count =
                        page_count - 1 < 0 ? page_count : page_count - 1
                "
            >
                &laquo;
            </button>
            <button
                :style="{
                    'background-color': n - 1 != page_count ? '' : '#eeeeee',
                }"
                @click="setPage(n - 1)"
                v-for="n in page_total_count"
            >
                {{ n }}
            </button>
            <button
                @click="
                    page_count =
                        page_count + 1 < page_total_count
                            ? page_count + 1
                            : page_count
                "
            >
                &raquo;
            </button>
        </div>
    </div>
</template>
<script>
export default {
    props: ["tableData", "tableHeader", "pagination"],
    data() {
        return {
            page_count: 0,
            page_total_count: 0,
            dataPerPage: [],
            tableLimiter: 5,
        };
    },
    computed: {
        tablePage() {
            return this.dataPerPage[this.page_count];
        },
    },
    watch: {
        tableData: {
            handler(newValue, prevValue) {
                this.dataPerPage = [];
                if (this.pagination === false) {
                    this.dataPerPage.push(newValue);
                } else {
                    this.dataPerPage = [];
                    this.page_count = 0;
                    this.page_total_count = Math.ceil(
                        newValue.length / this.tableLimiter
                    );
                    for (
                        let index = 0;
                        index < this.page_total_count;
                        index++
                    ) {
                        this.dataPerPage.push([]);
                        let currentIndex = index * this.tableLimiter;
                        for (let d = 0; d < this.tableLimiter; d++) {
                            if (
                                typeof newValue[currentIndex + d] !==
                                "undefined"
                            ) {
                                this.dataPerPage[index].push(
                                    newValue[currentIndex + d]
                                );
                            }
                        }
                    }
                }
            },
            deep: true,
        },
    },
    methods: {
        setPage(n) {
            this.page_count = n;
        },
    },
};
</script>
<style lang="scss">
table {
    margin: 10px 0px;
    tr {
        border-bottom: 1px solid #f2f2f2;
        th,
        td {
            padding: 20px;
        }
        &:nth-child(even) {
            background-color: #eeeeee;
        }
    }
}
.pagination {
    display: inline-block;
}

.pagination button {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    &:hover {
        background-color: #eeeeee;
    }
}
</style>
