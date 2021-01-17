<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>
</head>
<body>
<script
		src="https://code.jquery.com/jquery-3.5.1.min.js"
		integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		crossorigin="anonymous"></script>
<div id="meetCode" style="display:none">{{$meetCode}}</div>
<div id="userData" style="display:none">{{$userData}}</div>
<script src='https://meet.jit.si/external_api.js'></script>
<script>
    var domain = "meet.jit.si";
    var options = {
        roomName: $('#meetCode').html(),
        width: 1920,
        height: 1080,
        parentNode: undefined,
        configOverwrite: {},
        interfaceConfigOverwrite: {},
        userInfo: {
            // email: 'email@cvexa.com',
            displayName: $('#userData').html()
        }
    }
    var api = new JitsiMeetExternalAPI(domain, options);
</script>
</body>
</html>
