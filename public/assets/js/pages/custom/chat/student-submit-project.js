$(document).ready(function () {
    // selectProject(8);
    let currentProject = {};

    $("#action-area").hide();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]').val(),
        },
    });
    $(".add-more").click(function () {
        var error = false;
        var expression = /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi;
        var regex = new RegExp(expression);

        $(".add-more-input").each(function () {
            if (
                $(this).val() == "" &&
                $(this).parent().parent().attr("class") != "copy d-none"
            ) {
                $(this).addClass("is-invalid");
                error = true;
            } else if (
                !$(this).val().match(regex) &&
                $(this).parent().parent().attr("class") != "copy d-none"
            ) {
                $(this).addClass("is-invalid");
                if (
                    $(this).parent().next().attr("class") !=
                    "fv-plugins-message-container regex-error"
                ) {
                    $(this)
                        .parent()
                        .after(
                            "<div class='fv-plugins-message-container regex-error'><div class='fv-help-block'>Invalid Link Format</div></div>"
                        );
                }

                error = true;
            } else {
                $(this).removeClass("is-invalid");
                if (
                    $(this).parent().next().attr("class") ==
                    "fv-plugins-message-container regex-error"
                ) {
                    $(this).parent().next().remove();
                }
            }
        });
        if (!error) {
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        }
    });
    $("body").on("click", ".remove", function () {
        $(this).parents(".control-group").remove();
    });
    selectProject = (id) => {
        // let id = $(this).val();
        $.ajax({
            type: "GET",
            url: `/dashboard/student/assignments/${id}`,
            success: function (data) {
                currentProject = { ...data.selectedProject };
                console.log(data);
                console.log(currentProject.id);
                $("#action-area").show();
                $("#project-title-place")
                    .empty()
                    .append(data.selectedProject.title);
                $("#messages-place").empty();
                if (data.studentSubmit) {
                    if (data.studentSubmit.message) {
                        $("#messages-place").append(
                            `  <!--begin::Message Out-->
                        <div class="d-flex flex-column mb-5 align-items-end">
                          <div class="d-flex align-items-center">
                            <div>
                              <span class="text-muted font-size-sm"></span>
                              <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                            </div>
                            <div class="symbol symbol-circle symbol-40 ml-3">
                              <img alt="Pic" src="assets/images/default-avatar.png" />
                            </div>
                          </div>
                          <div
                            class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-700px" id="student-message">
                            <div>${data.studentSubmit.message}</div>
                          </div>
                        </div>
                        <!--end::Message Out--> `
                        );
                    }
                }
                if (data.urls) {
                    $.each(data.urls, function (key, val) {
                        $("#student-message").append(
                            `<div class="border shadow-sm p-2 mt-4 bg-light"><a href="${val.url}" target="_blank">${val.url}</a></div>`
                        );
                        console.log(val.url);
                    });
                }
                if (data.evaluation) {
                    if (data.evaluation.message) {
                        $("#messages-place").append(
                            ` <!--begin::Message In-->
                        <div class="d-flex flex-column mb-5 align-items-start">
                          <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-40 mr-3">
                              <img alt="Pic" src="teacher/images/default-avatar.png" />
                            </div>
                            <div>
                              <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Teacher</a>
                              <span class="text-muted font-size-sm"></span>
                            </div>
                          </div>
                          <div
                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-700px" id="teacher-message">
                            <div>${data.evaluation.message}</div>
                          <div class="row d-flex mr-2 max-w-700px" id="competencies-message"></div>

                            </div>
                        </div>
                        <!--end::Message In--> `
                        );
                    }
                }
                if (data.evaluatedCompetencies.length) {
                    $.each(data.evaluatedCompetencies, function (key, val) {
                        $("#competencies-message").append(
                            `<div class="col-3 mt-3 mr-3"><span class="text-white badge bg-${
                                val.pivot.status ? "success" : "danger"
                            }">${val.name}</span></div>`
                        );
                        console.log(val.url);
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
        });
    };

    $("#user-submit-project").click(function () {
        var links = [];
        $('[name="resources[]"]').each(function () {
            links.push(this.value);
        });
        if (
            $('[name="message"]').val() == "" &&
            $('[name="message"]').next().attr("class") !=
                "fv-plugins-message-container message-error"
        ) {
            $('[name="message"]')
                .addClass("is-invalid")
                .after(
                    "<div class='fv-plugins-message-container message-error'><div class='fv-help-block'>Please enter message</div></div>"
                );
        }
        // else if ($('[name="message"]').val() == "") {
        //     $('[name="message"]')
        //         .addClass("is-invalid")
        //         .after(
        //             "<div class='fv-plugins-message-container message-error'><div class='fv-help-block'>Please enter message</div></div>"
        //         );
        // }
        else if ($('[name="message"]').val() != "") {
            $('[name="message"]').removeClass("is-invalid");
            if (
                $('[name="message"]').next().attr("class") ==
                "fv-plugins-message-container message-error"
            ) {
                $(".message-error").remove();
            }

            $.ajax({
                type: "POST",
                url: `/dashboard/student/assignments`,
                data: {
                    urls: [...links],
                    message: $('[name="message"]').val(),
                    project_id: currentProject.id,
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (err) {
                    console.log(err);
                },
            });
            $("[name='message']").val("");
            $(":input").val("");
            selectProject(currentProject.id);
        }
    });
});
