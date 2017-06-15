@extends('layouts.app')



@section('content')

<!-- include summernote css/js-->

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>



<div class="panel panel-default main-content">

    <div class="panel-heading">

        <h3 class="panel-title">Sửa tin</h3>

    </div>

    <div class="panel-body">

        @if($errors->any())

            <div class="alert alert-danger">

                @foreach($errors->all() as $error)

                    <p>{{ $error }}</p>

                @endforeach

            </div>

        @endif



        @if(Session::has('flash_message'))

            <div class="alert alert-success">

                {{ Session::get('flash_message') }}

            </div>

        @endif

        

        {{ Form::model($news, array('method' => 'PATCH', 'route' => array('news.update', $news->id), 'files'=>true, 'class' => 'form-horizontal')) }}

        <div class="form-group">

            {!! Form::label('title', 'Phần tiêu đề:', ['class' => 'col-sm-2 control-label']) !!}

            <div class="col-sm-10">

                {!! Form::text('title', $news->title, ['class' => 'form-control', 'placeholder' => 'Phần tiêu đề']) !!}

            </div>

        </div>

        

        <div class="form-group">

            {!! Form::label('description', 'Phần nội dung:', ['class' => 'col-sm-2 control-label']) !!}

            <div class="col-sm-10">

                {!! Form::textarea('description', $news->description, ['class' => 'form-control summernote', 'placeholder' => 'Phần nội dung']) !!}

            </div>

        </div>

        

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <img src="{{ URL::to('/') }}/images/{{ $news->image }}" alt="" width="120px" height="90px" /></td> 
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('image', 'Ảnh:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                <input type="file" name="image">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} 
            {{ link_to_route('news.show', 'Cancel', $news->id, array('class' => 'btn btn-default')) }}
        </div>

        {!! Form::close() !!}
        </div>

    </div>

</div>



<script type="text/javascript">

$(document).ready(function(){

  $('#create_tour').on('keyup keypress', function(e) {

    var keyCode = e.keyCode || e.which;

    if (keyCode === 13) { 

      e.preventDefault();

      return false;

    }

  });

  

  $('.summernote').summernote({

      toolbar: [

        ['style', ['style']],

        ['font', ['bold', 'italic', 'underline']],

        ['fontsize', ['fontsize']],

        ['color', ['color']],

        // ['para', ['ul', 'ol', 'paragraph']],

        ['table', ['table']],

        ['insert', ['link', 'picture', 'hr']]

      ],

    height:300,

    callbacks: {

        onImageUpload : function(files, editor, welEditable) {

             for(var i = files.length - 1; i >= 0; i--) {

                     sendFile(files[i], this);

            }

        }

    }

  });

    

    function sendFile(file, el) {

        var form_data = new FormData();

        form_data.append("_token","{{ csrf_token() }}");

        form_data.append('file', file);

        $.ajax({

            data: form_data,

            type: "POST",

            url: '{{ URL::to('/') }}/ajaximage',

            cache: false,

            contentType: false,

            processData: false,

            success: function(url) {

                $(el).summernote('editor.insertImage', url);

            }

        });

    }

});

</script> 



@stop