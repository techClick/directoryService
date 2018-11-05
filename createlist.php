<!DOCTYPE html>
<html>
	<head>
        <style>
                    @import url(https://fonts.googleapis.com/css?family=Roboto:400,700);
            
            :root {
            	/* Base font size */
            	font-size: 10px;
            
            	/* Heading height variable*/
            	--heading-height: 30em;
            }
            
            body {
            	font-family: "Roboto", Arial, sans-serif;
            	min-height: 100vh;
            	background-color: #101010;
            }
            
            u {
            	font-size: 16px;
            }
            
            header {
            	position: fixed;
            	width: 100%;
            	height: var(--heading-height);
            }
            
            /* Create angled background with 'before' pseudo-element */
            header::before {
            	content: "";
            	display: block;
            	position: absolute;
            	left: 0;
            	bottom: 6em;
            	width: 100%;
            	height: calc(var(--heading-height) + 10em);
            	z-index: -1;
            	transform: skewY(-3.5deg);
            	background: 
            		linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)),
            		url(https://images.unsplash.com/photo-1495464101292-552d0b52fe41?auto=format&fit=crop&w=1350&q=80) no-repeat center,
            		linear-gradient(#4e4376, #2b5876);
            	background-size: cover;
            	border-bottom: .2em solid #fff;
            }
            
            h1 {
            	font-size: calc(2.8em + 2.6vw);
            	font-weight: 700;
            	letter-spacing: .01em;
            	padding: 6rem 0 0 0rem;
            	text-shadow: .022em .022em .022em #111;
            	color: #fff;
            }
            
            main {
            	padding: calc(var(--heading-height) + 1.5vw) 4em 0;
            }
            
            p {
            	font-size: calc(2em + .25vw);
            	font-weight: 400;
            	line-height: 2;
            	margin-bottom: 1.5em;
            	color: #fcfcfc;
            }
            span {
            	font-size: calc(1.5em + .25vw);
            	font-weight: 400;
            	line-height: 2;
            	margin-bottom: 1.5em;
            	color: #fcfcfc;
            }
    
            .center { 
                height: 45px;
                position: relative;
                border: 3px solid green; 
            }
            
            .center p {
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
            .tab { 
                   display:inline-block; 
                   margin-left: 40px; 
            }
        </style>
    </head>
    <body>
        <center>
        <h1>CREATE BUSINESS LISTING</h1>
		<p>
			<a href="first.php?data=1"><u>LISTINGS</u><a/>
			<a href="first.php" class="tab"><u>LOG OUT</u><a/>
		</p>
        <br>
        <form action="savelist.php" method="post" enctype="multipart/form-data" >
            <span>NAME*:</span><br>
            <input type="text" name="name" >
            <br><br>
            <span>DESCRIPTION*:</span><br>
            <textarea type = "text" name="desc" rows="10" cols="40"></textarea>
            <br><br>
            <span>ADDRESS:</span><br>
            <input type="text" name="add" >
            <br><br>
            <span>MOBILE:</span><br>
            <input type="text" name="photo" >
            <br><br>
            <span>URL:</span><br>
            <input type="text" name="url" >
            <br><br>
            <span>CATEGORY*:</span><br>
            <input type="text" name="cat" >
            <br><span>Seperate each category with a comma e.g; ICT, Engineering, e.t.c<br></span>
    		<br><br>
    		<span>PICTURES:</span><br>
    		<span><input type="file" name="pic[]" multiple></span>
    		<br>
    		<span>Drag mouse over multiple pictures or hold Ctrl/Shift button and select multiple pictures.<br>
    		Only five(5) pictures allowed.</span> 
    		<br>
            <br><br>
            <input type="submit" value="Submit">
            <br><br>
            <br><br>
            <br><br>
            <br><br>
        </form> 
        </center>
    </body>
</html>