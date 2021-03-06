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
                this.errorMessage.push("???.??? ?????? ?????????????????? ????????? ?????????????????? 0 ????????? ???????????? ?????????")
            }
            if(this.female_teachers_in_service>this.teachers_in_service){
                this.errorMessage.push("???.??? ?????? ?????????????????? ??????????????? ?????????????????? ???????????? ?????????????????? ????????? ?????????????????? ?????? ????????? ???????????? ?????????")
            }
        }
    }
});
