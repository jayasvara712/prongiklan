// window.addEventListener('load', function() {
    
// })

function check() {
    if (document.getElementById('password2').value == "")
    {
        document.getElementById('message').innerHTML = 'Password Kosong';
    }
    else if (document.getElementById('password').value == document.getElementById('password2').value) 
    {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Password Sama';
    }
    else
    {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Password Tidak Sama';
    }
}