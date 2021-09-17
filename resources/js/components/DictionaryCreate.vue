<template>
    <form class="container" @submit.prevent="DictonarySave" method="post">
        <h1>Yangi so'z qoshish</h1>
        <hr>
        <div class="input-group mb-3">
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
                    this.results = response.data
                })
                .catch(error => {
                        alert('Qandaydur xatolik')
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
