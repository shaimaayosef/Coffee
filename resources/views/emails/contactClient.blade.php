<x-mail::message>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
</head>
<body>
    <h1>New Contact Message</h1>
    <p><strong>Name:</strong> {{ $mailData['name'] }}</p>
    <p><strong>Email:</strong> {{ $mailData['email'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $mailData['theMessage'] }}</p>
</body>
</html>
</x-mail::message>