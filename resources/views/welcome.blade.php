<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-success" id="on" value="0">On</button>
            <button class="btn btn-danger" id="off" value="1">Off</button>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


<script type="application/javascript">
        $("#on").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "/send",
                data: {
                    state: $(this).val(), // < note use of 'this' here
                    // access_token: $("#access_token").val()
                },
                success: function(result) {
                    // alert('ok');
                },
                error: function(result) {
                    // alert('error');
                }
            });
        });

        $("#off").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "/send",
                data: {
                    state: $(this).val(), // < note use of 'this' here
                    // access_token: $("#access_token").val()
                },
                success: function(result) {
                    // alert('ok');
                },
                error: function(result) {
                    // alert('error');
                }
            });
        });


</script>

</body>
</html>
