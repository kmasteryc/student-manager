/**
 * Created by kmasteryc on 16/08/2016.
 */
$(document).ready(function () {

    $(document).on('click', "#all_students input[type='checkbox']", function () {
        var row = $(this).parent().parent();
        $("#current_students").append(row);
        var text = 'Add <b>' + $(this).parent().next().html() + '</b> successfully!';
        $('input[name="success_text"]').val(text);

        $("#student-form").trigger('submit');
    });

    $(document).on('click', "#current_students input[type='checkbox']", function () {
        var row = $(this).parent().parent();
        $("#all_students").prepend(row);
        var text = 'Remove <b>' + $(this).parent().next().html() + '</b> successfully!';
        $('input[name="success_text"]').val(text);

        $("#student-form").trigger('submit');
    });

});