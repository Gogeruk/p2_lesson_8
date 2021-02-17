@extends('layout')

@section('update-category')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3 text-center">
            <div class="m-3 text-center">
                <p class="mb-3">Update category by id plz</p>
                <form class="m-3" action="/category/{{ $id }}/update" method="get">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" class="form-control m-2" id="id" placeholder="your id" value="{{"$id"}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control m-2" id="title" placeholder="your title" value="{{"$title"}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" class="form-control m-2" id="slug" placeholder="your slug" value="{{"$slug"}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" id="button" name="submit">update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
