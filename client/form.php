<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        #status {
            text-align: center;
            margin-top: 20px;
        }

        #district {
            margin-top: 20px;
            text-align: center;
        }

        .container {
            border: 1px solid black;
            margin-top: 300px;
        }

        .button {
            margin: 20px 0;
            text-align: center;
        }

        .title {
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title">
        <h1>Form FeedBack</h1>
    </div>
    <form method="post" name="feedback-form" action="../api/store-feedback.php">
        <div class="row">
            <div class="col-12" style="margin-top: 10px">
                Name <input class="form-control" type="text" name="name" required>
            </div>
            <div class="col-12" style="margin-top: 10px">
                Email <input class="form-control" type="text" name="email" required>
            </div>
            <div class="col-12" style="margin-top: 10px">
                TelePhone <input class="form-control" type="text" name="telephone" required>
            </div>
            <div class="form-floating col-12" style="margin-top: 10px">
                Content
                <textarea class="form-control" placeholder="Leave a comment here" name="content" id="floatingTextarea2"
                          style="height: 100px"></textarea>
            </div>
        </div>
        <div class="button">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        const inputName = $('input[name=name]');
        const inputEmail = $('input[name=email]');
        const inputTelephone = $('input[name=telephone]');
        const inputContent = $('textarea[name=content]');
        $('form[name=feedback-form]').submit(function (event) {
            event.preventDefault();
            let data = {
                name: inputName.val(),
                email: inputEmail.val(),
                telephone: inputTelephone.val(),
                content: inputContent.val(),
            }
            console.log(data)
            $.ajax({
                url: 'http://localhost:2910/dw2/api/store-feedback.php',
                method: 'POST',
                data: JSON.stringify(data),
                success: function (responseData) {
                    alert(responseData.message);
                    // loadData();
                },
                error: function () {

                }
            });
        });
    })
</script>
</body>
</html>

