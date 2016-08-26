<!DOCTYPE html>
<html>
<head>
    <title>创建用户</title>
    <link rel="stylesheet" type="text/css" href="http://overtrue.me/bootstrap-theme-slim/dist/css/slim-min.css">
    <style type="text/css" media="screen">
        .card {
            max-width: 500px;
            margin:20px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-block">
                <div class="card-title"><h2>创建用户</h2></div>
            </div>
            <div class="card-block">
                <form class="form-horizontal" action="{{ url('user/store') }}" method="post" enctype="multipart/form-data">
                    <div class="from-group">
                        <label for="username">用户名</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                    </div>
                    <div class="from-group">
                        <label for="email">邮箱</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="from-group">
                        <label for="password">密码</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="from-group">
                        <label for="password">重复密码</label>
                        <input type="password" name="password_confirmnation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="avatar">头像</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <fieldset>
                        <legend><h3>拓展信息</h3></legend>
                    </fieldset>
                    <div class="form-group">
                        <label for="province">省份</label>
                        <input type="text" name="extends[province]" class="form-control" value="{{ old('extends.province') }}">
                    </div>
                    <div class="form-group">
                        <label for="city">城市</label>
                        <input type="text" name="extends[city]" class="form-control" value="{{ old('extends.city') }}">
                    </div>
                    <hr>
                    <div class="from-group">
                        <label for=""></label>
                        <input type="submit" value="提交" class="btn btn-primary">
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</body>
</html>