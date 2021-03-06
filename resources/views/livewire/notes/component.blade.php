<div>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if($updateMode)
        @include('livewire.notes.update')
    @else
        @include('livewire.notes.create')
    @endif


    <table class="table table-bordered table-condensed">
        <tr>
            <td>ID</td>
            <td>TITLE</td>
            <td>BODY</td>
            <td>ACTION</td>
        </tr>

        @foreach($note as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->title}}</td>
                <td>{{$row->body}}</td>
                <td width="100">
                    <button wire:click="edit({{$row->id}})" class="btn btn-xs btn-warning">Edit</button>
                    <button wire:click="destroy({{$row->id}})" class="btn btn-xs btn-danger">Del</button>
                </td>
            </tr>
        @endforeach
    </table>

</div> 