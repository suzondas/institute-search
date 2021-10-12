const app = new Vue({
    el: '#privateStdThirdPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/privateStdThirdPage/' + inst_id)
            .then(function (response) {
                self.data = response.data;
                self.dataLoaded = true;
            })
            .catch(function (error) {
                console.log(error)
                self.dataLoadingError = true;
            });
    },
    methods: {
        test: function (v) {
            console.log(v);
        },
        degName: function (degId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.priUnivDegreeLists.length; i++) {
                if (self.data.priUnivDegreeLists[i].degree_id == degId) {
                    return self.data.priUnivDegreeLists[i].degree_name;
                }
            }
        },
        deptName: function (deptId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.priUnivDepartmentLists.length; i++) {
                if (self.data.priUnivDepartmentLists[i].dept_id == deptId) {
                    return self.data.priUnivDepartmentLists[i].dept_name;
                }
            }
        },
        crsName: function (crsId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.priUnivCrsLists.length; i++) {
                if (self.data.priUnivCrsLists[i].course_id == crsId) {
                    return self.data.priUnivCrsLists[i].course_name;
                }
            }
        },
        submitData: function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.univ_degree_wise_std=this.data.univ_degree_wise_std;
            dataToSend.univ_subject_std_dtls=this.data.univ_subject_std_dtls;
            dataToSend.univ_subject_std_dtls_mas=this.data.univ_subject_std_dtls_mas;
            dataToSend.univ_crs_wise_stds=this.data.univ_crs_wise_stds;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/privateStdThirdPage/submitData', dataToSend)
                .then(
                    function (response) {
                        console.log(response);
                        alert("Student Third page data has been saved successfully");
                    },
                    function (response) {
                        console.log(response);
                        alert("Error Try again");
                    });


        }
    }
});


