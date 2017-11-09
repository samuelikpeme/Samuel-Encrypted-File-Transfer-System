$('#sub').click(function (event){
    first=$('#firstname').val();
    last=$('#lastname').val();
    email=$('#email').val();
    phone=$('#phone').val();
    password=$('#password').val();
    confirm=$('#confirm').val();
    if (password !== confirm){
        $('#error').html("<p style='color:red'> passwords do not match</p>");
        event.preventDefault();
    }
    else if(password.length <= 6){
        $('#error').html("<p style='color:red'> password length too small</p>");
        event.preventDefault();
    }
    else if($('#firstname').trim()=='' || $('#lastname').trim()=='' || $('#phone').trim()=='' || $('#email').trim()==''){
        $('#errors').html("<p style='color:red'>no field should be left empty</p>");
        event.preventDefault();
    }

});

$('#password').blur(function(){
    password=$('#password').val();
    if (password.length <= 6){
        $('#error').html("<p style='color:red'> password length too small </p>");

    }
    else {
       $('#error').html("<p style='color:green'> password strength accepted</p>");
    }
});

$('#password').focus(function(){
            $('#error').html("<p style='color:green'>Note:password must be greater than 6</p>");

});