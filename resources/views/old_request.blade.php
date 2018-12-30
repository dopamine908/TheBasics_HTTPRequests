<html>

<form method="post">
    {{ csrf_field() }}
    <div>輸入偶數</div>
    {{--取得之前輸入過的值--}}
    <input type="text" id="even" name="even" value="{{ old('even') }}">
    <br>
    <div>輸入基數</div>
    {{--取得之前輸入過的值--}}
    <input type="text" id="odd" name="odd" value="{{ old('odd') }}">
    <br>
    <br>
    <button type="submit">submit</button>
</form>

</html>