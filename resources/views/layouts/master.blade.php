<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{!! csrf_token() !!}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>To do List</title>

        <!-- Bootstrap Css -->
        <link href= "{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Jquery -->
        <script src=" {{ asset('/js/jquery.min.js') }}"></script>
    </head>
    
    <script type="text/javascript">
        var baseUrl = '<?php echo URL::to('/');?>';
    </script>

    <style type="text/css">
        .header {
            text-align: center;
            color: #fff;
            background: #18bc9c;
            border-radius: 10px;
            
            z-index: 1;
            height: 88%;
        }
        .set-width-text {
            width: 90% !important;
        }

        .list-group-hover .list-group-item:hover {
            background-color: #f5f5f5;
        }
    </style>

    <body>            
        <div class="container">  
            <div class="header">                
                <img width="350" height="200" class="img-circle mx-auto d-block" src="{{ asset('/image/work.jpg')}}">
                <h1>Todo List</h1>
                <p>You can save, edit and delete you todo</p>      
            </div><br>
            @yield('content')

            @extends('layouts.modal')
        </div>
    </body>
    <!-- Bootstrap Js -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</html>
