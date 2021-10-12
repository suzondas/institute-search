const app = new Vue({
    el: '#medicalBibidho',
    data() {
        return {
            data: null,
            dataLoaded: false,
        }
    },
    mounted() {
        var self = this
        axios.get(apiServer + '/medicalBibidho/get/' + inst_id)
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
            submitData: function () {
                $(".locker").css('display', 'block');
                var dataToSend = {};
                dataToSend.instId = inst_id;
                dataToSend.multimedia_infos = this.data.multimedia_infos;
                dataToSend.community_service = this.data.community_service;
                dataToSend.institutes_facilities_others = this.data.institutes_facilities_others;
                dataToSend.institutes_libraries = this.data.institutes_libraries;
                dataToSend.summary_infos = this.data.summary_infos;
                dataToSend.summary_audit_infos = this.data.summary_audit_infos;
                dataToSend.instituteSpecialStudents = this.data.instituteSpecialStudents;
                dataToSend.medHealthFac = this.data.medHealthFac;
                dataToSend.medTransFac = this.data.medTransFac;
                dataToSend.covid_infos=this.data.covid_infos;
                // console.log(dataToSend);
                axios.post(apiServer + '/medicalBibidho/submitData', dataToSend)
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
