@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="mt-5 mb-5">
            <h1>My ToDo List</h1>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data" required>
                @csrf
                <div class="row">

                    <div class="col-lg-10">

                        <div class="form-group">
                            <input class="form-control m-3" name="title" type="text" placeholder="Enter your task to do" aria-describedby="inputGroup-sizing-lg" required>
                        </div>

                    </div>

                    <div class="col-lg-2">
                        <button type="submit" class="m-3 btn btn-primary">Add</button>
                    </div>

                </div>

            </form>
        </div>

        <div class="col-lg-12">
            <div>
                <table class="table table-striped table-success">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ($task->done == 0)
                                        <span class="badge bg-warning">Not Completed</span>
                                    @else
                                        <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('todo.delete', $task->id)}}" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('todo.done', $task->id)}}" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                    </a>

                                    <a href="javascript:void(0)" class="btn btn-primary"
                                        onClick="taskEditModal({{ $task->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection


<!-- Modal for edit Task feature-->
<div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit your task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="taskEditContent">
                Change your task
            </div>
            
        </div>
    </div>
</div>


@push('css')
    <style>
        .page-title {
            padding: 5px;
            font-size: 36px;
            font-weight: bold;
            color: #535252;
            margin-top: 50px;
        }
    </style>
@endpush

@push('js')
<script>
    function taskEditModal(task_id) {

        var data = {
            task_id: task_id
        };

        $.ajax({
            url: "{{ route('todo.edit') }}",
            type: "GET",
            dataType: "html",
            data: data,

            success: function(response) {
                $('#taskEditContent').html(response);

                var modal = new bootstrap.Modal(
                    document.getElementById('taskEdit')
                );

                modal.show();
            },

            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });

    }
</script>
@endpush