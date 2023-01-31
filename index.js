                        /* Авторизация */  
                 
$('#btn-auth').on('click',(e)=>{
    e.preventDefault()
    clearError()
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
                document.location.href = './pages/profile.php';
                console.log('Ответ от сервера прошел успешно')
            }
            else{
                const div = document.createElement('div')
                div.innerHTML = 'Введите коректные значения!'
                if(data.type === 1 ){
                    data.fields.forEach( (item) => {
                        setError(item)     
                    })
                }
            }
        }
    })
})

$('#btn-register').on('click',(e)=>{    /* Регистраия */
    e.preventDefault()
    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        confirmPassword = $('input[name="confirmPassword"]').val(),
        email = $('input[name="email"]').val(),
        fullName = $('input[name="fullName"]').val()
    $.ajax({
        url:'../developer/signUp.php',
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
                // document.location.href = './developer/signIn.php';
                console.log('Ответ от сервера прошел успешно')
            }else{
            console.log('Ответ от сервера выдал ошибку')
           }
           
        }
    })    


})

function setError(item){
    const input = $(`input[name="${item}"]`)
    input.addClass('error-border')
    const inputContainer = document.querySelector(`div[name="${item}"]`)
    const err ='<p class="validation-error">Введите коректное знаение</p>'
    inputContainer.insertAdjacentHTML('beforeend',err)
}
function clearError(){
$('input').removeClass('error-border')
const p = document.querySelectorAll('.validation-error')
if(p.length){
    p.forEach( item => {
        const parent = item.parentNode
        parent.removeChild(item)
    })
}
}


