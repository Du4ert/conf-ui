<section id="schedule-section" class="schedule-section section">
    <div class="container">

        <h3 class="section-heading text-center mb-5">Расписание</h3>
        
        <!-- Nav tabs -->
        <ul class="schedule-nav nav nav-pills nav-fill" id="myTab" role="tablist">
            <li class="nav-item me-2">
                <a class="nav-link active btn-primary" id="tab-1" data-bs-toggle="tab" href="#tab-1-content" role="tab" aria-controls="tab-1-content" aria-selected="true">
                    <span class="heading">День 1</span>
                    <span class="meta">(7 октября)</span>
                </a>
            </li>
            <li class="nav-item me-2">
                <a class="nav-link" id="tab-2" data-bs-toggle="tab" href="#tab-2-content" role="tab" aria-controls="tab-2-content" aria-selected="false">
                    <span class="heading">День 2</span>
                    <span class="meta">(8 октября)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-3" data-bs-toggle="tab" href="#tab-3-content" role="tab" aria-controls="tab-3-content" aria-selected="false">
                    <span class="heading">День 3</span>
                    <span class="meta">(9 октября)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-3" data-bs-toggle="tab" href="#tab-4-content" role="tab" aria-controls="tab-4-content" aria-selected="false">
                    <span class="heading">День 4</span>
                    <span class="meta">(10 октября)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-3" data-bs-toggle="tab" href="#tab-5-content" role="tab" aria-controls="tab-5-content" aria-selected="false">
                    <span class="heading">День 5</span>
                    <span class="meta">(11 октября)</span>
                </a>
            </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="schedule-tab-content tab-content">

            @include('sections.ru.shedule.day1')
            @include('sections.ru.shedule.day2')
            @include('sections.ru.shedule.day3')
            @include('sections.ru.shedule.day4')
            @include('sections.ru.shedule.day5')
            
            
            <div class="tab-pane no-timeline" id="tab-3-content" role="tabpanel" aria-labelledby="tab-3">
                <h4 class="text-center py-5 text-muted">Day 3 Agenda Coming Soon...</h4>
            </div><!--//tab-3-content-->
        </div><!--//schedule-tab-content-->
        <div class="schedule-cta text-center mx-auto"><a href="{{ asset('documents/GenBio2024_program.pdf') }}" class="btn btn-success" download><i class="fa fa-file-pdf me-2"></i>Скачать программу</a></div>
    </div><!--//container-->
</section><!--//schedule-section-->