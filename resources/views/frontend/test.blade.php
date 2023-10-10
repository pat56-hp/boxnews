<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100vh;
            display: grid;
            font-family: "Staatliches", cursive;
            background: #fff;
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
        }

        table .left {
            float : left
        }

        table .right{
            float: right;
        }

        table .image {
            height: 250px;
            width: 250px;
            background-image: url("https://media.pitchfork.com/photos/60db53e71dfc7ddc9f5086f9/1:1/w_1656,h_1656,c_limit/Olivia-Rodrigo-Sour-Prom.jpg");
            background-size: contain;
            opacity: 0.85;
            float: left;
        }

        table .admit-one {
            position: absolute;
            color: darkgray;
            height: 250px;
            padding: 0 10px;
            letter-spacing: 0.15em;
            float: left;
            writing-mode: vertical-rl;
            transform: rotate(-180deg);
        }

        table .admit-one span:nth-child(2) {
            color: white;
            font-weight: 700;
        }

        table .left .ticket-number {
            height: 250px;
            width: 250px;
            padding: 5px;
        }

        table .ticket-info {
            padding: 10px 30px;
            float: right;
            text-align: center;
        }

        .date {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 5px 0;
            font-weight: 700;
            width: 100%
        }

        .date span {
            width: 100px;
        }

        .date span:first-child {
            text-align: center;
        }


        .show-name {
            font-size: 32px;
            font-family: "Nanum Pen Script", cursive;
            color: #f1b067;
            line-height: 1;
        }

        .show-name h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: #4a437e;
        }

        .time {
            padding: 10px 0;
            color: #4a437e;
            text-align: center;
            gap: 10px;
            font-weight: 700;
        }

        .time span {
            font-weight: 400;
            color: gray;
        }

        .left .time {
            font-size: 16px;
        }


        .location {
            width: 100%;
            padding-top: 8px;
            border-top: 1px solid gray;
        }

        .location .separator {
            font-size: 20px;
        }

        .right {
            width: 180px;
            border-left: 1px dashed #404040;
        }

        .right .admit-one {
            color: darkgray;
        }

        .right .admit-one span:nth-child(2) {
            color: gray;
        }

        .right .right-info-container {
            height: 250px;
            padding: 10px 10px 10px 35px;
            float: right;
        }

        .right .show-name h1 {
            font-size: 18px;
        }

        .barcode {
            height: 100px;
        }

        .barcode img {
            height: 100%;
        }

        .right .ticket-number {
            color: gray;
        }

        .body{
            height: 100vh;
            display: grid;
            font-family: "Staatliches", cursive;
            background: #fff;
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
            margin: auto;
        }

        table{
            margin: auto;
            background: white;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        table .image{
            height: 250px;
            width: 250px;
            background-size: contain;
            opacity: 0.85;
            float: left;
        }

        table .ticket-info {
            padding: 10px 30px;
            text-align: center;
            float: right;
        }

        table .admit-one {
            position: absolute;
            color: darkgray;
            height: 250px;
            padding: 0 10px;
            letter-spacing: 0.15em;
            text-align: center;
            writing-mode: vertical-rl;
            transform: rotate(-180deg);
            float: left;
        }

        table .left .ticket-number {
            height: 250px;
            width: 250px;
            float: right;
            padding: 5px;
        }

        table .time {
            padding: 10px 0;
            color: #4a437e;
            text-align: center;
            gap: 10px;
            font-weight: 700;
        }

        table .location span:first-child{
            float: left;
        }

        table .location span:last-child{
            float: right;
        }

        table .show-name h2{
            font-size: 20px;
        }

        table .right .right-info-container {
            height: 250px;
            padding: 10px 10px 10px 35px;
            flex-direction: column;
            text-align: center;
            font-size: 12px;
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100vh;
            display: grid;
            font-family: "Staatliches", cursive;
            background: #fff;
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
        }

        table .left {
            float : left
        }

        table .right{
            float: right;
        }

        table .image {
            height: 250px;
            width: 250px;
            background-image: url("https://media.pitchfork.com/photos/60db53e71dfc7ddc9f5086f9/1:1/w_1656,h_1656,c_limit/Olivia-Rodrigo-Sour-Prom.jpg");
            background-size: contain;
            opacity: 0.85;
            float: left;
            position: relative;
        }

        table .admit-one {
            position: absolute;
            color: darkgray;
            height: 250px;
            padding: 0 10px;
            letter-spacing: 0.15em;
            float: left;
            writing-mode: vertical-rl;
            transform: rotate(-180deg);
        }

        table .admit-one span:nth-child(2) {
            color: white;
            font-weight: 700;
        }

        table .left .ticket-number {
            height: 250px;
            width: 250px;
            padding: 5px;
            float: right;
            bottom: 0;
            position: absolute;
            right: 0;
        }

        table .ticket-info {
            padding: 10px 30px;
            float: right;
            text-align: center;
        }

        .date {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 5px 0;
            font-weight: 700;
            width: 100%
        }

        .date span {
            width: 100px;
        }

        .date span:first-child {
            text-align: center;
        }


        .show-name {
            font-size: 32px;
            font-family: "Nanum Pen Script", cursive;
            color: #f1b067;
            line-height: 1;
        }

        .show-name h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: #4a437e;
        }

        .time {
            padding: 10px 0;
            color: #4a437e;
            text-align: center;
            gap: 10px;
            font-weight: 700;
        }

        .time span {
            font-weight: 400;
            color: gray;
        }

        .left .time {
            font-size: 16px;
        }


        .location {
            width: 100%;
            padding-top: 8px;
            border-top: 1px solid gray;
        }

        .location .separator {
            font-size: 20px;
        }

        .right {
            width: 180px;
            border-left: 1px dashed #404040;
        }

        .right .admit-one {
            color: darkgray;
        }

        .right .admit-one span:nth-child(2) {
            color: gray;
        }

        .right .right-info-container {
            height: 250px;
            padding: 10px 10px 10px 35px;
            float: right;
        }

        .right .show-name h1 {
            font-size: 18px;
        }

        .barcode {
            height: 100px;
        }

        .barcode img {
            height: 100%;
        }

        .right .ticket-number {
            color: gray;
        }

        .body{
            height: 100vh;
            display: grid;
            font-family: "Staatliches", cursive;
            background: #fff;
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
            margin: auto;
        }

        table{
            margin: auto;
            background: white;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        table .image{
            height: 250px;
            width: 250px;
            background-size: contain;
            opacity: 0.85;
            float: left;
        }

        table .ticket-info {
            padding: 10px 30px;
            text-align: center;
            float: right;
        }

        table .admit-one {
            position: absolute;
            color: darkgray;
            height: 250px;
            padding: 0 10px;
            letter-spacing: 0.15em;
            text-align: center;
            writing-mode: vertical-rl;
            transform: rotate(-180deg);
            float: left;
        }

        table .left .ticket-number {
            height: 250px;
            width: 250px;
            float: right;
            padding: 5px;
        }

        table .time {
            padding: 10px 0;
            color: #4a437e;
            text-align: center;
            gap: 10px;
            font-weight: 700;
        }

        table .location span:first-child{
            float: left;
        }

        table .location span:last-child{
            float: right;
        }

        table .show-name h2{
            font-size: 20px;
        }

        table .right .right-info-container {
            height: 250px;
            padding: 10px 10px 10px 35px;
            flex-direction: column;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
@for($i = 0; $i < 4; $i++)
    <div class="ticket">
        <div class="left">
            <div class="image">
                <p class="admit-one">
                    <span></span>
                    <span>Intermédiaire et expert</span>
                    <span></span>
                </p>
                <div class="ticket-number">
                    <p>
                        #20030220
                    </p>
                </div>
            </div>
            <div class="ticket-info">
                <p class="date">
                    <span>KOUASSI PATRICK AIME</span>
                </p>
                <div class="show-name">
                    <h2>DENA MWANA EN CONCERT
                        LIVE</h2>
                    {{--                    <h2>Olivia Rodrigo</h2>--}}
                </div>
                <div class="time">
                    <p>02/11/2023 <span>à</span> 11:00</p>
                    <p>03/11/2023 <span>à</span> 14:00</p>
                </div>
                <p class="location"><span>Prix : </span>
                    <span class="separator"></span><span>10.000 FCFA</span>
                </p>
            </div>
        </div>
        <div class="right">
            <p class="admit-one">
                <span></span>
                <span>Intermédiaire et expert</span>
                <span></span>
            </p>
            <div class="right-info-container">
                <div class="show-name">
                    <img src="{{ asset('assets/img/logopresseci.png') }}" alt="pressecotedivoire" width="100px">
                </div>
                <div class="time">
                    <p>02/11/2023 <span>à</span> 11:00</p>
                    <p>03/11/2023 <span>à</span> 14:00</p>
                </div>
                <div class="barcode">
                    <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code">
                </div>
                <p class="ticket-number">
                    #20030220
                </p>
            </div>
        </div>
    </div>
@endfor


<br>
<div class="body">
    <table class="">
        <tr>
            <td class="left">
                <div class="image">
                    <p class="admit-one">
                        <span></span>
                        <span>Intermédiaire et expert</span>
                        <span></span>
                    </p>
                    <div class="ticket-number">
                        <p>
                            #20030220
                        </p>
                    </div>
                </div>
                <div class="ticket-info">
                    <p class="date">
                        <span>KOUASSI PATRICK AIME</span>
                    </p>
                    <div class="show-name">
                        <h2>DENA MWANA EN CONCERT
                            LIVE</h2>
                        {{--                    <h2>Olivia Rodrigo</h2>--}}
                    </div>
                    <div class="time">
                        <p>02/11/2023 <span>à</span> 11:00</p>
                        <p>03/11/2023 <span>à</span> 14:00</p>
                    </div>
                    <p class="location"><span>Montant : </span>
                        <span class="separator"></span><span>10.000 FCFA</span>
                    </p>
                </div>
            </td>
            <td class="right">
                <p class="admit-one">
                    <span></span>
                    <span>Intermédiaire et expert</span>
                    <span></span>
                </p>
                <div class="right-info-container">
                    <div class="show-name">
                        <img src="{{ asset('assets/img/logopresseci.png') }}" alt="pressecotedivoire" width="100px">
                    </div>
                    <div class="time">
                        <p>02/11/2023 <span>à</span> 11:00</p>
                        <p>03/11/2023 <span>à</span> 14:00</p>
                    </div>
                    <div class="barcode">
                        <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code">
                    </div>
                    <p class="ticket-number">
                        #20030220
                    </p>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
