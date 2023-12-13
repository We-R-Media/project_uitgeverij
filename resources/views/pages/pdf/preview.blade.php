<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Preview | Verkoper</title>
    <style>
    *, *::before, *::after {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .preview__wrapper {
        width: 100%;
        height: auto;
    }

    .advertiser__wrapper {
        width: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: baseline;
    }

    .description__wrapper {
        display: table;
        width: 100%;
        border-collapse: collapse;
    }

    .orderline__content, .price__content {
        display: table-cell;
        width: 50%;
        padding: 10px;
        vertical-align: top;
        line-height: 10px;
    }

    h3, h4, h5 {
        font-weight: 500;
    }

    .item {
        list-style: none;
    }

    </style>
</head>
<body>
    <div class="preview__wrapper">
        <div class="advertiser__wrapper">
            <ul class="advertiser__content list">
                <li class="item">{{$order->advertiser->name}}</li>
                <li class="item">{{$order->advertiser->salutation}} {{$order->advertiser->initial}} {{$order->advertiser->last_name}}</li>
                <li class="item">{{$order->advertiser->address}}</li>
                <li class="item">{{$order->advertiser->postal_code}} {{$order->advertiser->city}}</li>
            </ul>
        </div>
        <div class="content__wrapper">
            <h3>{{__('Plaatsingsopdracht')}}</h3>

            <ul class="order__content list">
                <li class="item">
                    <label for="item">{{__('Opdrachtnummer')}}</label>
                    {{$order->id}}
                </li>
                <li class="item">
                    <label for="item">{{__('Datum')}}</label>
                    {{$order->order_date}}
                </li>
                <li class="item">
                    <label for="item">{{__('Debiteurnummer')}}</label>
                    {{$order->advertiser->id}}
                </li>
            </ul>
        </div>
        <h4>{{__('Omschrijving')}}</h4>
        <div class="description__wrapper">
            <ul class="orderline__content list">
            @foreach ($order->orderlines as $orderline)                
                <li class="item">
                    <h4>{{$orderline->project->release_name}}</h4>
                    <p>{{$orderline->project->edition_name}}</p>
                    <p>{{$orderline->format->size}} {{$orderline->format->measurement}}</p>
                    <p>{{@money($orderline->price_with_discount)}}</p>
                </li>
            @endforeach
        </ul>
        <ul class="price__content list">
            <li class="item">
                <h4>{{__('Totaalprijs excl. BTW')}}</h4>    
                <p>{{@money($order->order_total_price)}}</p>
            </li>
            <li class="item">
                <h4>{{__('BTW')}}</h4>    
                <p>{{@money($order->order_total_price / 100 * 21)}}</p>
            </li>
            <li class="item">
                <h4>{{__('Totaalprijs incl. BTW')}}</h4>    
                <p>{{@money($order->order_total_price / 100 * 121)}}</p>
            </li>
        </ul>
    </div>
    </div>

</body>
</html>