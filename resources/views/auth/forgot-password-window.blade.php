<form method="POST"  action="/app/forget-password" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="form-control" class="class" id="email" name="email" />
    <div style="margin-top: 10px">
        <input type="submit" class="class" id="post" name="post" value="Forget Password" />
    </div>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
</form>
