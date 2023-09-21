@extends('backend.layout.app')

@section('customcss')
    <style>
        .ck-content {
            height: 300px !important;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hakkımızda</h4>

                    @if($errors)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if (session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form action="{{  route('panel.about.update') }}" class="forms-sample" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Sekme Adı</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $about->name ?? '' }}"
                                   placeholder="Sekme Adı">
                        </div>

                        <div class="form-group">
                            <label for="title">Başlık</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $about->title ?? '' }}"
                                   placeholder="Başlık">
                        </div>

                        <div class="form-group">
                            <label for="editor">Hakkımızda</label>
                            <textarea class="form-control" id="editor" name="content" placeholder="Hakkımızda"
                                      rows="3">{!! $about->content ?? '' !!}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                        <button class="btn btn-light">İptal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/translations/tr.js"></script>
    <script>
        const option = {
            language: 'tr',
            heading: {
                options: [
                    {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                    {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                    {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                    {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                    {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                    {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                    {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
                ]
            }
        };

        ClassicEditor
            .create(document.querySelector('#editor'), option)
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
