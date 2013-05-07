<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
	Error 503 – Service Unavailable
</title>
<style type="text/css">
p, h1, h2, h3, li, footer {
	font-family: 'Helvetica Neue', sans-serif;
	color: #444;
	line-height: 1.5em;
}
h1{
	font-size: 1.7em;	
}
h1 em {
	font-weight: 200
}
a {
	text-decoration: none;
	color: #5057A1
}
a:hover {
	color: #000;
}
body {
	background: #eee;
	height: 100%;
}
code {
	padding: 2px 6px;
	background: #fff;
	border: 1px solid rgba(0,0,0,.1);
}
hr {
	border: 0;
	border-bottom: 1px solid #FFF;
	border-top: 1px solid #BBB;
}
.fortrabbit {
	font-family: Georgia, serif;
	font-weight: bold;
	font-style: italic;
	color: #444;
	text-decoration: none;
}
footer {
	margin: 30px 0;
}
		
#error{
	top: 0px;
	position: absolute;
	width: 350px;
	height: 250px;
	text-align: center;
	padding-top: 6%;
	background: url(error.png);
	background-size:cover;
	background-repeat:no-repeat;
	background-position: center;	
}
		
#code{
	position: relative;
	bottom: 0px;
	left: 70%;
}
		
#message{
	min-width: 30%;
	margin-top: 35%;
	font-size: 1.5em;
	text-align: center;	
}
#content{
	margin: 0px auto 0px auto;
	width: 900px;
	font-size: 0.9em;	
}
</style>

</head>
<body>
<div id="content">
    <div id="error">
    	<h1>
			Error 503<br /><em>Service Unavailable</em>
		</h1>
	</div>
    <div id="message">
    	<h3>
			Possible Causes
		</h3>
		<ul>
			<li>
				Overload: More requests have been sent than the App can handle. <b>Scale your App</b>.
			</li>
			<li>
				Connection Refused. 
			</li>
		</ul>
    </div>
    <div id="code"><img src="code.png" alt="error" /></div>
</div>

</body>
</html>
<!-- fortrabbit – worldwide hideout -->