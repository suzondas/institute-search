/*Registering Modal for Add more for showAddReshTeachModal*/

const app = new Vue({
    el: '#privateTeachSecondPage',
    components: {
        "modal": {
            template: "#modal-showAddReshTeachModal",
        }
    },
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false,
            showAddReshTeachModal: false,
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/privateTeachSecondPage/' + inst_id)
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
            dataToSend.univ_resh_wise_teachers = this.data.univ_resh_wise_teachers;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/privateTeachSecondPage/submitData', dataToSend)
                .then(
                    function (response) {
                        console.log(response);
                        alert("Teacher Second page data has been saved successfully");
                    },
                    function (response) {
                        console.log(response);
                        alert("Error Try again");
                    });
        },
        addMoreReshTeach: function () {
            var self = this;
            var toSend = {};
            toSend.institute_id = inst_id;
            toSend.faculty_name = $("#faculty_name").val();
            toSend.dept_name = $("#dept_name").val();
            toSend.resh_degis_id = $("#resh_degis_id").val();
            toSend.total_full = $("#total_full").val();
            toSend.female_full = $("#female_full").val();
            toSend.funding_full_id = $("#funding_full_id").val();
            toSend.total_part = $("#total_part").val();
            toSend.female_part = $("#female_part").val();
            toSend.funding_part_id = $("#funding_part_id").val();
            toSend.total_forigne = $("#total_forigne").val();
            toSend.female_forigne = $("#female_forigne").val();
            axios.post(apiServer+'/privateTeachSecondPage/addReshTeacher', toSend)
                .then(
                    function (response) {
                        self.data.univ_resh_wise_teachers.push(response.data);
                        $("#faculty_name").val("");
                        $("#dept_name").val("");
                        $("#resh_degis_id").val("");
                        $("#total_full").val("");
                        $("#female_full").val("");
                        $("#funding_full_id").val("");
                        $("#total_part").val("");
                        $("#female_part").val("");
                        $("#funding_part_id").val("");
                        $("#total_forigne").val("");
                        $("#female_forigne").val("");
                        self.showAddReshTeachModal = false;
                        alert("Research Teacher Added successfully");
                    },
                    function (response) {
                        alert("Error Try again");
                    });

        },
        deleteReshTeach: function (id, index) {
            /*console.log(id)
            console.log(index);return;*/
            var self = this;
            axios.get(apiServer+'/privateTeachSecondPage/removeReshTeacher/' + id)
                .then(
                    function (response) {
                        self.data.univ_resh_wise_teachers.splice(index, 1)
                        alert("Research Teacher removed successfully");
                    },
                    function (response) {
                        alert("Error Try again");
                    });
        }
    }
});


