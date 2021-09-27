<template>
    <div class="container">
        <form @submit.prevent="DictonarySave" method="post" v-if="success === false">
            <h1>Yangi so'z qoshish</h1>
            <hr>
            <div class="alert alert-info" role="alert">
                So'zlar admin tasdiqlangandan so'ng chop etiladi. Juda ko'p xato so'zlarni kiritish bloklanishingizga sabab bo'lishi mumkun
            </div>
            <div class="input-group mb-3" v-for="(input,k) in inputs" :key="k">
                <div class="form-floating col">
                    <input type="text" class="form-control" placeholder="Inglizchaa" autofocus v-model="input.inglizcha">
                    <label for="ofam">Inglizcha so'z</label>
                </div>
                <div class="form-floating col">
                    <input type="text" class="form-control" placeholder="O'zbekcha" v-model="input.uzbekcha">
                    <label for="ofam">O'zbekcha so'z</label>
                </div>
                <div class="form-floating col">
                    <input type="text" class="form-control" placeholder="Ruscha" v-model="input.ruscha">
                    <label for="ofam">Ruscha so'z</label>
                </div>
                <div class="form-floating col-1">
                <span>
                      <i class="fas fa-minus-circle" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">
                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="-66 0 512 512" width="50px">
                <g id="surface1">
                <path d="M 178.84375 288.277344 L 173.949219 288.277344 L 173.949219 431.652344 L 203.957031 431.652344 L 203.957031 288.277344 Z M 178.84375 288.277344 "
                      style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"/>
                <path d="M 228.542969 431.652344 L 258.632812 431.652344 L 269.335938 288.277344 L 239.238281 288.277344 Z M 228.542969 431.652344 "
                      style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"/>
                <path d="M 108.574219 288.277344 L 119.269531 431.652344 L 149.363281 431.652344 L 138.664062 288.277344 Z M 108.574219 288.277344 "
                      style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"/>
                <path
                    d="M 268.851562 209.027344 L 359.792969 118.089844 L 241.707031 0 L 66.136719 175.570312 L 99.59375 209.027344 L 0 209.027344 L 0 239.035156 L 35.21875 239.035156 L 72.667969 512 L 305.242188 512 L 342.691406 239.035156 L 380.5 239.035156 L 380.5 209.027344 Z M 98.832031 481.992188 L 65.496094 239.035156 L 312.402344 239.035156 L 279.066406 481.992188 Z M 221.59375 62.554688 L 211.570312 145.433594 L 128.691406 155.457031 Z M 119.765625 186.761719 L 238.535156 172.398438 L 252.898438 53.632812 L 317.355469 118.089844 L 226.414062 209.027344 L 142.035156 209.027344 Z M 119.765625 186.761719 "
                    style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"/>
                </g>
                </svg>
                      </i>
                      <i class="fas fa-plus-circle" @click="add(k)" v-show="k == inputs.length-1">
                          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                               width="50px" height="50px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
	<g id="_x31__26_">
			<path d="M420.75,286.875h-95.625V191.25c0-10.557-8.568-19.125-19.125-19.125c-10.557,0-19.125,8.568-19.125,19.125v95.625
				H191.25c-10.557,0-19.125,8.568-19.125,19.125c0,10.557,8.568,19.125,19.125,19.125h95.625v95.625
				c0,10.557,8.568,19.125,19.125,19.125c10.557,0,19.125-8.568,19.125-19.125v-95.625h95.625c10.557,0,19.125-8.568,19.125-19.125
				C439.875,295.443,431.307,286.875,420.75,286.875z M535.5,0h-459C34.253,0,0,34.253,0,76.5v459C0,577.747,34.253,612,76.5,612
				h459c42.247,0,76.5-34.253,76.5-76.5v-459C612,34.253,577.747,0,535.5,0z M573.75,535.5c0,21.133-17.136,38.25-38.25,38.25h-459
				c-21.133,0-38.25-17.117-38.25-38.25v-459c0-21.133,17.117-38.25,38.25-38.25h459c21.114,0,38.25,17.136,38.25,38.25V535.5z"/>
		</g>
</svg>
                      </i>
                </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">
                Saqlash
            </button>
            <a href="../" class="btn btn-secondary btn-block">
                Orqaga
            </a>
        </form>
        <div v-if="success === true">
            <h3 class="alert alert-success">So'zlar bazaga qo'shildi admin tekshiruvidan so'ng saytda chop e'tiladi va kerakli ballarni sizga taqdim etadi!.
                Saytga yordam berganingiz uchun tashakkur!</h3>
            <a href="../" class="btn btn-secondary btn-block">
                Bosh sahifaga
            </a>
            <a href="?" class="btn btn-primary btn-block">
                Yana qo'shish
            </a>
        </div>
    </div>

</template>
<script>
export default {
    data() {
        return {
            inputs: [{
                inglizcha: '',
                uzbekcha: '',
                ruscha: '',
            }],
            inputNumbers: [
                {
                    eng: "",
                    uz: "",
                    ru: "",
                }
            ],
            success: false,
            results: []
        };
    },
    methods: {
        DictonarySave() {
            axios.post('/dictionary/save',
                {
                    lauanges: this.inputs
                })
                .then((response) => {
                    this.success = true
                })
                .catch(error => {
                        alert('Qandaydur xatolik')
                    }
                );
        },
        add() {
            this.inputs.push({
                inglizcha: '',
                uzbekcha: '',
                ruscha: '',
            })
        },
        remove(index) {
            this.inputs.splice(index, 1)
        },
    }
}
</script>
