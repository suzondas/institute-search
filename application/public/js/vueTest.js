new Vue({
    el: '#vueTest',
    components: {
        teacherModal: {template: '#example-modal', props: ['test']}
    },
    data() {
        return {mad: {name:'Kader'}}
    },
    methods: {
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        }
    }
})
