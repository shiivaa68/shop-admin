@extends('layouts.admin')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            افزودن فیلتر جدید
        </header>
        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="post" action="{{route('filter.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-2 control-label">دسته بندی</label>
                    <div class="col-sm-10">
                        <select name="cat_id" class="form-control input-lg m-bot15">
                            @foreach($cats as $val)
                                <option value="{{$val['id']}}">{{$val['title_fa']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">فیلتر والد</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control input-lg m-bot15">
                            <option value="0">سرگروه</option>
                            @foreach($filters as $val)
                                <?php $cat=\App\Category::where('id',$val['cat_id'])->first(); ?>
                                <option value="{{$val['id']}}">{{$cat['title_fa']}} :: {{$val['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        <span class="btn btn-danger" onclick="addFilter()" >افزودن فیلتر</span>
                    </label>
                    <div class="col-sm-10" id="filters_holder">


                    </div>


                </div>

                <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-danger" type="submit">Save</button>
                    <button class="btn btn-default" type="reset">Cancel</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function addFilter(){
            var count=document.getElementsByClassName('filter_div').length+1;
            var txt='<div style=" height: 30px; margin: 10px 0;" class="filter_div">' +
               '<input name="name['+count+']" type="text" style="margin-left: 10px;" placeholder="نام فیلتر">' +
               '<input name="en_name['+count+']" type="text" style="margin-left: 10px;" placeholder="نام انگلیسی فیلتر">' +
               '<select name="type['+count+']" id="" style="margin-left: 10px;">' +
               '<option value="1"> دکمه رادیویی</option>' +
               '<option value="2">انتخابگر رنگ</option>' +
               '</select>' +
               '</div>';
            $("#filters_holder").append(txt);
        }
    </script>
@endsection