@foreach ($errors->all() as $loi)
    {{-- <p class="alert alert-danger" style="position:relative;left: 400px;">{{$loi}}</p> --}}
    <p class="alert alert-danger" style="  text-align: center;">{{$loi}}</p>
@endforeach