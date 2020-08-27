<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .container{
        border: 10px double #ddd;
        width: 100%;
        height: 1125px;
    }
</style>
<body>
    <div class="container">
        <h5 style="text-align: center">Success Certification</h5>
        <div style ="padding:10px;background:#ccc;text-align:center">
            <span style="font-size:16px">Note: This certificate is considered to determine the level of the tester
            only and is not a certified certificate</span>
        </div>
        
        <div style="text-align: center">
            <img src="http://craneriggertest.com/logo-color.png" alt="">
        </div>

        <p style="text-align: justify;line-height: 30px;font-size: 25px;padding:20px">
            We sincerely thank <b>Mr. {{auth()->user()->name}}</b> for completing the <b>Crane & Rigger </b> subject <b>{{$grade->order->package->subject->name}}</b> test on our website with percentage <b style="color: #eabb0e">{{$grade->percentage}}%</b>, wishing the best of luck and success.
        </p>
        <div style="margin-top: 30px">
            <div style="width:40%;text-align: left;line-height: 10px;font-size: 22px;padding:20px;float: left">
                From <a href="http://craneriggertest.com/" style="color: #00a5bb;text-decoration: none">craneriggertest.com</a>
            </div>
        </div>
    </div>
</body>
</html>
