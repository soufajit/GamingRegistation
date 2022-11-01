<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


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

<div class="dis-flex mt-2">
        <h2 style="text-align: center">Registration Details</h2>
        <table id="example" class="display" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Age</th>
                    <th>Plan</th>
                    <th>Durection(Month)</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>


                <tr>
                @foreach ($users as $user)
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->plan_name}}</td>
                    <td>{{$user->duration}}</td>
                    <td>{{$user->total}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>