$(function() {

    $('.toast').toast('show');

    $('#confirm_password').on('change keyup paste', function() {
        let npass = $('#password').val();
        let cpass = $(this).val();

        if(npass == cpass) {
            document.querySelector('#confirm_password').setCustomValidity('');
        } else {
            document.querySelector('#confirm_password').setCustomValidity('Password not confirmed.');
        }
    });

    $('.delete').on('click',function(e) {
        e.preventDefault();
        let url = $(this).attr('href');

        if(confirm('Are you sure you want to delete this item?')) {
            location.href = url;
        }
    });

    $('#file').change(function(e) {
        const file = e.target.files[0]

        $('#img-container').html(`<img class="img-fluid mt-3" src="${URL.createObjectURL(file)}"  />`);
    })

    $('#content').trumbowyg();

})