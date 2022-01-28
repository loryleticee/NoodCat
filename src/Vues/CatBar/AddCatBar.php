<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page add Cat Bar</title>

    <style>
        #form_controller {
            /* mise en forme formulaire*/
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            line-height: 3em;
        }

        .radius {
            border-radius: 10px;

        }
    </style>


</head>

<body>
  
    <form action="/NoodCat/CatBarA" method="POST" id="form_controller">
        <label for="name_bar">Name bar </label>
        <input type="text" name="name_bar" id="name_bar" class="radius">

        <label for="location">Location </label>
        <input type="text" name="location" id="location" class="radius">

        <input type="submit" value="SAVE INFORMATION" class="radius">
    </form>
</body>

</html>