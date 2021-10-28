@extends("layouts.layout")

@section("content")
{{--    <div class="app-wrapper">--}}
    <div>
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-4">
                    @foreach($posts as $post)
                    <div class="col-6 col-lg-4 col-xl-4 col-xxl-3">
                        <div class="app-card app-card-doc shadow-sm  h-100">
                            <div class="app-card-thumb-holder p-3">
                                <div class="app-card-thumb">
                                    <img class="thumb-image" src="assets/images/doc-thumb-1.jpg" alt="">
                                </div>
                                <a class="app-card-link-mask" href="{{ route('post.show', $post->id) }}"></a>
                            </div>
                            <div class="app-card-body p-3 has-card-actions">

                                <h4 class="app-doc-title truncate mb-0"><a href="{{ route('post.show', $post->id) }}"> {{ $post->title }}</a></h4>
                                <div class="app-doc-meta">
                                    <ul class="list-unstyled mb-0">
                                        <li><span class="text-muted">Tác giả:</span> {{ $post->user_name }}</li>
                                        <li><span class="text-muted">Edited:</span> {{ $post->updated_at }}</li>
                                    </ul>

                                    <div class="pt-1 font-weight-normal">
                                        {{  mb_strimwidth($post->content, 0, 110, "...") }}
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center m-3">
                    <div>
{{--                        {{ $posts->links('vendor.pagination.bootstrap-4') }}--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
