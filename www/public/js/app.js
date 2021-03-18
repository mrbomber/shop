$("#file").on('change', function () {

    //Get count of selected files
    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image-holder");
    image_holder.empty();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof (FileReader) != "undefined") {

            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image"
                    }).appendTo(image_holder);
                }

                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }

        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
});
$(function () {
    $('[type=money]').maskMoney({
        thousands: '.',
        decimal: ','
    });
    $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function () {
        $(".alert-dismissible").alert('close');
    });
    $('.deletar').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        swal({
            title: "are you sure?",
            text: "After deletion, it will not be possible to revert!",
            icon: 'warning',
            buttons: {
                cancel: true,
                confirm: {
                    text: 'Yes, Delete!',
                    value: true,
                    visible: true,
                    className: "bg-danger",
                    closeModal: true
                }
            }
        }).then(function (isConfirm) {
            if (isConfirm) {
                window.location = url;
            } else {
                swal('Action canceled ', ' Nothing has been deleted:)', 'error');
            }
        });

    });

})