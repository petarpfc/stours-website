@section('contactform')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="{{URL::asset('modules/site/js/validator.js')}}"></script>
    <script src="{{URL::asset('modules/site/js/contactFormValidation.js')}}"></script>
@stop
@if (count($errors)>0)
    <section>
        <ul>
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </ul>
    </section>
@endif
@if(Session::has('success'))
    <section style="color: #00CC00">
        {{Session::get('success')}}
    </section>
@endif
<br>
<div class="container">
    <form class="well form-horizontal" action="{{ route('contactForm') }}" method="post"  id="contact_form">
        <fieldset>
            <!-- Form Name -->
            <legend>Contact Us Today!</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">First Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" >Last Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Phone #</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="phone" placeholder="(845)555-1212" class="form-control" type="number">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="address" placeholder="Address" class="form-control" type="text">
                    </div>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="city" placeholder="city" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <select name="state" class="form-control selectpicker" >
                            <option value=" " >Please select your country</option>
                            @foreach ($product->countryList as $key => $country)
                                <option value='{{$country}}'>{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Zip Code</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="zip" placeholder="Zip Code" class="form-control"  type="text">
                    </div>
                </div>
            </div>

            <!-- Text area -->

            <div class="form-group">
                <label class="col-md-4 control-label">Message</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" name="comment" placeholder="Enter your message"></textarea>
                    </div>
                </div>
            </div>

            <!-- Success message -->
            <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="hidden" value="{!! strip_tags($product->settingsContact->email) !!}" name="admin_email">
                    <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
                </div>
            </div>
            <div>
                {{ csrf_field() }}
            </div>
        </fieldset>
    </form>
</div>
<!-- /.container -->
