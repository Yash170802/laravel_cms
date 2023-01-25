$(document).ready(function () {
    $("#formlogo").validate({
        rules: {
            file: {
                required: function (element) {
                    var valu = $("#logo_img").val();
                    console.log(valu);
                    if (valu == "") {
                        return true;
                    } else {
                        return false;
                    }
                },
            },
        },
        messages: {
            file: {
                required: "Please enter images",
            },
        },
        submitHandler: function (form) {
            var data = new FormData(form);
            console.log(data);
            $.ajax({
                url: form.action,
                type: form.method,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function (data) {
                    if ((data.status = 1)) {
                        Swal.fire({
                            title: data.massage,
                            text: "You clicked the button!",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                            buttonsStyling: false,
                        });
                        $("#formlogo")[0].reset();
                        $(".header_logo").load(location.href + " .header_logo");
                        // $("#img_name").attr("src", "");
                        load.ajax.reload();
                    }
                },
            });
        },
    });

    // Add favicon Insert................................................
    $("#formfavicon").validate({
        rules: {
            file: {
                required: function (element) {
                    var valu = $("#favicon_img").val();
                    console.log(valu);
                    if (valu == "") {
                        return true;
                    } else {
                        return false;
                    }
                },
            },
        },
        messages: {
            file: {
                required: "Please enter images",
            },
        },
        submitHandler: function (form) {
            var data = new FormData(form);
            console.log(data);
            $.ajax({
                url: form.action,
                type: form.method,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function (data) {
                    if ((data.status = 1)) {
                        Swal.fire({
                            title: data.massage,
                            text: "You clicked the button!",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                            buttonsStyling: false,
                        });
                        $("#formfavicon")[0].reset();
                        $(".favicon_logo").load(location.href + " .favicon_logo");
                        // $("#img_name").attr("src", "");
                        load.ajax.reload();
                    }
                },
            });
        },
    });

    // Topbar Insert.....................................................................................
    $("#formtopbar").validate({
        rules: {
            email: {
                required: true,
            },
            number: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter Email",
            },
            number: {
                required: "Please enter Number",
            },
        },
        submitHandler: function (form) {
            var data = new FormData(form);
            // var token = $("meta[name='csrf-token']").attr("content");
            console.log(data);
            $.ajax({
                url: form.action,
                type: form.method,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function (data) {
                    if ((data.status = 1)) {
                        Swal.fire({
                            title: data.massage,
                            text: "You clicked the button!",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                            buttonsStyling: false,
                        });
                        $("#formtopbar")[0].reset();
                        // $(".topbardata").load("topbardata");
                        $(".topbardata").load(location.href + " .topbardata");

                        $("#formtopbar").reload();
                    }
                },
            });
        },
    });
    //  Email Insert.....................................................................................
    $("#formsendmail").validate({
        rules: {
            send_email: {
                required: true,
                required: email,
            },
            receive_email: {
                required: true,
                required: email,
            },
        },
        messages: {
            send_email: {
                required: "Please enter Email",
            },
            receive_email: {
                required: "Please enter Number",
            },
        },
        submitHandler: function (form) {
            var data = new FormData(form);
            // var token = $("meta[name='csrf-token']").attr("content");
            console.log(data);
            $.ajax({
                url: form.action,
                type: form.method,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function (data) {
                    if ((data.status = 1)) {
                        Swal.fire({
                            title: data.massage,
                            text: "You clicked the button!",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                            buttonsStyling: false,
                        });
                        $("#formsendmail")[0].reset();
                        // $(".topbardata").load("topbardata");
                        $(".email").load(location.href + " .email");

                        $("#formsendmail").reload();
                    }
                },
            });
        },
    });
    // Form-color Insert.....................................................................................
    $("#formcolor").validate({
        rules: {
            email: {
                required: true,
            },
            number: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Please enter Email",
            },
            number: {
                required: "Please enter Number",
            },
        },
        submitHandler: function (form) {
            var data = new FormData(form);
            // var token = $("meta[name='csrf-token']").attr("content");
            console.log(data);
            $.ajax({
                url: form.action,
                type: form.method,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                data: data,
                success: function (data) {
                    if ((data.status = 1)) {
                        Swal.fire({
                            title: data.massage,
                            text: "You clicked the button!",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                            buttonsStyling: false,
                        });
                        $("#formcolor")[0].reset();
                        // $(".topbardata").load("topbardata");
                        $(".favcolor").load(location.href + " .favcolor");

                        $("#formcolor").reload();
                    }
                },
            });
        },
    });
});
function loadImg(event) {
    document.getElementById("file").style.display = "";
    var output = document.getElementById("file");
    if (!event.target.files[0]) return;
    output.src = URL.createObjectURL(event.target.files[0]);
    console.log(URL.createObjectURL(event.target.files[0]));
    output.onload = function () {
        URL.revokeObjectURL(output.src); // free memory
    };
}
function loadfavicon(event) {
    document.getElementById("file").style.display = "";
    var output = document.getElementById("file");
    if (!event.target.files[0]) return;
    output.src = URL.createObjectURL(event.target.files[0]);
    console.log(URL.createObjectURL(event.target.files[0]));
    output.onload = function () {
        URL.revokeObjectURL(output.src); // free memory
    };
}
