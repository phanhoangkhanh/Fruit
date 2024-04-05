<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style>
        .table{
            border: 1px solid black;
            width: 100%
        }
        thead{
            background-color: blue;
            border: 1px solid black;
        }
        tr{
            border: 1px solid black;
        }
        td{
            border: 0.3px solid black;
            text-align: center;
        }

    </style>
</head>
<body>
    <H3>DEAR Mr./Mrs {{$obj->hasCustomer?->name}}</H3>
    <p>
        We are so appriciate for your order. Your detail order information in below table. 
    </p>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name of Fruit</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price at time</th>
                    <th scope="col">Cost</th>
                </tr>
            </thead>
            <tbody>
                @foreach($obj->hasItem as $per)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$per->hasFruit?->name}}</td>
                    <td>{{$per->quantity}}</td>
                    <td>{{$per->price_at_sell}}</td>
                    <td>{{$per->quantity*$per->price_at_sell}}$</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <p>Your ToTal Cost: <b>{{$obj->total_cost}}$</b></p>



    
</body>
</html>