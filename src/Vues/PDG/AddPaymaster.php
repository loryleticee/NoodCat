<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/vues/style.css">

    <title>Form</title>
</head>
<body>
    <div class="d-flex justify-content-center">
        <form method="POST" id="formCss">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">FirstName</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="firstname"" placeholder="firstname">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">LastName</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="lastname" placeholder="lastname">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Age</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name="age" placeholder="age">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Mail</label>
                <input type="mail" class="form-control" id="formGroupExampleInput" name="mail" placeholder="mail">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Pass</label>
                <input type="password" class="form-control" id="formGroupExampleInput" name="password" placeholder="password">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Send</label>
                <input type="submit" class="form-control" id="formGroupExampleInput2" name="send" value="envoyer">
            </div>
        </form> 
    </div>
</body>
</html>