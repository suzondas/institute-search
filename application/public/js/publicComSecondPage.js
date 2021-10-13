const app = new Vue({
    el: '#publicComSecondPage',
    data() {
        return {
            data: null,
            dataLoaded: false,
            dataLoadingError: false
        }
    },
    mounted() {
        var self = this;
        axios.get(apiServer+'/publicComSecondPage/' + inst_id)
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
        }
    }
});


