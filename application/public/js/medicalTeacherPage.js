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
            submitData: function () {
                $(".locker").css('display', 'block');
                var dataToSend = {};
                dataToSend.instId = inst_id;
               // dataToSend.multimedia_infos = this.data.multimedia_infos;
                // console.log(dataToSend);
                axios.post(apiServer + '/medicalTeachInfo/submitData', dataToSend)
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
