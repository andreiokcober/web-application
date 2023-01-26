$('#btn-register').on('click',(e)=>{    /* Регистраия */
    e.preventDefault()
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        confirmPassword = $('input[name="confirmPassword"]').val(),
        email = $('input[name="email"]').val(),
        fullName = $('input[name="fullName"]').val()

    $.ajax({
        url:'./developer/signUp.php',
        type:'POST',
        dataType:'json',
        data:{
            login : login,
            password : password,
            confirmPassword: confirmPassword,
            email : email,
            fullName: fullName
        },
        success: function(data){
           if(data.status){
            console.log('Ответ от сервера прошел успешно')
           }else{
            console.log('Ответ от сервера выдал ошибку')
           }
           
        }
    })    


})




                        /* Авторизация */
$('#btn-auth').on('click',(e)=>{
    e.preventDefault()
let login = $('input[name="login"]').val()
let password = $('input[name="password"]').val()


    $.ajax({
        url:'./developer/signIn.php',
        type:'POST',
        dataType:'json',
        data:{
            login:login,
            password:password
        },
        success:function(data){
            if(data.status){
                console.log('Ответ от сервера прошел успешно')
            }
            else{
                console.log('Ответ от сервера выдал ошибку')
            }
        }
    })
})
