jQuery(function($)  
{
    $("#contact_form").submit(function()
    {
		var data = {
			name: $("#name").val(),
			email: $("#email").val(),
			message: $("#msg").val(),
			subject: $("#subject").val()
		};
		
        $.ajax(
        {
            type: "POST",
            url: "http://127.0.0.1/ironplast/send_email.php",
            data: data
        })
        .done(function(response) {
            alert('Mensaje enviado exitosamente. Muchas gracias!'); // show success message
            $("#name").val(''); // reset field after successful submission
            $("#email").val(''); // reset field after successful submission
            $("#msg").val(''); // reset field after successful submission
			$("#subject").val(''); // reset field after successful submission
        })
        .fail(function(response) {
            alert('Error sending message.');
        });
        return false; // prevent page refresh
    });
});