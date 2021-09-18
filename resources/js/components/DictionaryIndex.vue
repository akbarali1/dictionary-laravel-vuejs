<template>
    <div class="container">
        <div class="btn-group">
            <a type="button" class="btn btn-success" href="./login">Kirish</a>
            <a type="button" class="btn btn-warning" href="./register">A'zo bo'lish</a>
            <a type="button" class="btn btn-danger" href="./dictionary/create">So'z qo'shish</a>
        </div>
        <hr>
        <div class="input-group mb-3">
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="Inglizchaa" autofocus v-model="inglizcha">
                <label for="ofam">Inglizcha so'zdan qidirish</label>
            </div>
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="O'zbekcha" v-model="uzbekcha">
                <label for="ofam">O'zbekcha so'zdan qidirish</label>
            </div>
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="Ruscha" v-model="ruscha">
                <label for="ofam">Ruscha so'zdan qidirish</label>
            </div>
        </div>
        <div class="card card-body">
            <table class="table table-bordered table-striped table-hover fs-6">
                <thead class="table-dark fs-6" style=" text-align: center; ">
                <tr class="verticala fs-6">
                    <th scope="col">Ingilizcha</th>
                    <th scope="col">O'zbekcha</th>
                    <th scope="col">Ruscha</th>
                </tr>
                </thead>
                <tbody v-if="results.length > 0">
                <tr class="fs-6" v-for="result in results" :key="result.id">
                    <td class="verticala fs-5 " v-text="result.eng"></td>
                    <td class="verticala fs-5" v-text="result.uz"></td>
                    <td class="verticala fs-5" v-text="result.ru"></td>
                </tr>
                </tbody>
                <tbody v-else>
                <tr class="fs-6">
                    <td class="verticala" colspan="3">
                        Malumot topilmadi
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            inglizcha: null,
            uzbekcha: null,
            ruscha: null,
            results: []
        };
    },
    watch: {
        inglizcha(after, before) {
            this.inglizchaFunction();
        },
        uzbekcha(after, before) {
            this.uzbekchaFunction();
        },
        ruscha(after, before) {
            this.ruschaFunction();
        }
    },
    mounted() {
        this.getDictonayr()
    },
    methods: {
        getDictonayr() {
            axios.get('/api/dictonary/getdictionary')
                .then((response) => {
                    this.results = response.data
                })
                .catch(error => {
                        //alert('Qandaydur xatolik')
                    }
                );
        },
        inglizchaFunction() {
            axios.post('/api/getEng',
                {
                    keywords: this.inglizcha
                })
                .then((response) => {
                    this.results = response.data
                })
                .catch(error => {
                     //   alert('Qandaydur xatolik')
                    }
                );
        },
        uzbekchaFunction() {
            axios.post('/api/getUz',
                {
                    keywords: this.uzbekcha
                })
                .then((response) => {
                    this.results = response.data
                })
                .catch(error => {
                      //  alert('Qandaydur xatolik')
                    }
                );
        },
        ruschaFunction() {
            axios.post('/api/getRu',
                {
                    keywords: this.ruscha
                })
                .then((response) => {
                    this.results = response.data
                })
                .catch(error => {
                       // alert('Qandaydur xatolik')
                    }
                );
        }
    }
}
</script>
<style>
.table td {
    text-align: center;
}

.verticala {
    vertical-align: middle;
}

.table-hover > tbody > tr:hover {
    background: #0d6efd;
    color: white;
}

tbody > tr > td.verticala:hover {
    background: #25b747;
}
</style>
