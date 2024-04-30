(function () {
    "use strict";
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    var csrf_token = $("#update")
                        .closest("#form_update")
                        .find("#csrf_token")
                        .val();
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": csrf_token,
                        },
                    });
                    var formData = new FormData(form_update);
                    var id = $("#update")
                        .closest("#form_update")
                        .find("#id")
                        .val();
                    var get_url = $("#update")
                        .closest("#form_update")
                        .find("#get_url")
                        .val();
                    var module_name = $("#update")
                        .closest("#form_update")
                        .find("#module_name")
                        .val();
                    // --------------------------loading button coading-------------------
                    const button = document.getElementById("update");
                    button.innerHTML =
                        "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing...";
                    button.setAttribute("disabled", "disabled");
                    // --------------------------loading button coading-------------------
                    const titleCase = (s) => s.replace(/\b\w/g, c => c.toUpperCase());
                    $.ajax({
                        url: get_url + "/" + id,
                        method: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        dataType: "json",
                        success: function (response) {
                            if (response.message == 200) {
                                $(".text-danger").text("");
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                location.reload(true);
                            } else if (response.module == "niche") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#niche_name_" + response.module_data.id).empty();
                                $("#niche_name_" + response.module_data.id).append(titleCase(response.module_data.niche_name));
                            }
                            else if (response.module == "collection") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#collection_name_" + response.module_data.id).empty();
                                $("#collection_name_" + response.module_data.id).append(titleCase(response.module_data.collection_name));
                            } else if (response.module == "role") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#role_name_" + response.module_data.id).empty();
                                $("#role_name_" + response.module_data.id).append(titleCase(response.module_data.role_name));
                                if (response.module_data.role_permission == "All") {
                                    $("#role_type_" + response.module_data.id).empty();
                                    $("#role_type_" + response.module_data.id).append("<h5><span class='badge badge-soft-dark text-dark'>All</span></h5>");
                                } else {
                                    $("#role_type_" + response.module_data.id).empty();
                                    $("#role_type_" + response.module_data.id).append("<h5><a id='access_seen' data-access=" + response.module_data.id + " style='cursor: pointer'><span class='badge badge-soft-primary text-dark'>Custom ...</span></a></h5>");
                                }
                            } else if (response.module == "user") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                location.reload(true);
                            } else if (response.module == "image") {
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                            } else if (response.module == "image_upd") {
                                Swal.fire({
                                    toast: true,
                                    icon: "success",
                                    title:
                                        module_name +
                                        " Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                                $("form").trigger("reset");
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                $("#myModal").modal("hide");
                                $("#title_" + response.module_data.id).empty();
                                $("#description_" + response.module_data.id).empty();
                                $("#brand_name_" + response.module_data.id).empty();
                                $("#title_" + response.module_data.id).append(titleCase(response.module_data.title));
                                $("#description_" + response.module_data.id).append(titleCase(response.module_data.description));
                                $("#brand_name_" + response.module_data.id).append(titleCase(response.module_data.brand_name));
                            } else {
                                button.removeAttribute("disabled");
                                button.innerHTML = "Update " + module_name + " >";
                                Swal.fire({
                                    toast: true,
                                    icon: "error",
                                    title:
                                        module_name +
                                        " not Updated Successfully..!",
                                    animation: false,
                                    position: "top-right",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                });
                            }
                            $("form").trigger("reset");
                            form.classList.remove("was-validated");
                        },
                        error: function (error) {
                            button.removeAttribute("disabled");
                            button.innerHTML = "Update" + module_name + " >";
                            var error = error.responseJSON;
                            $.each(error.errors, function (index, value) {
                                $("#" + index).html(value);
                            });
                        },
                    });
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();
