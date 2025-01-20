<div>
<h1> 
    add student
</h1>
<form action="add" methode="get"> 
    @csrf
    <input type="text" name="id" placeholder="id"/>
    <br> <br>
    <input type="text" name="name" placeholder="name"/>
    <br><br>
    <input type="text" name="email" placeholder="email"/>
    <br><br>
    <button type="submit" name="submit"> submit </button>
</form>
</div>
