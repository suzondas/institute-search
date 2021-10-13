const app = new Vue({
    el: '#profFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            errorMessage: []
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/profFirstPage/' + inst_id)
            .then(function (response) {
                self.data = response.data;
                self.dataLoaded = true;
              //  console.log(self.data);
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
        }

    }
});