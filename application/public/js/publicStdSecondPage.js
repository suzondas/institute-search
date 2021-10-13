/*Registering Modal for Add more for showAddForeignStdModal*/

const app = new Vue({
    el: '#publicStdSecondPage',
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
        axios.get(apiServer+'/publicStdSecondPage/' + inst_id)
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
    }
});


