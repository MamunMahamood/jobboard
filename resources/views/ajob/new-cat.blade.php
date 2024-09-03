<form action="{{ url('store-cat') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        

        <button type="submit" class="btn btn-primary">Add Job</button>
    </form>