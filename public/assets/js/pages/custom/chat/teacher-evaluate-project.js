$(document).ready(function () {
    // selectProject(8);
    let currentProject = {};
    let submitProject = {};
    let currentStudentId = null;

    $("#action-area").hide();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('input[name="_token"]').val(),
        },
    });
    $("#hide-project-list").click(function () {
        $("#project-list-place").hide();
        $("#student-list-place").show();
    });
    selectStudent = (id) => {
        currentStudentId = id;
        console.log(currentStudentId);
        $("#project-list-place").show();
        $("#student-list-place").hide();
    };
    selectProject = (id) => {
        $.ajax({
            type: "GET",
            url: `/dashboard/teacher/assignments/${id}`,
            data: {
                student_id: currentStudentId,
            },
            success: function (data) {
                currentProject = { ...data.selectedProject };
                submitProject = { ...data.studentSubmit };
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
                            ` <!--begin::Message In-->
                        <div class="d-flex flex-column mb-5 align-items-start">
                          <div class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-40 mr-3">
                              <img alt="Pic" src="assets/images/default-avatar.png" />
                            </div>
                            <div>
                              <a class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">${data.currentStudent.first_name} ${data.currentStudent.last_name}</a>
                              <span class="text-muted font-size-sm"></span>
                            </div>
                          </div>
                          <div
                            class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-700px" id="student-message">
                            <div>${data.studentSubmit.message}</div></div>
                        </div>
                        <!--end::Message In--> `
                        );
                    }
                }
                if (data.urls.length) {
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
                            `  <!--begin::Message Out-->
                      <div class="d-flex flex-column mb-5 align-items-end">
                        <div class="d-flex align-items-center">
                          <div>
                            <span class="text-muted font-size-sm"></span>
                            <a class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                          </div>
                          <div class="symbol symbol-circle symbol-40 ml-3">
                            <img alt="Pic" src="assets/images/default-avatar.png" />
                          </div>
                        </div>
                        <div
                          class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-700px" id="teacher-message">
                          <div>${data.evaluation.message}</div>
                          <div class="row d-flex flex-row-reverse mr-2 max-w-700px" id="competencies-message"></div>
                        </div>
                      </div>
                      <!--end::Message Out--> `
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
                if (data.competencies.length) {
                    $("#competency-place").empty();
                    $.each(data.competencies, function (key, val) {
                        $("#competency-place").append(
                            `    
                          <label class="col-3 col-form-label">${val.name}</label>
                    <div class="col-3">
                      <span class="switch switch-outline switch-icon switch-success">
                        <label>
                          <input type="checkbox" value="${val.id}" name="competencies[]" />
                          <span></span>
                        </label>
                      </span>
                    </div>
                    `
                        );
                    });
                }
            },
            error: function (err) {
                console.log(err);
            },
        });
    };
    $("#teacher-evaluate-project").click(function () {
        var competencies = {};
        $('[name="competencies[]"]').each(function () {
            let val = this.value;
            let checked = this.checked ? "1" : "0";
            competencies[val] = checked;
        });
        console.log(competencies);
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
        } else if ($('[name="message"]').val() != "") {
            $('[name="message"]').removeClass("is-invalid");
            if (
                $('[name="message"]').next().attr("class") ==
                "fv-plugins-message-container message-error"
            ) {
                $(".message-error").remove();
            }

            $.ajax({
                type: "POST",
                url: `/dashboard/teacher/assignments`,
                data: {
                    competencies: competencies,
                    message: $('[name="message"]').val(),
                    project_id: currentProject.id,
                    submitProjectId: submitProject.id,
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
