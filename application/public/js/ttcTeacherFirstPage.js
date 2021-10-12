const app = new Vue({
    el: '#ttcTeacherFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            errorMessage: [],
            teachers_in_service: 0,
            female_teachers_in_service: 0,

        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer + '/ttcTeacherFirstPage/' + inst_id)
            .then(function (response) {
                console.log(response.data)
                self.data = response.data;
                self.dataLoaded = true;
                self.totalTeacherStaffGeneral();
            })
            .catch(function (error) {
                let toastInstance = Vue.$toast.open({
                    message: 'Something went wrong! Contact BANBEIS Technical Team',
                    type: 'error'
                });
            });
    },
    methods: {
        /*counting total of totalTeacherStaffGeneral*/
        totalTeacherStaffGeneral: function () {
            var self = this;
            self.teachers_in_service = 0;
            self.female_teachers_in_service = 0;
            let data = self.data.teachStafSum;
            for (var i = 0; i < data.length; i++) {
                if (!isNaN(parseInt(data[i].teachers_in_service))) {
                    try {
                        self.teachers_in_service += parseInt(data[i].teachers_in_service);
                    } catch (e) {/**/
                    }
                }
                if (!isNaN(parseInt(data[i].female_teachers_in_service))) {
                    try {
                        self.female_teachers_in_service += parseInt(data[i].female_teachers_in_service);
                    } catch (e) {/**/
                    }
                }
            }
        },
        /*counting total of totalTeacherStaffGeneral*/

        /*desigName finding*/
        desigName: function (id) {
            var desigList = this.data.desigList;
            var designationtName = null;
            desigList.forEach(function (currentValue, index, arr) {
                if (currentValue.designation_id == id) {
                    return designationtName = currentValue.designation_name_bn;
                }
            });
            return designationtName;
        },
        /*desigName finding*/

        /*qualiName finding*/
        qualiName: function (id) {
            var qualiList = this.data.qualiList;
            var qualificationName = null;
            qualiList.forEach(function (currentValue, index, arr) {
                if (currentValue.id == id) {
                    return qualificationName = currentValue.name_bn;
                }
            });
            return qualificationName;
        },
        /*qualiName finding*/

        /*hdName finding*/
        hdName: function (id) {
            var hdList = this.data.hdList;
            var hdTrName = null;
            hdList.forEach(function (currentValue, index, arr) {
                if (currentValue.higher_degree_id == id) {
                    return hdTrName = currentValue.bn_name;
                }
            });
            return hdTrName;
        },
        /*hdName finding*/

        /*hdTrName finding*/
        hdTrName: function (id) {
            var hdTrList = this.data.hdTrList;
            var hdTrEdName = null;
            hdTrList.forEach(function (currentValue, index, arr) {
                if (currentValue.higher_degree_id == id) {
                    return hdTrEdName = currentValue.bn_name;
                }
            });
            return hdTrEdName;
        },
        /*hdTrName finding*/
        inputValidator: function (item) {
            if (item > this.$refs.tezt.maxlength) {
                return 'ng-invalid';
            }
        },
        validate:function(){
            this.errorMessage=null;
            this.errorMessage=[];
            if(this.teachers_in_service ===0){
                this.errorMessage.push("২.৪ এর কর্মরত মোট সংখ্যা 0 হতে পারে না।")
            }
            if(this.female_teachers_in_service>this.teachers_in_service){
                this.errorMessage.push("২.৪ এর কর্মরত মহিলা সংখ্যা থেকে কর্মরত মোট সংখ্যা কম হতে পারে না।")
            }
        },

        /*==========================Data Saving=======================================*/

        submitData: function () {
            var self = this;
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
            dataToSend.teachStafSum = self.data.teachStafSum;
            dataToSend.teachQualiSum = self.data.teachQualiSum;
            dataToSend.hdTeachSum = self.data.hdTeachSum;
            dataToSend.hdTrnSum = self.data.hdTrnSum;
            dataToSend.teacherTrainInfo = self.data.teacherTrainInfo;
            dataToSend.teacherRetAwInfo = self.data.teacherRetAwInfo;
            console.log(dataToSend);
            axios.post(apiServer + '/ttcTeacherFirstPage/submitData', dataToSend)
                .then(
                    function (response) {
                        let toastInstance = Vue.$toast.open({message: 'Data Saved Successfully!', type: 'success'});
                        $(".locker").css('display', 'none');
                    }).catch(function (response) {
                    let toastInstance = Vue.$toast.open({
                        message: 'Something went wrong! Contact BANBEIS Technical Team',
                        type: 'error'
                    });
                    $(".locker").css('display', 'none');
                }
            );
        }
        /*==========================Data Saving END=======================================*/
    }
});
