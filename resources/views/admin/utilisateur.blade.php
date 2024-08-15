@extends('admin.layout')
@section('content')
<button type="button" class="btn btn-primary">
    <a class="text-white" href="{{route('ajouter_user')}}"><i class="bi bi-plus"></i> Add user</a>
</button>

<div
    class="table-responsive"
>
    <table
        class="table table-striped table-hover table-borderless  align-middle"
    >
        <thead class="table-light">
            <caption>
               Table utilisateurs
            </caption>
            <tr>
                <th>Name </th>
                <th>Email</th>
                <th>role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
            <tr>
                <td scope="row">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td class="d-flex">
                    <form id="delete-form-{{ $user->id }}" action="{{ route('delete_user', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    <a href="{{ route('showuser', ['id' => $user->id]) }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        
            
               
           
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
</div>

@endsection