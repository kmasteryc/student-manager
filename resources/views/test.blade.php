@extends('layouts.app')

@section('content')

    <form method="post" action="/test1">
        {{csrf_field()}}
        <input name="cardType" type="hidden" id="cardType">
        <div class="form-group">
            <label for="NameOnCard">Name on card</label>
            <label for="NameOnCard"></label><input id="NameOnCard" class="form-control" type="text" name="NameOnCard"
                                                   maxlength="255"/>
        </div>
        <div class="form-group">
            <label for="CreditCardNumber">Card number</label>
            <input id="CreditCardNumber" class="null card-image form-control" name="CreditCardNumber" type="text"/>
        </div>
        <button id="PayButton" type="submit"></button>
    </form>

@endsection

@section('script')
    <script>

        $(document).ready(function () {

            //Submit card form
            $("#PayButton").on('click', function () {
                if (cardFormValidate()) {
                    //Move to proceed.php to treat the form
                    console.log('Redirect me');
                } else {
                    console.log('Wrong card');
                }
            });
        });
    </script>
@endsection