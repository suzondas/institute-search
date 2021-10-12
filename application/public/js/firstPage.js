const app = new Vue({
    el: '#firstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            errorMessage: []
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer + '/common/firstPage/get/' + inst_id)
            .then(function (response) {
                console.log(response.data)
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
        levelName: function (levelId) {
            var self = this;
            for (var i = 0; i < eduLevels.length; i++) {
                if (eduLevels[i].education_level_id == levelId) {
                    return eduLevels[i].education_level_bangla_name;
                }
            }
        },
        levelMpo: function (mpoId) {
            var self = this;

            for (var j = 0; j < eduLevels.length; j++) {
                if (eduLevels[j].education_level_id == mpoId) {
                    return eduLevels[j].education_level_bangla_name;
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


