@extends('layout.master')
@section('title', 'Create')
@section('parentPageTitle', 'Contact Lists')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
@stop
@section('content')

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>Contact Lists</strong> Create</h2>
            </div>
            <div class="body">
                <form class="form-horizontal" action="{{ action('ContactListController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">List Name<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <div class="form-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter List Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="description">List Description<span class="text-blush"> *</span></label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8">
                            <textarea id="description" name="description" class="form-control" placeholder="Enter Description" required></textarea>
                        </div>
                    </div>
                    <br />
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                            <label for="name">Custom Fields</label>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-4" id="dynamic_field">
                            <div class="form-group">
                                <input type="text" id="custom_fields" name="custom_fields[]" class="form-control" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <button type="button" style="left: 100%;" id="addField" class="btn btn-raised btn-success btn-round waves-effect" value="button">+</button>
                        </div>
                    </div>
                    </br>
                    <div class="row clearfix">
                        <div class="col-sm-8 offset-sm-2">
                            <!-- <div class="checkbox">
                                <input id="remember_me_2" type="checkbox">
                                <label for="remember_me_2">
                                    Remember Me
                                </label>
                            </div> -->
                        </div>
                        <div class="col-sm-8 offset-sm-2 pull-right">
                            <button type="submit" style="left: 100%;" class="btn btn-raised btn-primary btn-round waves-effect" value="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var i=1;
    var html = "<div class='col-md-6'>";
    $('#addField').click(function(){
        // debugger
        i++;
        $('#dynamic_field').prepend('<div id="row'+i+'" class="form-group"><input type="text" name="custom_fields[]" placeholder="Enter Name" class="form-control" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></tr>');
    });

     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 

     $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  

</script>

@stop