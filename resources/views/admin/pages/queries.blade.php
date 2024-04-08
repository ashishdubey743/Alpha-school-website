@include('admin/templates/header')  
<style>
       .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination > .page-item > .page-link {
        color: #6c757d;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
    }

    .pagination > .page-item > .page-link:hover {
        color: #007bff;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .pagination > .page-item.active > .page-link {
        z-index: 3;
        color: #ffffff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .table td.message-cell {
      white-space: nowrap; /* Prevent wrapping */
      overflow: hidden; /* Hide overflow content */
      text-overflow: ellipsis; /* Add ellipsis (...) */
      max-width: 200px; /* Set a desired max-width */
    }

</style>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Contact Queries</h6>
        </div>
        <div class="table-responsive">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col"><input class="form-check-input" type="checkbox"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($queries as $query)
                    <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>{{ ucfirst($query->name) }}</td>
                        <td>{{ $query->phone }}</td>
                        <td>{{ $query->email }}</td>
                        <td class="message-cell">{{ $query->message }}</td> <td>
                            <button type="button" class="btn btn-sm btn-primary me-1 viewMessage" data-bs-toggle="modal" data-bs-target="#messageModal" >View</button>
                            <button type="button" class="btn btn-sm btn-danger" onClick="delete_query({{ $query->id }}, this)">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                    </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Full Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="fullMessageText"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Message modal for contact query
    let messageTextId = document.getElementById('fullMessageText');

    if (messageTextId) {
        let viewButtons = document.querySelectorAll('.viewMessage');

        if (viewButtons) {
            viewButtons.forEach(function (viewButton) {
                viewButton.onclick = function () {
                    let messageCell = viewButton.closest('tr').querySelector('.message-cell');
                    let fullMessage = messageCell.textContent;
                    messageTextId.textContent = fullMessage;
                };
            });
        }
    }

</script>

@include('admin/templates/footer')  
