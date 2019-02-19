<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>name test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .name{
              width:200px;
              height:50px;
            }
            .next{
              width:100px;
              height:50px;
            }
        </style>
    </head>
    <body>

            <div class="content">
                <div class="title m-b-md">
                    Tell Me Your Name
                </div>
                <form method="get" action="{{ url('/name/name_test_result',[request()->route('name')])}}">
                  <p><input type="text" name="name" class="name"></p>
                  <p><input type="submit" value="next" class="next"></p>
                </form>
            </div>
        </div>
    </body>
</html>
