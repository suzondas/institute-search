const app = new Vue({
        el: '#teacherStaffInfo',
        components: {
            teacherModal: {
                template: '#teacher-modal',
                props: [ 'data', 'subjects', 'designations', 'trainings', 'training-array']
            }
        },
        data() {
            return {
                data: null,
                dataLoaded: false,
                addedTeacherY: false,
                selectedTeacherIdx: null,
                trainingArray: [],
                selectedTeacherData: {},
                subjects: subjects,
                designations: designations,
                trainings: trainings,
                newTeacher: false,
                errorMessage: []
            }
        },
        mounted() {
            var self = this
            axios.get(apiServer + '/TeacherStaff/getAll/' + inst_id)
                .then(function (response) {
                    self.data = response.data;
                    self.dataLoaded = true;
                })
                .catch(function (error) {
                    let toastInstance = Vue.$toast.open({
                        message: 'Something went wrong! Contact BANBEIS Technical Team',
                        type: 'error'
                    });
                });
        },
        methods:
            {
                changeDateFormat: function (item) {
                    try {
                        let dArr = item.split("-");  // ex input "2010-01-18"
                        return dArr[2] + "/" + dArr[1] + "/" + dArr[0]; //ex out: "18/01/10"
                    } catch (e) {
                        return "Date of Birth not given";
                    }
                },
                getSubject: function (id) {
                    let subject = subjects[subjects.map(function (item) {
                        return item.subject_id;
                    }).indexOf(id)];
                    if (subject !== undefined) {
                        return subject.subject_name_eng;
                    } else {
                        return '';
                    }
                },
                getDesignation: function (id) {
                    let designation = designations[designations.map(function (item) {
                        return item.designation_id;
                    }).indexOf(id)];
                    if (designation !== undefined) {
                        return designation.designation_name;
                    } else {
                        return '';
                    }
                },

                showDetail: function (index) {
                    $(".locker").css('display', 'block');
                    var self = this;
                    self.newTeacher = false;
                    //copying data of before update
                    self.selectedTeacherIdx = index;

                    axios.get(apiServer + '/TeacherStaff/getTeacher/' + self.data[index].id).then(function (response) {
                        //working with training info array [db data returns string, we have to convert it into array
                        let trainingInfo = response.data.training_info;
                        if (trainingInfo === null) {//checking if data found in db is null
                            self.trainingArray = []; //then setting it new
                        } else {
                            //try valid parsing of existing array string
                            try {
                                let parsedTrainingInfo = JSON.parse(trainingInfo);
                                self.trainingArray = parsedTrainingInfo;
                            } catch (e) {
                                self.trainingArray = [];
                            }
                        }
                        self.selectedTeacherData = response.data;
                        $(".locker").css('display', 'none');
                        let element = self.$refs.modal.$el
                        $(element).modal('show');
                    }).catch(function (error) {
                        let toastInstance = Vue.$toast.open({message: 'Something went wrong!', type: 'error'});
                        $(".locker").css('display', 'none');
                    });
                },
                cancelUpdate: function () {
                    var self = this;
                    //set back to original data of selected teacher as user cancelled the update
                    let element = self.$refs.modal.$el
                    $(element).modal('hide');
                },
                exists: function (item) {
                    if (item === null || item === undefined || item === '') {
                        return false;
                    } else {
                        return true;
                    }
                },
                validate: function () {
                    let self = this;
                    self.errorMessage = null;
                    self.errorMessage = [];
                    for (var i = 0; i < self.data.length; i++) {
                        let data = self.data[i];
                        let flag = false;
                        if (!self.exists(data.teach_name) ||
                            !self.exists(data.desig_id) ||
                            !self.exists(data.dob) ||
                            !self.exists(data.nid) ||
                            !self.exists(data.mobile_number) ||
                            !self.exists(data.is_inactive)
                        // || !self.exists(data.salary_eft)
                        ) {
                            flag = true;
                        }
                        if (flag) {
                            self.errorMessage.push("ক্রমিক নং " + (i + 1) + " এর সকল তথ্য প্রদান করুন।")
                        }
                    }
                }
            }

    })
;
