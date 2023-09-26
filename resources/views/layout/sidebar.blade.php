<nav id="sidebarMenu" class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Người dùng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('stories.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Truyện
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('authors.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Tác giả
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Thể loại
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('chapters.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Danh sách chương
                </a>
            </li>
    </div>
</nav>
