@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Impersonate a user</div>

                <div class="panel-body">
                    <form action="{{ route('admin.impersonate') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-default">Impersonate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
