@extends('layout')

@section('list-tags')
    <div class="m-3 border border-danger">
        <div class="form-group row m-2">
            <div class="m-3">
                <h2 class="mb-3 text-center">List-tags</h2>
                @forelse ($tags as $tag)
                    @if ($loop->first)
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                </tr>
                            </thead>
                    @endif
                        <tbody>
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->title }}</td>
                                <td>{{ $tag->slug }}</td>
                            </tr>
                        </tbody>
                    @if ($loop->last)
                        </table>
                    @endif
                    @empty
                        <p class="m-3 text-center">No tags, sorry fren. Better luck next time.</p>
                    @endforelse
                <div class="m-3 text-center">
                    <p class="mb-3">Actions:</p>
                    <button onclick="location.href='/tag/create'" type="submit" class="btn btn-danger" name="button">create-category</button>
                    <button onclick="location.href='/tag/update'" type="submit" class="btn btn-danger" name="button">update-category</button>
                    <button onclick="location.href='/tag/delete'"" type="submit" class="btn btn-danger" name="button">delete-tag</button>
                </div>
            </div>
        </div>
@endsection
