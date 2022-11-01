<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <title>Document</title>
    <style>
        .border-div {
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid #4C505F;
        }

        .container {
            padding-right: 0px !important;
            padding-left: 0px !important;
            /* box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; */
        }

        .border-main {
            border: 2px solid #4C505F;
            border-radius: 10px;
        }

        .head {
            font-size: 1.1rem;
            color: #1E2F71;
            font-weight: 500;
        }

        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            border-radius: 10px;
        }

        legend.scheduler-border {
            width: inherit;
            /* Or auto */
            padding: 0 10px;
            /* To give a bit of padding on the left and right */
            border-bottom: none;
        }

        body {
            margin: 2rem;
        }

        .paginate_button {
            border-radius: 0 !important;
        }

        .dataTables_filter {
            display: none !important;
        }

        select.form-control:not([size]):not([multiple]) {
            height: 34px !important;
        }
    </style>
</head>

<body>
    <div class="container mt-2 ">
        <h2 class=" p-2 head text-center">Gaming Zone Membership Registration</h2>
        <div>
            <form action="datasubmit" method='post' enctype='multipart/form-data' id="myform">
                @csrf

                <fieldset class="scheduler-border m-4" style="background: #FBFCFF;">
                    <legend class="scheduler-border" style="font-size:1rem;color:#3A446C;font-weight:500;"><b>Applicant Details</b></legend>
                    <div class="row m-3">
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-12 mt-2">
                            <label class="control-label input-label col-lg-5 col-md-5 col-xl-5 col-sm-5 col-xs-5" for="applicantName">Applicant&nbsp;Name<span class="text-danger">*</span></label>
                            <input type="text " class="form-control col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8" id="name" name="name"  data-parsley-pattern="[a-z A-Z]+$" data-parsley-maxlength="20" data-parsley-minlength="3" data-parsley-trigger="keyup" />

                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-12 mt-2">
                            <label class="control-label input-label col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4" for="email">Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8" id="email" name="email" />

                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-12 mt-2">
                            <label class="control-label input-label col-lg-5 col-md-5 col-xl-5 col-sm-5 col-xs-5" for="mobileNo">Mobile&nbsp;No<span class="text-danger">*</span></label>
                            <input type="text" class="form-control col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8" id="mobile" name="mobile" data-parsley-pattern="^\d{10}$" data-parsley-trigger="keyup" />

                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-12 mt-4">
                            <label class="control-label input-label col-lg-6 col-md-6 col-xl-6 col-sm-6 col-xs-6" for="dob">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" class="form-control col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8" id="DOB" name="dob"  />

                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-2 col-sm-4 col-xs-12 mt-4">
                            <label class="control-label input-label col-lg-5 col-md-5 col-xl-5 col-sm-5 col-xs-5" >Plan<span class="text-danger">*</span></label>
                            <div class="row">
                                <select class="form-control col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8" id="plan" name="plan">
                                    @foreach ($plans as $plan)
                                    <option value="{{$plan->plan_id}}">
                                        {{$plan->plan_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-2 col-sm-4 col-xs-12 mt-4">
                            <label class="control-label input-label col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4" for="duration">Duration(Monthly)<span class="text-danger">*</span></label>
                            <input type="number" class="form-control col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8" id="duration" name="duration"  />

                        </div>
                        <div class="col-lg-4 col-md-4 col-xl-2 col-sm-4 col-xs-12 mt-4">
                            <label class="control-label input-label col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4" for="total">Total</label>
                            <input type="text" class="form-control col-lg-8 col-md-8 col-xl-8 col-sm-8 col-xs-8" id="total" name="total" readonly />
                            <input type="hidden" name="age" value="" id="age"/>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:center" class="mt-5">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn btn-primary ml-4">Submit</button>
                        <button type="button" class="btn btn-secondary ml-4">Reset</button>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>

   


</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#duration").on("change", function() {
            var plan = $('#plan').val();
            var duration = $('#duration').val();

            
            $.ajax({
                url: "{{url('api/fetch-total')}}",
                type: "POST",
                data: {
                    plan: plan,
                    duration: duration,
                    _token: '{{csrf_token()}}'

                },
                success: function(data) {
                    // console.log(data);
                    $("#total").val(data);

                }
            });
        });
    })
</script>
<script>
    $(document).ready(function() {

        $('#myform').submit(function(e) {
            // alert("hii");
            e.preventDefault();
            var name = $('#name').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var DOB = $('#DOB').val();
            var duration = $('#duration').val();
            var regEx = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
            var validEmail = regEx.test(email);
            var mobregExp = /^[6-9]{1}[0-9]{9}$/;
            var validmobile = mobregExp.test(mobile);

//// AGE CALCULATION ///////

            var userinput = document.getElementById("DOB").value;
            var dob = new Date(userinput);
            var result = 0;
            var month_diff = Date.now() - dob.getTime();
            var age_dt = new Date(month_diff);
            var year = age_dt.getUTCFullYear();
            var age = Math.abs(year - 1970);
            $("#age").val(age);
           

            if (name.length < 1) {
                //$('#namespan').after('<span class="error">This field is required</span>');
                Swal.fire("Validation Faild!!", "Fill Full name", "error");
            } else if (!validEmail) {

                //$('#email').after('<span class="error">Enter a valid email</span>');
                Swal.fire("Validation Faild!!", "Enter a valid Email", "error");
            } else if (!validmobile) {
                //$('#mobilespan').after('<span class="error">Enter a valid Mobile</span>');
                Swal.fire("Validation Faild!!", "Enter a valid Mobile", "error");
             } else if (DOB.length < 1) {
                 Swal.fire("Validation Faild!!", "Enter your date of Birth", "error");
             }
             else if (age <= 16) {
                 Swal.fire("Validation Faild!!", "age most 16", "error");
             }
            
            else if (duration.length < 1) {
                Swal.fire("Validation Faild!!", "Choose  your Durection Month", "error");
            }else {
                this.submit();
                
                Swal.fire("Your Data Submited", "Check Your Status", "success");
            }

        });

    });
</script>