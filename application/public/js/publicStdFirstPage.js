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
        // },
        submitData: function () {
            var ele = document.getElementsByClassName('locker');
            for (var i = 0; i < ele.length; i++) {
                ele[i].style.display = "block";
            }
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.univ_students_summaries = this.data.univ_students_summaries;
            console.log(dataToSend);
            // return;
            axios.post(apiServer + '/publicStdFirstPage/submitData', dataToSend)
                .then(
                    function (response) {
                        var ele = document.getElementsByClassName('locker');
                        for (var i = 0; i < ele.length; i++) {
                            ele[i].style.display = "none";
                        }
                        alert("শিক্ষার্থীর তথ্য-১ এর তথ্য সঠিকভাবে সংরক্ষিত হয়েছে");
                    }).catch(
                function (err) {
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                    console.log(err.response.data)
                    alert("Error: " + err.response.data);
                });


        }
    }
});


