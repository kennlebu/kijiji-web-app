var page = 1;
var current_page = 1;

var total_page = 0;

var is_ajax_fire = 0;

manageData();

/* manage data list */

function manageData() {

    $
        .ajax({

            dataType: 'json',

            url: url,

            data: {
                page: page
            }

        })
        .done(function (data) {

            total_page = data.total % 5;

            current_page = page;

            $('#pagination').twbsPagination({

                totalPages: total_page,

                visiblePages: current_page,

                onPageClick: function (event, pageL) {

                    page = pageL;

                    if (is_ajax_fire != 0) {

                        getPageData();

                    }

                }

            });

            manageRow(data.data);

            is_ajax_fire = 1;

        });

}

/* Get Page Data*/

function getPageData() {

    $
        .ajax({

            dataType: 'json',

            url: url,

            data: {
                page: page
            }

        })
        .done(function (data) {

            manageRow(data.data);

        });

}

/* Add new patient table row */

function manageRow(data) {

    var rows = '';

    $.each(data, function (key, value) {

        rows = rows + '<tr>';

        rows = rows + '<td>' + value.firstname + " " + value.lastname + '</td>';

        rows = rows + '<td>' + value.dateOfBirth + '</td>';

        rows = rows + '<td data-id="' + value.gender + '">';

        rows = rows + '<td data-id="' + value.observation + '">';

        rows = rows + '<td data-id="' + value.observation + '">';

        rows = rows + '<button data-toggle="modal" data-target="#edit-patient" class="btn btn-primary e' +
                'dit-patient">Edit</button> ';

        rows = rows + '<button class="btn btn-danger remove-patient">Delete</button>';

        rows = rows + '</td>';

        rows = rows + '</tr>';

    });

    $("tbody").html(rows);

}

/* Create new patient */

$(".crud-submit")
    .click(function (e) {

        e.preventDefault();

        var form_action = $("#create-patient")
            .find("form")
            .attr("action");

        var firstname = $("#create-patient")
            .find("input[name='firstname']")
            .val();
        var lastname = $("#create-patient")
            .find("input[name='firstname']")
            .val();

        var gender = $("#create-patient")
            .find("input[name='firstname']")
            .val();

        var service = $("#create-patient")
            .find("input[name='firstname']")
            .val();

        var observation = $("#create-patient")
            .find("textarea[name='observation']")
            .val();

        $
            .ajax({

                dataType: 'json',

                type: 'POST',

                url: form_action,

                data: {
                    firstname: firstname,
                    lastname: lastname,
                    observation: observation,
                    gender: gender,
                    service: service

                }

            })
            .done(function (data) {

                getPageData();

                $(".modal").modal('hide');

                toastr.success('patient Created Successfully.', 'Success Alert', {timeOut: 5000});

            });

    });

/* Remove patient */

$("body").on("click", ".remove-patient", function () {

    var id = $(this)
        .parent("td")
        .data('id');

    var c_obj = $(this).parents("tr");

    $
        .ajax({

            dataType: 'json',

            type: 'delete',

            url: url + '/' + id
        })
        .done(function (data) {

            c_obj.remove();

            toastr.success('patient Deleted Successfully.', 'Success Alert', {timeOut: 5000});

            getPageData();

        });

});

/* Edit patient */

$("body").on("click", ".edit-patient", function () {

    var id = $(this)
        .parent("td")
        .data('id');

    var title = $(this)
        .parent("td")
        .prev("td")
        .prev("td")
        .text();

    var description = $(this)
        .parent("td")
        .prev("td")
        .text();

    $("#edit-patient")
        .find("input[name='title']")
        .val(title);

    $("#edit-patient")
        .find("textarea[name='description']")
        .val(description);

    $("#edit-patient")
        .find("form")
        .attr("action", url + '/update/' + id);

});

/* Updated new patient */

$(".crud-submit-edit").click(function (e) {

    e.preventDefault();

    var form_action = $("#edit-patient")
        .find("form")
        .attr("action");

    var title = $("#edit-patient")
        .find("input[name='title']")
        .val();

    var description = $("#edit-patient")
        .find("textarea[name='description']")
        .val();

    $
        .ajax({

            dataType: 'json',

            type: 'POST',

            url: form_action,

            data: {
                title: title,
                description: description
            }

        })
        .done(function (data) {

            getPageData();

            $(".modal").modal('hide');

            toastr.success('patient Updated Successfully.', 'Success Alert', {timeOut: 5000});

        });

});