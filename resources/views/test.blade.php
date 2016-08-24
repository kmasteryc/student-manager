@extends('layouts.app')

@section('content')

    <form action="/test" id="form" method="post">
        {{csrf_field()}}
        <input type="text" name="sss">
        <button type="submit" id="submit">Click</button>
    </form>

@endsection

@section('script')
    <script>
        $("#submit").click(function () {
            var answer=confirm("Are you sure you want to delete?");
            if(!answer){
                return false;
            }
        });
        //        $("#apply").on('click',function(event){
        //            if($('#option_selection').val() == "delete"){
        //                event.preventDefault();
        //                var answer=confirm("Are you sure you want to delete?");
        //
        //                if(answer){
        //                    $("#yourForm").submit();
        //                }
        //            }
        //        });
    </script>
@endsection