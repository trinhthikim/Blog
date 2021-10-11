@extends("layouts.layout")
@section("menu")
    @include("layouts.menu")
@endsection
@section("content")
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Blog</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select w-auto" >
                                        <option selected value="option-1">All</option>
                                        <option value="option-2">This week</option>
                                        <option value="option-3">This month</option>
                                        <option value="option-4">Last 3 months</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <a class="btn app-btn-secondary" href="{{ route('post.create') }}">
                                        Tạo blog mới
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">ID</th>
                                                <th class="cell">Tiêu đề</th>
                                                <th class="cell">Tác giả</th>
                                                <th class="cell">Update</th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                                <th class="cell"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td class="cell">{{ $post->id }}</td>
                                                <td class="cell"><span class="truncate">{{  mb_strimwidth($post->title, 0, 50, "...") }}</span></td>
                                                <td class="cell">{{ $post->user_name }}</td>
                                                <td class="cell"><span>{{ $post->updated_at->toFormattedDateString() }}</span><span class="note">{{ $post->updated_at->toTimeString() }}</span></td>
                                                <td class="cell m-1"><a class="btn-sm app-btn-secondary" href="{{ route('post.show', $post->id)}}">Chi tiết</a></td>
                                                <td class="cell m-1"><a class="btn-sm app-btn-secondary" href="{{ route('post.edit', $post->id)}}">Chỉnh sửa</a></td>
                                                <td class="cell m-1">
                                                    <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="badge bg-danger btn-danger" type="submit" style="border: none">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center m-3">
                                        <div>
                                            {{ $posts->links('vendor.pagination.bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
