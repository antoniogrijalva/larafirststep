        @csrf
        <label class="mt-2" for="title">Titulo</label>
        <input type="text" name="title" placeholder="Titulo" class="form-control  mb-1  @error('title') is-invalid @enderror"   value="{{ old('title',$post->title) }}">
            @error('title')
                <p class="text-danger mt-0">
                 <small>*{{ $message }}</small>
                </p>
            @enderror

        <label class="mt-2" for="slug">Slug</label>
        <input type="text" name="slug" placeholder="Slug" class="form-control mb-1  @error('slug') is-invalid @enderror"    value="{{ old('slug',$post->slug) }}">
         @error('slug')
                <p class="text-danger mt-0">
                 <small>*{{ $message }}</small>
                </p>
        @enderror
        
        <div class="row">
            <div class="col-6">
                <label class="mt-2" for="content">Contenido</label>
                <textarea  rows="5" name="content" placeholder="Contenido" class="form-control mb-1  @error('content') is-invalid @enderror" >{{ old('content',$post->content) }}</textarea>
                 @error('content')
                    <p class="text-danger mt-0">
                        <small>*{{ $message }}</small>
                    </p>
                @enderror
            </div>
            <div class="col-6">
                <label class="mt-2" for="description">Descripcion</label>
                <textarea rows="5" name="description" placeholder="Descripcion" class="form-control mb-1  @error('description') is-invalid @enderror" >{{ old('description',$post->description) }}</textarea>
                 @error('description')
                    <p class="text-danger mt-0">
                        <small>*{{ $message }}</small>
                    </p>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label class="mt-2" for="category_id">Categoria</label>
                <select name="category_id" class="form-control mb-2">
                    {{-- si utilizamos "pluck" lo utilizamos de esta manera--}}
                    @foreach ($categories as $title_aa => $id_aa)
                        <option value="{{$id_aa}}" {{ old('category_id',$post->category_id) == $id_aa ? 'selected' : '' }}>{{$title_aa}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label class="mt-2" for="posted">posted</label>
                <select name="posted" class="form-control mb-2">
                    <option value="yes" {{ old('posted',$post->posted) == 'yes' ? 'selected' : '' }}>Si</option>
                    <option value="not" {{ old('posted',$post->posted) == 'not' ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>
    
   
            
        @if(isset($task) && $task=='edit')
        <div class="row">
     
            <div class="col-8">
                <label class="mt-2" for="image"><b>Imagen</b></label>
                <input type="file" name="image" class="form-control mb-2 mt-2  @error('image') is-invalid @enderror" accept="image/*">
                @error('image')
                    <p class="text-danger mt-0">
                        <small>*{{ $message }}</small>
                    </p>
                @enderror
                 <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
            <div class="col-4 _text-end mt-2">
                @if(isset($post) && !empty($post->image))
                    <img src="{{ asset('uploads/post/' . $post->image) }}" class="img-fluid" alt="" >
                    <p style="font-size:9px"> {{$post->image}}</p>
                @endif      
            </div>
        </div>
        @else
            @if(isset($task) && $task=='show')
            <div class="row">
                <div class="col-8">
                    @if(isset($post) && !empty($post->image))
                        <img src="{{ asset('uploads/post/' . $post->image) }}" class="img-fluid" alt="" >
                        <p style="font-size:9px"> {{$post->image}}</p>
                    @endif   
                </div>
                <div class="col-4 text-end mt-2">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>  
                </div>
            </div>      
            @else
                <button type="submit" class="btn btn-primary">Insertar</button>
            @endif
        @endif
