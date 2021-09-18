<template>
    <form class="container" @submit.prevent="DictonarySave" method="post">
        <h1>Yangi so'z qoshish</h1>
        <hr>
        <div class="input-group mb-3"
             v-for="(input, index) in inputNumbers"
             :key="`phoneInput-${index}`">
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="Inglizchaa" autofocus v-model="inglizcha">
                <label for="ofam">Inglizcha so'z</label>
            </div>
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="O'zbekcha" v-model="uzbekcha">
                <label for="ofam">O'zbekcha so'z</label>
            </div>
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="Ruscha" v-model="ruscha">
                <label for="ofam">Ruscha so'z</label>
            </div>
            <div class="form-floating col-2">
                <div class="row">
                    <button style=" text-align: center; margin: auto; padding: initial; "
                            class="col-6btn btn-primary btn-lg "
                            @click="addField(input, inputNumbers)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path fill="green" d="M11 11V7h2v4h4v2h-4v4h-2v-4H7v-2h4zm1 11C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
                        </svg>
                    </button>
                    <button style=" text-align: center; margin: auto; padding: initial; "
                            class="col-6  btn btn-primary btn-lg "
                            v-show="inputNumbers.length > 1"
                            @click="removeField(index, inputNumbers)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path fill="#EC4899"
                                  d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-9.414l2.828-2.829 1.415 1.415L13.414 12l2.829 2.828-1.415 1.415L12 13.414l-2.828 2.829-1.415-1.415L10.586 12 7.757 9.172l1.415-1.415L12 10.586z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">
            Saqlash
        </button>
    </form>
</template>
<script>
export default {
    data() {
        return {
            inglizcha: null,
            uzbekcha: null,
            ruscha: null,
            inputNumbers: [
                {
                    eng: "",
                    uz: "",
                    ru: "",
                }
            ],
            results: []
        };
    },
    methods: {
        DictonarySave() {
            axios.post('/api/dictonary/save',
                {
                    eng: this.inglizcha,
                    uz: this.uzbekcha,
                    ru: this.ruscha
                })
                .then((response) => {
                    this.inglizcha = ''
                    this.uzbekcha = ''
                    this.ruscha = ''
                })
                .catch(error => {
                        alert('Qandaydur xatolik')
                    }
                );
        },
        addField(value, fieldType) {
            fieldType.push({value: ""});
        },
        removeField(index, fieldType) {
            type.splice(index, 1);
        },
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
