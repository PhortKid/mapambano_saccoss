<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('lipa_mkopo')}}" method="post">
        <input type="text" name="user_id" value="2">
       loan <input type="text" name="loan_id" id="">
        <input type="text" name="amount" id="">
        @csrf
        <input type="submit" value="submit">
    </form>
    
</body>
</html>