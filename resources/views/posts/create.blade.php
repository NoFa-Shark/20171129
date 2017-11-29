<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>新增 | 新聞發佈系統</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('posts.create') }}">新聞發佈系統</a>
        </div>
    </div>
</nav>

<div class="container">

    <h1>新增新聞內容</h1>

    @if (session()->exists('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>成功！</strong> 已成功寫入資料
    </div>
    @endif

    <form id="post_form" action="{{ route('posts.store') }}" method="POST">

        {{ csrf_field() }}

        <div id="title_field" class="form-group">
            <label for="name">標題：</label>
            <input id="title" name="title" type="text" class="form-control" placeholder="請輸入標題">
            <span class="help-block"></span>
        </div>
        <div id="content_field" class="form-group">
            <label for="content">內容：</label>
            <textarea id="content" name="content" rows="10" class="form-control" placeholder="請輸入內容"></textarea>
            <span class="help-block"></span>
        </div>
        <div class="text-right">
            <button id="submit_btn" type="submit" class="btn btn-primary">新增</button>
        </div>
    </form>

    <footer class="footer">
        <hr>
        <p>&copy; 2017 School.com, Inc.</p>
    </footer>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {

    $('#submit_btn').click(function (event) {

        event.preventDefault();

        $('#title_field').removeClass('has-error');
        $('#title_field .help-block').html('').hide();
        $('#content_field').removeClass('has-error');
        $('#content_field .help-block').html('').hide();

        if ($('#title').val() === '') {
            $('#title_field').addClass('has-error');
            $('#title_field .help-block').html('請輸入標題').show();
        }

        if ($('#content').val() === '') {
            $('#content_field').addClass('has-error');
            $('#content_field .help-block').html('請輸入內容').show();
        }

        if ($('#title').val() !== '' && $('#content').val() !== '') {
            $('#title_field').removeClass('has-error');
            $('#title_field .help-block').html('').hide();
            $('#content_field').removeClass('has-error');
            $('#content_field .help-block').html('').hide();

            $('#post_form').submit();
        }

    });

});
</script>
</body>
</html>