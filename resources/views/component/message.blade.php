@if (Session::has('success'))
    <div class="pt-3 bg-dark mt-5">
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    </div>
@endif

@if ($errors->any())
    <div class="pt-3 mt-5">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

