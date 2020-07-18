<script>
//   $(document).ready(function(){
  $(function(){
    
    $('.register').hide();

    $("#sign-up").on("click",function(){
        $('.login').hide();
        $('.register').fadeIn();
    });

    $("#sign-in").on("click",function(){
        $('.register').hide();
        $('.login').fadeIn();
    });


    $('#sign').on('click',function(){
        btn = $(this);
        email = $('#inputEmail').val();
        pass = $('#inputPassword').val();
       
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email,
                    password : pass
                },
            url: "{{ route('login') }}",
            type: "POST",
            cache: false,
            dataType: 'json',
                beforeSend: function () {
                    btn.html('Loading...');
                },
                success:function(data){
                    btn.html('Sign In');
                    // console.log(data);
                    if(data.data){
                        window.location.href = data.data;
                    }else{
                        alert(data.message);
                    }
                },
                error: function (error) {
                    btn.html('Sign In');
                    alert("Error");
                }
            });
        });

        $(".sign-up").on("click",function(){
            btn = $(this);

            email = $('#inputEmailRegister').val();
            pass = $('#inputPasswordRegister').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    email: email,
                    password : pass
                },
            url: "{{ route('register') }}",
            type: "POST",
            cache: false,
            dataType: 'json',
                beforeSend: function () {
                    btn.html('Loading...');
                },
                success:function(data){
                    alert(data.message + " Please Sign In");
                    $('.register').hide();
                    $('.login').fadeIn();
                },
                error: function (error) {
                    return error;
                }
            });
        });

        $('.job-nav').on('click',function(){
            btn = $(this);

            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: "{{ route('jobs') }}",
                cache: false,
                dataType: 'json',
                    beforeSend: function () {
                        btn.html('Loading...');
                    },
                    success:function(data){
                        btn.html('Job');
                        $('#dashboard').fadeOut();
                        $('#main-container').html(data.data);
                    },
                    error: function (error) {
                        return error;
                    }
                });
            });
                
            $('.job-submited-nav').on('click',function(){
                btn = $(this);
                    $.ajax({
                        data:{
                            _token : "{{ csrf_token() }}"
                        },
                    url: "{{ route('show-job-submit') }}",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                        beforeSend: function () {
                            btn.html('Loading...');
                        },
                        success:function(data){
                            btn.html('Job Submited');
                            $('#job').fadeOut();
                            $('#main-container').html(data.data);
                        },
                        error: function (error) {
                            return error;
                    }
                });
            });

            $('.btn-publish').on('click',function(e){
                e.preventDefault();
                btn = $(this);
                id = btn.parent().prev().val();

                $.ajax({
                        data:{
                            _token : "{{ csrf_token() }}",
                            id :id
                        },
                        url: "{{ route('publishJob') }}",
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                        beforeSend: function () {
                            btn.html('process');
                        },
                        success:function(data){
                            btn.parent().prev().prev().prev().text('Published')
                           btn.fadeOut();
                        },
                        error: function (error) {
                            return error;
                        }
                    });
                }); 

                $(".save").on('click',function(e){
                    btn = $(this);

                    job_title = $("#job-title").val(), 
                    category = $("#category").val(), 
                    level_requirement = $("#level-requirement").val(), 
                    job_desk = $("#job-desk").val(), 
                    job_sallary = $("#job-sallary").val(), 

                    $.ajax({
                        data:{
                            _token : "{{ csrf_token() }}",
                            job_title : $("#job-title").val(), 
                            category : $("#category").val(), 
                            level_requirement : $("#level-requirement").val(), 
                            job_desk : $("#job-desk").val(), 
                            job_sallary : $("#job-sallary").val(), 
                        },
                        url: "{{ route('createJob') }}",
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                        beforeSend: function () {
                            btn.html('Loading...');
                        },
                        success:function(data){
                            btn.html('Save');
                            alert(data.message);
                            location.reload();
                        },
                        error: function (error) {
                            return error;
                        }
                    });
                });

                $(".view").on("click",function(){
                    btn = $(this);

                    $.ajax({
                        data:{
                            _token : "{{ csrf_token() }}",
                            job_title : $("#job-title").val(), 
                            job_submit_id : btn.parents().parents().prev().val(), 
                            role : 1, 
                        },
                        url: "{{ route('show-job-submited') }}",
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                        beforeSend: function () {
                            btn.html('Loading...');
                            $(".list-loading").html('Loading...');
                        },
                        success:function(data){
                            console.log(data.data.data.user_name);
                            btn.html('View Detail');

                            $(".list-name").text(data.data.data.user_name);
                            $(".list-email").text(data.data.data.user_email);
                            $(".list-age").text(data.data.data.user_age);
                            $(".list-address").text(data.data.data.user_address);
                            $(".list-skills").text(data.data.data.user_skills);
                            $(".list-job-title").text(data.data.data.job_title);
                            $(".list-job-level-requirement").text(data.data.data.job_level_requirement);
                            $(".list-job-sallary").text(data.data.data.job_sallary);
                            $(".list-job-status").text(data.data.data.job_status);
                          
                        },
                        error: function (error) {
                            return error;
                        }
                    });
                });

                $(".btn-apply").on("click",function(){
                    btn = $(this);
                    job_id = btn.prev().val();
                    
                    $.ajax({
                        data:{
                            _token : "{{ csrf_token() }}",
                            job_id : job_id, 
                        },
                        url: "{{ route('job-submit') }}",
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                        beforeSend: function () {
                            btn.html('Loading...');
                        },
                        success:function(data){
                            btn.html('Apply');
                            alert(data.message);
                        },
                        error: function (error) {
                            return error;
                        }
                    });

                });

                $(".btn-save-complete-profile").on("click",function(){
                    btn = $(this);

                    $.ajax({
                        data:{
                            _token : "{{ csrf_token() }}",
                            name : $("#name-update").val(), 
                            age : $("#age-update").val(), 
                            address : $("#address-update").val(), 
                            skills : $("#skills-update").val(), 
                        },
                    url: "{{ route('complete-profile') }}",
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                        beforeSend: function () {
                            btn.html('Loading...');
                        },
                        success:function(data){
                            alert(data.message);
                            location.reload();
                        },
                        error: function (error) {
                            return error;
                        }
                    });                   
                });

            });
</script>