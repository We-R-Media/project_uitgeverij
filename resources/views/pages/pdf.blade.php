
<img style=" width:240px; height:auto; position: absolute; top:0; right:0; object-fit:contain" src="{{public_path('images/conceptplus_logo.jpg')}}" alt="">

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr class="row">
                <th>Layout</th>
                <th>Plaatsnaam</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            <td>{{$layouts->layout_name}}</td>
            <td>{{$layouts->city_name}}</td>
            <img style="width:50px; height:50px;"src="{{ public_path('images/wer_logo.png') }}" alt="">
        </tbody>
    </table>
</div>