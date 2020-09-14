@extends('layouts.app')

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer></script>

    <script>
        window.onload = function() {
            $('#sortable').sortable({
                items: "tr:not(.thead)",
                cursor: "grabbing",
                opacity: 0.6,
                update: function() {
                    updatePriorities();
                }
            });
        }

        function updatePriorities() {
            var priorityList = [];

            $('tr.trow').each( function(index, element) {
                let oldPriority = $(this).find('td:eq(1)').text();
                let newPriority = index + 1;
                let id = $(this).find('td:eq(2)').text();

                if (oldPriority != newPriority) {
                    $(this).find('td:eq(1)').text(newPriority);

                    priorityList.push({
                        id: id,
                        priority: newPriority,
                    });
                }

            });
            console.log(priorityList);


            $.ajax({
                type: "POST",
                url: "/tasks/update-priorities",
                data: {
                    priorityList: priorityList
                },
                success: function(response) {
                    console.log(response);
                }
            });


        }


    </script>

@endsection

@section('content')

    <div class="col-8 offset-2">
        <h3 class="text-center mb-4">Task Priorities</h3>

        <table id="sortable" class="table table-bordered">
            <tr class="thead">
                <th></th>
                <th>Priority</th>
                <th>Id</th>
                <th>TaskName</th>
                <th>UserEmail</th>
            </tr>

            @foreach($tasks as $task)
            <tr class="trow">
                <td><input type="radio" name="taskRadio"></td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->user->email }}</td>
            </tr>
            @endforeach
        </table>

    </div>
@endsection