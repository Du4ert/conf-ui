@foreach ($fileByTypes as $type => $file)
    @include('user.file.show', ['file' => $file ?? null, 'type' => $type])
@endforeach


