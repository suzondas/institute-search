const app = new Vue({
    el: '#publicTeachThirdPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/publicTeachThirdPage/' + inst_id)
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
        designationName: function (desId) {
            var self = this;
             //console.log(self.data);return;

            for (var i = 0; i < self.data.univDesigAll.length; i++) {
                if (self.data.univDesigAll[i].designation_id == desId) {
                    return self.data.univDesigAll[i].designation_name;
                }
            }
        },
        submitData: function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.univ_desig_wise_teachers=this.data.univ_desig_wise_teachers;
            dataToSend.univ_rsdnt_ws_teachers=this.data.univ_rsdnt_ws_teachers;
            dataToSend.univ_teachers_staff_summaries=this.data.univ_teachers_staff_summaries;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/publicTeachThirdPage/submitData', dataToSend)
                .then(
                    function (response) {
                        console.log(response);
                        alert("Teacher Third page data has been saved successfully");
                    },
                    function (response) {
                        console.log(response);
                        alert("Error Try again");
                    });


        }
    }
});


