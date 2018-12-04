@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            افزودن گالری به {{$product->name}}
        </header>
        <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-2 control-label">تصاویر مورد نظر</label>
                    <div class="col-sm-10">
                        <form action="{{ url('admin/product/upload?id='.$product->id) }}" method="post" class="dropzone">
                            {{csrf_field()}}
                            <input type="file" name="file" style="display: none" multiple />
                        </form>
                    </div>
                </div>
        </div>
    </section>
@endsection
@section('script')

    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection
