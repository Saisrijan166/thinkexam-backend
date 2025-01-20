<div>
    <h>update {{$edit->name}}</h>
    <br><br>
    <form action="/editstudent/{{$edit->id}}" method="post">        
        <input type="hidden" name="_method" value="put" />
        @csrf
        <input type="text" name="name" value="{{$edit->name}}" />
        <br><br>
        <input type="text" name="email" value="{{$edit->email}}" />
        <br><br>
        <button type="submit" name="submit">update</button>
        <br><br>
        <a href="/list" >back</a>
    </form>
</div>
