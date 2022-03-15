Vue.component('alert-box', {
    template: `
      <div class="alert v-on:click=caution">
      <strong>Error!</strong>
      <slot></slot>
      </div>
    `,
    methods: {
        caution: function () {
            alert("クリックされました。");
        }
    }
})

let app7 = new Vue({
    el: '#app-7'
})

