const app = new Vue({
    el: '#publicBibidho',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/publicBibidho/' + inst_id)
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
            dataToSend.institutes_researchs=this.data.institutes_researchs;
            dataToSend.institutes_expenses=this.data.institutes_expenses;
            dataToSend.institutes_incomes=this.data.institutes_incomes;
            dataToSend.covid_infos=this.data.covid_infos;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/publicBibidho/submitData', dataToSend)
                .then(
                    function (response) {
                        console.log(response);
                        alert("Bibidho page data has been saved successfully");
                    },
                    function (response) {
                        console.log(response);
                        alert("Error Try again");
                    });


        }
    }
});


