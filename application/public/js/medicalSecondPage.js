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
            submitData: function () {
                $(".locker").css('display', 'block');
                var dataToSend = {};
                dataToSend.instId = inst_id;
                dataToSend.institutes_land_usage = this.data.institutes_land_usage;
                dataToSend.building_infos = this.data.building_infos;
                dataToSend.building_numbers = this.data.building_numbers;
                dataToSend.building_use = this.data.building_use;

                axios.post(apiServer + '/medicalSecondPage/submitData', dataToSend)
                    .then(function (response) {
                        let toastInstance = Vue.$toast.open({message: 'Data Saved Successfully!', type: 'success'});
                        $(".locker").css('display', 'none');
                    })
                    .catch(function (error) {
                        let toastInstance = Vue.$toast.open({message: 'Something went wrong!', type: 'error'});
                        $(".locker").css('display', 'none');
                    });
            }
        }

});
