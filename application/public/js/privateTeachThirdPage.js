const app = new Vue({
    el: '#privateTeachThirdPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/privateTeachThirdPage/' + inst_id)
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
        }

    }
});


