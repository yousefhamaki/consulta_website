@foreach($data as $d)
<section class="option_chooses_form">
    <div class="exit_button">X</div>
    <section class="img_section_form">
        <img src="{{ url('data/logo/' . $d->img) }}" alt="">
        <span class="service_name" id="{{ $d->id }}">{{ $d->name }}</span>
    </section>
    <hr />
    <section class="content_area">
    {{ $d->detais }}
    </section>
    <hr />
    @if($d->time == 1)
    <section class="time_form">
        <label for="">مده الخدمة:</label>
        <select name="time" id="time_data">
            <option value="quarter">ربع ساعة</option>
            <option value="half">نصف ساعة</option>
            <option value="hour">ساعة واحدة</option>
        </select>
    </section>
    @endif
    <div class="input_area salary_area">
        <div class="salary_value">
        سعر الخدمة: <span class="salary_value_data">200</span> جنية مصري
        </div>
    </div>
    <div class="submit">
        <button>التأكيد والذهاب إلى بوابة الدفع</button>
    </div>
</section>
@endforeach