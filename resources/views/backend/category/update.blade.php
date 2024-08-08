
<form action="{{ route('category.update') }}" method="Post" >
    @csrf

    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="form-group">
      <label for="category_name">Category Name</label>
      <input type="text" name="name" class="form-control" value="{{ $data->name }}">
    </div> 

    <div class="form-group">
        <label for="exampleInputFile">Publication</label>
        <select name="status" id="" class="form-control" >
         
            
            <option value="1" @if ($data->status==1) selected @endif>Active</option>
            <option value="0" @if ($data->status==0) selected @endif>Deactive</option>
            
        </select>
      </div><hr>
    
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  <button type="Submit" class="btn btn-primary">Update</button>
</div>
</form>