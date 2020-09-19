<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> - Materialize-stepper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link rel='stylesheet' href='https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/css/mstepper.min.css'>
    <link rel="stylesheet" href="{{asset('assets/css/quiz-style.css')}}">

    <style>
        .answered{
            background: #539bc3 !important;
            border-color: #539bc3 !important;
        }
        .qes-num li a {
            display: block;
        }
    </style>
</head>
<body>

<!-- partial:index.partial.html -->
<!--
Materializecss Stepper v3.0.0-beta.1 - Igor Marcossi
https://github.com/Kinark/Materialize-stepper
-->
<div class="section">
    <div class="container">
        <div class="row">
            <!--<div class="col xl4 l6 m10 s12 offset-xl4 offset-l3 offset-m1">-->
            <div class="">
                              <div class="card asses">
                    <div class="card-content">
                        <div class="step active">
                            @if($answer != null)
                            <div class="step-title waves-effect waves-dark">
                                <p class="q"><span class="q-num  {{ \App\Answer::answered($assessmentId,$answer->question->id) > 0 ? 'answered' :''}}">{{$loopIteration}}</span>
                                    {{$answer->question->question}}</p>
                            </div>

                                <form action="{{route('question.store')}}" method="POST"  class="form">
                                    @csrf
                                    {{method_field('POST')}}
                                    <input type="hidden" name="question_id" value="{{$answer->question->id}}">
                                    <input type="hidden" name="answer_id" value="{{$answer->id}}">
                                    <input type="hidden" name="assessment_id" value="{{$assessmentId}}">
                                    <input type="hidden" name="loopIteration" value="{{$loopIteration}}">
                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                    <input type="hidden" name="function" value="edit">
                                    <div class="inputGroup">
                                        <input id="radio1" name="option" value="1" {{$answer->value == 1 ? 'checked' : ''}} type="radio" />
                                        <label for="radio1">الأول</label>
                                    </div>
                                    <div class="inputGroup">
                                        <input id="radio2" name="option" value="2" {{$answer->value == 2 ? 'checked' : ''}} type="radio" />
                                        <label for="radio2">الثانى</label>
                                    </div>
                                    <div class="inputGroup">
                                        <input id="radio3" name="option" value="3" {{$answer->value == 3 ? 'checked' : ''}} type="radio" />
                                        <label for="radio3">الثالث</label>
                                    </div>
                                    <div class="inputGroup">
                                        <input id="radio4" name="option" value="4" {{$answer->value == 4 ? 'checked' : ''}} type="radio" />
                                        <label for="radio4">الرابع</label>
                                    </div>
                                    <div class="inputGroup">
                                        <input id="radio5" name="option" value="5" {{$answer->value == 5 ? 'checked' : ''}} type="radio" />
                                        <label for="radio5">الخامس</label>
                                    </div>
                                    <div class="step-actions">
                                        @if($loopIteration == \App\Question::where('assessment_id',$assessmentId)->count())
                                            <button type="submit" class="pull-left waves-effect waves-dark btn  next-step skip-step" name="direction" value="finch" data-feedback="anyThing">إنهـــــــــاء الإمتحان</button>
                                        @else
                                            <button type="submit" class="pull-left waves-effect waves-dark btn  next-step skip-step" name="direction" value="nxt" data-feedback="anyThing">التالى</button>
                                        @endif
                                        <button type="submit" style="float: right" class="pull-left waves-effect waves-dark btn  next-step skip-step" name="direction" value="prev" data-feedback="anyThing" {{$loopIteration == 1 ? 'disabled' : ''}}>الســـابق</button>
                                    </div>
                                </form>
                            @else
                            <div class="step-title waves-effect waves-dark">
                                <p class="q"><span class="q-num  {{ \App\Answer::answered($assessmentId,$current->id) > 0 ? 'answered' :''}}">{{$loopIteration}}</span>
                                    {{$current->question}}</p></p>
                            </div>
                            <form class="form" action="{{route('question.store')}}" method="POST">
                                @csrf
                                {{method_field('POST')}}
                                <input type="hidden" name="question_id" value="{{$current->id}}">
                                <input type="hidden" name="assessment_id" value="{{$assessmentId}}">
                                <input type="hidden" name="loopIteration" value="{{$loopIteration}}">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="function" value="add">
                                <div class="inputGroup">
                                    <input id="radio1" name="option" value="1" type="radio" />
                                    <label for="radio1">الأول</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="radio2" name="option" value="2" type="radio" />
                                    <label for="radio2">الثانى</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="radio3" name="option" value="3" type="radio" />
                                    <label for="radio3">الثالث</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="radio4" name="option" value="4" type="radio" />
                                    <label for="radio4">الرابع</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="radio5" name="option" value="5" type="radio" />
                                    <label for="radio5">الخامس</label>
                                </div>
                                <div class="step-actions">
                                    @if($loopIteration == \App\Question::where('assessment_id',$assessmentId)->count())
                                        <button type="submit" style="float: left" class="pull-left waves-effect waves-dark btn  next-step skip-step" name="direction" value="finch" data-feedback="anyThing">إنهـــــــــاء الإمتحان</button>
                                    @else
                                        <button type="submit" style="float: left" class="pull-left waves-effect waves-dark btn  next-step skip-step" name="direction" value="nxt" data-feedback="anyThing">التالى</button>
                                    @endif
                                        <button type="submit" style="float: right" class="pull-left waves-effect waves-dark btn  next-step skip-step" name="direction" value="prev" data-feedback="anyThing" {{$loopIteration == 1 ? 'disabled' : ''}}>الســـابق</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card pagin">
                    <div class="card-content">
                        <div class="step active">

                            <div class="step-content">
                                <div class="row m-0-auto">
                                    <ul class="qes-num">
                                        @foreach(\App\Question::where('assessment_id',$assessmentId)->get() as $question)
                                        <li class="{{$question->id == $current->id ? 'active' : ''}} {{ \App\Answer::answered($assessmentId,$question->id) > 0 ? 'answered' :''}}">
                                            <a href="{{route('question.get',[$question->id,$assessmentId,$loop->iteration])}}" style="width: 100%;height: 100%;color: #333"> {{$loop->iteration}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="area">
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
<script src='https://unpkg.com/materialize-stepper@3.0.0-beta.1.0.1/dist/js/mstepper.min.js'></script>
<script src="{{asset('assets/js/quiz-script.js')}}"></script>

</body>
</html>
