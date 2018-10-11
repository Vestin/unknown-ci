@extends('basic')

@section('title')
    hooks
@endsection

@section('content')
    <h1>hooks</h1>
    <table class="table">
        <thead>
        <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Super Admin</th>
            <th>Active Status</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><strong>{{ $user->name }}</strong></td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->isSuperAdmin())
                        <i class="glyphicon glyphicon-ok-circle text-success" title="Super Man"></i>
                    @else
                        <i class="glyphicon glyphicon-remove-circle text-danger" title="Power is limited"></i>
                    @endif
                </td>
                <td>
                    @if($user->isActive())
                        <i class="glyphicon glyphicon-ok-circle text-success"></i>
                    @else
                        <i class="glyphicon glyphicon-remove-circle text-danger"
                           title="Cannot sign in to this site"></i>
                    @endif
                </td>
                <td>
                    @if($user->isSuperAdmin())
                        <form action="{{ route('user.de-active-super-admin',[$user->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <button class="btn btn-danger">Set as Normal User</button>
                        </form>
                    @else
                        <form action="{{ route('user.active-super-admin',[$user->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <button class="btn btn-primary">Set as Super Admin</button>
                        </form>
                    @endif

                    @if($user->isActive())
                        <form action="{{ route('user.de-active',[$user->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <button class="btn btn-danger">De Active User</button>
                        </form>
                    @else
                        <form action="{{ route('user.active',[$user->id]) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <button class="btn btn-primary">Active User</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Super Admin</th>
            <th>Active Status</th>
            <th>action</th>
        </tr>
        </tfoot>
    </table>
@endsection
