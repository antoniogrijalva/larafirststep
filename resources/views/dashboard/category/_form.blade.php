        @csrf
        <label class="mt-2" for="title">Titulo</label>
        <input type="text" name="title" placeholder="Titulo" class="form-control  mb-1  @error('title') is-invalid @enderror"   value="{{ old('title',$category->title) }}">
            @error('title')
                <p class="text-danger mt-0">
                 <small>*{{ $message }}</small>
                </p>
            @enderror

        <label class="mt-2" for="slug">Slug</label>
        <input type="text" name="slug" placeholder="Slug" class="form-control mb-1  @error('slug') is-invalid @enderror"    value="{{ old('slug',$category->slug) }}">
         @error('slug')
                <p class="text-danger mt-0">
                 <small>*{{ $message }}</small>
                </p>
        @enderror
        
        
    
   
            
        @if(isset($task) && $task=='edit')
       
            <button type="submit" class="btn btn-primary">Actualizar</button>
       
        @else
            @if(isset($task) && $task=='show')
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>  
            @else
                <button type="submit" class="btn btn-primary">Insertar</button>
            @endif
        @endif
