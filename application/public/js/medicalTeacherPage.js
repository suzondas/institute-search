const app = new Vue({
    el: '#medicalTeacherPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
        }
    },
    mounted() {
        var self = this
        axios.get(apiServer + '/medicalTeachInfo/' + inst_id)
            .then(function (response) {
                self.data = response.data
                self.dataLoaded = true;
                console.log(response.data);
            })
            .catch(function (error) {
                let toastInstance = Vue.$toast.open({
                    message: 'Something went wrong! Contact BANBEIS Technical Team',
                    type: 'error'
                });
            });
    },
    methods:
        {

        }

});
