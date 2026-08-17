     <form action="{{ route('todo.update', $task->id) }}" method="post" enctype="multipart/form-data" required>
                @csrf
                <div class="row">

                    <div class="col-lg-9">

                        <div class="form-group">
                            <input class="form-control m-3" value="{{ $task->title }}" name="title" type="text" placeholder="Enter your task to do">
                        </div>

                    </div>

                    <div class="col-lg-2">
                        <button type="submit" class="m-3 btn btn-primary">Update</button>
                    </div>

                </div>

            </form>