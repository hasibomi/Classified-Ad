/**
 * Created by Omi on 2/11/2015.
 */
$('#username').change(function(e) {
    var username = $('#username').val(),
        statusDiv = $('#status')
        errorBox = $('#errorBox');

    if(username != '') {
        sendData($(this).val(), statusDiv, errorBox);
    } else {
        statusDiv.show();
        errorBox.show();
        errorBox.html('Username is required');
    }
});

function sendData(username, statusDiv, errorBox)
{
    $.ajax({
        url: "/checkUser", //create/checkUser
        type: 'POST',
        dataType: 'html',
        data: 'username=' + username,
        success: function(data) {
            if(data == "The username has already been taken") {
                statusDiv.show();
                errorBox.show();
                errorBox.html(data);
            } else {
                statusDiv.hide();
                errorBox.hide();
            }
        }
    });
}
