@if ($schools->count() == 300)
<div class="section-full job-categories content-inner-2 bg-white">
    <div class="container">
        <div class="section-head d-flex head-counter clearfix">
            <div class="mr-auto">
                
            </div>
            <div class="head-counter-bx">
                <h2 class="m-b5 counter">{{ $jobsCount->count() }}</h2>
                <h6 class="fw3">Работа опубликована</h6>
            </div>
            <div class="head-counter-bx">
                <h2 class="m-b5 counter">{{ $schoolsCount->count() }}</h2>
                <h6 class="fw3">Профиль школы</h6>
            </div>
            <div class="head-counter-bx">
                <h2 class="m-b5 counter">{{ $teachersCount->count() }}</h2>
                <h6 class="fw3">Профиль учителей</h6>
            </div>
        </div>
    </div>
</div>
@endif
