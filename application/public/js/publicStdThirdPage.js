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
        }
    }
});


