const app = new Vue({
    el: '#medicalFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            errorMessage: []
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer + '/medicalFirstPage/' + inst_id)
            .then(function (response) {
                self.data = response.data;
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
    methods: {
        levelName: function (levelId) {
            var self = this;
            for (var i = 0; i < eduLevels.length; i++) {
                if (eduLevels[i].education_level_id == levelId) {
                    return eduLevels[i].education_level_bangla_name;
                }
            }
        },
        exists: function (item) {
            if (item === null || item === undefined || item === '') {
                return false;
            } else {
                return true;
            }
        },
        validate: function () {
            this.errorMessage = null;
            this.errorMessage = [];
            let self = this;
            // if(self.data.)
            if (!self.exists(self.data.institutes.institute_name_bangla)) {
                self.errorMessage.push("প্রতিষ্ঠানের বাংলা নাম প্রদান করুন।")
            }
            if (!self.exists(self.data.institutes.mobphone)) {
                self.errorMessage.push("প্রতিষ্ঠানের মোবাইল নাম্বার প্রদান করুন")
            }
            if (!self.exists(self.data.institutes.mobphone_alternate)) {
                self.errorMessage.push("প্রতিষ্ঠানের বিকল্প মোবাইল নাম্বার প্রদান করুন")
            }
        },
        submitData: function () {
            this.validate();
            if (this.errorMessage.length > 0) {
                let toastInstance = Vue.$toast.open({
                    message: 'এই পাতার Observation সম্পূর্ণ করে আবার Submit করুন!',
                    type: 'error'
                });
                window.scrollTo(0, 0);
                return;
            }
            $(".locker").css('display', 'block');
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.institutes = this.data.institutes;
            dataToSend.committees = this.data.committees;
          //  console.log(dataToSend);
            axios.post(apiServer + '/medicalFirstPage/store', dataToSend)
                .then(function (response) {
                    let toastInstance = Vue.$toast.open({message: 'Data Saved Successfully!', type: 'success'});
                    $(".locker").css('display', 'none');
                })
                .catch(function (error) {
                    console.log(error);
                    let toastInstance = Vue.$toast.open({message: 'Something went wrong!', type: 'error'});
                    $(".locker").css('display', 'none');
                });
        }
    }
});


