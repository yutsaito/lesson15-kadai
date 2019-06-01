@if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
        @endforeach
    </ul>
@endif
{{-- このｴﾗｰﾒｯｾｰｼﾞは共通部分に@include させる。resources/views/layouts/app.blade.php --}}
{{-- そしてそれがcreate.blade.php 、edit.blade.php でさらに@include されて表示される --}}