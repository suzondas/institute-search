/*Registering Modal for Add more for showAddForeignUnivModal*/

const app = new Vue({
    el: '#publicComFirstPage',
    components: {
        "modal": {
            template: "#modal-showAddForeignUnivModal",
        }
    },
    data() {
        return {
            data: null,
            dataLoaded: false,
            //dataLoadingError: false,
            showAddForeignUnivModal: false,
            dataLoaded: false,
            errorMessage: []
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/publicComFirstPage/' + inst_id)
            .then(function (response) {
                self.data = response.data;
                self.dataLoaded = true;
            })
            .catch(function (error) {
                console.log(error)
                let toastInstance = Vue.$toast.open({
                    message: 'Something went wrong! Contact BANBEIS Technical Team',
                    type: 'error'
                });
                //self.dataLoadingError = true;
            });
    },
    methods: {

        test: function (v) {
            console.log(v);
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


