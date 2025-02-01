var username=document.forms['myForm']['name'];
var errors=document.getElementById('error');
var letters=/^[a-zA-Z ]*$/;

    function validation()
    {
         if(username.value=='')
            {
                errors.innerHTML="Username must be filled";
                errors.style.display="block";
                return false;
            }
            else if(username.value.length>8)
            {
                alert("Name must be less than 8 characters")? "" : location.reload();
                errors.style.display="block";
                return false;
            }
            else if(!username.value.match(letters))
            {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Names must contain letters only',
                    showConfirmButton: true,
                    timer: 50000 
                }).then(function() {
                    window.location.reload();
                  })
                errors.style.display="block";
                return false;
            }
            return true;
        }
