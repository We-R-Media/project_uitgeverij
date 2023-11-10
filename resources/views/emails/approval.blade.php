<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approval mail</title>
</head>
<body>
    <ul>
        <label for="order_id">{{__('Opdrachtnummer:')}}</label>
        {{$order->id}}
        <label for="name">{{__('Bedrijfsnaam:')}}</label>
        {{$order->advertiser->name}}
    </ul>
    <article>
        <h2>Geachte heer/mevrouw,</h2>
        <p>        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae quas laborum dignissimos voluptas quo natus minus explicabo unde temporibus molestiae, numquam, veniam porro asperiores facilis eos provident nemo. Blanditiis, neque!
            Met vriendelijke groet,
            Concept Plus B.V.
        </p>

            <a onclick="event.preventDefault(); document.getElementById('approve-form').submit();">Klik hier om akkoord te gaan.</a>

            <form action="{{ route('orders.approved', $order->id) }}" id="approve-form">
                @csrf
            </form>
    </article>
</body>
</html>