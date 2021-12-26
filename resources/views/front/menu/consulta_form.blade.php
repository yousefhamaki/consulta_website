@extends('front.layout.app')

@section("title")
    Consulta
@stop

@section("styles")
    <link rel="stylesheet" href="{{ asset('css/consulta_form.css') }}">
@stop

@section("content")
<div class='google_ads_area'> إعلانات جوجل</div>

<div class='container_value'>
    <h2>الاستشارات المدفوعة</h2>
    <div class='container'>
        <form action="{{ url('add_consulta') }}" class='consulta_form_data' method="post">
            @csrf
        <div class="input_area">
            <input type="text" class="consulta_input" placeholder="الإسم" name="name" id="">
        </div>
        <div class="input_area">
            <input type="number" class="consulta_input" placeholder="العمر (بالسنوات)" name="age" id="">
        </div>
        <div class="input_area">
            <select name="country" id="country">
                <option value="" style="color: #525252;" disabled>أختر بلدك</option>
            </select>
        </div>
        <div class="input_area">
            <input type="text" class="consulta_input" placeholder="المحافظة" name="go" id="">
        </div>
        <div class="input_area">
            <select name="country_code" id="country_code"></select>
            <input type="number" class="consulta_input phone_input" placeholder="رقم الهاتف" name="phone" id="">
        </div>
        <div class="input_area">
            <input type="email" class="consulta_input" placeholder="email" style="direction: ltr;" name="email" id="">
        </div>
        <div class="input_area">
            <select name="consulta" placeholder="اختر نوع الإستشارة" id="">
                <option value="مدني" id="1"> قانون مدنى</option>
                <option value="جنائي" id="1"> قانون جنائي</option>
                <option value="شرعي" id="1"> قانون أحوال شخصية</option>
                <option value="شرعي" id="1"> قانون عمالي</option>
                <option value="شرعي" id="1">اخرى</option>
            </select>
        </div>
        <div class="gender_area">
            <div class="gender_type">
                <input type="radio" name="gender" id="male" value="0">
                <label for="male">ذكر</label>
            </div>
            
            <div class="gender_type">
                <input type="radio"  name="gender" id="female" value="1">
                <label for="female">أنثى</label>
            </div>
        </div>
        <div class="input_area">
            <textarea name="message" class="consulta_input" id="" cols="30" rows="10" placeholder="إكتب إستشارتك"></textarea>
        </div>

        <label class="type">إختر طريقة التواصل</label>

        <div class="type_area">
            @foreach($data as $d)
            <div class="servies_type" data-value="{{ $d->id }}">
                <img src="{{ url('data/logo/' . $d->img) }}" alt="">
                <label for="{{ $d->id }}">{{ $d->name }}</label>
            </div>
            @endforeach
        </div>
        <input type="submit" class="hide submit_consulta" value="submit">
        <!-- <div class="submit">
            <button>إرسال</button>
            <div class="blur"></div>
        </div> -->
        </form>
    </div>
</div>
<div class="option_chooses_form_area"></div>
@stop

@section("scripts")
<!-- <script src="{{ asset('js/json/CountryCodes.json') }}"></script> -->
<script src="{{ asset('js/consulta_form.js') }}"></script>

@stop