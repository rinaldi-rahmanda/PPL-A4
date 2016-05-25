@if (session('success'))
    <!-- Form Error List -->
    <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('success')}}</strong>
    </div>
@endif