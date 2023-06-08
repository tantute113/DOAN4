
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Questrial|Droid+Sans|Alice' rel='stylesheet' type='text/css'>
   <style>

    /* generic  */

body {
    color: #3F3F3F;
    font-family: 'Droid Sans',Tahoma,Arial,Verdana sans-serif;
    font-size: 16px;
    background-image: url('./img/567633.jpg');
    background-size: cover;
}

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block }

@font-face {
    font-family: 'IconicStroke';
    src: url('http://www.onextrapixel.com/examples/html5-css3-contact-form/font/iconic_stroke-webfont.eot');
    src: url('http://www.onextrapixel.com/examples/html5-css3-contact-form/font/iconic_stroke-webfont.eot?#iefix') format('embedded-opentype'), url('http://www.onextrapixel.com/examples/html5-css3-contact-form/font/iconic_stroke-webfont.woff') format('woff'), url('http://www.onextrapixel.com/examples/html5-css3-contact-form/font/iconic_stroke-webfont.ttf') format('truetype'), url('http://www.onextrapixel.com/examples/html5-css3-contact-form/font/iconic_stroke-webfont.svg#IconicStrokeRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}

h1 {
    font-family: 'Questrial', Verdana, sans-serif;
    text-align: center;
    font-size: 40px;
    padding: 0;
    margin: 0 0 20px 0;
    position: relative;
    color: #8C8C8C;
}

/* * have a nice ampersand *
   ================================================== */

h1:after {
    font-size: 25px;
    color: #D6CFCB;
    content: '&';
    text-align: center;
    display: block;
    width: 100%;
    font-family: 'Alice', Verdana, serif;
    text-shadow: 0px 1px 0px #fff;
}

/* * create the gradient bottom *
   ================================================== */

h1:before {
    position: absolute;
    bottom: 15px;
    content: ' ';
    text-align: center;
    display: block;
    height: 2px;
    width: 100%;
    background: -moz-linear-gradient(left,  rgba(255,255,255,0) 0%, rgba(182,180,180,0.7) 42%, rgba(180,178,178,0) 43%, rgba(168,166,166,0) 50%, rgba(180,178,178,0) 57%, rgba(182,180,180,0.7) 58%, rgba(238,237,237,0.3) 90%, rgba(255,255,255,0) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0)), color-stop(42%,rgba(182,180,180,0.7)), color-stop(43%,rgba(180,178,178,0)), color-stop(50%,rgba(168,166,166,0)), color-stop(57%,rgba(180,178,178,0)), color-stop(58%,rgba(182,180,180,0.7)), color-stop(90%,rgba(238,237,237,0.3)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(182,180,180,0.7) 42%,rgba(180,178,178,0) 43%,rgba(168,166,166,0) 50%,rgba(180,178,178,0) 57%,rgba(182,180,180,0.7) 58%,rgba(238,237,237,0.3) 90%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(182,180,180,0.7) 42%,rgba(180,178,178,0) 43%,rgba(168,166,166,0) 50%,rgba(180,178,178,0) 57%,rgba(182,180,180,0.7) 58%,rgba(238,237,237,0.3) 90%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(182,180,180,0.7) 42%,rgba(180,178,178,0) 43%,rgba(168,166,166,0) 50%,rgba(180,178,178,0) 57%,rgba(182,180,180,0.7) 58%,rgba(238,237,237,0.3) 90%,rgba(255,255,255,0) 100%); /* IE10+ */
    background: linear-gradient(left,  rgba(255,255,255,0) 0%,rgba(182,180,180,0.7) 42%,rgba(180,178,178,0) 43%,rgba(168,166,166,0) 50%,rgba(180,178,178,0) 57%,rgba(182,180,180,0.7) 58%,rgba(238,237,237,0.3) 90%,rgba(255,255,255,0) 100%); /* W3C */
}

/* ===[ Here comes to good stuff : content styling ]=== */
#content {
    max-width: 400px;
    position: relative;
    margin: 50px auto;
    min-height: 400px;
    z-index: 100;
    padding: 30px;
    border: 1px solid #383838;
    /* My stipped background */
  
    /*border-radius*/
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    /*box-shadow*/
    -webkit-box-shadow: 0px 1px 6px #3F3F3F;
    -moz-box-shadow: 0px 1px 6px #3F3F3F;
    box-shadow: 0px 1px 6px #3F3F3F;
}

/* * my "fake" background that will hover the stripes *
   ================================================== */
#content form {
    z-index: 101;
}

#content:after {
    background: #F9F9F9;
    margin: 15px;
    position: absolute;
    content : " ";
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    z-index: -1;
    border: 1px #E5E5E5 solid;
    /*border-radius*/
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
}



/* * labels*
   ================================================== */

/* * adding our icon font !!
   ================================================== */

.iconic:before {
    font-size: 25px;
    font-family: "IconicStroke";
}

.iconic.link:before { content: '/' }

.iconic.quote-alt:before { content: "'" }

.iconic.comment:before { content: "q" }

.iconic.user:before { content: "u" }

.iconic.mail-alt:before { content: "M" }

label {
    color: #7F7E7E;
    -webkit-transition: color 1s ease;
    -moz-transition: color 1s ease;
    transition: color 1s ease;
}

label:hover { color: #191919 }

label:before {
    color: #C1BFBD;
    -webkit-transition: color 1s ease;
    -moz-transition: color 1s ease;
    transition: color 1s ease;
}

label:hover:before {
    color: #969696;
    -webkit-transition: color 1s ease;
    -moz-transition: color 1s ease;
    transition: color 1s ease;
}

p { margin-bottom: 20px }

.indication {
    color: #878787;
    font-size: 12px;
    font-style: italic;
    text-align: right;
    padding-right: 10px;
}

.required { color: #E5224C }

/* * Styling the send button *
   ================================================== */

input[type=submit] {
    cursor: pointer;
    background: none;
    border: none;
    font-family: 'Alice',serif;
    color: #767676;
    font-size: 18px;
    padding: 10px 4px;
    margin-top: 30px ;
    
    border: 1px solid #E0E0E0;
    text-shadow: 0px 1px  1px #E8E8E8;
    background: rgb(247,247,247);
    background: -moz-linear-gradient(top,  rgba(247,247,247,1) 1%, rgba(242,242,242,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,rgba(247,247,247,1)), color-stop(100%,rgba(242,242,242,1)));
    background: -webkit-linear-gradient(top,  rgba(247,247,247,1) 1%,rgba(242,242,242,1) 100%);
    background: -o-linear-gradient(top,  rgba(247,247,247,1) 1%,rgba(242,242,242,1) 100%);
    background: -ms-linear-gradient(top,  rgba(247,247,247,1) 1%,rgba(242,242,242,1) 100%);
    background: linear-gradient(top,  rgba(247,247,247,1) 1%,rgba(242,242,242,1) 100%);
    /*border-radius*/
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    /*box-shadow*/
    -webkit-box-shadow: 0px 1px 1px #FFF inset, 0 0 0px 5px #EAEAEA;
    -moz-box-shadow: 0px 1px 1px #FFF inset, 0 0 0px 5px #EAEAEA;
    box-shadow: 0px 1px 1px #FFF inset, 0 0 0px 5px #EAEAEA;
    /*transition*/
    -webkit-transition: all 0.2s linear;
    -moz-transition: all 0.2s linear;
    -o-transition: all 0.2s linear;
    transition: all 0.2s linear;
}

input[type=submit]:hover {
    color: #686868;
    border-color: #CECECE;
    background: rgb(244,244,244);
    background: -moz-linear-gradient(top,  rgba(244,244,244,1) 0%, rgba(242,242,242,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(244,244,244,1)), color-stop(100%,rgba(242,242,242,1)));
    background: -webkit-linear-gradient(top,  rgba(244,244,244,1) 0%,rgba(242,242,242,1) 100%);
    background: -o-linear-gradient(top,  rgba(244,244,244,1) 0%,rgba(242,242,242,1) 100%);
    background: -ms-linear-gradient(top,  rgba(244,244,244,1) 0%,rgba(242,242,242,1) 100%);
    background: linear-gradient(top,  rgba(244,244,244,1) 0%,rgba(242,242,242,1) 100%);
    /*box-shadow*/
    -webkit-box-shadow: 0px 1px 1px #FFF inset, 0 0 0px 5px #E0E0E0;
    -moz-box-shadow: 0px 1px 1px #FFF inset, 0 0 0px 5px #E0E0E0;
    box-shadow: 0px 1px 1px #FFF inset, 0 0 0px 5px #E0E0E0;
}

input[type=submit]:active, input[type=submit]:focus {
    position: relative;
    top: 1px;
    color: #515151;
    background: rgb(234,234,234);
    background: -moz-linear-gradient(top,  rgba(234,234,234,1) 0%, rgba(242,242,242,1) 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(234,234,234,1)), color-stop(100%,rgba(242,242,242,1)));
    background: -webkit-linear-gradient(top,  rgba(234,234,234,1) 0%,rgba(242,242,242,1) 100%);
    background: -o-linear-gradient(top,  rgba(234,234,234,1) 0%,rgba(242,242,242,1) 100%);
    background: -ms-linear-gradient(top,  rgba(234,234,234,1) 0%,rgba(242,242,242,1) 100%);
    background: linear-gradient(top,  rgba(234,234,234,1) 0%,rgba(242,242,242,1) 100%);
    /*box-shadow*/
    -webkit-box-shadow: 0px -1px 1px #FFF inset, 0 0 0px 5px #E0E0E0;
    -moz-box-shadow: 0px -1px 1px #FFF inset, 0 0 0px 5px #E0E0E0;
    box-shadow: 0px -1px 1px #FFF inset, 0 0 0px 5px #E0E0E0;
}

#postcard{
    z-index: 102;
    margin: 50px auto;
    position: absolute;
    transform: scale(1.2) rotate(30deg);
    left: 650px;
}

.move {
    animation-duration: 4s;
    animation-timing-function: ease-in-out;
    animation-delay: 1s;
    animation-direction: alternate;
    animation-fill-mode: forwards;
    animation-iteration-count: 1;
    animation-play-state: running;
    animation-name: anim;
}

@keyframes anim
{
   
    to {left: 650px; transform: scale(1)  rotate(20deg); z-index:1;}
}

@keyframes animTabletHor
{
   
    to {left: 450px; transform: scale(1)  rotate(20deg); z-index:1;}
}

@keyframes animTablet
{
    to {left: 300px; transform: scale(1)  rotate(20deg); z-index:1;}
}

@keyframes animPhone
{
    from {transform: scale(1.2) rotate(28deg);}
    25% {transform: scale(1) rotate(0deg);}
    50% { transform: scale(0.8) rotate(0deg); top: -550px; ; z-index:102;}
    75% { transform: scale(0.9) rotate(0deg); top: -200px; z-index:1;}
    to { transform: scale(1) rotate(0deg); top: -100px; z-index:1;}
}

@media (min-width: 981px) and (max-width : 1280px) {
    #postcard{
        left: 450px;
    }
    
    .move {
        animation-name: animTabletHor;
    }
}

@media (min-width: 768px) and (max-width : 980px) {
    #postcard{
        transform: scale(1.2) rotate(28deg);
        left: 250px;
    }
    
    .move {
        animation-name: animTablet;
    }
}

@media (max-width: 767px) {
    #postcard{
        left: auto;
        top: 0px;
    }
    .move {
        animation-name: animPhone;
    }
}
   </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div></div>
                <img id="postcard" style="width: 400px;height: 550px;" src="./img/anhlogin.jpg" alt="postcard" class="img-responsive move">
                <div id="content" >
                    <h1> Đăng nhập</h1>

                   
                    <form method="POST" action="{{route('getLogin')}}" >
                        @csrf
                        {{-- @if($errors->any())
<h4>{{$errors->first()}}</h4>

@endif --}}
                                      
                         
                        <div class="form-group">
                            @if($errors->has('name')) 
                            <span style="color: red ;"> {{ $errors->first('name') }}*</span>
                            @else
                            <label for="usermail" class="iconic mail-alt">Số điện thoại<span class="required">*</span></label>
                              @endif
                            <input type="text" class="form-control" name="name" id="username" value="{{old('name')}}"   placeholder="Số điện thoại ,hãy nhập vào">
                        </div>
                        <div class="form-group">
                            @if($errors->has('password')) 
                            <span style="color: red ;"> {{ $errors->first('password') }}*</span>
                            @else
                            <label for="usermail" class="iconic mail-alt">Mật khẩu<span class="required">*</span></label>
                              @endif
                            <input type="password" class="form-control" name="password" id="usermail" placeholder="Mật khẩu ,hãy nhập vào" >
                        </div>
                        {{-- <div class="form-group">
                            <label for="subject" class="iconic quote-alt"> Subject </label>
                            <input type="text" class="form-control" name="subject" id="subject"  required="required" placeholder="What would you like to talk about?">
                        </div>
                        <div class="form-group">
                            <label for="message" class="iconic comment"> Message </label>
                            <textarea name="message" id="message"  class="form-control" rows="3" placeholder="Don't be shy, live me a friendly message and I'll answer as soon as possible"  required="required"></textarea>
                        </div> --}}
                        <div class="row">
<div class="col-6">
                       
                        <input type="submit" name="login" value=" Xác nhận " />
                    </div>
                    <div class="col-6" style="padding-top: 40px;">
                       	<a href="{{route('register')}}" style="color:#3F3F3F;">Bạn muốn đăng kí ?</a>
                    </div>
                    </div>
                    </form>
                   
                </div>
            </div>
            
        </div>
        <script>

        </script>
    </body>
</html>    
