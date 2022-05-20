@if(session('message'))
    <div class="alert alert-info mb-4">
        {{session('message')}}
    </div>
@endif