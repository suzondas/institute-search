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

    }
});


