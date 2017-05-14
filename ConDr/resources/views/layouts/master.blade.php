<!DOCTYPE HTML>
<html>
<head>
    @include('layouts.head')
</head>
<body>
    <div id="page-wrapper">

        <!-- Header -->
            <div id="header">
				<!-- Nav -->
				    <nav id="nav">
						<ul>
					       @yield('navlist')
				        </ul>
				    </nav>

            </div>

			<!-- Main -->
            @yield('main')
            

    </div>

@include('layouts.footer');
@include('layouts.scripts');
            
        
</body>
</html>
