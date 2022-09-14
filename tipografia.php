<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div id="posts">Content</div>
<button type="button" onclick="changeFont()">Change the font!</button>, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/tipografia.css">
</head>
<body  id="posts">
<div class="amatic">Content</div>
<button type="button" onclick="changeFont()">Change the font!</button>
<script>function changeFont() {
  var fon = document.getElementById("posts");
  if (fon.className == "amatic") {
    fon.className = 'roman';
  } else {
    fon.className = 'amatic';
  }
}

</script>
</body>
</html>