const app = new Vue({
    el: '#publicStdThirdPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/publicStdThirdPage/' + inst_id)
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

            for (var i = 0; i < self.data.univDegreeSubLists.length; i++) {
                if (self.data.univDegreeSubLists[i].degree_id == degId) {
                    return self.data.univDegreeSubLists[i].degree_name;
                }
            }
        },
        subName: function (subId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.univDegreeSubLists.length; i++) {
                if (self.data.univDegreeSubLists[i].id == subId) {
                    return self.data.univDegreeSubLists[i].subject_name;
                }
            }
        },
        submitData: function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.univ_degree_wise_std_hnrs_pass=this.data.univ_degree_wise_std_hnrs_pass;
            dataToSend.univ_degree_wise_std_hnrs_som=this.data.univ_degree_wise_std_hnrs_som;
            dataToSend.univ_degree_wise_std_hnrs_tec=this.data.univ_degree_wise_std_hnrs_tec;
            dataToSend.univ_degree_wise_std_mas=this.data.univ_degree_wise_std_mas;
            dataToSend.univ_degree_wise_std_mas_tec=this.data.univ_degree_wise_std_mas_tec;
            dataToSend.univ_degree_wise_std_phd=this.data.univ_degree_wise_std_phd;
            dataToSend.univ_degree_wise_std_diploma=this.data.univ_degree_wise_std_diploma;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/publicStdThirdPage/submitData', dataToSend)
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


