const app = new Vue({
    el: '#publicTeachFirstPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/publicTeachFirstPage/' + inst_id)
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
        submitData: function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.univ_dpt_teachers=this.data.univ_dpt_teachers;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/publicTeachFirstPage/submitData', dataToSend)
                .then(function (response) {
                    console.log(response);
                    alert("Teacher First page data has been saved successfully");
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                })
                .catch(function (err) {
                    console.log(err.response.data);
                    alert("Err: "+err.response.data);
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                });

        }
    }
});


