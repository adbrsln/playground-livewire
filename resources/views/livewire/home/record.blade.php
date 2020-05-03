<tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->email_verified_at }}</td>
    <td class="d-flex justify-content-center">
        <button type="button" wire:click="editRecord" class="btn btn-sm btn-primary">
            Edit
        </button> &nbsp;
        <button type="button" class="btn btn-sm btn-danger"
        onclick="confirm('Are you sure?')||event.stopImmediatePropagation()"
        wire:click="deleteRecord" >Delete</button>
    </td>
</tr>

