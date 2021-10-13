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
            }
        }

});
