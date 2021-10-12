/*Registering Modal for Add more for showAddForeignStdModal*/

const app = new Vue({
    el: '#privateStdSecondPage',
    components: {
        "modal": {
            template: "#modal-showAddForeignStdModal",
        }
    },
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false,
            showAddForeignStdModal: false,
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/privateStdSecondPage/' + inst_id)
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
        submitData: function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.univ_country_wise_stds = this.data.univ_country_wise_stds;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/privateStdSecondPage/submitData', dataToSend)
                .then(
                    function (response) {
                        console.log(response);
                        alert("Second page data has been saved successfully");
                    },
                    function (response) {
                        console.log(response);
                        alert("Error Try again");
                    });
        },
        addMoreForeignStd: function () {
            var self = this;
            var toSend = {};
            toSend.institute_id = inst_id;
            toSend.country_name = $("#country_name").val();
            toSend.scholarship_name = $("#scholarship_name").val();
            toSend.total_honors1 = $("#total_honors1").val();
            toSend.female_honors1 = $("#female_honors1").val();
            toSend.total_honors2 = $("#total_honors2").val();
            toSend.female_honors2 = $("#female_honors2").val();
            toSend.total_honors3 = $("#total_honors3").val();
            toSend.female_honors3 = $("#female_honors3").val();
            toSend.total_honors4 = $("#total_honors4").val();
            toSend.female_honors4 = $("#female_honors4").val();
            toSend.total_honors5 = $("#total_honors5").val();
            toSend.female_honors5 = $("#female_honors5").val();
            toSend.total_honors6 = $("#total_honors6").val();
            toSend.female_honors6 = $("#female_honors6").val();
            toSend.total_honors7 = $("#total_honors7").val();
            toSend.female_honors7 = $("#female_honors7").val();
            toSend.total_honors8 = $("#total_honors8").val();
            toSend.female_honors8 = $("#female_honors8").val();
            toSend.total_honors9 = $("#total_honors9").val();
            toSend.female_honors9 = $("#female_honors9").val();
            toSend.total_honors10 = $("#total_honors10").val();
            toSend.female_honors10 = $("#female_honors10").val();
            toSend.total_honors11 = $("#total_honors11").val();
            toSend.female_honors11 = $("#female_honors11").val();
            toSend.total_honors12 = $("#total_honors12").val();
            toSend.female_honors12 = $("#female_honors12").val();
            toSend.total_masters1 = $("#total_masters1").val();
            toSend.female_masters1 = $("#female_masters1").val();
            toSend.total_masters2 = $("#total_masters2").val();
            toSend.female_masters2 = $("#female_masters2").val();
            toSend.total_masters3 = $("#total_masters3").val();
            toSend.female_masters3 = $("#female_masters3").val();
            toSend.total_masters4 = $("#total_masters4").val();
            toSend.female_masters4 = $("#female_masters4").val();
            toSend.total_masters5 = $("#total_masters5").val();
            toSend.female_masters5 = $("#female_masters5").val();
            toSend.total_masters6 = $("#total_masters6").val();
            toSend.female_masters6 = $("#female_masters6").val();
            toSend.total_msc = $("#total_msc").val();
            toSend.female_msc = $("#female_msc").val();
            toSend.total_mphil = $("#total_mphil").val();
            toSend.total_phd = $("#total_phd").val();
            toSend.total_student = $("#total_student").val();
            toSend.female_student = $("#female_student").val();
            axios.post(apiServer+'/privateStdSecondPage/addForeignStd', toSend)
                .then(
                    function (response) {
                        self.data.univ_country_wise_stds.push(response.data);
                        $("#country_name").val("");
                        $("#scholarship_name").val("");
                        $("#total_honors1").val("");
                        $("#female_honors1").val("");
                        $("#total_honors2").val("");
                        $("#female_honors2").val("");
                        $("#total_honors3").val("");
                        $("#female_honors3").val("");
                        $("#total_honors4").val("");
                        $("#female_honors4").val("");
                        $("#total_honors5").val("");
                        $("#female_honors5").val("");
                        $("#total_honors6").val("");
                        $("#female_honors6").val("");
                        $("#total_honors7").val("");
                        $("#female_honors7").val("");
                        $("#total_honors8").val("");
                        $("#female_honors8").val("");
                        $("#total_honors9").val("");
                        $("#female_honors9").val("");
                        $("#total_honors10").val("");
                        $("#female_honors10").val("");
                        $("#total_honors11").val("");
                        $("#female_honors11").val("");
                        $("#total_honors12").val("");
                        $("#female_honors12").val("");
                        $("#total_masters1").val("");
                        $("#female_masters1").val("");
                        $("#total_masters2").val("");
                        $("#female_masters2").val("");
                        $("#total_masters3").val("");
                        $("#female_masters3").val("");
                        $("#total_masters4").val("");
                        $("#female_masters4").val("");
                        $("#total_masters5").val("");
                        $("#female_masters5").val("");
                        $("#total_masters6").val("");
                        $("#female_masters6").val("");
                        $("#total_msc").val("");
                        $("#female_msc").val("");
                        $("#total_mphil").val("");
                        $("#total_phd").val("");
                        $("#total_student").val("");
                        $("#female_student").val("");
                        self.showAddForeignStdModal = false;
                        alert("Foreign Student Added successfully");
                    },
                    function (response) {
                        alert("Error Try again");
                    });

        },
        deleteForeignStd: function (id, index) {
            /*console.log(id)
            console.log(index);return;*/
            var self = this;
            axios.get(apiServer+'/privateStdSecondPage/removeForeignStd/' + id)
                .then(
                    function (response) {
                        self.data.univ_country_wise_stds.splice(index, 1)
                        alert("Foreign Student removed successfully");
                    },
                    function (response) {
                        alert("Error Try again");
                    });
        }
    }
});


