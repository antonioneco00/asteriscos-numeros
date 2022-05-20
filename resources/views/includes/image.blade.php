@if(Auth::user()->image_path)
    <div class="image-container">
        <img src="{{route('user.image', ['filename' => Auth::user()->image_path])}}" alt="Imagen de usuario" class="image">
    </div>
@endif