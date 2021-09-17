<template>
    <form class="container" @submit.prevent="CategorySave" method="post">
        <h1>Bo'lim nomi</h1>
        <hr>
        <div class="input-group mb-3">
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="Inglizchaa" autofocus v-model="inglizcha">
                <label for="ofam">Inglizcha nomi</label>
            </div>
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="O'zbekcha" v-model="uzbekcha">
                <label for="ofam">O'zbekcha nomi</label>
            </div>
            <div class="form-floating col">
                <input type="text" class="form-control" placeholder="Ruscha" v-model="ruscha">
                <label for="ofam">Ruscha nomi</label>
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
        CategorySave() {
            axios.post('/api/category/save',
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
        }
    }
}
</script>
