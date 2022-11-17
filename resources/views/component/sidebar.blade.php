<div class="bg-primary bg-primary shadow  p-2" style="border-radius:15px; height:560px">
    <div class="d-flex align-items-center mt-4 mx-2 mb-5 admin border-bottom pb-3" style="border-color: grey">
        <img src="{{ URL::to('/assets/img/user.png') }}" alt="user" width="50px" class="fluid-left">
        <h5 class="ms-2 text-white align-items-center my-auto ">{{ Auth::user()->name }} <br /> <span
                class="fw-lighter fs-6">As {{auth::user()->type }}</span></h5>
    </div>
    <div class="menu justify-content-center ms-4">
        <div class="my-3">
            <a href="index_mhs.php" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-fill" viewBox="1 2 16 16">
                    <path fill-rule="evenodd"
                        d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd"
                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg> <span class="ms-1">Home</span>
            </a>
        </div>
        <div class="my-3">
            <a href="profile_mhs.php" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 2 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg> <span class="ms-1">My Profile</span>
            </a>
        </div>
        <div class="my-3">
            <a href="tugas_mhs.php" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor"
                    class="bi bi-file-earmark-check-fill" viewBox="1 2 16 16">
                    <path
                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                </svg> <span class="ms-1"> Tugas</span>
            </a>
        </div>
        @if(auth()->user()->type == 'Admin')
        <div class="my-3">
            <a href="mahasiswa_mhs.php" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-people-fill" viewBox="0 2 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd"
                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                </svg> <span class="ms-1">Data User</span>
            </a>
        </div>
        @endif
        <div class="my-3">
            <a href="{{route('logout')}}" class="nav-link text-decoration-none text-white fs-6" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-door-open-fill" viewBox="0 0 16 16">
                    <path
                        d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                </svg> <span class="ms-1">Logout</span>
            </a>
        </div>
    </div>
</div>