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
            grid-column: center-start / center-end;
            margin: 2rem 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(2rem, 1fr));
            grid-gap: 3rem; 
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
            /* width: 25%;
            height: auto;
            border: 2px solid black;
            padding: 2px; */
            background-color: #f9f7f6;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* grid-row-gap: 3.5rem;  */
        }
        .box+.box{
            margin-left: 12px;
        }
        .home__img {
            width: 100%;
            grid-row: 1 / 2;
            grid-column: 1 / -1;
            z-index: 1; 
        }
        .home__name {
            grid-row: 1 / 2;
            grid-column: 1 / -1;
            justify-self: center;
            align-self: end;
            z-index: 3;
            width: 80%;
            font-family: "Josefin Sans", sans-serif;
            font-size: 1.6rem;
            text-align: center;
            padding: 1.25rem;
            background-color: #101d2c;
            color: #fff;
            font-weight: 400;
            transform: translateY(50%); 
        }

        .submit-form {
            grid-column: 1 / -1;
        }
        .submit-btn {
            width: 100%;
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
	<div class="container">
		<h3>Earned Rupees: 
        <?php 
        if($this->session->userdata('money')) {
            echo $this->session->userdata('money');
        } else {
            echo 0;
        }  ?>
		</h3>
		<div id="boxes">
			<div class="box">
                <img src="https://i.kinja-img.com/gawker-media/image/upload/s--toe3JluJ--/c_scale,fl_progressive,q_80,w_800/m6oqeutk03vhdq07uwfg.jpg" alt="cut grass" class="home__img">
                <h5 class="home__name">Earns 1 - 5</h5>
				<form class="submit-form" action="/main/process_money" method="post">
					<input type="hidden" name="grass" value="grass" />
					<input class="submit-btn" type="submit" value="Cut Grass" />
				</form>
			</div>
			<div class="box">
            <img src="https://i.stack.imgur.com/StVzw.png" alt="Open Chest" class="home__img">
				<h5 class="home__name">earns 5 - 20</h5>
				<form class="submit-form" action="/main/process_money" method="post">
					<input type="hidden" name="chest" value="chest" />
					<input class="submit-btn" type="submit" value="Open Chest" />
				</form>
			</div>
			<div class="box">
            <img src="https://www.nordichardware.se/wp-content/uploads/Breath-of-the-Wild.jpg" alt="Mission" class="home__img">
				<h5 class="home__name">earns/takes 0 - 30</h5>
				<form class="submit-form" action="/main/process_money" method="post">
					<input type="hidden" name="mission" value="mission" />
					<input class="submit-btn" type="submit" value="Mission" />
				</form>
			</div>
			<div class="box">
            <img src="https://static3.srcdn.com/wordpress/wp-content/uploads/2017/03/Header-Zelda-Boss-Collage.jpeg" alt="Battle" class="home__img">
				<h5 class="home__name">earns/takes 0 - 50</h5>
				<form class="submit-form" action="/main/process_money" method="post">
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
