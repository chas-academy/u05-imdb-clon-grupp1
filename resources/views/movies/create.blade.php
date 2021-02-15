<div>
    <h1> Add new movie </h1>
    <form action="" method="POST">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
        <label for="actors">Actors</label>
        <input type="text" id="actors" name="actors">
        <label for="language">Language</label>
        <input type="text" id="language" name="language">
        <label for="release_date">Release Date</label>
        <input type="date" id="release_date" name="release_date">
        <label for="img_path">Add movie image url</label>
        <input type="url" id="img_path" name="img_path">
        <label for="trailer_path">Add movie trailer url</label>
        <input type="url" id="trailer_path" name="trailer_path">
        <input type="submit">
    </form>

</div>
