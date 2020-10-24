<div id="htlfndr-sing-up">
    <div class="htlfndr-content-card">
        <div class="htlfndr-card-title clearfix">
            <h2 class="pull-left">Sing up</h2>
        </div>
        <div id="htlfndr-sing-up-form">

            <h4>Full name</h4>
            <input id="sing-up-name" class="htlfndr-input " type="text" name="htlfndr-sing-up-name">

            <h4>Phone number</h4>
            <input id="sing-up-phone" class="htlfndr-input " type="number" name="htlfndr-sing-up-email">
            <h4>Password</h4>
            <input id="sing-up-password" class="htlfndr-input " type="text" name="htlfndr-sing-up-pass">
            <h4>Confirm Password</h4>
            <input id="sing-up-password-confirm" class="htlfndr-input " type="text" name="htlfndr-sing-up-pass-conf">
            <hr>
            <button class="htlfndr-book-now-button" id="sign-up-btn" role="button">login now</button>
            <hr>
            <span>Have an Account?
                    <a data-target="#htlfndr-sing-in" data-toggle="modal" href="#">
                        <span>Sing in</span>
                    </a>
                </span>
        </div>
    </div>
</div>

<div id="htlfndr-sing-in">
    <div class="htlfndr-content-card">
        <div class="htlfndr-card-title clearfix">
            <h2 class="pull-left">Sing in</h2>
        </div>
        <div id="htlfndr-sing-in-form">
            <h4>Phone number</h4>
            <input id="sing-in-phone" class="htlfndr-input " type="text" name="htlfndr-sing-in-emal">
            <h4>Password</h4>
            <input id="sing-in-password" class="htlfndr-input " type="text" name="htlfndr-sing-in-pass">
            <hr>
            <button class="htlfndr-book-now-button" id="sign-in-btn" role="button">login now</button>
            <hr>
            <span>Don't Have an Account?
               <a data-target="#htlfndr-sing-up" data-toggle="modal" href="#">
                        <span>Sing up</span>
                    </a>
            </span>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //Show modal for add
        $('#sign-in-btn').click(function(){
            var formData = new FormData();
            formData.append('phone', $('#sing-in-phone').val())
            formData.append('password', $('#sing-in-password').val())
            $.ajax({
                method: 'POST',
                url: "{{ route('login') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function (){
                    $('.submit-btn').html('Please wait ---- ');
                    $('.submit-btn').prop("disabled",true);
                },
                complete: function (){
                    $('.submit-btn').html('Sign In');
                    $('.submit-btn').prop("disabled",false);
                },
                success: function (data) {
                    alert('gg')
                    if (data.type == 'success'){
                        $('#modal').modal('hide');
                        $('#name').val('');
                        Swal.fire({
                            position: 'top-end',
                            icon: data.type,
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 800);//
                    }else{
                        Swal.fire({
                            icon: data.type,
                            title: 'Oops...',
                            text: data.message,
                            footer: 'Something went wrong!'
                        })
                    }
                },
                error: function (xhr) {
                    var errorMessage = '<div class="card bg-danger">\n' +
                        '                        <div class="card-body text-center p-5">\n' +
                        '                            <span class="text-white">';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        errorMessage +=(''+value+'<br>');
                    });
                    errorMessage +='</span>\n' +
                        '                        </div>\n' +
                        '                    </div>';
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        footer: errorMessage
                    })
                },
            })
        });

    });

</script>
