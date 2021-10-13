const app = new Vue({
    el: '#privateTeachFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer + '/privateTeachFirstPage/' + inst_id)
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
    }
});


