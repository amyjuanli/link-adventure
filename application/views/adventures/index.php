<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Legend of Zelda</title>
	<style>
		body {
            background-color: #efefef;
            text-align: center;
            font-size: 1.4em;
            height: 100vh;
            font-family: "Lato", sans-serif;
        }
        .header {
            height: 30vh;
            background-image: linear-gradient(to right, rgba(45, 200, 19, 0.8), rgba(40, 180, 133, 0.8)), url('https://www.dailydot.com/wp-content/uploads/725/b6/ab675a0316702ef0-2048x1024.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
        }


        .text-box {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .heading-primary {
            color: #fff;
            text-transform: uppercase;
            margin-bottom: 1.5em;
            /* fix the shaking issue  */
            backface-visibility: hidden;
        }

        .heading-primary-main {
            display: block;
            font-size: .8em;
            font-weight: 400;
            letter-spacing: 10px;
            animation-name: moveInLeft;
            animation-duration: 1s;
            animation-timing-function: ease-out;
        }

        .heading-primary-sub {
            display: block;
            font-size: .5em;
            font-weight: 700;
            letter-spacing: 10px;
            animation: moveInRight 1s ease-out;
        }


        @keyframes moveInLeft {
            0% {
                opacity: 0;
                transform: translateX(-100px)
            }

            80% {
                transform: translateX(10px)
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes moveInRight {
            0% {
                opacity: 0;
                transform: translateX(100px)
            }

            80% {
                transform: translateX(-10px)
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .container {
            width: 95%;
            margin: 10px;
            padding: 6px;
        }
        h3 {
            text-align: left;
        }
        #boxes {
            width: 100%;
            margin: auto;
            display: flex;
            text-align: center;
            border: 1px black solid;
            flex-wrap: nowrap;
        }
        #activities {
            text-align: left;
            color: green;
            border: 2px solid black;
            width: 100%;
            height: 50vh;
            overflow: auto;
            margin: auto;
            padding-left: 6px;

        }
        .box {
            width: 25%;
            height: auto;
            border: 2px solid black;
            padding: 2px;
 
        }
        .box+.box{
            margin-left: 12px;
        }
        .submit-btn {
            width: 60%;
            font-size: .8em;
            border-radius: 5px;
            color: white;
            background-color: forestgreen;
            padding: 5px 10px 8px 10px;
        }
        .submit-btn:hover {
            cursor: pointer;
            transform: translateY(-3px);
            /* just for fun to change the width to 400px when hover  width: 400px; */
            box-shadow: 0 10px 20px rgba(0,0,0, 0.2) 
        }
        #destroy-btn {
            width: 150px;
            font-size: 1em;
            border-radius: 5px;
            color: white;
            background-color: red;
            padding: 5px 10px 8px 10px;
        }
        #destroy-btn:hover {
            cursor: pointer;
        }
        

    </style>
</head>

<body>
    <div class="header">
        <div class="text-box">
            <h1 class="heading-primary">
                <span class="heading-primary-main">Zelda II</span>
                <span class="heading-primary-sub">The adventure of Link</span>
            </h1>
        </div>
    </div>
    <!-- <h1 id="title">Zelda mini game: Link Adventure</h1> -->

    <!-- <p>Please help <strong>Link</strong> get some Rupees</p> -->
	<div class="container">
		<h3>Rupees:
			<?php 
        if($this->session->userdata('money')) {
            echo $this->session->userdata('money');
        } else {
            echo 0;
        }
         ?>
		</h3>
		<div id="boxes">
			<div class="box">
				<p>earns 1 - 5</p>
				<form action="/main/process_money" method="post">
					<input type="hidden" name="grass" value="grass" />
					<input class="submit-btn" type="submit" value="Cut Grass" />
				</form>
			</div>
			<div class="box">
				<p>earns 5 - 20</p>
				<form action="/main/process_money" method="post">
					<input type="hidden" name="chest" value="chest" />
					<input class="submit-btn" type="submit" value="Open Chest" />
				</form>
			</div>
			<div class="box">
				<p>earns/takes 0 - 30</p>
				<form action="/main/process_money" method="post">
					<input type="hidden" name="mission" value="mission" />
					<input class="submit-btn" type="submit" value="Mission" />
				</form>
			</div>
			<div class="box">
				<p>earns/takes 0 - 50</p>
				<form action="/main/process_money" method="post">
					<input type="hidden" name="battle" value="battle" />
					<input class="submit-btn" type="submit" value="Battle" />
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<h3>Activity log: </h3>
		<div id="activities">
			<?php 
        if($this->session->userdata('activities')) {
            $activities = $this->session->userdata('activities');
            foreach($activities as $row => $value) {
                echo $value;
                echo "<br/>";
            } 
        }
        ?>
		</div>
	</div>
	<div class="container">
		<form action="/main/process_money" method="post">
			<input id="destroy-btn" type="submit" value="Restart Game" name="destroy_session">
		</form>
	</div>
</body>

</html
