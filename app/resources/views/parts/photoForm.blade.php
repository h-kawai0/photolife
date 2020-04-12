<article class="p-photoEdit">

<form method="POST" action="{{ route('updatePhotoEdit', $picture) }}" class="p-photoEdit" enctype="multipart/form-data">
            @csrf
        {{-- <input type="file" name="pic"> --}}

            @error('pic')
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror
            
        <edit-pic :picture="{{ $picture }}"></edit-pic>

            <label>タイトル
            <input type="text" class="p-photoEdit__input @error('title') p-photoEdit--err @enderror" value="{{ $errors->has('*') ? old('title'): ($picture->title) ?? '' }}" name="title" placeholder="タイトル" autofocus required>
            </label>

            @error('title')
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror

            <label>本文
            <textarea class="p-photoEdit__txt @error('detail') p-photoEdit--err @enderror" value="" name="detail">{{ $errors->has('*') ? old('detail'): ($picture->detail) ?? '' }}</textarea>
            </label>

            @error('detail')
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror
            

            @if ( !$tags->isEmpty() )
            
            @foreach($tags as $tag)
            
            <label>
                タグ{{$loop->index + 1}}
                <input type="text" name="tags[]" class="p-photoEdit__input @error('tags.'.($loop->index) ) p-photoEdit--err @enderror" value="{{ $errors->has('*') ? old('tags.'.($loop->index) ): ($tag->name ) ?? '' }}">
            </label>

            @error('tags.'.($loop->index) )
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror

            
            @if($loop->last && $loop->count < 10)
            
            @for($i = $loop->count + 1 ; $i <= 10; $i++)
            <label>
                タグ{{$i}}
                <input type="text" name="tags[]" class="p-photoEdit__input @error('tags.'.($i) ) p-photoEdit--err @enderror" value="{{ old('tags.'.($i)) }}">
            </label>

            @error('tags.'.($i))
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror

            
            @endfor
            
            @endif
            
            @endforeach
            
            @else

            @for($i = 0 ; $i < 10; $i++)
            
            <label>
                タグ{{$i + 1}}
                <input type="text" name="tags[]" class="p-photoEdit__input @error('tags.'.($i) ) p-photoEdit--err @enderror" value="{{ old('tags.'.($i) ) }}">
            </label>

            @error('tags.'.($i) )
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror

            @endfor

            
            
            @endif
                



            {{-- @for($i = 1; $i <= 10; $i++)
            <label>
                タグ{{$i}}
            <input type="text" name="tags[]" class="p-photoEdit__input @error('tags[]'.$i) p-photoEdit--err @enderror" value="{{ $errors->has('*') ? old('tags[]'.$i): ($picture->tags ) ?? '' }}">
            </label>

            @error('tags[]'.$i)
            <span class="p-photoEdit--alert">
                {{ $message }}
            </span>
            @enderror
            @endfor --}}

            <input type="submit" class="p-photoEdit__btn" value="保存">
        </form>
    </article>
