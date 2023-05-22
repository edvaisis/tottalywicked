<div class="row">
    <div class="col-lg-8"></div>
    <div class="col-lg-4">
        <form action="{{ route('characters.search') }}" method="GET" class="mb-3">
            <label for="query"><strong>Search for character</strong></label>
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Enter character name">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</div>
