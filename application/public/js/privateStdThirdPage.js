const app = new Vue({
    el: '#privateStdThirdPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/privateStdThirdPage/' + inst_id)
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

            for (var i = 0; i < self.data.priUnivDegreeLists.length; i++) {
                if (self.data.priUnivDegreeLists[i].degree_id == degId) {
                    return self.data.priUnivDegreeLists[i].degree_name;
                }
            }
        },
        deptName: function (deptId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.priUnivDepartmentLists.length; i++) {
                if (self.data.priUnivDepartmentLists[i].dept_id == deptId) {
                    return self.data.priUnivDepartmentLists[i].dept_name;
                }
            }
        },
        crsName: function (crsId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.priUnivCrsLists.length; i++) {
                if (self.data.priUnivCrsLists[i].course_id == crsId) {
                    return self.data.priUnivCrsLists[i].course_name;
                }
            }
        }

    }
});


