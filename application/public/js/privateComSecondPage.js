const app = new Vue({
    el: '#privateComSecondPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/privateComSecondPage/' + inst_id)
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
        roomName: function (roomId) {
            var self = this;
            // console.log(self.data);return;

            for (var i = 0; i < self.data.pubRoomLists.length; i++) {
                if (self.data.pubRoomLists[i].room_id == roomId) {
                    return self.data.pubRoomLists[i].name_bn;
                }
            }
        },
        submitData: function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.institutes_land_usage=this.data.institutes_land_usage;
            dataToSend.univ_building_dtls_own=this.data.univ_building_dtls_own;
            dataToSend.univ_building_dtls_rent=this.data.univ_building_dtls_rent;
            dataToSend.institutes_libraries=this.data.institutes_libraries;
            console.log(dataToSend);
            // return;
            axios.post(apiServer+'/privateComSecondPage/submitData', dataToSend)
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


