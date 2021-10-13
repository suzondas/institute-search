const app = new Vue({
    el: '#privateStdFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false,
            // sumTotal: 0,
            // sumFemale: 0,
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer + '/privateStdFirstPage/' + inst_id)
            .then(function (response) {
                self.data = response.data;
                console.log(self.data)
                self.dataLoaded = true;
            })
            .catch(function (error) {
                console.log(error)
                self.dataLoadingError = true;
            });
    },
    methods: {
        // test: function (v) {
        //     console.log(v);
        // },
        // subName: function (subId) {
        //     var self = this;
        //     // console.log(self.data);return;
        //
        //     for (var i = 0; i < self.data.univSubLists.length; i++) {
        //         if (self.data.univSubLists[i].subject_id == subId) {
        //             return self.data.univSubLists[i].subject_name;
        //         }
        //     }
        // },
        // stdCount: function (event) {
        //     var value = event.target.value;
        //     this.sumTotal = this.sumTotal + parseInt(value)
        // },

    }
});


