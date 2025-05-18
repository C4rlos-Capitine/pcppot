  function show_Form(){
        $('.modal').modal('show');
    }
    window.onscroll = function() {myFunction()};
    
    var navbar = document.querySelector("header");
    var sticky = navbar.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
 
    $(document).ready(function () {
        $('#login_button').on('click', function () {
            const formData = {
                email: $('#email').val(),
                password: $('#password').val(),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: "{{ route('login.process') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    }
                },
                error: function (xhr) {
                    const errors = xhr.responseJSON.errors;
                    $('#error-list').empty();
                    for (const key in errors) {
                        $('#error-list').append('<li>' + errors[key][0] + '</li>');
                    }
                    $('#error-messages').show();
                }
            });
        });
    });
