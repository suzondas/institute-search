const app = new Vue({
    el: '#tecFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            //dataLoadingError: false,
            errorMessage: []
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/tecFirstPage/' + inst_id)
            .then(function (response) {
                self.data = response.data;
                self.dataLoaded = true;
            })
            .catch(function (error) {
                let toastInstance = Vue.$toast.open({
                    message: 'Something went wrong! Contact BANBEIS Technical Team',
                    type: 'error'
                });
            });
    },
    methods: {
        test: function (v) {
            console.log(v);
        },
        levelName: function (levelId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.eduLevel.length; i++) {
                if (self.data.eduLevel[i].education_level_id == levelId) {
                    return self.data.eduLevel[i].education_level_bangla_name;
                }
            }
        },
        levelMpo: function (mpoId) {
            var self = this;

            for (var j = 0; j < self.data.eduLevel.length; j++) {
                if (self.data.eduLevel[j].education_level_id == mpoId) {
                    return self.data.eduLevel[j].education_level_bangla_name;
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
            dataToSend.institutes=this.data.institutes;
            dataToSend.institutes_recognition=this.data.institutes_recognition;
            dataToSend.instCurriculums=this.data.instCurriculums;
            dataToSend.committees=this.data.committees;
            dataToSend.institutes_mpo_status=this.data.institutes_mpo_status;
           console.log(dataToSend);
           // return;
            axios.post(apiServer+'/tecFirstPage/submitData', dataToSend)
                .then(
                    function (response) {
                        console.log(response);
                        let toastInstance = Vue.$toast.open({message: 'First page Data Saved Successfully!', type: 'success'});
                        $(".locker").css('display', 'none');
                    }).catch(
                function (response) {
                    console.log(response);
                    let toastInstance = Vue.$toast.open({message: 'Something went wrong!', type: 'error'});
                    $(".locker").css('display', 'none');
                });

        }
    }
});


