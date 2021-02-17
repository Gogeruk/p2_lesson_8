@extends('layout')

@section('delete-tag')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3 text-center">
            <div class="m-3 text-center">
                <p class="mb-3">Delete tag by id plz</p>
                <form class="m-3" action="/tag/delete" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="id" class="form-control m-2" id="id" placeholder="your id" value="{{"$id"}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger" id="button" name="submit">delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
