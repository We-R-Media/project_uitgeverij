<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdrachtbevestiging</title>
    <style>

        *,*::before, *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .pdf__container {
            display: flex;
            align-items: baseline;
            flex-direction: column;
            flex-wrap: wrap;
            width: 100%;
            height: 99%;
            margin: auto;
        }

        label {
            font-weight: 600;
            font-family: 'Roboto', sans-serif;

        }



    </style>
</head>
<body>
    <div class="pdf__container">
        <fieldset class="form__section">
            <h3>{{__('Klantgegevens')}}</h3>
            <div class="field">
                <p>{{$order->advertiser->name}}</p>
            </div>
            <div class="field">
                <p>{{$order->advertiser->po_box}}</p>
            </div>
            <div class="field">
                <p>{{$order->advertiser->postal_code}} {{$order->advertiser->city}}</p>
            </div>
        </fieldset>
        <fieldset class="form__section">
            <h3>{{__('Opdrachtgegevens')}}</h3>
            <div class="field">
                <label>{{__('Opdrachtnummer:')}}</label>
                <p>{{$order->id}}</p>
            </div>
            <div class="field">
                <label>{{__('Datum:')}}</label>
                <p>{{$order->created_at->format('d-m-Y')}}</p>
            </div>
        </fieldset>
    </div>
</body>
</html>
