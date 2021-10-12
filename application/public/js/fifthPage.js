const app = new Vue({
    el: '#fifthPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer + '/common/fifthPage/get/' + inst_id)
            .then(function (response) {
                self.data = response.data
                self.dataLoaded = true;
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
