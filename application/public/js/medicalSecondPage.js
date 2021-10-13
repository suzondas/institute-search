const app = new Vue({
    el: '#medicalSecondPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
        }
    },
    mounted() {
        var self = this
        axios.get(apiServer + '/medicalSecondPage/' + inst_id + '/' + inst_type)
            .then(function (response) {
                self.data = response.data
                self.dataLoaded = true;
                console.log(self.data);
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
