const app = new Vue({
    el: '#publicStdFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false,
            $pubSumTotal:0,
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer + '/publicStdFirstPage/' + inst_id)
            .then(function (response) {
                self.data = response.data;
                // console.log(self.data);return;
                self.dataLoaded = true;
            })
            .catch(function (error) {
                console.log(error)
                self.dataLoadingError = true;
            });
    },
    methods: {
        // subName: function (subId) {
        //     var self = this;
        //     // console.log(self.data);return;
        //     let sizeOfSubjectList = self.subjectList.length;
        //     for (var i = 0; i < sizeOfSubjectList; i++) {
        //         let item = self.subjectList[i];
        //         if (item.subject_id == subId) {
        //             return item.subject_name;
        //         }
        //     }
        // }

}
});


