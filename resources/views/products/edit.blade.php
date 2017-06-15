@extends('layouts.app')



@section('content')

<!-- include summernote css/js-->

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>



<div class="panel panel-default main-content">

    <div class="panel-heading">

        <h3 class="panel-title">Sửa nông sản</h3>

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

        

        {{ Form::model($product, array('method' => 'PATCH', 'route' => array('product.update', $product->id), 'files'=>true, 'class' => 'form-horizontal', 'id' => 'create-product')) }}

        <div class="form-group">

            {!! Form::label('title', 'Tên nông sản:', ['class' => 'col-sm-2 control-label']) !!}

            <div class="col-sm-10">

                {!! Form::text('title', $product->name, ['class' => 'form-control', 'placeholder' => 'Phần tiêu đề']) !!}

            </div>

        </div>

        

        <div class="form-group">

            {!! Form::label('description', 'Phần mô tả:', ['class' => 'col-sm-2 control-label']) !!}

            <div class="col-sm-10">

                {!! Form::textarea('description', $product->description, ['class' => 'form-control summernote', 'placeholder' => 'Phần mô tả']) !!}

            </div>

        </div>

        <?php 
            if(strlen($product->images) > 0){
                $temp = substr($product->images,0,-1);
                $images = explode( ';', $temp ); 
        ?>

        <div class="content">
            <div id="galleria">
                <?php 
                foreach ($images as $image) {?>
                    <a href="<?php echo URL::to('/') . '/images/' . $image; ?>">
                        <img 
                            src="<?php echo URL::to('/') . '/images/' . $image;?>"  width="180px" height="120px"
                        >
                    </a>
                <?php
                    }
                ?>
            </div>
        </div>

        <?php 
        }
        ?>
        

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <img src="{{ URL::to('/') }}/images/{{ $product->images }}" alt="" width="120px" height="90px" /></td> 
            </div>
        </div>


        <div class="form-group">
            {!! Form::label('images', 'Ảnh:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                <input type="file" name="images1[]">
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Tên danh mục:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-4">
                {!! Form::select('category', $categories, $product->category, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Lưu', array('class' => 'btn btn-info')) }} 
            {{ link_to_route('product.show', 'Cancel', $product->id, array('class' => 'btn btn-default')) }}
        </div>

        {!! Form::close() !!}
        </div>

    </div>

</div>



<script type="text/javascript">

$(document).ready(function(){

  $('#create-product').on('keyup keypress', function(e) {

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