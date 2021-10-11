@extends("layouts.layout")

@section("content")
    {{--    <div class="app-wrapper">--}}
    <div class="app-content pt-5 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="app-card app-card-notification shadow-sm mb-4">
                <div class="app-card-header px-4 py-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
                            <h2 class="mb-1">{{ $post->title }}</h2>
                            <ul class="notification-meta list-inline mb-0">
                                <li class="list-inline-item">{{ $post->updated_at->toDayDateTimeString() }}</li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">{{ $post->user_name }}</li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="app-card-body p-5">
                    <pre style="white-space: pre-wrap;">{{ $post->content }}</pre>
                </div>
            </div>

        </div>
    </div>
