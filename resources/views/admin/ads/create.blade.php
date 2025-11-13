@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">ADVERTISEMENT</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">ADVERTISEMENT</li>
                <li class="separator">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="nav-item">CREATE ADVERTISEMENT</li>
            </ul>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <h4 class="card-title col-md-6">Create Advertisement</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.ads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Title *</label>
                                <input type="text" name="title" class="form-control" required
                                    value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="content">Broadcast Message (Marquee Text)</label>
                                <textarea name="content" class="form-control" rows="8">
                                    {{ old('content', $ad->content ?? '') }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>Popup Image</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" name="content_status" class="form-check-input" id="showContent"
                                    value="1">
                                <label class="form-check-label" for="showContent">Show Broadcast</label>
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" name="image_status" class="form-check-input" id="showImage"
                                    value="1">
                                <label class="form-check-label" for="showImage">Show Image</label>
                            </div>

                            <button class="btn btn-success">Save Advertisement</button>
                            <a href="{{ route('admin.ads.show') }}" class="btn btn-info">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
