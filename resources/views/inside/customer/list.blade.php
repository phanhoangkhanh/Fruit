<div class="card" >
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th scope="col">5.cus/page</th>
                    <th scope="col">Name (unique)</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            @if($list)
            <tbody>
               
                @foreach( $list as $per)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$per->name}}</td>
                    <td>{{$per->mobile}}</td>
                    <td>{{$per->address}}</td>
                </tr>
                @endforeach
                
            </tbody>
            @endif
        </table>
        {{$list->links()}}
    </div>
</div>
</div>