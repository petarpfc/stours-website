	<nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{route('page')}}" ><img src="{{url($app_public_url.$user['logo'])}}" title="logo" class="head-pic"/></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php echo ($menu);?>
                    </ul>
                </div>
            </div>
    </nav>