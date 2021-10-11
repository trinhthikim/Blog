@extends("layouts.layout")
@section("menu")
    @include("layouts.menu")
@endsection
@section("content")
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-4 settings-section">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Tạo blog mới</h1>
                    </div>
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="" method="POST" action="{{ route('post.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control" id="content" style="height: 300px"></textarea>
                                </div>
                                <button type="submit" class="btn app-btn-primary" >Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
