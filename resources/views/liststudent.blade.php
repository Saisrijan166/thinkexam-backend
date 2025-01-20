<div>
 list of students
 <br><br>
    <form action="search" method="get" >
        <input type="text" name="search" placeholder="search" value={{@$searchvalue}} >
        <button>search</button>
    </form>
    <br><br>
    <form action="deleteall" method="post">
        @csrf
    <button type="submit" name="submit">delete all</button> 
    
      <br><br>
 <table border="1"> 
    <tr> 
        <td>select</td>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>created_at</td>
        <td>updated_at</td>
        <td>operations</td>
    </tr>
    @foreach ($students as $student)
    <tr> 
        <td><input type="checkbox" name="ids[]" value="{{$student->id}}"></td>
        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->created_at}}</td>
        <td>{{$student->updated_at}}</td>
        <td>
            <a href="{{'delete/'.$student->id}}">delete</a>
            <a href="{{'edit/'.$student->id}}">edit</a>
        </td>
    </tr>
    @endforeach
 </table>
</form>
 {{$students->links()}}
</div>

<style>
    .w-5.h-5{
        width: 20px;
    }
</style>
