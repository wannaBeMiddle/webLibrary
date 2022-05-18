$( "#authForm" ).submit(function( event ) {
    event.preventDefault();
    if($('#inputLogin').val() != "" && $('#inputPassword').val() != "")
    {
        $("#alert").addClass("d-none");
        $.ajax();
    }else
    {
        $("#alert").html("Вы не ввели логин или пароль");
        $("#alert").removeClass("d-none");
    }
});