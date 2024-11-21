@extends('dash_layout.index')


@section('content')

<div class="container">
    <h1 class="my-4">List Of Applicant</h1>
    
    <table class="table table-striped table-bordered" >
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Jina</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1;  ?>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $i++}}</td>
                    <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                   
                    <td>
                        <a href="{{ route('users.report', $user->id) }}" ><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection