@extends('front.layout.app')

@section("title")
    Report
@stop

@section("styles")
    <style>
        .report_area{
            width: 80%;
            margin: auto;
            background-color: #ffffff99;
            border: 2px solid #ddd;
            border-radius: 5px;
            padding: 5px;
            line-height: 25px;
            margin-bottom: 15px;
            direction: rtl;
        }
        h3, h5{
            text-align: center;
            color: #7d5186;
        }
        form{
            margin: 30px 0 10px;
        }
        .input_div{
            margin: 15px 0;
        }
        label{
            display: block;
            margin: 10px 0;
            font-weight: bold;
            color: #012263;
        }
        .text_area{
            text-align: center;
        }
        input{
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }
        textarea{
            width: 80%;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
        }
        button{
            border: 1px solid #ddd;
            border-radius: 5px;
            color: white;
            background-color: #012263;
            padding: 5px;
            font-weight: bold;
        }
    </style>
@stop

@section("content")

    <section class="report_area">
        <h3>الشكاوى</h3>
        <div class="text_area">
            مرحبا بك فى القسم الخاص بالشكاوى يمكنك كتابة الشكوى الخاصة بك هنا وسوف نقوم بالرد عليها في اقرب وقت
            لكتابه الشكوى الخاصه بك يرجى ملء الحقول الأتية
        </div>
        <hr>
        <h5>إضافة شكوى جديدة</h5>
        <form action="{{ url('/report/save') }}" method="post">
                <div class="input_div">
                    <label>يرجى تصنيف المشكله</label>
                    <input type="text" name="type" id="">
                </div>
                <div class="input_div">
                    <label>إذا كانت هناك صوره خاصة بالمشكله يمكنك وضعها هنا (إختياري)</label>
                    <input type="file" name="img" id="">
                </div>
                <div class="input_div">
                    <label>إذا كانت المشكلة متعلقه برابط معين يمكنك وضعة هناا (إختياري)</label>
                    <input type="text" name="type" id="">
                </div>
                <div class="input_div">
                    <label>أشرح مشكلتك هنا</label>
                    <textarea name="message" id="" cols="30" rows="10"></textarea>
                </div>
                <button>إرسال الشكوى</button>
        </form>
    </section>
@stop