BX.ready(function () {
    $('#addDeil').on('click', function () {
        BX.SidePanel.Instance.open("custom:extranetAddItems", {
            contentCallback: function (slider) {
                return new Promise(function(resolve, reject) {
                    BX.ajax.runComponentAction('custom:extranetAddItems','start', {
                        mode:'class',
                        data: {
                            id: 2209
                        }
                    }).then(function(response) {
                        console.log(response);
                        resolve({ html: response.data.html });
                    },function(response){
                        console.log(response);
                    }

                    );
                });
            },
            animationDuration: 100,
            width: 1000
        });
    });
});