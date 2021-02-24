<h1>Movies</h1>
<a href="/movies">Back</a><br>

    {{$movie->title}} 
    {{$movie->description}} 
    <br>

{{--  På denna sida tänkt att man kan föra in reviews --}}
<a href="/reviews/{{$movie->id}}/create">Add review</a><br>
<br>
@foreach($movie->reviews as $review)
    {{$review->review}}<br>
    {{$review->rating}}<br>
    <form action="{{route('reviews.destroy', $review->id)}}" method="post">
    @csrf
    @method('DELETE')   
    <button type="submit" name="delete">Delete review</button> 
    </form>
@endforeach

{{-- Skapa relation till reviews? --}}
    {{-- @foreach ($movie->reviews as $review)
        {{$review->review}}
        {{$review->rating}}
    @endforeach --}}
    

    