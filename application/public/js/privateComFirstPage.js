/*Registering Modal for Add more for showAddForeignUnivModal*/

const app = new Vue({
    el: '#privateComFirstPage',
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
        axios.get(apiServer+'/privateComFirstPage/' + inst_id)
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
                // self.dataLoadingError = true;
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
            dataToSend.foreign_univ_institutes = this.data.foreign_univ_institutes;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/privateComFirstPage/submitData', dataToSend)
                .then(
                    function (response) {
                        console.log(response);
                        let toastInstance = Vue.$toast.open({message: 'First page Data Saved Successfully!', type: 'success'});
                        $(".locker").css('display', 'none');
                    }).catch(
                    function (err) {
                        console.log(response);
                        let toastInstance = Vue.$toast.open({message: 'Something went wrong!', type: 'error'});
                        $(".locker").css('display', 'none');
                    });
        },
        addMoreForeignUniv: function () {
            var self = this;
            var toSend = {};
            toSend.institute_id = inst_id;
            toSend.univ_name = $("#univ_name").val();
            toSend.country_name = $("#country_name").val();
            axios.post(apiServer+'/privateComFirstPage/addForeignUnivInst/', toSend)
                .then(
                    function (response) {
                        self.data.foreign_univ_institutes.push(response.data);
                        $("#univ_name").val("");
                        $("#country_name").val("");
                        self.showAddForeignUnivModal = false;
                        alert("Foreign University Added successfully");
                    },
                    function (response) {
                        alert("Error Try again");
                    });

        },
        deleteForeignUniv: function (id, index) {
            /*console.log(id)
            console.log(index);return;*/
            var self = this;
            axios.get(apiServer+'/privateComFirstPage/removeForeignUnivInst/' + id)
                .then(
                    function (response) {
                        self.data.foreign_univ_institutes.splice(index, 1)
                        alert("Foreign University removed successfully");
                    },
                    function (response) {
                        alert("Error Try again");
                    });
        }
    }
});


