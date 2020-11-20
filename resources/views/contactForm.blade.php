<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form class="form" action="POST" method="post">
        <input type="hidden" name="form-name" value="form 1">
        <label for="full-name" class="label">name</label>
        <input id="full-name" name="full-name" placeholder="Full name" required="" class="">
        <label for="email" class="label">email</label> <input type="email" id="email" name="email" placeholder="Email"
            required="">
        <label for="subject" class="label">subject</label>
        <input id="subject" name="subject" placeholder="Subject" required="">
        <label for="message" class="label">message</label>
        <textarea id="message" name="message" cols="6" placeholder="Your Message Here..."></textarea>
        <label for="submit" class="label">submit</label>
        <input type="submit" id="submit" value="submit">
    </form>
</body>

</html>
