const app = new Vue({
    el: '#engComSecondPage',
    data() {
        return {
            data:null,
            dataLoaded:false,
            dataLoadingError:false
        }
    },
    mounted() {
        var self=this
        axios.get(apiServer+'/engComSecondPage/'+inst_id)
            .then(function (response) {
                self.data=response.data
                self.dataLoaded = true;

            })
            .catch(function (error) {
                console.log(error)
                self.dataLoadingError = true;
            });
    },
    methods:
        {
            addBuildingDetails(){
                this.data.building_details.push(
                    {
                        "id": '',
                        "institute_id": null,
                        "year": null,
                        "building_name": null,
                        "foundation_floor": null,
                        "build_floor": null,
                        "build_year": null,
                        "upper_increase_yn": null,
                        "created_at": null,
                        "updated_at": null
                    }
                )
            },
            className: function (classId) {
                var self = this;
                // console.log(self.data);return;

                for (var i = 0; i < self.data.classes.length; i++) {
                    if (self.data.classes[i].class_id == classId) {
                        return self.data.classes[i].class_name_bangla;
                    }
                }
            },
            submitData: function () {
                var dataToSend = {};
                dataToSend.instId = inst_id;
                dataToSend.institutes_land_usage=this.data.institutes_land_usage;
                dataToSend.building_infos=this.data.building_infos;
                dataToSend.building_numbers=this.data.building_numbers;
                dataToSend.building_use=this.data.building_use;
                dataToSend.building_details=this.data.building_details;
                dataToSend.classwise_room_space=this.data.classwise_room_space;
                dataToSend.classes=this.data.classes;

                console.log(dataToSend);
                axios.post(apiServer+'/engComSecondPage/submitData', dataToSend)
                    .then(
                        function (response) {
                            console.log(response);
                            alert("Second page data has been saved successfully");
                        },
                        function (response) {
                            console.log(response);
                            alert("Error Try again");
                        });


            }
        }

});
